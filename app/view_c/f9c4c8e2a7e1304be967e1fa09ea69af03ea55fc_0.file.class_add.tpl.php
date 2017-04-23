<?php
/* Smarty version 3.1.30, created on 2017-04-20 09:33:52
  from "D:\Apache24\htdocs\exam\app\view\class_add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f88080499553_34102148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9c4c8e2a7e1304be967e1fa09ea69af03ea55fc' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\class_add.tpl',
      1 => 1492680783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f88080499553_34102148 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加班级</title>
</head>
<body>
    <form action="<?php echo makeUrl('Other','class_add');?>
" method="post">
    	<label style="display: block;margin: 20px;">班级名称 : <input type="text" name="cName" id="cName"><span>(* 不得大于20位)</span></label>
    	<label><input type="submit" value="添加班级" id="submit"></label>
    </form>
</body>
<?php echo '<script'; ?>
>
	var btn     = document.getElementById('submit');
	var cName   = document.getElementById('cName');
	btn.onclick = function(){
		if (cName.value.trim() == '') {
			alert('班级名称不得为空');
			return false;
		}

		if (cName.value.length > 20) {
			alert('班级名称不得大于20位');
			return false;
		}
		return true;
	}
<?php echo '</script'; ?>
>
</html><?php }
}
