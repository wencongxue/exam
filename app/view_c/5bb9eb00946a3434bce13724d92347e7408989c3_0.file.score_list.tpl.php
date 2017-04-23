<?php
/* Smarty version 3.1.30, created on 2017-04-22 07:29:42
  from "D:\Apache24\htdocs\exam\app\view\score_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fb066656cc06_18102919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bb9eb00946a3434bce13724d92347e7408989c3' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\score_list.tpl',
      1 => 1492846064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fb066656cc06_18102919 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>成绩列表</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>成绩管理</caption>
		<thead><tr><th>编号</th><th>考试名称</th><th>所在班级</th><th>学生姓名</th><th>分数</th></tr></thead>
		<tbody>
			<?php if ($_smarty_tpl->tpl_vars['score']->value) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['score']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['s']->value+++1;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value['class'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value['username'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value['score'];?>
</td>
					</tr>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<tr><td colspan="5"><?php echo $_smarty_tpl->tpl_vars['show']->value;?>
</td></tr>
			<?php } else { ?>
				<tr><td colspan="5">没有任何数据</td></tr>
			<?php }?>
		</tbody>
	</table>
	<br>
	<form action="<?php echo makeUrl('Exam','score_list');?>
" method="get">
		考试名称 : <select name="examId">
						<option value="all" <?php if ($_GET['examId'] == 'all') {?>selected<?php }?>>所有</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['exam']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if ($_GET['examId'] == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</select>
		班级 : 		<select name="class">
						<option value="all" <?php if ($_GET['class'] == 'all') {?>selected<?php }?>>所有</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['class']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" <?php if ($_GET['class'] == $_smarty_tpl->tpl_vars['value']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['class'];?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</select>
		<!-- 导出筛选结果的url -->
		<input type="hidden" id="url" value="<?php echo makeUrl('Exam','export_score');?>
">
		<input type="submit" value="筛选"> <input type="submit" value="导出筛选结果" id="exBtn">
	</form>
	<p style="margin-top: 10px;color: green;">导出时,如果只进行考试名称筛选,则会按班级分别导出成绩;如果只进行班级筛选,则会分别导出该班级所有的考试成绩;如果两者都不选,则会按班级和考试导出所有。</p>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/score_list.js"><?php echo '</script'; ?>
>
</html><?php }
}
