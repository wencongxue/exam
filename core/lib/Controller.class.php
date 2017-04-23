<?php
namespace core\lib;
class Controller{
	public $smarty;
	public function __construct(){
		require_once './vendor/smarty3/libs/Smarty.class.php';
		$this->smarty = new \Smarty();
		$this->smarty->template_dir = APP.'/view';
		$this->smarty->compile_dir  = APP.'/view_c';

		//下面注册到模板中的函数为框架自定义函数 
		$this->smarty->registerPlugin("function", "getRootDir", "getRootDir");
		$this->smarty->registerPlugin("function", "makeUrl"   , "makeUrl");
	}
}
