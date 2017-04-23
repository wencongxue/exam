<?php
/* Smarty version 3.1.30, created on 2017-04-23 06:13:04
  from "/var/www/html/app/view/paper_add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fbd570865e59_76508509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2460ee61545dc97a88aeab6477073849119baf9d' => 
    array (
      0 => '/var/www/html/app/view/paper_add.tpl',
      1 => 1492757795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fbd570865e59_76508509 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加试卷</title>
	<link rel="stylesheet" href="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir(array(),$_smarty_tpl);?>
/public/css/paper_add.css">
</head>
<body>
	<form action="<?php echo makeUrl('Paper','paper_add');?>
" method="post">
		<label><span class="desc">试卷名称 : </span></span><input type="text" name="title"><span>  ( *不得大于30位 )</span></label>
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
		<label><span class="desc">总　　分 : </span><input type="text" name="totalScore" readonly="readonly" value="100"> <span>  ( *根据所选题目分数自动累加 )</span></label>
		<label><span class="desc">及格分数 : </span><input type="text" name="passScore" value="60"> <span>  ( *默认为总分的60% )</span></label>
		<label><span class="desc">单选题数量 : </span><input type="text" name="singleNum" value="10"></label>
		<label><span class="desc">单选题每题分值 : </span><input type="text" name="singleScore" value="3"></label>
		<label><span class="desc">多选题数量 : </span><input type="text" name="multipleNum" value="10"></label>
		<label><span class="desc">多选题每题分值 : </span><input type="text" name="multipleScore" value="5"></label>
		<label><span class="desc">判断题数量 : </span><input type="text" name="checkNum" value="10"></label>
		<label><span class="desc">判断题每题分值 : </span><input type="text" name="checkScore" value="2"></label>
		<label><input type="submit" value="添加试卷" id="submit"></label>
	</form>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/paper_add.js"><?php echo '</script'; ?>
>
</html><?php }
}
