<?php
/* Smarty version 3.1.30, created on 2017-04-20 13:07:26
  from "D:\Apache24\htdocs\exam\app\view\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f8b28ebb04b7_82252947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cbe0dcb05916fab48a5b7b031dc745cfec6e802' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\index.tpl',
      1 => 1492345907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index_prac.tpl' => 1,
  ),
),false)) {
function content_58f8b28ebb04b7_82252947 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/index.css">
</head>
<body>
	<!-- 下面引入头部公共部分 -->
	<?php $_smarty_tpl->_subTemplateRender("file:index_prac.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="main">
		<div class="items">
			<dl>
			<!--  -->
				<dd><a href="<?php echo makeUrl('Exam','exam_list_front');?>
" target="iframe">参加考试</a></dd>
				<dd><a href="#">考试记录</a></dd>
			</dl>
		</div>
		<div class="iframe">
			<iframe src="<?php echo makeUrl('Exam','exam_list_front');?>
" frameborder="0" name="iframe" id="iframe"></iframe>
		</div>
	</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/index.js"><?php echo '</script'; ?>
>
</html><?php }
}
