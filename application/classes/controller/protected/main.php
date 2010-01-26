<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_Main extends Controller_Auth
{
	public $override = 'login';
	public $allow = array('login');
	public $no_view = array('is_logged', 'logout');
	public $no_template = array('login');

	public function action_index()
	{

	}

	public function action_login()
	{
		$this->user->logged and $this->auth->logout();

		if(isset($_POST['username'], $_POST['password']) and $this->session->get('lock_time', time()) <= time())
		{
			if($this->auth->login($_POST['username'], $_POST['password']))
			{
				$this->session->delete('login_tries');
				$this->session->delete('lock_time');
				$this->session->set('authenticated_user', TRUE);
				$referrer = $this->session->get('referrer', 'admin/main');

				$referrer == 'admin/logout' and $referrer = 'admin/main';
				$referrer == 'admin/login' and $referrer = 'admin/main';

				$this->request->redirect('admin/main'); // $referrer
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

	public function action_is_logged()
	{
		if(!$this->user->logged)
		{
			$this->request->redirect('admin/login'); // die
		}
	}

	public function action_logout()
	{
		$this->auth->logout();
		$this->request->redirect('admin/login');
	}
}
