<?php
namespace app\controller;
use core\lib\Controller;
use app\model\UserModel;
use app\model\PublicModel;
use core\lib\Page;

class AdminController extends Controller
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

    public function index()
    {
        !is_login('admin') && alertLocate('你还没有登录后台,请先登录',makeUrl());
        $this->smarty->display('admin.tpl');
    }

    /**
     * 显示用户列表
     */
    public function user_list()
    {
        //筛选条件
        $where = [];
        !empty($_GET['username'])  && $where['user.username'] = $_GET['username'];
        isset($_GET['class'])      && $where['user.class']    = $_GET['class'];
        if (!empty($where['user.username']))  unset($where['user.class']);

        //分页处理
        $count = $this->userModel->count('user',array_merge(['type'=>0],$where));
        $page  = new Page($count,5);
        $show  = $page->show();
        $list  = $this->userModel->select('user',
            [
                '[>]class'=>['class'=>'id']
            ],
            [
                'user.id(id)',
                'user.username(username)',
                'class.class(class)'
            ],
            array_merge(['type'=>0,'LIMIT'=>[$page->firstRow,$page->listRows]],$where)
        );
        $this->smarty->assign('where',$where['user.class']);
        $this->smarty->assign('class', $this->publicModel->getAllClass());
        $this->smarty->assign('s',$page->firstRow);
        $this->smarty->assign('users',$list);
        $this->smarty->assign('show',$show);
        $this->smarty->display('user_list.tpl');
    }

    /**
     * 删除单个用户
     */
    public function delUser()
    {
        !isset($_GET['id']) && alertLocate('非法访问,请传入用户id值',$_SERVER['HTTP_REFERER']);
        
        if ($this->userModel->delete('user',['id'=>$_GET['id']])) {
            alertLocate('删除成功',$_SERVER['HTTP_REFERER']);
        } else {
            alertLocate('很遗憾,删除失败', $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 批量删除用户
     */
    public function multiDel()
    {
        if (!isset($_POST['ids'])) {
            alertLocate('非法访问',$_SERVER['HTTP_REFERER']);
        } else {
            $count = $this->userModel->delete('user',['id'=>$_POST['ids']]);
            alertLocate("你删除了 $count 条数据", $_SERVER['HTTP_REFERER']);
        }
    }

    //修改用户信息
    public function upUser()
    {
        if (isset($_POST['submit'])) {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = $_POST['password'];
            $class    = $_POST['class'];
            $row      = 0;
            //如果$password存在就修改密码,否则不修改
            if ($password) {
                $row  = $this->userModel->update('user',
                    [
                        'password'=>sha1($password),
                        'class'=>$class
                    ],
                    ['username'=>$username]
                );
            } else {
                $row  = $this->userModel->update('user',
                    ['class'=>$class],
                    ['username'=>$username]
                );
            }
            $row && p('<script>alert("修改成功,点击关闭修改窗口");window.close();</script>');   
            alertBack('没有修改任何数据');
        }
        !isset($_GET['id']) && alertLocate('请传入用户id值', $_SERVER['HTTP_REFERER']);
        $this->smarty->assign('class', $this->publicModel->getAllClass());
        $this->smarty->assign('user' , $this->userModel->select('user',
            '*',
            ['id'=>$_GET['id']])[0]
        );
        $this->smarty->display('upUser.tpl');
    }

    //退出登录
    public function logout()
    {
        setcookie('admin','',time()-1,'/');
        alertLocate('退出成功,即将跳转到登录页面',makeUrl());
    }   
}
