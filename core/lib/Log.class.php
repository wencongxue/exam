<?php
namespace core\lib;
use core\lib\Conf;

class Log
{
	//存放日志驱动类
	public static $class;

	//初始化
	public static function init()
	{
		$drive        =  Conf::get('DRIVE','log');
		$classFile    =  "\\core\\drive\\log\\$drive";
		self::$class  =  new $classFile();
	}

	public static function log($name,$file = 'log')
	{
		self::$class->log($name);
	}
}
