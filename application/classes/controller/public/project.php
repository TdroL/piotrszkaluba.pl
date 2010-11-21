<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Public_Project extends Controller_Public
{
	public function action_index(Params $param)
	{
		$this->content->bind('project', $project);

		$project = Jelly::select('project')
						->link($param->link)
						->with('category')
						->load();

		if( ! $project->loaded())
		{
			throw new Error404_Exception;
		}
		
		$this->template->title = $project->name.' - '.$project->category->title;
		$this->template->keywords = $project->keywords;
	}
}