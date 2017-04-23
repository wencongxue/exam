<?php
/* Smarty version 3.1.30, created on 2017-04-22 14:59:26
  from "/var/www/html/app/view/class_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fb6fce8539e3_55390223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47633c118458e2e4fb5d11efad33bcf3205e38a9' => 
    array (
      0 => '/var/www/html/app/view/class_list.tpl',
      1 => 1492680680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fb6fce8539e3_55390223 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>班级列表</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>班级管理</caption>
		<thead><tr><th>编号</th><th>班级名称</th><th>操作</th><th style="width: 20%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			<?php if ($_smarty_tpl->tpl_vars['class']->value) {?>
				<form action="<?php echo makeUrl('Other','multi_del_class');?>
" method="post">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['class']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['s']->value+++1;?>
</td>
							<td class="cont"><?php echo $_smarty_tpl->tpl_vars['value']->value['class'];?>
</td>
							<td>
								<a href="#" url="<?php echo makeUrl('Other','class_mod');?>
/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="update">修改</a>
								<a href="<?php echo makeUrl('Other','class_del');?>
/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" onclick="return confirm('你确定要删除吗?');">删除</a>
							</td>
							<td><input type="checkbox" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"></td>
						</tr>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<tr><td colspan="3"><?php echo $_smarty_tpl->tpl_vars['show']->value;?>
</td><td><input type="submit" value="批量删除" id="submit"> </td></tr>
				</form>
			<?php } else { ?>
				<tr><td colspan="4">没有任何数据</td></tr>
			<?php }?>
		</tbody>
	</table>
	<br>
	<center><a href="<?php echo makeUrl('Other','class_add');?>
">新增班级</a></center>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/paper_list.js"><?php echo '</script'; ?>
>
</html><?php }
}
