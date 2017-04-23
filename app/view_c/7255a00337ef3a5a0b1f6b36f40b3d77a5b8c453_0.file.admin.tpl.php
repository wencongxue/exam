<?php
/* Smarty version 3.1.30, created on 2017-04-20 13:07:00
  from "D:\Apache24\htdocs\exam\app\view\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f8b2745b6136_42439144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7255a00337ef3a5a0b1f6b36f40b3d77a5b8c453' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\admin.tpl',
      1 => 1492685824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f8b2745b6136_42439144 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>考试系统后台</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/admin.css">
</head>
<body>
	<div class="top">
		<p>当前用户 : <a href="#" class="user"><?php echo $_COOKIE['admin'];?>
</a>　<span href="#" id="changePass"></span>　<a href="<?php echo makeUrl('Admin','logout');?>
">退出登录</a></p>
	</div>
	<div class="header">
		<div class="logo"><img src="<?php echo getRootDir();?>
/public/img/logo_exam.png" alt=""></div>
	</div>

	<div class="main">
		<div class="items">
			<dl>
				<dt>学生信息管理</dt>
				<dd class="selected"><a href="<?php echo makeUrl('Admin','user_list');?>
" target="iframe">学生列表</a></dd>
			</dl>
			<dl>
				<dt>试题管理</dt>
				<dd><a href="<?php echo makeUrl('Question','ques_list');?>
" target="iframe">试题列表</a></dd>
				<dd><a href="<?php echo makeUrl('Question','add_ques');?>
" target="iframe">添加试题</a></dd>
				<dd><a href="<?php echo makeUrl('Question','import');?>
" target="iframe">导入试题</a></dd>
			</dl>
			<dl>
				<dt>试卷管理</dt>
				<dd><a href="<?php echo makeUrl('Paper','paper_list');?>
" target="iframe">试卷列表</a></dd>
				<dd><a href="<?php echo makeUrl('Paper','paper_add');?>
" target="iframe">添加试卷</a></dd>
			</dl>
			<dl>
				<dt>考试管理</dt>
				<dd><a href="<?php echo makeUrl('Exam','exam_list');?>
" target="iframe">考试列表</a></dd>
				<dd><a href="<?php echo makeUrl('Exam','exam_add');?>
" target="iframe">添加考试</a></dd>
			</dl>
			<dl>
				<dt>成绩管理</dt>
				<dd><a href="<?php echo makeUrl('Exam','score_list');?>
" target="iframe">导出成绩</a></dd>
			</dl>
			<dl>
				<dt>其他管理</dt>
				<dd><a href="<?php echo makeUrl('Other','subject_list');?>
" target="iframe">科目信息管理</a></dd>
				<dd><a href="<?php echo makeUrl('Other','class_list');?>
" target="iframe">班级信息管理</a></dd>
			</dl>
		</div>
		<iframe src="<?php echo makeUrl('Admin','user_list');?>
" frameborder="0" name="iframe" id="iframe"></iframe>
	</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/admin.js"><?php echo '</script'; ?>
>
</html><?php }
}
