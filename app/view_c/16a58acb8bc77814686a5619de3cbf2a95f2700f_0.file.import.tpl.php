<?php
/* Smarty version 3.1.30, created on 2017-04-03 08:46:25
  from "D:\Apache24\htdocs\exam\app\view\import.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e20be1634392_62695868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16a58acb8bc77814686a5619de3cbf2a95f2700f' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\import.tpl',
      1 => 1491209156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e20be1634392_62695868 (Smarty_Internal_Template $_smarty_tpl) {
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
