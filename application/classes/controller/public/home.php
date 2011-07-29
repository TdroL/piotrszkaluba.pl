<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Public_Home extends Controller_Public
{
	public function action_index(Params $param)
	{
		$this->content->bind('project', $project);
		$this->content->bind('categories', $categories);

		$project = Jelly::select('project')->latest();
		$categories = Jelly::select('category');
		$this->template->active = array('home' => ' class="active"');
	}

	public function action_404(Params $param)
	{
		$this->request->status = 404;
	}
	public function action_500(Params $param)
	{
		$this->request->status = 500;
	}

	public function action_wip(Params $param)
	{
		$this->content->bind('category', $category);
		$this->content->bind('projects', $projects);

		$category = Jelly::select('category')->link('wip')->load();

		if( ! $category->loaded())
		{
			throw new Error404_Exception;
		}

		$this->template->title = $category->title;
		$this->template->keywords = $category->keywords;

		$projects = Jelly::select('project')->wips();
		$this->template->active = array('portfolio' => ' class="active"');
	}

	public function action_contact(Params $param)
	{
		$this->template->active = array('contact' => ' class="active"');
	}
}

