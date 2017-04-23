<?php
/* Smarty version 3.1.30, created on 2017-04-23 06:17:05
  from "/var/www/html/app/view/practice.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fbd6613d8d19_65102472',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26b26bdd2854a062aadc2a52569352ff8a328dbc' => 
    array (
      0 => '/var/www/html/app/view/practice.tpl',
      1 => 1489823440,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index_prac.tpl' => 1,
  ),
),false)) {
function content_58fbd6613d8d19_65102472 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<link rel="stylesheet" href="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/css/index.css">
</head>
<body>
	<!-- 下面引入头部公共部分 -->
	<?php $_smarty_tpl->_subTemplateRender("file:index_prac.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/js/index.js"><?php echo '</script'; ?>
>
</html><?php }
}
