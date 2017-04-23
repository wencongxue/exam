<?php
namespace app\model;
use core\lib\Model;

class PublicModel extends Model
{
	/**
     * 获取所有的班级
     * @return array
	 */
	public function getAllClass()
	{
		return $this->select('class','*');
	}

	/**
     * 根据条件获取id
     * @param string $table
     * @param array  $where
     * @return mixed
	 */
	/*public function getId()
	{
		
	}*/
}
