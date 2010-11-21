<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_image extends Controller_Protected
{
	public function action_index(Params $param)
	{
		$this->content->bind('images', $images);
		$this->content->bind('project', $project);

		$project = Jelly::select('project')->link($param->id)->load();
		
		if(!$project->loaded())
		{
			throw new Error404_Exception;
		}
		
		$images = Jelly::select('image')->project($param->id);
	}

	public function action_create(Params $param)
	{
		$this->content->bind('form', $torn);
		$this->content->bind('project', $project);
		
		$project = Jelly::select('project')->link($param->id)->load();
		
		if(!$project->loaded())
		{
			throw new Error404_Exception;
		}
		
		$image = Jelly::factory('image');
		$torn = new Torn($image);
		
		if($torn->check())
		{
			try
			{
				$image->set($_FILES + $_POST);
				$image->project = $project;
				$image->save();
				
				$this->request->redirect(Route::get('protected')->uri(array('controller' => 'image', 'id' => $project->link)));
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
		$this->content->bind('project', $project);
		
		$image = Jelly::select('image')->with('project')->load($param->id);
		
		if(!$image->loaded())
		{
			throw new Error404_Exception;	
		}
		
		$project = $image->project;
		$torn = new Torn($image);
		
		if($torn->check())
		{
			try
			{
				$image->set($_FILES + $_POST);
				$image->project = $project; // just in case...
				$image->save();
				
				$this->request->redirect(Route::get('protected')->uri(array('controller' => 'image', 'id' => $project->link)));
			}
			catch (Validate_Exception $e)
			{
				$torn->catch_errors($e);
			}
		}
	}
	
	public function action_delete(Params $param)
	{
		$this->content->bind('form', $torn);
		$this->content->bind('project', $project);
		
		$image = Jelly::select('image')->with('project')->load($param->id);
		
		if(!$image->loaded())
		{
			throw new Error404_Exception;	
		}
		
		$project = $image->project;
		$torn = new Torn($image);
		
		if($torn->check())
		{
			$image->delete();
			
			$this->request->redirect(Route::get('protected')->uri(array('controller' => 'image', 'id' => $project->link)));
		}
	}
}

