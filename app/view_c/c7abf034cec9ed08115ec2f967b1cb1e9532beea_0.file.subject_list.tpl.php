<?php
/* Smarty version 3.1.30, created on 2017-04-20 09:35:14
  from "D:\Apache24\htdocs\exam\app\view\subject_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f880d22f46a9_07899579',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7abf034cec9ed08115ec2f967b1cb1e9532beea' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\subject_list.tpl',
      1 => 1492680635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f880d22f46a9_07899579 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>科目列表</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/table.css">
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0">
		<caption>科目管理</caption>
		<thead><tr><th>编号</th><th>科目名称</th><th>操作</th><th style="width: 20%;"><input type="checkbox" id="all" /></th></tr></thead>
		<tbody>
			<?php if ($_smarty_tpl->tpl_vars['subject']->value) {?>
				<form action="<?php echo makeUrl('Other','multi_del_subject');?>
" method="post">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subject']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['s']->value+++1;?>
</td>
							<td class="cont"><?php echo $_smarty_tpl->tpl_vars['value']->value['sName'];?>
</td>
							<td>
								<a href="#" url="<?php echo makeUrl('Other','subject_mod');?>
/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="update">修改</a>
								<a href="<?php echo makeUrl('Other','subject_del');?>
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
	<center><a href="<?php echo makeUrl('Other','subject_add');?>
">添加科目</a></center>
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
