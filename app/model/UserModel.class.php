<?php
namespace app\model;
use core\lib\Model;

class UserModel extends Model
{
	/** 
	 * 用户名,密码,身份类型都正确时才返回true
	 * @param string $user
	 * @param string $pass
	 * @param int    $type
	 * @return boolean
	 */
	public function checkUser($user, $pass, $type = 0)
	{
		$res   =   $this->select('user','id',['username' => $user,'password' => $pass,'type' => $type]);
		return $res ? true : false;
	}

	/**
	 * 查看用户是否已经存在
	 * @param  string  $user
	 * @param  int     $type
	 * @return boolean
	 */
	public function userExists($user, $class,$type = 0)
	{
		$res = $this->select('user','id',['username' => $user, 'class'=>$class, 'type' => $type]);
		return $res ? true : false;
	}

	/**
	 * 新增用户
	 * @param   string  $username
	 * @param   string  $pass
	 * @param   int     $type
	 * @return  int     返回新增后的id
	 */
	public function addUser($username, $password, $class, $type = 0)
	{
		return $this->insert('user',['username' => $username, 'password' => $password, 'class' => $class, 'type' => $type]);
	}

	/**
     * 取出所有符合条件的用户
     * @param   int   $type
     * @return  array
	 */
	public function getAllUser($type = 0)
	{
		return $this->select('user','*',['type' => $type]);
	}
}

