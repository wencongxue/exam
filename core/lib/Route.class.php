<?php
namespace core\lib;
use \core\lib\Conf;

//路由解析类
class Route{
	public static $ctrl   =  '';               //控制器
	public static $action =  '';				//方法
	/*
	 *构造方法
	 */
	public static function init(){
		if (isset($_SERVER['PATH_INFO'])) {
			//获取路径信息,去除最后一个斜杠
			$patharr = explode('/', rtrim($_SERVER['PATH_INFO'],'/'));
			//删除第一个空值
			unset($patharr[0]);
			//数组重新建立索引
			$patharr = array_merge($patharr);
			//确定对应的控制器
			self::$ctrl      = $patharr[0] ?: Conf::get('CTRL','route');
			//确定对应的方法
			self::$action    = $patharr[1] ?: Conf::get('ACTION','route');

			//将多余的参数传入$_GET
			$length = count($patharr);
			if ($length > 3){
				//如果长度为4,那么它减去模块与控制器与方法后将不会配成对,所以没什么意义
				if ($length % 2 !=0){
					unset($patharr[$length-1]);
					$patharr = array_merge($patharr);
					$length = count($patharr);
				} 
				for ($i = 2; $i < $length; $i += 2) {
					$_GET[$patharr[$i]] = $patharr[$i + 1];
				}
			}
			

		} else {
			self::$ctrl    =   Conf::get('CTRL','route');
			self::$action  =   Conf::get('ACTION','route');
		}
		self::$ctrl        =   ucfirst(self::$ctrl);
	}
}

