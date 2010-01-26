<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_Pages extends Controller_Auth
{
	public function action_index()
	{
		$this->content->field = $this->param('field', 'date');
		$this->content->sort = $this->param('sort', 'desc');

		$this->content->pages = ORM('page')
									->order_by($this->content->field, $this->content->sort)
									->find_all();
	}
	
	public function action_add()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);

		$post = form::fields($_POST);
		$post->sand	= html::sand();

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$page = ORM('page')->validate($_POST);
			if($page->check())
			{
				$page->date = time();
				//var_dump($_POST, $page->as_array());return;
				$page->save();

				$this->session->set($_POST['sand'], TRUE);
				$this->request->redirect('admin/pages');
			}
			else
			{
				$errors = $page->errors('validate');
				$page->override($post);
			}
		}
	}
	
	public function action_edit()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);

		$id = $this->param('id');
		$page = ORM('page')->find($id);

		if(!$page->loaded())
		{
			$this->request->redirect('admin/pages');
		}

		$post = form::fields($_POST);
		$post->sand	= html::sand();
		$post->id = $id;

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$page->validate($_POST);
			if($page->check())
			{
				//var_dump($_POST, $page->as_array());return;
				$page->save();

				$this->session->set($_POST['sand'], TRUE);
				$this->request->redirect('admin/pages');
			}
			else
			{
				$errors = $page->errors('validate');
				$page->override($post);
			}
		}
		else
		{
			$page->override($post);
		}
	}
	
	public function action_del()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);

		$id = $this->param('id');
		$page = ORM('page')->find($id);

		if(!$page->loaded())
		{
			$this->request->redirect('admin/pages');
		}

		$post = form::fields();
		$post->sand	= html::sand();
		$post->id = $id;
		$page->override($post);

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$page->delete();

			//var_dump($page->as_array(), $page->last_query());

			$this->session->set($_POST['sand'], TRUE);
			$this->request->redirect('admin/pages');
		}
	}
}
