<?php
/* Smarty version 3.1.30, created on 2017-03-29 13:06:27
  from "D:\Apache24\htdocs\exam\app\view\upUser.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58dbb153bcec97_36963149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72e3556e28f09cee9631e83f503d004d3e83e680' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\upUser.tpl',
      1 => 1490529945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58dbb153bcec97_36963149 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
	</style>
</head>
<body>
	<form action="<?php echo makeUrl('Admin','upUser');?>
" method="post">
		<label>用户名 : <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
" name="username" readonly></label>
		<label>密　码 : <input type="password" value="" name="password"> (留空则不修改该项)</label>
		<label>班　级 : 
			<select name="class">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['class']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['user']->value['class'] == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['class'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</select>
		</label>
		<label><input type="submit" id="submit" name="submit" value="修改"></label>
	</form>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
	
<?php echo '</script'; ?>
>
</html><?php }
}
