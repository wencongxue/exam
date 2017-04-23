<?php
/* Smarty version 3.1.30, created on 2017-04-20 09:21:16
  from "D:\Apache24\htdocs\exam\app\view\subject_add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f87d8c1839a0_53928955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd92bd78b5958f0f84fde7c45c9f32f18d78f777e' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\subject_add.tpl',
      1 => 1492680072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f87d8c1839a0_53928955 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加科目</title>
</head>
<body>
    <form action="<?php echo makeUrl('Other','subject_add');?>
" method="post">
    	<label style="display: block;margin: 20px;">科目名称 : <input type="text" name="sName" id="sName"><span>(* 不得大于20位)</span></label>
    	<label><input type="submit" value="添加科目" id="submit"></label>
    </form>
</body>
<?php echo '<script'; ?>
>
	var btn     = document.getElementById('submit');
	var sName   = document.getElementById('sName');
	btn.onclick = function(){
		if (sName.value.trim() == '') {
			alert('科目名称不得为空');
			return false;
		}

		if (sName.value.length > 20) {
			alert('科目名称不得大于20位');
			return false;
		}
		return true;
	}
<?php echo '</script'; ?>
>
</html><?php }
}
