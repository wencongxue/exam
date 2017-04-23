<?php
/* Smarty version 3.1.30, created on 2017-04-23 06:12:50
  from "/var/www/html/app/view/import.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fbd562cb5135_15681619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0021a424e89b1c05c9f0038d8ef7ef85d76b259' => 
    array (
      0 => '/var/www/html/app/view/import.tpl',
      1 => 1491209156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fbd562cb5135_15681619 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>导入试题</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<style>
		form{
			margin:20px 0 10px 20px;
			border:1px dashed #ccc;
		}
		p{
			margin:20px 0 0 20px;
			color: red;
		}
	</style>
</head>
<body>
	<p>*仅支持txt文本文件</p>
	<form action="<?php echo makeUrl('Question','import');?>
" method="post" enctype="multipart/form-data">
		<input type="file" name="myFile" accept="text/plain">
		<input type="submit" value="导入">
	</form>
	<p><a href="<?php echo makeUrl('Question','getDemo');?>
">点击下载试题模板文件</a></p>
</body>
<?php echo '<script'; ?>
>
	window.onload = function(){
		var inputs = document.getElementsByTagName('input');
		inputs[1].onclick = function(){
			if (inputs[0].value == '') {
				alert('请选择一个文件');
				return false;
			}
			return true;
		}
	}
<?php echo '</script'; ?>
>
</html><?php }
}
