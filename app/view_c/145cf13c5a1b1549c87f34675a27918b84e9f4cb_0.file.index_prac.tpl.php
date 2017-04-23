<?php
/* Smarty version 3.1.30, created on 2017-04-22 15:01:17
  from "/var/www/html/app/view/index_prac.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fb703de1df29_57351858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '145cf13c5a1b1549c87f34675a27918b84e9f4cb' => 
    array (
      0 => '/var/www/html/app/view/index_prac.tpl',
      1 => 1490083289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fb703de1df29_57351858 (Smarty_Internal_Template $_smarty_tpl) {
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
