<?php
namespace core\lib;

use core\lib\Conf;

//模型基类
class Model extends \Medoo\Medoo 
{
    public function __construct()
    {
	  	parent::__construct(Conf::get('MEDOO','database'));
    }
}

