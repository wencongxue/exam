<?php
namespace app\controller;
use core\lib\Controller;
use app\model\UserModel;
use app\model\PublicModel;
use core\lib\Page;
use core\lib\Upload;
use app\controller\PublicController;

class QuestionController extends Controller
{
    private $userModel;
    private $publicModel;
    /**
     * 构造方法
     */
    public function __construct()
    {
        parent::__construct();
        $this->userModel   = new UserModel();
        $this->publicModel = new PublicModel();
    }

    //显示出所有试题,并进行分页处理和筛选处理
    public function ques_list()
    {
        //筛选条件
        $where = [];
        isset($_GET['type'])    && $where['q.type']       = $_GET['type'];
        isset($_GET['cont'])    && $where['q.cont[~]']    = $_GET['cont'];
        isset($_GET['subject']) && $where['q.subject']    = $_GET['subject'];
        if ($where['q.type'] == 'all') unset($where['q.type']);
        if ($where['q.subject'] == 'all') unset($where['q.subject']);

        //分页处理
        $count = $this->publicModel->count('question(q)',$where);
        $page  = new Page($count,5);
        $show  = $page->show();
        $list  = $this->publicModel->select('question(q)',
            ['[>]qType(t)'=>['q.type'=>'id'],'[>]subject(s)'=>['q.subject'=>'id']],
            ['q.id(id)','q.cont(cont)','t.type(type)','s.sName(subject)'],
            array_merge(['LIMIT'=>[$page->firstRow,$page->listRows]],$where));

        //去掉试题中的分隔符
        foreach ($list as $key => $value) {
            $list[$key]['cont'] = preg_replace('/'.SEP.'/', '', $value['cont']);
        }
        
        $this->smarty->assign('where1'   , $_GET['type']);
        $this->smarty->assign('where2'   , $_GET['subject']);
        $this->smarty->assign('types'    , $this->publicModel->select('qType','*'));
        $this->smarty->assign('subjects' , $this->publicModel->select('subject','*'));
        $this->smarty->assign('s'        , $page->firstRow);
        $this->smarty->assign('ques'     , $list);
        $this->smarty->assign('show'     , $show);
        $this->smarty->display('ques_list.tpl');
    }

