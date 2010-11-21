<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_Project extends Controller_Protected
{
	public function action_index(Params $param)
	{
		$this->content->bind('categories', $categories);
		$this->content->bind('projects', $projects);
		
		$categories = Jelly::select('category');
		$projects = Jelly::select('project')->with('category');
		
		if($param->id)
		{
			$projects->category($param->id);
		}
	}

	public function action_create()
	{
		$this->content->bind('form', $torn);
		
		$project = Jelly::factory('project');
		$torn = new Torn($project);
		
		if($torn->check())
		{
			try
			{
				Transaction::begin();
				$project->set($_FILES + $_POST);
				$project->save();
				Transaction::commit();
				
				$this->request->redirect(Route::get('protected')->uri(array('controller' => 'project')));
			}
			catch (Validate_Exception $e)
			{
				Transaction::rollback();
				$torn->catch_errors($e);
			}
		}
	}

	public function action_update(Params $param)
	{
		$this->content->bind('form', $torn);
		
		$project = Jelly::select('project')->link($param->id)->load();
		
		if(!$project->loaded())
		{
			throw new Error404_Exception;	
		}
		
		$torn = new Torn($project);
		
		if($torn->check())
		{
			try
			{
				Transaction::begin();
				$project->set($_FILES + $_POST);
				$project->save();
				Transaction::commit();
				
				$this->request->redirect(Route::get('protected')->uri(array('controller' => 'project')));
			}
			catch (Validate_Exception $e)
			{
				Transaction::rollback();
				$torn->catch_errors($e);
			}
		}
	}
	
	public function action_delete(Params $param)
	{
		$this->content->bind('form', $torn);
		
		$project = Jelly::select('project')->link($param->id)->load();
		
		if(!$project->loaded())
		{
			throw new Error404_Exception;	
		}
		
		$torn = new Torn($project);
		
		if($torn->check())
		{
			$project->delete();
			
			$this->request->redirect(Route::get('protected')->uri(array('controller' => 'project')));
		}
	}
}

