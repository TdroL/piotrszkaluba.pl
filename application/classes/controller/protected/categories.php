<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_Categories extends Controller_Auth
{
	public function action_index()
	{
		$this->content->categories = ORM('category')->with('image')->find_all();
	}
	
	public function action_add()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);

		$post = new FormFields($_POST);
		
		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$category = ORM('category')->validate($_POST);
			if($category->check())
			{
				//var_dump($category->as_array());$category->override($post);return;
				$category->save();
				
				$this->session->set($_POST['sand'], TRUE);
				$this->request->redirect('admin/categories');
			}
			else
			{
				$errors = $category->errors('validate');
				$post->override($category);
			}
		}
	}
	
	public function action_edit()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);

		$id = $this->param('id');
		$category = ORM('category')->find($id);

		if(!$category->loaded())
		{
			$this->request->redirect('admin/categories');
		}

		$post = new FormFields($_POST);
		$post->id = $id;

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$category->validate($_POST);
			if($category->check())
			{
				//DB::begin();
				//var_dump($category->as_array());
				$category->save();
				//var_dump($category->as_array(), $category->last_query());
				
				//DB::rollback();
				//return;
				$this->session->set($_POST['sand'], TRUE);
				$this->request->redirect('admin/categories');
			}
			else
			{
				$errors = $category->errors('validate');
				$post->override($category);
			}
		}
		else
		{
			$post->override($category);
		}
	}
	
	public function action_del()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);

		$id = $this->param('id');
		$category = ORM('category')->with('image')->find($id);

		if(!$category->loaded())
		{
			$this->request->redirect('admin/categories');
		}

		$post = new FormFields($category);
		$post->id = $id;
		$post->images = $category->images;

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$images = array();

			foreach($category->images->find_all() as $v)
			{
				$images[] = trim($v->image, '/');
				$images[] = trim($v->thumb, '/');
			}

			$category->delete();

			$base = DOCROOT.'media/images/';
			foreach($images as $k => $v)
			{
				$file = $base.$v;

				if(!empty($v) and file_exists($file) and !is_dir($file))
				{
					$count = (int) ORM('image')
							->where('image', '=', $v)
							->or_where('thumb', '=', $v)
							->count_all();

					if($count == 0)
					{
						@unlink($file);
					}
				}
			}
			
			//var_dump($category->as_array(), $category->last_query());

			$this->session->set($_POST['sand'], TRUE);
			$this->request->redirect('admin/categories');
		}
	}
}