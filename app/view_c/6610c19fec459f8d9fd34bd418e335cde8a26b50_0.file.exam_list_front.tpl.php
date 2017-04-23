<?php
/* Smarty version 3.1.30, created on 2017-04-21 06:02:04
  from "D:\Apache24\htdocs\exam\app\view\exam_list_front.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f9a05ceaab26_76670109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6610c19fec459f8d9fd34bd418e335cde8a26b50' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\exam_list_front.tpl',
      1 => 1492754523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f9a05ceaab26_76670109 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<style>
		h2{
			font-size: 20px;
			color: green;
			margin: 20px 0 5px 10px;
			padding-bottom: 5px;
			font-weight: normal;
			border-bottom: 2px dashed #ccc; 
		}
		.container{
			margin: 0 0 10px 40px;
			padding-bottom: 10px;
		}
		.container h3{
			font-weight: normal;
			font-size: 15px;
			color: #666;
			margin: 5px 0;
			height: 20px;
			line-height: 20px;
		}
		.container .item{
			width: 100%;
			height: 50px;
			border-bottom: 1px solid #ccc;
			padding-bottom: 5px;
		}
		.container .item div{
			width: 100%;
			height: 30px;
			line-height: 30px;
		}
		.container p {
			width: 60%;
			float: left;
			padding-left: 10%;
		}
		.container a{
			display: block;
			float: right;
			width: 30%;
		}

	</style>
</head>
<body>
	<h2>已存在的考试</h2>
	<div class="container">
		<?php if ($_smarty_tpl->tpl_vars['exam']->value) {?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['exam']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
				<div class="item">
					<h3>考试时间 : <?php echo $_smarty_tpl->tpl_vars['value']->value['beginTime'];?>
---<?php echo $_smarty_tpl->tpl_vars['value']->value['endTime'];?>
</h3>
					<div>
						<p><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</p>
						<a href="<?php echo makeUrl('Exam','exam');?>
/examId/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
/paperId/<?php echo $_smarty_tpl->tpl_vars['value']->value['paperId'];?>
" target="_parent">点击参加</a>
					</div>
				</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<?php }?>
	</div>
	<center><?php echo $_smarty_tpl->tpl_vars['show']->value;?>
</center>
</body>
</html><?php }
}
