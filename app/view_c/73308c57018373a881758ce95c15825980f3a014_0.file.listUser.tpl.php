<?php
/* Smarty version 3.1.30, created on 2017-03-25 13:11:04
  from "D:\Apache24\htdocs\exam\app\view\user_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d66c68843507_84712983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73308c57018373a881758ce95c15825980f3a014' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\user_list.tpl',
      1 => 1490447451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d66c68843507_84712983 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>学生信息管理</caption>
		<thead><tr><th>编号</th><th>用户名</th><th>所属班级</th><th>操作</th><th style="width: 20%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			<?php if ($_smarty_tpl->tpl_vars['users']->value) {?>
				<form action="<?php echo makeUrl('Admin','multiDel');?>
" method="post">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['s']->value+++1;?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['username'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['class'];?>
</td>
							<td><a href="#" url="<?php echo makeUrl('Admin','upUser');?>
/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="update">修改 </a> <a href="<?php echo makeUrl('Admin','delUser');?>
/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" onclick="return confirm('你确定要删除吗?');">删除</a></td>
							<td><input type="checkbox" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"></td>
						</tr>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<tr><td colspan="4"><?php echo $_smarty_tpl->tpl_vars['show']->value;?>
</td><td><input type="submit" value="批量删除" id="submit"></td></tr>
				</form>
			<?php } else { ?>
				<tr><td colspan="4">没有任何数据</td></tr>
			<?php }?>
		</tbody>
	</table>
	<form action="<?php echo makeUrl('Admin','user_list');?>
" method="post" style="margin:10px 0 0 20px;" id="filter">
		班级: <select name="class">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['class']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['where']->value == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['class'];?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</select>
		姓名 : <input type="text" name="username">(如进行姓名查询,则不筛选班级)
		<input type="submit" value="筛选">
	</form>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/user_list.js"><?php echo '</script'; ?>
>
</html><?php }
}
