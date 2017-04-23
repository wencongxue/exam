<?php
namespace core;
use core\lib\Log;
use core\lib\Route;

class Frame{

	public function __construct()
	{
		//报错级别
		error_reporting(E_ALL ^ E_NOTICE);
		
		//加载核心函数库
		require_once CORE.'/common/function.php';

		//注册自动加载函数
		spl_autoload_register('self::load');

		//初始化日志系统
		Log::init();

		//自动生成应用目录及文件
		$this->autoMake();

		//加载用户函数库
		require_once APP.'/common/function.php';

		//加载用户常量库
		require_once APP.'/common/const.php';

		Route::init();                                //启动路由类
		$ctrl     =  Route::$ctrl;                    //获取当前控制器
		$action   =  Route::$action;                  //获取当前操作
		//实例化类与执行相应的方法
		if (is_file(FRAME.'/'.MODULE.'/controller/'.$ctrl.'Controller.class.php')){
			$ctrlFile = '\\'.MODULE.'\\controller\\'.$ctrl.'Controller';
			$ctrlIns     = new $ctrlFile();
			if (method_exists($ctrlIns, $action)) {
				$ctrlIns->$action();
				//写入日志文件
				Log::log($ctrl.'        '.$action);
			} else {
				exit('非法操作:'.$action);
			}
		} else {
			exit($ctrl.'控制器不存在');
		}
	}

	//类自动加载方法
	public static function load($class)
	{
		$class = str_replace('\\', '/', $class);
		$classfile = FRAME.'/'.$class.'.class.php';
		if (is_file($classfile)) {
			include $classfile;
		}	
	}

	//用于自动生成应用目录,其中包括子目录common,controller,model,view,view_c
	public function autoMake()
	{
		//生成应用所用的目录
		!is_dir(APP)                 &&     mkdir(APP,0777,true);
		!is_dir(APP.'/common')       &&     mkdir(APP.'/common',0777,true);
		!is_dir(APP.'/controller')   &&     mkdir(APP.'/controller',0777,true);
		!is_dir(APP.'/model')        &&     mkdir(APP.'/model',0777,true);
		!is_dir(APP.'/view')         &&     mkdir(APP.'/view',0777,true);
		!is_dir(APP.'/view_c')       &&     mkdir(APP.'/view_c',0777,true);

		//生成应用函数文件
		$filename  =  APP.'/common/function.php';
		!is_file($filename)  && file_put_contents($filename, "<?php\n");

		//生成默认控制器和默认操作
		$filename  =  APP.'/controller/IndexController.class.php';
		$nspath    =  MODULE.'\\controller';
		if (!is_file($filename)) {
			$contents = <<<XWC
<?php
namespace $nspath;
use core\lib\Controller;

class IndexController extends Controller
{
	public function index()
	{
		echo '<p style="font-size:20px;color:#666;">欢迎使用frame框架^_^</p>';
	}
}
XWC;
			file_put_contents($filename, $contents);
		}

		//生成用户常量库
		$filename  =  APP.'/common/const.php';
		!is_file($filename)  && file_put_contents($filename, "<?php\n");
	}
}
