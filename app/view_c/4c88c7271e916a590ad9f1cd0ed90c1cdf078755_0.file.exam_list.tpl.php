<?php
/* Smarty version 3.1.30, created on 2017-04-19 07:02:50
  from "D:\Apache24\htdocs\exam\app\view\exam_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f70b9a319270_32410583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c88c7271e916a590ad9f1cd0ed90c1cdf078755' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\exam_list.tpl',
      1 => 1492585363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f70b9a319270_32410583 (Smarty_Internal_Template $_smarty_tpl) {
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
		<caption>考试管理</caption>
		<thead><tr><th>编号</th><th>考试名称</th><th>所属科目</th><th>开始时间</th><th>结束时间</th><th>状态</th><th>操作</th><th style="width: 10%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			<?php if ($_smarty_tpl->tpl_vars['exam']->value) {?>
				<form action="<?php echo makeUrl('Exam','multi_del');?>
" method="post">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['exam']->value, 'value', false, 'key');
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
							<td class="beginTime"><?php echo $_smarty_tpl->tpl_vars['value']->value['beginTime'];?>
</td>
							<td class="endTime"><?php echo $_smarty_tpl->tpl_vars['value']->value['endTime'];?>
</td>
							<td class="status"></td>
							<td>
								<a href="#" url="<?php echo makeUrl('Paper','preview');?>
/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['paperId'];?>
" class="preview">预览试卷 </a> 
								<a href="<?php echo makeUrl('Exam','exam_del');?>
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

					<tr><td colspan="7"><?php echo $_smarty_tpl->tpl_vars['show']->value;?>
</td><td><input type="submit" value="批量删除" id="submit"> </td></tr>
				</form>
			<?php } else { ?>
				<tr><td colspan="8">没有任何数据</td></tr>
			<?php }?>
		</tbody>
	</table>
	<form action="<?php echo makeUrl('Exam','exam_list');?>
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
/public/js/exam_list.js"><?php echo '</script'; ?>
>
</html><?php }
}
