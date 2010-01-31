<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_Images extends Controller_Auth
{
	public function action_index()
	{
		$page = $this->param('page') - 1;
		$page < 1 and $page = 0;
		$limit = 20;
		
		$this->content->field = $this->param('field', 'date');
		$this->content->sort = $this->param('sort', 'desc');
		
		$only = $this->param('category', FALSE);
		$this->content->category = $only;
		
		$images = ORM('image')->with('category');
		
		if(!empty($only))
		{
			$images->where('category.link', '=', $only);
		}
		
		$count = clone $images;
		
		$this->content->categories = ORM('category')->find_all();
		$this->content->images = $images->offset($page*$limit)
								->limit($limit)
								->order_by($this->content->field, $this->content->sort)
								->find_all();
		
		$this->content->pagination = new Pagination(array(
			'total_items'    => $count->count_all(),
			'items_per_page' => $limit,
		));
	}
	
	public function action_add()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);
		$this->content->categories = ORM('category')->find_all();
		
		$post = new FormFields();
		
		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$image = ORM('image')->validate($_POST);
			if($image->check())
			{
				$image->date = time();
				//var_dump($image->as_array());
				$image->save();
				
				$this->session->set($_POST['sand'], TRUE);
				$this->request->redirect('admin/images');
			}
			else
			{
				$errors = $image->errors('validate');
				$post->override($image);
			}
		}
	}
	
	public function action_edit()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);
		$this->content->categories = ORM('category')->find_all();

		$id = $this->param('id');
		$image = ORM('image')->find($id);

		if(!$image->loaded())
		{
			$this->request->redirect('admin/images');
		}

		$post = new FormFields($_POST);
		$post->id = $id;

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$image->validate($_POST);
			if($image->check())
			{
				//DB::begin();
				//var_dump($image->as_array());
				$image->save();
				//var_dump($image->as_array(), $image->last_query());
				
				//DB::rollback();
				//return;
				$this->session->set($_POST['sand'], TRUE);
				$this->request->redirect('admin/images');
			}
			else
			{
				$errors = $image->errors('validate');
				$post->override($image);
			}
		}
		else
		{
			$post->override($image);
		}
	}
	
	public function action_del()
	{
		$this->content->bind('post', $post);
		$this->content->bind('errors', $errors);

		$id = $this->param('id');
		$image = ORM('image')->with('category')->find($id);

		if(!$image->loaded())
		{
			$this->request->redirect('admin/images');
		}

		$post = new FormFields($_POST);
		$post->id = $id;

		if(!empty($_POST) and !$this->session->get($_POST['sand'], FALSE))
		{
			$images = array($image->image, $image->thumb);

			$image->delete();

			$base = DOCROOT.'media/images/';
			foreach($images as $v)
			{
				$file = $base.$v;

				if(file_exists($file))
				{
					$count = (int) ORM('image')
							->where('image', '=', $v)
							->or_where('thumb', '=', $v)
							->count_all();
					if($count == 0)
					{
						unlink($file);
					}
				}
			}
			
			//var_dump($image->as_array(), $image->last_query());
			
			$this->session->set($_POST['sand'], TRUE);
			$this->request->redirect('admin/images');
		}
		else
		{
			$post->override($image);
		}
	}
}