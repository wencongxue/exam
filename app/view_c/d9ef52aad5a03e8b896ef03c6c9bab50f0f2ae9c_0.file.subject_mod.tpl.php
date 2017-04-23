<?php
/* Smarty version 3.1.30, created on 2017-04-19 08:12:41
  from "D:\Apache24\htdocs\exam\app\view\subject_mod.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f71bf964f880_40376228',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9ef52aad5a03e8b896ef03c6c9bab50f0f2ae9c' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\subject_mod.tpl',
      1 => 1492589473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f71bf964f880_40376228 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改科目信息</title>
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
	<form action="<?php echo makeUrl('Other','subject_mod');?>
" method="post">
		<label>科目名称 : <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value['sName'];?>
" name="sName"> <span>(*不得大于20位)</span></label>
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value['id'];?>
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
			if (fm.sName.value.trim() == '') {
				alert('科目名称不得为空');
				return false;
			}

			if (fm.sName.value.length > 20) {
				alert('科目名称不得大于20位');
				return false;
			}

			return true;
		}
	}
<?php echo '</script'; ?>
>
</html><?php }
}