    /**
     * 删除单个试题
     */
    public function delQues()
    {
        !isset($_GET['id']) && alertLocate('非法访问,请传入试题id值',$_SERVER['HTTP_REFERER']);

        if ($this->userModel->delete('question',['id'=>$_GET['id']])) {
            alertLocate('删除成功',$_SERVER['HTTP_REFERER']);
        } else {
            alertLocate('很遗憾,删除失败', $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 批量删除试题
     */
    public function multiDel()
    {
        if (!isset($_POST['ids'])) {
            alertLocate('非法访问',$_SERVER['HTTP_REFERER']);
        } else {
            $count = $this->userModel->delete('question',['id'=>$_POST['ids']]);
            alertLocate("你删除了 $count 条数据", $_SERVER['HTTP_REFERER']);
        }
    }

    //修改试题信息
    public function upQues()
    {
        if (!empty($_POST)) {
            $row = $this->ins_mod('update', ['id'=>$_POST['id']]);
            $row && p('<script>alert("修改成功,点击关闭修改窗口");window.close();</script>');   
            alertBack('没有修改任何数据');
        }

        !isset($_GET['id']) && alertLocate('请传入试题id值', $_SERVER['HTTP_REFERER']);
        //获取试题
        $ques = $this->publicModel->select('question', '*', ['id'=>$_GET['id']])[0];
        //试题内容,包含题目和选项
        $cont = explode(SEP, $ques['cont']);

        /* 向模板分配变量 */
        $this->smarty->assign('types'   , $this->publicModel->select('qType'   , '*'));
        $this->smarty->assign('subjects', $this->publicModel->select('subject' , '*'));
        $this->smarty->assign('ques'    , $ques);
        $this->smarty->assign('old_type', $ques['type']);
        $this->smarty->assign('old_subj', $ques['subject']);
        $this->smarty->assign('str_type', $this->publicModel->select('qType','*',['id'=>$ques['type']])[0]['type']);
        $this->smarty->assign('desc'    , $cont[0]);
        unset($cont[0]);                //删除试题描述
        $this->smarty->assign('cont'    , $cont);
        $this->smarty->assign('answer'  , $ques['answer']);

        $this->smarty->display('upQues.tpl');
    }

    //添加试题
    public function add_ques()
    {
        if (!empty($_POST)) {
            $row = $this->ins_mod('insert');
            $row ? alertLocate('添加成功',makeUrl('Question','add_ques')) : alertBack('添加失败');
        }

        $this->smarty->assign('types'   , $this->publicModel->select('qType'  ,'*'));
        $this->smarty->assign('subjects', $this->publicModel->select('subject','*'));
        $this->smarty->display('add_ques.tpl');
    }

    /**
     * 写入或者修改试题信息
     * @param string $action 要执行的操作
     * @return int           受影响的行数
     */
    private function ins_mod($action, $where = [])
    {
        empty($_POST['desc'])      &&  alertBack('题目描述不能为空');
        empty($_POST['answer'])    &&  alertBack('你还没有设置答案');
        empty($_POST['type'])      &&  alertBack('没有选择题目类型');
        empty($_POST['subject'])   &&  alertBack('没有选择所属科目');

        $cont    =  $_POST['desc'];           //存放试题题目和选项
        $answer  =  $_POST['answer'];         //存放试题答案

        //创建一个包含26个大写字母的数组
        $upperLetters = [];
        for ($i = 65; $i < 91; $i++)
            $upperLetters[] = chr($i);

        //拼装试题
        for ($i = 0; $i < count($_POST['options']); $i++)
            $cont .= SEP.$upperLetters[$i].'.'.$_POST['options'][$i];

        //处理多选题答案
        is_array($answer) && $answer = implode('', $answer);

        //写入数据库,写入之前先过滤
        $cont = htmlspecialchars($cont);
        if (empty($where)) {
            return $this->publicModel->$action('question',
                [
                    'cont'=>$cont,
                    'answer'=>$answer,
                    'type'=>$_POST['type'],
                    'subject'=>$_POST['subject']
            ]);
        } else {
            return $this->publicModel->$action('question',
                [
                    'cont'=>$cont,
                    'answer'=>$answer,
                    'type'=>$_POST['type'],
                    'subject'=>$_POST['subject']
                ],
                $where
            );
        }
    }

    //去除重复试题
    public function del_repeat()
    {
        $sql = 'delete question from question where id not in (select minid from (select min(id) as minid from question group by cont) b);';
        $stmt = $this->publicModel->query($sql);
        $row  = $stmt->rowCount();
        alertBack("删除了 $row 道重复的试题");
    }


    //导出试题
    //导出的文件名为question.txt
    public function export()
    {   
        // empty($_POST) && alertBack('非法访问');
        $ua = $_SERVER["HTTP_USER_AGENT"];
        $filename = 'question.txt';
        header("Content-Type: application/octet-stream");      
        if (preg_match("/Firefox/", $_SERVER['HTTP_USER_AGENT'])) {      
            header('Content-Disposition: attachment; filename*="utf8' .  $filename . '"');      
        } else {      
            header('Content-Disposition: attachment; filename="' .  $filename . '"');      
        }

        if (!empty($_GET['all'])) {
            //筛选条件
            $where = [];
            isset($_GET['type'])    && $where['q.type']       = $_GET['type'];
            isset($_GET['cont'])    && $where['q.cont[~]']    = $_GET['cont'];
            isset($_GET['subject']) && $where['q.subject']    = $_GET['subject'];
            if ($where['q.type']    == 'all') unset($where['q.type']);
            if ($where['q.subject'] == 'all') unset($where['q.subject']);

            $question = $this->publicModel->select('question(q)',
                [
                    '[>]qType(t)'=>['q.type'=>'id'],
                    '[>]subject(s)'=>['q.subject'=>'id']
                ],
                [
                    'q.cont(cont)',
                    'q.answer(answer)',
                    't.type(type)',
                    's.sName(subject)'
                ],
                $where
            );
        } else {
            $question = $this->publicModel->select('question(q)',
                [
                    '[>]qType(t)'=>['q.type'=>'id'],
                    '[>]subject(s)'=>['q.subject'=>'id']
                ],
                [
                    'q.cont(cont)',
                    'q.answer(answer)',
                    't.type(type)',
                    's.sName(subject)'
                ],
                [
                    'q.id'=>$_POST['ids']
                ]
            );
        }
        
        //导出试题
        foreach ($question as $item) {
            $cont = explode(SEP, $item['cont']);
            echo "[{$item['type']}]\r\n";                     //题型开始标签
            echo $item['subject'].'@'.$item['answer']."\r\n";    //所属科目和答案

            foreach ($cont as $value) {//题目描述和选项
                echo $value."\r\n";
            }

            echo "[/{$item['type']}]"."\r\n\r\n";            //题型结束标签
        }
        
    }

    //导入试题
    public function import()
    {
        
        if (!empty($_FILES)) {
            $upload =  new Upload();
            $upload->exts = ['txt'];  //限定上传文件的类型为txt文本文件
            $info   =  $upload->upload($_FILES);
            !$info  && alertBack('上传失败:'.$upload->getError());
            
            //取得上传的文件名
            $filename = $upload->savePath.'/'.$info[0];

            /*获取上传的文件内容并进行编码转换*/
            $cont     = file_get_contents($filename);
            $fileType = mb_detect_encoding($cont, ['UTF-8', 'GBK', 'LATIN1', 'BIG5']);
            $cont     = mb_convert_encoding($cont, 'utf-8', $fileType);
            $cont     = implode(SEP, explode(PHP_EOL, $cont));

            /* 获取各种题目信息并保存在数组中 */
            preg_match_all('/\[(单选|多选|判断)题\].*?\[\/(单选|多选|判断)题\]/u', $cont, $ques);

            /* 获取数据库中科目和题目类型,并保存在数组中 */
            $subjects = $this->publicModel->select('subject', '*');
            $qTypes   = $this->publicModel->select('qType'  , '*');

            /* 遍历题目数组, 写入数据库*/
            $i = 0;
            foreach ($ques[0] as $value) {
                $pCtrl= new PublicController();    //公共控制器
                $q    = explode(SEP, $value);      //将试题拆分
                $type = $pCtrl->getId($qTypes, mb_substr($q[0], 1, -1, 'utf-8'));//获取类型id
                $subj = $pCtrl->getId($subjects,explode('@', $q[1])[0]);//获取科目id
                $ans  = explode('@', $q[1])[1];//获取答案
                unset($q[count($q)-1], $q[1], $q[0]);

                //科目或题目类型不存在就跳过
                if (!$subj || !$type) {
                    continue;
                }

                /*判断题目选项是否过少*/
                if (count($q) <= 2) {
                    continue;
                }
                $cont = implode(SEP, $q);//题目描述和选项
                if ($this->publicModel->insert('question',
                    ['cont'=>$cont, 'answer'=>$ans, 'type'=>$type, 'subject'=>$subj]
                )) $i++;
            }
            unlink($filename);//删除试题文件
            alertBack("共导入了 $i 道题目");
        }
        $this->smarty->display('import.tpl');
    }

    //获取导入试题的文件模板
    public function getDemo()
    {
        $filename = FRAME.'/public/demo.txt';
        if (file_exists($filename)) {
            header("Content-Type: application/octet-stream");
            header('Content-Disposition: attachment; filename="'.basename($filename).'"');
            readfile($filename);
        } else {
            alertBack('获取文件出错');
        }
    }

}
