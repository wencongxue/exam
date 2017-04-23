<?php
namespace app\controller;
use core\lib\Controller;
use app\model\PublicModel;
use core\lib\Page;

class OtherController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new PublicModel();
    }

    /**
     * 列出所有科目
     */
    public function subject_list()
    {
        //获取试卷信息
        //并进行分页
        $this->showPage('subject', 5);

        $this->smarty->display('subject_list.tpl');
    }

    /**
     * 添加科目
     */
    public function subject_add()
    {
        if (!empty($_POST)) {
            $sName = trim($_POST['sName']);
            checkLength($sName, 20, 'morethan') && alertBack('科目名称不得大于20位');

            if ($this->model->insert('subject',['sName'=>$sName])) {
                alertBack('恭喜,添加科目成功');
            } else {
                alertBack('很遗憾,添加科目失败');
            }
        }
              
        $this->smarty->display('subject_add.tpl');
    }

    /**
     * 删除科目
     */
    public function subject_del()
    {
        !isset($_GET['id']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        //检查要删除的科目是否正在被其他表占用
        //如果占用,提示用户不能被删除
        $this->isUsing($_GET['id']);

        if ($this->model->delete('subject', ['id'=>$_GET['id']])) {
            alertLocate('删除成功', $_SERVER['HTTP_REFERER']);
        } else {
            alertLocate('删除失败', $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 批量删除科目
     */
    public function multi_del_subject()
    {
        !isset($_POST['ids']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        //分别检查占用情况
        foreach ($_POST['ids'] as $val) {
            $this->isUsing($val);
        }

        $count = $this->model->delete('subject', ['id'=>$_POST['ids']]);
        
        alertLocate("你删除了 $count 个科目", $_SERVER['HTTP_REFERER']);
    }

    /**
     * 修改科目信息
     */
    public function subject_mod()
    {
        if (!empty($_POST)) {
            $sName = htmlspecialchars(trim($_POST['sName']));

            if ($this->model->update('subject',['sName'=>$sName],['id'=>$_POST['id']])) {
                alertLocate('修改成功', $_SERVER['HTTP_REFERER']);
            } else {
                alertLocate('修改失败', $_SERVER['HTTP_REFERER']);
            }
        }
        !isset($_GET['id']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        $this->smarty->assign('subject', $this->model->select('subject', '*', ['id'=>$_GET['id']])[0]);
        $this->smarty->display('subject_mod.tpl');
    }


    /**
     * 列出所有班级
     */
    public function class_list()
    {
        //获取班级信息
        //并进行分页
        $this->showPage('class', 5);

        $this->smarty->display('class_list.tpl');
    }


    /**
     * 新增班级
     */
    public function class_add()
    {
        if (!empty($_POST)) {
            $cName = trim($_POST['cName']);
            checkLength($cName, 20, 'morethan') && alertBack('班级名称不得大于20位');

            if ($this->model->insert('class',['class'=>$cName])) {
                alertBack('恭喜,添加班级成功');
            } else {
                alertBack('很遗憾,添加班级失败');
            }
        }
              
        $this->smarty->display('class_add.tpl');
    }

    /**
     * 删除班级
     */
    public function class_del()
    {
        !isset($_GET['id']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        //看是否有学生占用班级
        if ($this->model->select('user', 'id', ['class'=>$_GET['id']])){
            alertLocate('这个班级中有学生,不能删除', $_SERVER['HTTP_REFERER']);
        }

        if ($this->model->delete('user', ['id'=>$_GET['id']])) {
            alertLocate('删除成功', $_SERVER['HTTP_REFERER']);
        } else {
            alertLocate('删除失败', $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 批量删除班级
     */
    public function multi_del_class()
    {
        !isset($_POST['ids']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        //分别检查占用情况
        foreach ($_POST['ids'] as $val) {
            if ($this->model->select('user', 'id', ['class'=>$val])){
                alertLocate('这个班级中有学生,不能删除', $_SERVER['HTTP_REFERER']);
            }
        }

        $count = $this->model->delete('subject', ['id'=>$_POST['ids']]);
        
        alertLocate("你删除了 $count 个科目", $_SERVER['HTTP_REFERER']);
    }

    /**
     * 修改班级信息
     */
    public function class_mod()
    {
        if (!empty($_POST)) {
            $class = htmlspecialchars(trim($_POST['class']));

            if ($this->model->update('class',['class'=>$class],['id'=>$_POST['id']])) {
                alertLocate('修改成功', $_SERVER['HTTP_REFERER']);
            } else {
                alertLocate('修改失败', $_SERVER['HTTP_REFERER']);
            }
        }
        !isset($_GET['id']) && alertLocate('非法访问', $_SERVER['HTTP_REFERER']);

        $this->smarty->assign('class', $this->model->select('class', '*', ['id'=>$_GET['id']])[0]);
        $this->smarty->display('class_mod.tpl');
    }

    /**
     * 检查科目是否被占用
     */
    private function isUsing($id)
    {
        if ($this->model->select('question', 'id', ['subject'=>$id])) {
            alertLocate('有试题正在占用该科目,不能删除!', $_SERVER['HTTP_REFERER']);
        }
        if ($this->model->select('paper', 'id', ['subject'=>$id])) {
            alertLocate('有试卷正在占用该科目,不能删除!', $_SERVER['HTTP_REFERER']);
        }
        if ($this->model->select('exam', 'id', ['subject'=>$id])) {
            alertLocate('有考试正在占用该科目,不能删除!', $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 分页封装,只适用于本控制器
     * @param string $table 表的名字
     * @param int $limit 每页显示多少条
     * @return void
     */
    private function showPage($table, $limit)
    {
        $count = $this->model->count($table);
        $page  = new Page($count, $limit);
        $show  = $page->show();
        $this->smarty->assign($table, 
            $this->model->select($table,
                '*', 
                ['LIMIT' => [$page->firstRow,$page->listRows]]
            )
        );
        $this->smarty->assign('s', 0);
        $this->smarty->assign('show' , $show);
    }
}
