<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Public_Category extends Controller_Public
{
	public function action_index(Params $param)
	{
		$this->content->bind('category', $category);

		$category = Jelly::select('category')->link($param->link)->load();

		if( ! $category->loaded())
		{
			throw new Error404_Exception;
		}

		$this->template->title = $category->title;
		$this->template->keywords = $category->keywords;
		$this->template->active = array('portfolio' => ' class="active"');
	}

	public function action_all(Params $param)
	{
		$this->content->bind('projects', $projects);

		$projects = Jelly::select('project');

		$this->template->title = __('My works');
		$this->template->active = array('portfolio' => ' class="active"');
	}
}

