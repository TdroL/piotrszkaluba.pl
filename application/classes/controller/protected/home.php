<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_Home extends Controller_Protected
{
	public $allow = array('login');
	public $no_template = array('login');
	public $no_view = array('logout', 'index');

	public function action_index()
	{
		$this->request->redirect(Route::get('protected')->uri(array('controller' => 'project')));
	}

	public function action_login()
	{
		$this->auth->logged_in() and $this->auth->logout();

		if(isset($_POST['username'], $_POST['password']) and $this->session->get('lock_time', time()) <= time())
		{
			if($this->auth->login($_POST['username'], $_POST['password']))
			{
				$this->session->delete('login_tries');
				$this->session->delete('lock_time');

				$this->request->redirect(Route::get('protected')->uri(array('controller' => 'home'))); // $referrer
			}
			else
			{
				$login_tries = $this->session->get('login_tries', 0) + 1;
				$this->session->set('login_tries', $login_tries);

				if($login_tries > 2)
				{
					$this->session->set('lock_time', time() + 60*5); // 5 minutes
				}
			}
		}
	}

	public function action_logout()
	{
		$this->auth->logout();
		$this->request->redirect(Route::get('protected')->uri(array('controller' => 'home', 'action' => 'login')));
	}
}

