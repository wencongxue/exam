<?php
//入口文件
define('FRAME'  ,  realpath('./'));
define('MODULE' ,  'app');
define('CORE'   ,  FRAME.'/core');
define('APP'    ,  FRAME.'/'.MODULE);
define('DEBUG'  ,  true);

//引入composer的自动加载
require_once './vendor/autoload.php';

//是否开启调试
ini_set('display_errors', DEBUG ? 'On' : 'Off');

//加载核心函数库
require_once CORE.'/common/function.php';

//加载框架文件
require_once CORE.'/Frame.php';

//启动框架
new \core\Frame();
