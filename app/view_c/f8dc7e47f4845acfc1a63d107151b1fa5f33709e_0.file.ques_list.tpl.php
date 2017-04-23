<?php
/* Smarty version 3.1.30, created on 2017-04-23 06:12:15
  from "/var/www/html/app/view/ques_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fbd53f1942b5_50756243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8dc7e47f4845acfc1a63d107151b1fa5f33709e' => 
    array (
      0 => '/var/www/html/app/view/ques_list.tpl',
      1 => 1491113114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fbd53f1942b5_50756243 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>试题列表</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>试题管理</caption>
		<thead><tr><th>编号</th><th>题型</th><th>试题描述</th><th>所属科目</th><th>操作</th><th style="width: 30%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			<?php if ($_smarty_tpl->tpl_vars['ques']->value) {?>
				<form action="<?php echo makeUrl('Question','multiDel');?>
" method="post">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ques']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['s']->value+++1;?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['type'];?>
</td>
							<td class="cont"><?php echo $_smarty_tpl->tpl_vars['value']->value['cont'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['subject'];?>
</td>
							<td><a href="#" url="<?php echo makeUrl('Question','upQues');?>
/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="update">修改 </a> <a href="<?php echo makeUrl('Question','delQues');?>
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

					<tr><td colspan="5"><?php echo $_smarty_tpl->tpl_vars['show']->value;?>
</td><td><input type="submit" value="批量删除" id="submit"> <input type="submit" value="导出所选" id="export"> <input type="submit" value="导出筛选结果" id="exportAll"></td></tr>
					<!-- 导出时的url -->
					<input type="hidden" id="exportUrl"   value="<?php echo makeUrl('Question','export');?>
">
				</form>
			<?php } else { ?>
				<tr><td colspan="6">没有任何数据</td></tr>
			<?php }?>
		</tbody>
	</table>
	<form action="<?php echo makeUrl('Question','ques_list');?>
" method="get" style="margin:10px 0 0 20px;" id="filter">
		题型: <select name="type">
			<option value="all" <?php if ($_smarty_tpl->tpl_vars['where1']->value == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>>所有</option>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['where1']->value == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['type'];?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</select>
		科目: <select name="subject">
			<option value="all" <?php if ($_smarty_tpl->tpl_vars['where2']->value == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>>所有</option>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subjects']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['where2']->value == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['sName'];?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</select>
		题干或选项 : <input type="text" name="cont" value="<?php echo $_GET['cont'];?>
">(支持模糊查询)
		<input type="submit" value="筛选">
	</form>
	<br>
	 <a href="<?php echo makeUrl('Question','del_repeat');?>
">点击去除重复的试题</a>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/ques_list.js"><?php echo '</script'; ?>
>
</html><?php }
}
