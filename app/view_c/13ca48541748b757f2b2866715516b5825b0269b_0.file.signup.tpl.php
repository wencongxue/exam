<?php
/* Smarty version 3.1.30, created on 2017-04-23 06:16:07
  from "/var/www/html/app/view/signup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fbd627ad3079_78537624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13ca48541748b757f2b2866715516b5825b0269b' => 
    array (
      0 => '/var/www/html/app/view/signup.tpl',
      1 => 1490930436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fbd627ad3079_78537624 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/css/basic.css">
	<link rel="stylesheet" type="text/css" href="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/css/signup.css">
</head>
<body>
	<form action="<?php echo makeUrl('Index','signup');?>
" method="post" id="signup">
		<fieldset>
			<legend>注册</legend>
			<label for="username">用 户 名 &nbsp;:  <input type="text" name="username" id="username"> (2-20位)</label>
			<label for="password">密　　码 :  <input type="password" name="password" id="password"> (至少5位)</label>
			<label for="username">密码确认 : <input type="password" name="confirmPass"></label>
			<label for="class">班级 : <select name="class" id="class">
					<?php if ($_smarty_tpl->tpl_vars['classes']->value) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['classes']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['class'];?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<?php } else { ?>
						<option>当前没有班级,请联系管理员添加</option>
					<?php }?>
				</select>
			</label>
			<input type="submit" value="注册" name="submit" class="submit" id="submit"><p>已有账号?<a href="<?php echo makeUrl('Index','login');?>
">立刻登录</a></p>
		</fieldset>
	</form>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/js/signup.js"><?php echo '</script'; ?>
>
</html><?php }
}
