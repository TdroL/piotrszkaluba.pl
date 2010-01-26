<?php defined('SYSPATH') or die('No direct script access.');

abstract class Kohana_User
{
	public $data = array();
	public $auth = NULL;
	public $logged = FALSE;
	public static $_instance = NULL;
	
	public function __construct()
	{
		$this->auth = Auth::instance();
		
		$this->logged = $this->auth->logged_in();
		
		if(!$this->logged)
		{
			$this->auth->auto_login();
			$this->logged = $this->auth->logged_in();
		}
		
		if($this->logged)
		{
			$user = $this->auth->get_user();
	
			$this->data = $user->as_array();
			$this->data['roles'] = array();
	
			foreach($user->roles->find_all()->as_array() as $v)
			{
				$v = $v->as_array();
				$this->data['roles'][$v['name']] = $v;
			}
		}
	}
	
	public static function instance()
	{
		if(self::$_instance === NULL)
		{
			self::$_instance = new User();
		}
		
		return self::$_instance;
	}
	
	public function has($role, $check_admin = TRUE)
	{
		return (isset($this->data['roles'][$role]) or ($check_admin and isset($this->data['roles']['admin'])));
	}
	
	public function __get($key)
	{
		return isset($this->data[$key]) ? $this->data[$key] : NULL;
	}

	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}

	public function __isset($key)
	{
		return isset($this->data[$key]);
	}

	public function __unset($key)
	{
		unset($this->data[$key]);
	}

}
