<?php
namespace app\controller;
use core\lib\Controller;
use app\model\UserModel;
use app\model\PublicModel;

class IndexController extends Controller
{
    //模型
    private $userModel;
    private $publicModel;

    //构造方法
    public function __construct()
    {
        parent::__construct();
        $this->userModel   = new UserModel();
        $this->publicModel = new PublicModel();
    }

    //默认操作
    public function index()
    {
        if (is_login('username')) {
            $this->smarty->assign('title','首页');
            $this->smarty->display('index.tpl');
        } else {
            $this->login();
        }
    }

    //登录
    public function login()
    {   
        //检查是否已经登录
        is_login('username') && alertLocate('登录状态不能访问登录页面,请先退出登录', makeUrl());

        //检查是否提交表单
        if (isset($_POST['submit'])) {
            $username  =  trim($_POST['username']);
            $password  =  trim($_POST['password']);
            $type      =  $_POST['type'];

            //用户名和密码php验证
            if(checkLength($username,2,'lessthan')  || checkLength($username,20,'morethan')){
                alertBack('用户名不能低于2位或者大于20位');
            }
            checkLength($password,5,'lessthan') ? alertBack('密码不得少于5位') : null;

            //用户名和密码数据库验证
            if ($this->userModel->checkUser(htmlspecialchars($username),sha1($password),$type)) {
                if ($type == 0) {
                    setcookie('username',$username,time()+36000,'/');
                    alertLocate('恭喜,登录成功,即将跳转到首页', makeUrl());
                } else {
                    setcookie('admin',$username,time()+36000,'/');
                    alertLocate('恭喜,登录成功,即将跳转到后台', makeUrl('Admin','index'));
                }   
            } else {
                alertBack('用户名或者密码错误,也可能是你登录时选择错了身份类型');
            }
        }
        $this->smarty->display('login.tpl');
    }

    //退出登录
    public function logout()
    {
        setcookie('username','',time()-3600,'/');
        alertLocate('退出成功,即将跳转到登录页面',makeUrl());
    }

    //注册
    public function signup()
    {
        //检查是否已经登录
        is_login('username') && alertLocate('登录状态不能注册,请先退出登录', makeUrl());

        //检查是否提交表单
        if (isset($_POST['submit'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $confirm  = trim($_POST['confirmPass']);
            $class    = trim($_POST['class']);

            //如果没有选择班级,则不能注册
            !$class && alertBack('没有选择班级,不能注册');

            //用户名和密码php验证
            (checkLength($username,2,'lessthan')  || checkLength($username,20,'morethan')) ? alertBack('用户名不能低于2位或者大于20位') : null;
            checkLength($password,5,'lessthan') ? alertBack('密码不得少于5位') : null;
            if ($password != $confirm) {
                alertBack('两次输入密码不一致');
            }
            $username = htmlspecialchars($username);
            //检查用户名是否已经被占用
            $this->userModel->userExists($username,$class) ? alertBack('该用户名已经存在') : null;

            //写入数据库和cookie
            if ($this->userModel->addUser($username,sha1($password),$class)) {
                setcookie('username',$username, time()+3600, '/');
                alertLocate('恭喜,注册成功,已为您自动登录,即将跳转到首页', makeUrl());
            } else {
                alertBack('新增失败');
            }
        } else {
            $this->smarty->assign('classes',$this->publicModel->getAllClass());
            $this->smarty->display('signup.tpl');
        }
    }
}
