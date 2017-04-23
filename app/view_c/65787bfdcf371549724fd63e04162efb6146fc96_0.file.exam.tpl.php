<?php
/* Smarty version 3.1.30, created on 2017-04-21 08:04:40
  from "D:\Apache24\htdocs\exam\app\view\exam.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f9bd18b96745_94486007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65787bfdcf371549724fd63e04162efb6146fc96' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\exam.tpl',
      1 => 1492761210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f9bd18b96745_94486007 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>考试</title>
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
	<link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/exam.css">
</head>
<body>
	<!-- 页面头部 -->
	<div class="header">
		<div class="username">姓名:<?php echo $_COOKIE['username'];?>
</div>
		<div class="examname"><?php echo $_smarty_tpl->tpl_vars['e_info']->value['title'];?>
 (总分 : <?php echo $_smarty_tpl->tpl_vars['p_info']->value['totalScore'];?>
)</div>
		<div class="other">
			<div class="remaining"></div>
			<div class="submit">我要交卷</div>
		</div>
	</div>
	<!-- 答题卡 -->
	<ul class="cards">
		<?php
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['qNum']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['qNum']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
			<li><a href="#q<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</a></li>
		<?php }
}
?>

	</ul>
	<!-- 题目列表 -->
	<form action="<?php echo makeUrl('Exam','check');?>
" method="post">
		<input type="hidden" id="beginTime" value="<?php echo $_smarty_tpl->tpl_vars['e_info']->value['beginTime'];?>
">
		<input type="hidden" id="endTime" value="<?php echo $_smarty_tpl->tpl_vars['e_info']->value['endTime'];?>
">
		<input type="hidden" name="paperId" value="<?php echo $_smarty_tpl->tpl_vars['p_info']->value['id'];?>
">
		<input type="hidden" name="examId" value="<?php echo $_smarty_tpl->tpl_vars['e_info']->value['id'];?>
">
        <!-- 单选题 -->
        <?php if ($_smarty_tpl->tpl_vars['sQues']->value) {?>
            <div class="single">
                <h2 class="title">单选题(每题<?php echo $_smarty_tpl->tpl_vars['p_info']->value['sScore'];?>
分) : </h2>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sQues']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                    <div class="single-item" id="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
">
                        <h3><span><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
. </span><?php echo $_smarty_tpl->tpl_vars['val']->value['desc'];?>
</h3>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['val']->value['opts'], 'opt', false, '_key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_key']->value => $_smarty_tpl->tpl_vars['opt']->value) {
?>
                            <label for="q<?php echo $_smarty_tpl->tpl_vars['s']->value;
echo $_smarty_tpl->tpl_vars['_key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
. <input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
" name="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
" id="q<?php echo $_smarty_tpl->tpl_vars['s']->value;
echo $_smarty_tpl->tpl_vars['_key']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
</label>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <span style="display: none;"><?php echo $_smarty_tpl->tpl_vars['s']->value++;?>
</span>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </div>
        <?php }?>
        <!-- 多选题 -->
        <?php if ($_smarty_tpl->tpl_vars['mQues']->value) {?>
            <div class="multiple">
                <h2 class="title">多选题(每题<?php echo $_smarty_tpl->tpl_vars['p_info']->value['mScore'];?>
分) : </h2>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mQues']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                    <div class="multiple-item" id="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
">
                        <h3><span><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
. </span><?php echo $_smarty_tpl->tpl_vars['val']->value['desc'];?>
</h3>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['val']->value['opts'], 'opt', false, '_key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['_key']->value => $_smarty_tpl->tpl_vars['opt']->value) {
?>
                            <label for="q<?php echo $_smarty_tpl->tpl_vars['s']->value;
echo $_smarty_tpl->tpl_vars['_key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
. <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
" name="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
[]" id="q<?php echo $_smarty_tpl->tpl_vars['s']->value;
echo $_smarty_tpl->tpl_vars['_key']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
</label>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <span style="display: none;"><?php echo $_smarty_tpl->tpl_vars['s']->value++;?>
</span>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </div>
        <?php }?>
        <!-- 判断题 -->
        <?php if ($_smarty_tpl->tpl_vars['cQues']->value) {?>
            <div class="check">
                <h2 class="title">判断题(每题<?php echo $_smarty_tpl->tpl_vars['p_info']->value['cScore'];?>
分) : </h2>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cQues']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                    <div class="check-item" id="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
">
                        <h3><span><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
. </span><?php echo $_smarty_tpl->tpl_vars['val']->value['desc'];?>
</h3>
                        <label for="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
A">A. <input type="radio" value="A" name="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
" id="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
A"> 正确</label>
                        <label for="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
B">B. <input type="radio" value="B" name="q<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
" id="q<?php echo $_smarty_tpl->tpl_vars['s']->value++;?>
B"> 错误</label>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </div>
        <?php }?>
		<input type="submit" name="submit" id="submit">
	</form>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo getRootDir();?>
/public/js/exam.js"><?php echo '</script'; ?>
>
</html><?php }
}
