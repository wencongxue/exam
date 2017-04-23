<?php
/* Smarty version 3.1.30, created on 2017-03-31 12:11:20
  from "D:\Apache24\htdocs\exam\app\view\upQues.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58de4768989977_49821767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ce76b4493f3e18c61d5fcb0ccad57158efaed90' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\upQues.tpl',
      1 => 1490933089,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58de4768989977_49821767 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改试题</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<style>
		form{
			margin: 10px 0 0 50px;
		}
		form label{
			display: block;
			margin-top: 15px;
		}
	</style>
</head>
<body>
	<form action="<?php echo makeUrl('Question','upQues');?>
" method="post">
		<label>试题类型 : 
			<select name="type" id="type" disabled="disabled">
				<?php if ($_smarty_tpl->tpl_vars['types']->value) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['old_type']->value == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['type'];?>
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
" <?php if ($_smarty_tpl->tpl_vars['old_subj']->value == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['sName'];?>
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
			<textarea name="desc" id="desc" cols="50" rows="2"><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
</textarea>
		</label>
		<div id="cont">
			<?php if ($_smarty_tpl->tpl_vars['str_type']->value == '单选题') {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cont']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
					<label><?php echo substr($_smarty_tpl->tpl_vars['value']->value,0,2);?>
<input type="radio" name="answer" value="A" <?php if ($_smarty_tpl->tpl_vars['answer']->value == $_smarty_tpl->tpl_vars['value']->value[0]) {?>checked<?php }?>>标记为答案 <br>
						<textarea name="options[]"  cols="50" rows="2"><?php echo substr($_smarty_tpl->tpl_vars['value']->value,2);?>
</textarea>
					</label>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php } elseif ($_smarty_tpl->tpl_vars['str_type']->value == '多选题') {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cont']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
					<label><?php echo substr($_smarty_tpl->tpl_vars['value']->value,0,2);?>
<input type="checkbox" name="answer[]" value="A" <?php ob_start();
echo stristr($_smarty_tpl->tpl_vars['answer']->value,$_smarty_tpl->tpl_vars['value']->value[0]);
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1 != false) {?>checked<?php }?>>标记为答案<br>
							<textarea name="options[]"  cols="50" rows="2"><?php echo substr($_smarty_tpl->tpl_vars['value']->value,2);?>
</textarea>
					</label>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php } elseif ($_smarty_tpl->tpl_vars['str_type']->value == '判断题') {?>
				<label><input type="radio" name="answer" value="A" <?php if ($_smarty_tpl->tpl_vars['answer']->value == 'A') {?>checked<?php }?>> 正确</label>
				<label><input type="radio" name="answer" value="B" <?php if ($_smarty_tpl->tpl_vars['answer']->value == 'B') {?>checked<?php }?>> 错误</label>
			<?php }?>
		</div>
		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>
">
		<label><input type="submit" value="保存" id="submit"></label>
	</form>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/upQues.js"><?php echo '</script'; ?>
>
</html><?php }
}
