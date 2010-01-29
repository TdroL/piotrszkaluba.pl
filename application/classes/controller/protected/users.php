<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_Users extends Controller_Auth
{
	protected $_access = array(
			'last' => 'login',
			TRUE => 'admin',
	);
	
	public $no_template = array('last');
	public $no_view = array('deactivate', 'activate');
	
	public function action_index()
	{
		define('STATUS_USER', 0);
		define('STATUS_ADMIN', 1);
		define('STATUS_INACTIVE', 2);

		$this->content->field = $this->param('field', 'nick');
		$this->content->sort = $this->param('sort', 'desc');

		$this->content->users = ORM('user')->with('roles')->order_by($this->content->field, $this->content->sort)->find_all();
		$this->content->admin = ORM('role', array('name' => 'admin'));
		$this->content->login = ORM('role', array('name' => 'login'));
	}
	
	public function action_add()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);
		$this->content->roles = ORM('role')->find_all();
		
		$post = form::fields($_POST);
		$post->sand	= html::sand();

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			DB::begin();
			$user = ORM('user')->validate($_POST);
			if($user->check())
			{
				try
				{
					$user->save();

					if(!empty($_POST['roles'])) foreach($_POST['roles'] as $k => $v)
					{
						$user->add('roles', ORM('role', array('name' => $v)));
					}

					DB::commit();
					
					$this->session->set($_POST['sand'], TRUE);
					$this->request->redirect('admin/users');
				}
				catch(Exception $e)
				{
					DB::rollback();
					
					$user->error('server', 'internal_error', array($e->getMessage()));
					$errors = $user->errors('validate');
					$user->override($post);
				}
			}
			else
			{
				$errors = $user->errors('validate');
				$user->override($post);
			}
		}
	}
	
	public function action_edit()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);
		$this->content->roles = ORM('role')->find_all();

		$id = $this->param('id');
		$user = ORM('user')->with('role')->find($id);

		if(!$user->loaded())
		{
			$this->request->redirect('admin/users');
		}

		$post = form::fields($_POST);
		$post->sand	= html::sand();
		$post->id = $id;

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$user->validate($_POST, array('password', 'password_confirm'));
			if($user->check())
			{
				$user->save();
				
				if(!empty($_POST['roles']))
				{
					foreach($_POST['roles'] as $k => $v)
					{
						$role = ORM('role', array('name' => $v));
						if(!$user->has('roles', $role))
						{
							$user->add('roles', $role);
						}
					}
					
					foreach($user->roles->find_all() as $v)
					{
						if(!isset($_POST['roles'][$v->name]))
						{
							$user->remove('roles', $v);
						}
					}
				}

				$this->session->set($_POST['sand'], TRUE);
				$this->request->redirect('admin/users');
			}
			else
			{
				$errors = $user->errors('validate');
				$user->override($post);
			}
		}
		else
		{
			$user->override($post);
			
			$roles = array();
			foreach($user->roles->find_all() as $v)
			{
				$roles[$v->name] = $v->name;
			}
			
			$post->roles = $roles; // notice :/
		}
	}
	
	public function action_del()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);

		$id = $this->param('id');
		$user = ORM('user')->find($id);

		if(!$user->loaded() or $id == $this->user->id or ORM('user')->count_all() < 2)
		{
			$this->request->redirect('admin/users');
		}

		$post = form::fields();
		$post->sand	= html::sand();
		$post->id = $id;

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$user->delete();
			
			$this->session->set($_POST['sand'], TRUE);
			$this->request->redirect('admin/users');
		}
		else
		{
			$user->override($post);
		}
	}
	
	public function action_password()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);
		$this->content->roles = ORM('role')->find_all();

		$id = $this->param('id');
		$user = ORM('user')->find($id);

		if(!$user->loaded())
		{
			$this->request->redirect('admin/users');
		}

		$post = form::fields();
		$user->override($post);
		$post->sand	= html::sand();
		$post->id = $id;

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$user->validate($_POST, array('username', 'nick', 'email'));
			if($user->check())
			{
				$user->save();

				$this->session->set($_POST['sand'], TRUE);
				$this->request->redirect('admin/users');
			}
			else
			{
				$errors = $user->errors('validate');
			}
		}
	}
	
	public function action_deactivate()
	{
		$id = $this->param('id');
		$user = ORM('user')->find($id);
		$role = ORM('role', array('name' => 'login'));//->find();
		
		if($user->loaded() and $user->has('roles', $role))
		{
			$user->remove('roles', $role);
		}

		$this->request->redirect('admin/users');
	}
	
	public function action_activate()
	{
		$id = $this->param('id');
		$user = ORM('user')->find($id);
		$role = ORM('role', array('name' => 'login'));//->find();

		if($user->loaded() and !$user->has('roles', $role))
		{
			$user->add('roles', $role);
		}

		$this->request->redirect('admin/users');
	}
	
	public function action_last()
	{
		$this->content->users = ORM('user')->order_by('last_login', 'desc')->find_all();
	}
}
