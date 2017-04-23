<?php
/* Smarty version 3.1.30, created on 2017-04-22 15:00:41
  from "/var/www/html/app/view/exam_add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fb70190584b5_42028042',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7476bf1bfcb51ad8a7d55f22f016d668d9c3b35c' => 
    array (
      0 => '/var/www/html/app/view/exam_add.tpl',
      1 => 1492581492,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fb70190584b5_42028042 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加考试</title>
	<link rel="stylesheet" href="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/css/exam_add.css">
</head>
<body>
	<form action="<?php echo makeUrl('Exam','exam_add');?>
" method="post">
		<label><span class="desc">考试名称 : </span></span><input type="text" name="title"><span>  ( *不得大于30位 )</span></label>
		<label><span class="desc">所属科目 : </span>
			<select name="subject">
				<?php if ($_smarty_tpl->tpl_vars['allSubj']->value) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allSubj']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['sName'];?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php } else { ?>
					<option value="0">当前没有科目,请先添加</option>
				<?php }?>
			</select>
		</label>
		<label><span class="desc">考试试卷 : </span><input type="text" name="paperName" readonly="readonly" id="paperName"><button id="getPaper" url="<?php echo makeUrl('Exam','paper_select');?>
">点击选择试卷</button></label>
		<input type="hidden" name="paperId" value="" id="paperId">
		<label><span class="desc">考试开始时间 : </span><input type="text" name="beginTime" class="sang_Calender"></label>
		<label><span class="desc">考试结束时间 : </span><input type="text" name="endTime" class="sang_Calender"></label>
		<label style="display: inline;"><input type="submit" value="发布考试" id="submit"></label>
	</form>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/exam_add.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/datetime.js"><?php echo '</script'; ?>
>
</html><?php }
}
