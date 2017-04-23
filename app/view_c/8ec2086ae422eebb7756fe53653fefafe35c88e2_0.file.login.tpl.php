<?php
/* Smarty version 3.1.30, created on 2017-03-09 13:36:41
  from "D:\Apache24\htdocs\frame\app\view\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c15a69ca78f5_63588853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ec2086ae422eebb7756fe53653fefafe35c88e2' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\frame\\app\\view\\login.tpl',
      1 => 1489050657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c15a69ca78f5_63588853 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录到系统</title>
	<link rel="stylesheet" href="./public/css/basic.css">
	<link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
	<form action="./Index/login" method="post">
		<fieldset>
			<legend>登录</legend>
			<label for="username">用户名 : <input type="text" name="username" id="username"></label>
			<label for="password">密　码 : <input type="password" name="password" id="password"></label>
			<label for="username">身　份 : <input type="radio" name="type" value="0" checked="checked">学生 <input type="radio" name="type" value="0"> 管理员</label>
			<input type="submit" value="登录" name="submit" class="submit"><p>没有账号?<a href="#">注册一个</a></p>
		</fieldset>
	</form>
</body>
</html><?php }
}
