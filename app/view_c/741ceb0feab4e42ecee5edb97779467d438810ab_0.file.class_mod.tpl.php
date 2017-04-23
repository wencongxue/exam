<?php
/* Smarty version 3.1.30, created on 2017-04-19 10:15:41
  from "D:\Apache24\htdocs\exam\app\view\class_mod.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f738cd6c3c59_27033352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '741ceb0feab4e42ecee5edb97779467d438810ab' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\class_mod.tpl',
      1 => 1492596885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f738cd6c3c59_27033352 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改班级信息</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<style>
		form{
			width: 80%;
			margin:20px 10%;
		}
		form label{
			display: block;
			height: 35px;
			line-height: 35px;
		}
		form label span{
			color:red;
		}
	</style>
</head>
<body>
	<form action="<?php echo makeUrl('Other','class_mod');?>
" method="post">
		<label>班级名称 : <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['class']->value['class'];?>
" name="class"> <span>(*不得大于20位)</span></label>
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['class']->value['id'];?>
">
		<label><input type="submit" id="submit" name="submit" value="修改"></label>
	</form>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
	window.onload = function(){
		var fm         = document.getElementsByTagName('form')[0];
		var submitBtn  = document.getElementById('submit');
		submitBtn.onclick = function(){
			if (fm.class.value.trim() == '') {
				alert('班级名称不得为空');
				return false;
			}

			if (fm.class.value.length > 20) {
				alert('班级名称不得大于20位');
				return false;
			}

			return true;
		}
	}
<?php echo '</script'; ?>
>
</html><?php }
}
