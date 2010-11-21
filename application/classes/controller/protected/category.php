<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_Category extends Controller_Protected
{
	public function action_index()
	{
		$this->content->categories = Jelly::select('category');
	}

	public function action_create()
	{
		$this->content->bind('form', $torn);
		
		$category = Jelly::factory('category');
		$torn = new Torn($category);
		
		if($torn->check())
		{
			try
			{
				$category->set($_POST);
				$category->save();
				
				$this->request->redirect(Route::get('protected')->uri(array('controller' => 'category')));
			}
			catch (Validate_Exception $e)
			{
				$torn->catch_errors($e);
			}
		}
	}

	public function action_update(Params $param)
	{
		$this->content->bind('form', $torn);
		
		$category = Jelly::select('category')->link($param->id)->load();
		
		if(!$category->loaded())
		{
			throw new Error404_Exception;	
		}
		
		$torn = new Torn($category);
		
		if($torn->check())
		{
			try
			{
				$category->set($_POST);
				$category->save();
				
				$this->request->redirect(Route::get('protected')->uri(array('controller' => 'category')));
			}
			catch (Validate_Exception $e)
			{
				$torn->catch_errors($e);
			}
		}
		else
		{
			echo 'fail';
		}
	}
	
	public function action_delete(Params $param)
	{
		$this->content->bind('form', $torn);
		
		$category = Jelly::select('category')->link($param->id)->load();
		
		if(!$category->loaded())
		{
			throw new Error404_Exception;	
		}
		
		$torn = new Torn($category);
		
		if($torn->check())
		{
			foreach($category->projects as $v)
			{
				$v->reset_priority();
				
				try
				{
					unlink(DOCROOT.'media/files/'.$v->file);
				}
				catch (Exception $e)
				{
					Kohana::$log->add('info', 'Requested remove of ":file". Failed.', array(':file' => DOCROOT.'media/files/'.$v->file));
				}
			}
				
			$category->delete($_POST);
				
			$this->request->redirect(Route::get('protected')->uri(array('controller' => 'category')));
		}
	}
}

