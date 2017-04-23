<?php
namespace app\controller;
use core\lib\Controller;
use app\model\PublicModel;
use app\controller\PublicController;
use core\lib\Page;

class PaperController extends Controller
{
    private $model = null;
    private $pCtrl = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new PublicModel();
        $this->pCtrl = new PublicController();
    }

    /**
     * 显示出所有试卷 
     */
    public function paper_list()
    {
        //筛选条件
        $where = [];
        if (!empty($_GET['subject']) && $_GET['subject'] != 'all') {
            $where['p.subject'] = $_GET['subject'];
        }

        //获取试卷信息
        //并进行分页
        $count = $this->model->count('paper(p)', $where);
        $page  = new Page($count, 5);
        $show  = $page->show();
        $this->smarty->assign('paper', 
            $this->model->select('paper(p)', 
                ['[>]subject(s)]' => ['p.subject' => 'id']],
                ['p.id(id)', 'p.title(title)', 's.sName(subject)'],
                array_merge(['LIMIT'=>[$page->firstRow,$page->listRows]], $where)
            )
        );
        //科目信息
        $this->smarty->assign('subjects',
            $this->model->select('subject','*')
        );
        $this->smarty->assign('s', 0);
        $this->smarty->assign('where', $_GET['subject']);
        $this->smarty->assign('show' , $show);

        //加载模板文件
        $this->smarty->display('paper_list.tpl');
    }

    /* 添加试卷 */
    public function paper_add()
    {
        if (!empty($_POST)) {
            //非空验证
            $this->empty_check();

            //验证试卷名字是否被占用
            if ($this->model->select('paper', 'id', ['title'=>trim($_POST['title'])])) {
                alertBack('该试卷名字已经存在');
            }

            $ques     = $this->model->select('question', '*', ['subject'=>$_POST['subject']]);
            $qTypes   = $this->model->select('qType', '*');

            //判断数据库中题目数量是否足够
            $totalNum = intval($_POST['singleNum']) + intval($_POST['multipleNum']) + intval($_POST['checkNum']);
            
            count($ques) < $totalNum && alertBack('题库中没有足够的试题,请先添加');

            //如果题目总量足够,再判断各个类型的题目是否足够
            $this->check_num($ques,$qTypes);

            //写入到数据库
            $row = $this->model->insert('paper', [
                    'title'      => trim($_POST['title']),
                    'qIds'       => $this->set_qIds($qTypes,$ques),
                    'sScore'     => trim($_POST['singleScore']),
                    'mScore'     => trim($_POST['multipleScore']),
                    'cScore'     => trim($_POST['checkScore']),
                    'totalScore' => trim($_POST['totalScore']),
                    'passScore'  => trim($_POST['passScore']),
                    'subject'    => $_POST['subject']
                ]
            );
            alertBack($row ? '试卷添加成功' : '试卷添加失败');
            exit();
        }
        $this->smarty->assign('allSubj', $this->model->select('subject','*'));
        $this->smarty->display('paper_add.tpl');
    }

    /**
     * 删除单个试卷
     */
    public function paper_del()
    {
        !isset($_GET['id']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        //检查占用情况
        if ($this->model->select('exam', 'id', ['paperId'=>$_GET['id']])) {
            alertLocate('有考试正在占用该试卷,不能删除', $_SERVER['HTTP_REFERER']);
        }

        if ($this->model->delete('paper', ['id'=>$_GET['id']])) {
            alertLocate('删除成功', $_SERVER['HTTP_REFERER']);
        } else {
            alertLocate('删除失败', $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 批量删除试卷
     */
    public function multi_del()
    {
        !isset($_POST['ids']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        foreach ($_POST['ids'] as $id) {
            if ($this->model->select('exam', 'id', ['paperId'=>$id])) {
                alertLocate('有考试正在占用该试卷,不能删除', $_SERVER['HTTP_REFERER']);
            }
        }

        $count = $this->model->delete('paper',['id'=>$_POST['ids']]);
        alertLocate("你删除了 $count 张试卷", $_SERVER['HTTP_REFERER']);
    }

    /**
     * 预览试卷
     */
    public function preview()
    {
        !isset($_GET['id'])   && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        //试卷信息
        $p_info = $this->model->select('paper', '*', ['id' => $_GET['id']])[0];
        !$p_info  && alertLocate('该试卷不存在',  $_SERVER['HTTP_REFERER']);


        //获取试题,并进行格式处理
        $ques = $this->pCtrl->get_ques($p_info['qIds'], $this->model);

        //注入到模板
        foreach ($ques as $key => $val) {
            if (count($val) > 0) {
                $this->smarty->assign($key, $val);
            }
        }
        $this->smarty->assign('p_info' , $p_info);
        $this->smarty->assign('s', 1);

        $this->smarty->display('preview.tpl');  
    }

    /**
     * 添加试卷数据时进行非空验证
     */
    private function empty_check()
    {
        empty(trim($_POST['title']))           && alertBack('请输入试卷名称');
        empty(trim($_POST['totalScore']))      && alertBack('总分不能为空');
        empty(trim($_POST['passScore']))       && alertBack('及格分数不能为空');
    }

    /**
     * 判断题库中特定题型数量是否足够
     */
    private function check_num( $ques, $qTypes)
    {
        $arr = [
            '单选题'  => $_POST['singleNum'],
            '多选题'  => $_POST['multipleNum'],
            '判断题'  => $_POST['checkNum']
        ];
        foreach ($arr as $type => $wantedNum) {
            if (intval($wantedNum) > count($this->pCtrl->filterArr($ques, 'type', $this->pCtrl->getId($qTypes, $type)))) {
                alertBack('题库中没有足够的'.$type);
            }
        }   
    }

    /**
     * 拼接问题id
     * 拼接完成后的字符串格式为 
     * "单选题id1,单选题id2,单选题id3SEP多选题id1,多选题id2SEP判断题id1SEP"
     * 其中SEP为一个常量
     */
    private function set_qIds($qTypes,$ques)
    {
        $qIds = '';
        $arr  = [
            '单选题'  => $_POST['singleNum'],
            '多选题'  => $_POST['multipleNum'],
            '判断题'  => $_POST['checkNum']
        ];
        foreach ($arr as $type => $num) {
            $arr   = [];
            $id    = $this->pCtrl->getId($qTypes, $type);
            $temp  = array_rand(array_flip($this->pCtrl->filterArr($ques, 'type', $id)), intval($num));

            if (!is_array($temp)) {
                $arr[0] = $temp;
            } else {
                $arr    = $temp;
            }
            $qIds .= implode(',',$arr).SEP;
        }
        return $qIds;
    }
}
