<?php
//框架核心函数库     
//author  xwc

/**
 * 输出变量
 * @param  mixed $var
 * @return void 
 */
function p($var) 
{
	if (is_array($var) || is_object($var)) {
		print_r($var);
	} elseif (is_bool($var)) {
		var_dump($var);
	} else {
		echo $var;
	}
}

/**
 * 组装url
 * @param  string $ctrl
 * @param  string $action
 * @param  string|array $params 例如'p/3/par/5'或者['p'=>3,'par'=>5]
 * @return string
 */
function makeUrl($ctrl = 'Index',$action = 'index',$params = '')
{
	$host    =  'http://'.$_SERVER['HTTP_HOST'];
	$webdir  =  $_SERVER['SCRIPT_NAME'];

	//如果是index.php,就把它隐藏
	$pattern =  '/index\.php/';
	if (preg_match($pattern, $webdir)) {
		$webdir = preg_replace($pattern, '', $webdir);
	}
	$finalUrl = $host.$webdir.$ctrl.'/'.$action;

	if ($params) {
		//如果是字符串直接返回
		if (is_string($params)) return $finalUrl.'/'.$params;
		!is_array($params) && $params = [];
		
		//删除没有值的键
		foreach ($params as $key => $value)
			if (empty($params[$key])) unset($params[$key]);

		$str = http_build_query($params,'','/');
		return $finalUrl.'/'.preg_replace('/\=/','/',$str);
	}

	return $finalUrl;
}

/**
 * 获取站点根目录,例如http://localhost/exam/,现在要获取/exam
 * @return string
 */
function getRootDir()
{
	return substr($_SERVER['SCRIPT_NAME'], 0,strrpos($_SERVER['SCRIPT_NAME'], '/'));
}

/**
 * 获取当前控制器名称
 * @return  string
 */
function __CTRL__()
{
	return \core\lib\Route::$ctrl;
}

/**
 * 获取当前操作
 * @return  string
 */
function __ACTION__()
{
	return \core\lib\Route::$action;
}
