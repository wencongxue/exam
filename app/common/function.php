<?php
//应用函数库     
//author:xwc

/**
 * 判断是否已经登录
 * @param  string   $flag  取值为'admin'或者'username',用以区分前后台
 * @return boolean
 */
function is_login($flag)
{
	return isset($_COOKIE[$flag]) ? true : false;
}

/**
 * 判断数据长度是否合法
 * @param string $data
 * @param int    $length
 * @param string $flag   取值为lessthan或者morethan或者equals
 * @return boolean
 */
function checkLength($data,$length,$flag)
{
	if ($flag == 'equals') {
		return mb_strlen($data,'utf-8') == $length ? true : false;
	} else if ($flag == 'lessthan') {
		return mb_strlen($data,'utf-8')  < $length ? true : false;
	} else if ($flag == 'morethan') {
		return mb_strlen($data,'utf-8')  > $length ? true : false;
	} else {
		p("check_length函数参数传递错误");
		return false;
	}
}

/**
 * 弹窗返回函数
 * @return void
 */
function alertBack($msg)
{
	echo '<script>alert("'.$msg.'");window.history.back();</script>';
	exit();
}

/**
 * 弹窗跳转函数
 * @return void
 */
function alertLocate($msg,$url)
{
	echo '<script>alert("'.$msg.'");window.location.href="'.$url.'";</script>';
	exit();
}