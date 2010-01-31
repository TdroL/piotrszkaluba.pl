<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Template
{
	protected $_access = array();
	public $auth = NULL;
	
	public function before()
	{
		parent::before();
		$this->auth = Auth::instance();
		
		$role = $this->request->controller; // default role
		$action = $this->request->action;
		if(array_key_exists($action, $this->_access)) // for only this one action
		{
			$role = $this->_access[$action];
		}
		else if(in_array(TRUE, array_keys($this->_access))) // for all actions
		{
			$role = $this->_access[TRUE];
		}
		
		if(empty($role)) // if $role is NULL, FALSE (empty) allow for all users, even not logged
		{
			return;
		}
		
		if($this->auth->logged_in())
		{
			if(!defined('ADMIN_LOGGED') and $this->auth->has_role('admin'))
			{
				define('ADMIN_LOGGED', TRUE);
			}
			
			if(!$this->auth->has_role($role))
			{
				//die('role required: '.$role.' but user hasn\'t that role');
				$this->request->redirect('admin/main');
			}

			is_object($this->view) and $this->view->bind_global('auth', $this->auth);
		}
		else
		{
			//die('role required: '.$role.' but not logged in');
			$this->request->redirect('admin/login');
		}
	}
}