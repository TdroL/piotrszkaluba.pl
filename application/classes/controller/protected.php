<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Protected extends Controller_Public
{
	public $allow = array();
	public $redirect_url = 'admin/project';
	public $login_url = 'admin/home/login';
	public $auth = NULL;
	
	public function before()
	{
		parent::before();
		$this->auth = Liauth::instance();
		
		if(is_object($this->template))
		{
			$this->template->bind_global('auth', $this->auth);
		}

		if(in_array($this->request->action, $this->allow))
		{
			return;			
		}
		
		if($this->auth->logged_in())
		{
			if(!$this->auth->user->active)
			{
				$this->request->redirect($this->redirect_url);
			}
		}
		else
		{
			// not logged in
			$this->session->set('referrer', Request::instance()->uri());
			$this->request->redirect($this->login_url);
		}
	}
}
