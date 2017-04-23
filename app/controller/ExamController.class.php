<?php
namespace app\controller;
use core\lib\Controller;
use app\model\PublicModel;
use app\controller\PublicController;
use core\lib\Page;

class ExamController extends Controller
{
    //模型
    private $model;
    private $pCtrl;

    /**
     * 构造方法
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new PublicModel();
        $this->pCtrl = new PublicController();
    }

    /**
     * 练习页面
     */
    public function practice()
    {
        $this->smarty->assign('title','练习');
        $this->smarty->display('practice.tpl');
    }

    /**
     * 前台考试列表
     */
    public function exam_list_front()
    {
        //格式化当前时间
        // $nowTime = date('Y-m-d H:i:s',time());

        //只取出没有结束的考试
        $where =  ['#endTime[>]' => 'NOW()'];

        $count = $this->model->count('exam', $where);

        $page  = new Page($count, 3);
        $show  = $page->show();

        $this->smarty->assign('exam', 
            $this->model->select('exam', 
                '*',
                array_merge(
                    ['LIMIT'=>[$page->firstRow,$page->listRows]], 
                    $where
                )
            )
        );
        $this->smarty->assign('show' , $show);

        $this->smarty->display('exam_list_front.tpl');
    }

    /**
     * 后台考试列表
     */
    public function exam_list()
    {
        //筛选条件
        $where = [];
        if (!empty($_GET['subject']) && $_GET['subject'] != 'all') {
            $where['e.subject'] = $_GET['subject'];
        }

        //获取试卷信息
        //并进行分页
        $count = $this->model->count('exam(e)', $where);
        $page  = new Page($count, 5);
        $show  = $page->show();
        $this->smarty->assign('exam', 
            $this->model->select('exam(e)', 
                [
                    '[>]subject(s)]' => ['e.subject' => 'id']
                ],
                [
                    'e.id(id)',
                    'e.title(title)', 
                    's.sName(subject)',
                    'e.beginTime(beginTime)',
                    'e.endTime(endTime)',
                    'e.paperId(paperId)'
                ],
                array_merge(['LIMIT'=>[$page->firstRow,$page->listRows]], $where)
            )
        );
        //科目信息
        $this->smarty->assign('subjects',
            $this->model->select('subject','*')
        );
        $this->smarty->assign('s', $page->firstRow);
        $this->smarty->assign('where', $_GET['subject']);
        $this->smarty->assign('show' , $show);

        //加载模板文件
        $this->smarty->display('exam_list.tpl');
    }

