<?php
namespace core\drive\log;
use core\lib\Conf;

//文件日志驱动类
class File
{
	public $path;                    //日志存储位置

	public function __construct()
	{
		$conf        =   Conf::get('OPTIONS','log');
		$this->path  =   $conf['PATH'];
	}

	public function log($message,$file = 'log')
	{
		$dir         =   $this->path.'/'.date('YmdH');
		!is_dir($dir) && mkdir($dir,0777,true);

		return file_put_contents($dir.'/'.$file.'.php',date('Y-m-d H:i:s ').json_encode($message).PHP_EOL,FILE_APPEND);
	}
}

