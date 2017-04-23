<?php
/* Smarty version 3.1.30, created on 2017-04-21 07:19:24
  from "D:\Apache24\htdocs\exam\app\view\preview.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f9b27c32efc5_50928833',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ef8f92218f1513125708acb099d90c3d21886a9' => 
    array (
      0 => 'D:\\Apache24\\htdocs\\exam\\app\\view\\preview.tpl',
      1 => 1492757910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f9b27c32efc5_50928833 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>试卷预览</title>
    <link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/basic.css">
    <link rel="stylesheet" href="<?php echo getRootDir();?>
/public/css/preview.css">
</head>
<body>
    <div class="paper-title"><?php echo $_smarty_tpl->tpl_vars['p_info']->value['title'];?>
</div>
    <div class="info">总分:<?php echo $_smarty_tpl->tpl_vars['p_info']->value['totalScore'];?>
   及格分数:<?php echo $_smarty_tpl->tpl_vars['p_info']->value['passScore'];?>
</div>
    <!-- 题目列表 -->
    <div class="q-list">
        <!-- 判断题 -->
        <?php if ($_smarty_tpl->tpl_vars['cQues']->value) {?>
            <div class="check">
                <h2 class="title">判断题 : </h2>
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
        <!-- 单选题 -->
        <?php if ($_smarty_tpl->tpl_vars['sQues']->value) {?>
            <div class="single">
                <h2 class="title">单选题 : </h2>
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
                <h2 class="title">多选题 : </h2>
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
    </div>
</body>
</html><?php }
}