    /**
     * 删除单个考试
     */
    public function exam_del()
    {
        !isset($_GET['id']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        $row = $this->model->delete('exam', ['id'=>$_GET['id']]);

        alertLocate($row ? '删除成功' : '删除失败', $_SERVER['HTTP_REFERER']);
    }

    /**
     * 批量删除考试
     */
    public function multi_del()
    {
        !isset($_POST['ids']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        $count = $this->model->delete('exam', ['id'=>$_POST['ids']]);
        
        alertLocate("你删除了 $count 场考试", $_SERVER['HTTP_REFERER']);
    }

    /**
     * 添加考试
     */
    public function exam_add()
    {
        if (!empty($_POST)) {
            //检查考试名称是否被占用
            $data = $this->model->select('exam', 'id', ['title' => $_POST['title']]);

            if (!empty($data)) {
                alertBack('该考试已经存在,请更换考试名称');
            }

            //添加考试
            $row = $this->model->insert('exam', 
                [
                    'title'     =>    $_POST['title'],
                    'paperId'   =>    $_POST['paperId'],
                    'beginTime' =>    $_POST['beginTime'],
                    'endTime'   =>    $_POST['endTime'],
                    'subject'   =>    $_POST['subject'],
                ]
            );

            alertBack($row ? '恭喜,添加成功' : '很遗憾,添加失败');
        }

        $this->smarty->assign('allSubj', $this->model->select('subject', '*'));
        $this->smarty->display('exam_add.tpl');
    }

    /**
     * 选择试卷
     */
    public function paper_select()
    {
        //筛选条件
        $where = [];
        if (!empty($_GET['subject']) && $_GET['subject'] != 'all') {
            $where['p.subject'] = $_GET['subject'];
        }

        //获取试卷信息
        //并进行分页处理
        $count = $this->model->count('paper(p)', $where);
        $page  = new Page($count, 5);
        $show  = $page->show();
        $this->smarty->assign('paper', 
            $this->model->select('paper(p)', 
                [
                    '[>]subject(s)]' => ['p.subject' => 'id']
                ],
                [
                    'p.id(id)', 
                    'p.title(title)',
                     's.sName(subject)'
                ],
                array_merge(['LIMIT'=>[$page->firstRow,$page->listRows]], $where)
            )
        );

        //科目信息
        $this->smarty->assign('subjects',
            $this->model->select('subject','*')
        );
        
        $this->smarty->assign('s', $page->firstRow);
        $this->smarty->assign('where', $_GET['subject']);
        $this->smarty->assign('show' , $show);
        $this->smarty->display('paper_select.tpl');
    }

    /**
     * 考试页面
     */
    public function exam()
    {
        if (!is_login('username')) {
            alertLocate('你还没有登录,请先登录',makeUrl('Index','login'));
        }

        //检查考生是否已经参加过该次考试
        $this->has_examed();

        //访问验证
        !isset($_GET['paperId'])   && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);
        !isset($_GET['examId'])    && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        //考试信息
        $e_info = $this->model->select('exam', '*', ['id'=>$_GET['examId']])[0];
        !$e_info  && alertLocate('该考试不存在', $_SERVER['HTTP_REFERER']);

        //考试时间访问控制
        $nowTime = date('Y-m-d H:i:s',time());
        $nowTime < $e_info['beginTime'] && alertBack('考试尚未开始');


        //试卷信息
        $p_info = $this->model->select('paper', '*', ['id' => $_GET['paperId']])[0];
        !$p_info  && alertLocate('该试卷不存在',  $_SERVER['HTTP_REFERER']);


        //获取试题,并进行格式处理
        $ques = $this->pCtrl->get_ques($p_info['qIds'], $this->model);

        //注入到模板
        $qNum = 0;
        foreach ($ques as $key => $val) {
            $num = count($val);
            if ($num > 0) {
                $qNum += $num;
                $this->smarty->assign($key, $val);
            }
        }

        $this->smarty->assign('e_info', $e_info);
        $this->smarty->assign('p_info', $p_info);
        $this->smarty->assign('qNum', $qNum);
        $this->smarty->assign('s', 1);

        $this->smarty->display('exam.tpl');
    }

    /*
     * 对学生的答案进行处理
     */
    public function check()
    {
        //获取考生id
        $userId = $this->model->select('user', 'id', ['username' => $_COOKIE['username']])[0];

        //检查考生是否已经参加过该次考试
        $this->has_examed();

        //试卷信息
        $p_info = $this->model->select('paper', '*', ['id' => $_POST['paperId']])[0];

        //试题信息
        //具体是什么格式,请查看public控制器的get_ques方法
        $ques_info  = $this->pCtrl->get_ques($p_info['qIds'], $this->model);

        //计算考生成绩
        $totalScore = $this->getTotalScore($ques_info, $p_info);        

        //将成绩信息写入数据库
        $row = $this->model->insert('score',
            [
                'stuId'      =>   $userId,
                'examId'     =>   $_POST['examId'],
                'stuScore'   =>   $totalScore
            ]
        );

        alertLocate($row ? '交卷成功' : '未知错误,交卷失败', makeUrl());
    }

    /*
     * 成绩列表
     */
    public function score_list()
    {
        //筛选条件
        $where = [];
        if (!empty($_GET['examId']) && $_GET['examId'] != 'all') {
            $where['s.examId'] = $_GET['examId'];
        }
        if (!empty($_GET['class']) && $_GET['class'] != 'all') {
            $where['c.id'] = $_GET['class'];
        }
        // p($where);exit;
        //总记录数
        $count = $this->model->count('score(s)', 
            [
                '[>]user(u)'    =>   ['s.stuId'   => 'id'],
                '[>]class(c)'   =>   ['u.class'   => 'id'],
                '[>]exam(e)'    =>   ['s.examId' => 'id']
            ],
            's.id',
            $where
        );
        $page  = new Page($count, 5);
        $show  = $page->show();

        //获取姓名,班级名称,考试名称和分数
        $score = $this->model->select('score(s)', 
            [
                '[>]user(u)'    =>   ['s.stuId'   => 'id'],
                '[>]class(c)'   =>   ['u.class'   => 'id'],
                '[>]exam(e)'    =>   ['s.examId'  => 'id']
            ],
            [
                's.stuScore(score)',
                'u.username(username)',
                'c.class(class)',
                'e.title(title)',
            ],
            array_merge(
                ['LIMIT' => [$page->firstRow, $page->listRows]],
                $where
            )
        );

        $this->smarty->assign('score', $score);
        $this->smarty->assign('show' , $show);
        $this->smarty->assign('s', $page->firstRow);
        $this->smarty->assign('class', $this->model->select('class', '*'));
        $this->smarty->assign('exam',  $this->model->select('exam','*'));

        $this->smarty->display('score_list.tpl');   
    }

    /**
     * 导出成绩
     */
    public function export_score()
    {
        //筛选条件
        $where = [];

        //如果筛选条件为all,就表示不进行筛选
        if ($_GET['examId'] != 'all') {
            $where['e.id']   = $_GET['examId'];
        }
        if ($_GET['class']  != 'all') {
            $where['c.id']   = $_GET['class'];
        }

        //获取姓名,班级名称,考试名称和分数
        $info = $this->model->select('score(s)', 
            [
                '[>]user(u)'    =>   ['s.stuId'   => 'id'],
                '[>]class(c)'   =>   ['u.class'   => 'id'],
                '[>]exam(e)'    =>   ['s.examId'  => 'id'],
            ],
            [
                'c.class(class)',
                'e.title(title)',
                'u.username(username)',
                's.stuScore(score)',
            ],
            $where
        );

        //整理信息
        $info = $this->deal_info($info);

        //导出信息
        $this->do_export($info);

        //将文件打包并提供下载
        $this->zip_score();
    }

    /**
     * 计算考生的总分
     * 这些计算的基础是取出来的试题顺序要和前台发送过来的试题顺序一致
     * 否则会一错到底
     * @param array $ques_info 试题信息
     * @param array $p_info    试卷信息,主要是用来从中获取试题的分数
     * @return int 返回考生所得分数
     */
    private function getTotalScore($ques_info,$p_info)
    {
        //试题总数
        $qNum = 0;
        
        //考生总分
        $totalScore = 0;

        if (!empty($ques_info['sQues'])) {
            //单选题每题分数
            $sScore = intval($p_info['sScore']);

            $qNum += count($ques_info['sQues']);

            for ($i = 0; $i < $qNum; $i++){
                if ($ques_info['sQues'][$i]['answer'] == $_POST['q'.($i+1)]) {
                    $totalScore += $sScore;
                }
            }
        }

        if (!empty($ques_info['mQues'])) {
            //多选题每题分数
            $mScore = intval($p_info['mScore']);

            $init  = $qNum;
            $qNum += count($ques_info['mQues']);

            for ($i = $init; $i < $qNum; $i++) {
                if ($ques_info['mQues'][$i-$init]['answer'] == implode('', $_POST['q'.($i+1)])) {
                    $totalScore += $mScore;
                }
            }
        }

        if (!empty($ques_info['cQues'])) {
            //判断题每题分数
            $cScore = intval($p_info['cScore']);

            $init  = $qNum;
            $qNum += count($ques_info['cQues']);

            for ($i = $init; $i < $qNum; $i++) {
                if ($ques_info['cQues'][$i-$init]['answer'] == $_POST['q'.($i+1)]) {
                    $totalScore += $cScore;
                }
            }
        }

        return $totalScore; 
    }

    /**
     * 检查考生是否已经参加过该场考试
     */
    private function has_examed()
    {
        //获取考生id
        $userId = $this->model->select('user', 'id', ['username' => $_COOKIE['username']])[0];

        //检查考生是否已经进行过该场考试
        $info   = $this->model->select('score', 'id', ['stuId'=>$userId,
                 'examId' => [
                    $_POST['examId'],
                    $_GET['examId']
                ]]);

        if (!empty($info)) {
            alertBack('你已经进行过该场考试,不能重复参加');
        }     
    }

    /**
     * 将成绩等归类
     * @param array $info 原始的成绩信息
     * @return array 按照班级和考试整理好的信息
     */
    private function deal_info($info)
    {
        $dealed_info = [];
        foreach ($info as $value) {
            if (!array_key_exists($value['class'], $dealed_info)) {
                $dealed_info[$value['class']]   = [];
                if (!array_key_exists($dealed_info[$value['class']][$value['title']], $dealed_info[$value['class']])) {
                    $dealed_info[$value['class']][$value['title']] = [];
                }
            } 
            $dealed_info[$value['class']][$value['title']][] = $value;
        }

        return $dealed_info;
    }

    /**
     * 实现导出
     * @param array $info 已经分类过的信息
     * @return void
     */
    private function do_export($info)
    {
        //创建保存csv文件的文件夹
        $path = FRAME . '/public/score';
        !file_exists($path) && mkdir($path, 0777, true);

        foreach ($info as $class => $value) {

            foreach ($value as $exam => $_value) {

                //最终的文件名
                $filename = $path . '/' . $class . '-' . $exam . '.csv';
                //文件资源句柄
                $handle = fopen($filename, 'w');
                //文件头
                $str    = "班级,考试名称,姓名,成绩\n";
                //文件内容
                $str   .= $this->get_csv_str($_value);
                $str = iconv('utf-8', 'gb2312', $str);

                //写入到文件并关闭资源句柄
                fwrite($handle, $str);
                fclose($handle);
            }
        }
    }

    /**
     * 对传进来的数据进行拼接
     * @param array $arr
     * @return string 
     */
    private function get_csv_str($arr)
    {
        $str = '';
        foreach ($arr as $value) {
            $str .= implode(',', $value);
            $str .= "\n";
        }

        return $str;
    }

    /**
     * 将导出的csv打包并下载到客户端
     */
    private function zip_score()
    {
        $path = FRAME . '/public/score/';

        //获取保存成绩的文件
        $csvFiles = $this->get_csv_file($path);
        if (empty($csvFiles)) {
             return false;
        }

        //打包后的文件名
        $datetime = date('Y-m-d-H-i-s',time());
        $zip_file = $path . $datetime . '.zip';

        $zip = new \ZipArchive();

        if (true == ($zip->open($zip_file, \ZipArchive::CREATE))) {
            foreach ($csvFiles as $file) {
                if (file_exists($file)) {
                    $zip->addFromString(basename($file), file_get_contents($file));
                    unlink($file);
                }
            }
        }
        $zip->close();

        header ( "Cache-Control: max-age=0" );
        header ( "Content-Description: File Transfer" );
        header ( 'Content-disposition: attachment; filename=' . basename($zip_file)); // 文件名
        header ( "Content-Type: application/zip" ); // zip格式的
        header ( "Content-Transfer-Encoding: binary" ); // 告诉浏览器，这是二进制文件
        header ( 'Content-Length: ' . filesize ( $zip_file ) ); // 告诉浏览器，文件大小
        readfile ( $zip_file );//输出文件;
    }

    /**
     * 获取csv文件
     * @param string $path 文件夹路径
     * @return array 包含csv文件的数组
     */
    private function get_csv_file($path)
    {
        $csvFiles   = [];
        if ($handle = opendir($path)) {

            //因为php会进行隐式类型转换
            //所以循环条件不能写成 $file = readdir($handle)
            //那样的话,如果文件名的求值为false就会终止循环

            while (false !== ($file = readdir($handle))) {
                if (mb_substr($file, -4) == '.csv') {
                    $csvFiles[] = $path . $file;
                }
            }
            closedir($handle);
        }

        return $csvFiles;
    }
}
