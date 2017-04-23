<?php
/* Smarty version 3.1.30, created on 2017-03-21 16:03:34
  from "D:\Apache24\htdocs\exam\app\view\index_prac.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d0de56552854_71604726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e873464486d03b5a24d3854315a8206c7a4cc106' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\index_prac.tpl',
      1 => 1490083289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d0de56552854_71604726 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="top">
	<p>当前用户 : <a href="#" class="user"><?php echo $_COOKIE['username'];?>
</a>　<span href="#" id="changePass">修改密码</span>　<a href="<?php echo makeUrl('Index','logout');?>
">退出登录</a></p>
</div>
<div class="header">
	<div class="logo"><img src="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/img/logo_exam.png" alt=""></div>
	<ul id="nav">
		<li><a href="<?php echo makeUrl('Index','index');?>
">首页</a></li>
		<li><a href="<?php echo makeUrl('Exam','practice');?>
">练习</a></li>
	</ul>
</div><?php }
}
