<?php
/* Smarty version 3.1.30, created on 2017-04-23 06:12:29
  from "/var/www/html/app/view/add_ques.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fbd54d2f0f67_16642606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e2380d3ebdb4157f93cf610ffbc66cbee5c90b4' => 
    array (
      0 => '/var/www/html/app/view/add_ques.tpl',
      1 => 1492681335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fbd54d2f0f67_16642606 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加试题</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/add_ques.css">
</head>
<body>
	<form action="<?php echo makeUrl('Question','add_ques');?>
" method="post">
		<label>试题类型 : 
			<select name="type" id="type">
				<?php if ($_smarty_tpl->tpl_vars['types']->value) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['type'];?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php } else { ?>
					<option value="0">没有试题类型,请先去添加</option>
				<?php }?>
			</select>
		</label>
		<label>所属科目 : 
			<select name="subject" id="subject">
				<?php if ($_smarty_tpl->tpl_vars['subjects']->value) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subjects']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['sName'];?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php } else { ?>
					<option value="0">没有科目,请先去添加</option>
				<?php }?>
			</select>
		</label>
		<label>题目描述 : <br>
			<textarea name="desc" id="desc" cols="50" rows="2"></textarea>
		</label>
		<label><button id="add">添加一个选项</button> <button id="del">删除最后一个选项</button></label>
		<div id="cont">
			<label>A. <input type="radio" name="answer" value="A">标记为答案 <br>
				<textarea name="options[]"  cols="50" rows="2"></textarea>
			</label>
			<label>B. <input type="radio" name="answer" value="B">标记为答案 <br>
				<textarea name="options[]"  cols="50" rows="2"></textarea>
			</label>
			<label>C. <input type="radio" name="answer" value="C">标记为答案 <br>
				<textarea name="options[]"  cols="50" rows="2"></textarea>
			</label>
			<label>D. <input type="radio" name="answer" value="D">标记为答案 <br>
				<textarea name="options[]"  cols="50" rows="2"></textarea>
			</label>
		</div>
		<label><input type="submit" value="保存" id="submit"></label>
	</form>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/add_ques.js"><?php echo '</script'; ?>
>
</html><?php }
}
