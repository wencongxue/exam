<?php
/* Smarty version 3.1.30, created on 2017-04-23 06:12:59
  from "/var/www/html/app/view/paper_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fbd56b3ea650_88170894',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa7b3bd9e8b1747387fa8ad3bd22b673b99d9d49' => 
    array (
      0 => '/var/www/html/app/view/paper_list.tpl',
      1 => 1492586276,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fbd56b3ea650_88170894 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>试卷列表</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>试卷管理</caption>
		<thead><tr><th>编号</th><th>试卷名称</th><th>所属科目</th><th>操作</th><th style="width: 20%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			<?php if ($_smarty_tpl->tpl_vars['paper']->value) {?>
				<form action="<?php echo makeUrl('Paper','multi_del');?>
" method="post">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['paper']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['s']->value+++1;?>
</td>
							<td class="cont"><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['subject'];?>
</td>
							<td>
								<a href="#" url="<?php echo makeUrl('Paper','preview');?>
/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="update">预览 </a> 
								<a href="<?php echo makeUrl('Paper','paper_del');?>
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

					<tr><td colspan="4"><?php echo $_smarty_tpl->tpl_vars['show']->value;?>
</td><td><input type="submit" value="批量删除" id="submit"> </td></tr>
				</form>
			<?php } else { ?>
				<tr><td colspan="5">没有任何数据</td></tr>
			<?php }?>
		</tbody>
	</table>
	<form action="<?php echo makeUrl('Paper','paper_list');?>
" method="get" style="margin:10px 0 0 20px;" id="filter">
		科目: <select name="subject">
			<option value="all">所有</option>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subjects']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['where']->value == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['sName'];?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</select>
		<input type="submit" value="筛选">
	</form>
	<br>
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
