<?php
namespace core\lib;

class Conf{
	//配置文件缓存
	private static $conf = [];

	/*
	 *@name     配置项
	 *@file     配置文件
	 *@return   返回配置项的值或者报错并中断脚本
	 */
	public static function get($name,$file) {
		if (isset(self::$conf[$file])) {
			return self::check(self::$conf[$file],$name,$file);
		} else {
			$filename =  CORE.'/conf/'.$file.'.php';
			if (is_file($filename)) {
				self::$conf[$file] =include $filename;
				return self::check(self::$conf[$file],$name,$file);
			} else {
				exit('文件'.$filename.'不存在');
			}
		}
	}

	/*
	 *检查一个数组的键是否存在,存在就返回它对应的值,否则退出脚本
	 *@var  数组名
	 *@key  键名
	 */
	private static function check($var,$key,$file=null){
		if (isset($var[$key])) {
			return $var[$key];
		} else {
			exit($file.'配置文件中不存在配置项'.$key);
		}
	}
}
