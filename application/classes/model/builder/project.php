<?php defined('SYSPATH') or die('No direct script access.');

class Model_Builder_Project extends Jelly_Builder
{
	public function link($link)
	{
		return $this->where('link', '=', (string) $link);
	}
	
	public function category($link)
	{
		return $this->where('category.link', '=', (string) $link);
	}

	public function latest()
	{
		return $this->order_by('id', 'desc')
					->where('category.link', '!=', 'wip')
					->with('category')->load();
	}

	public function wips()
	{
		return $this->join('images', 'inner')
					->on('project.id', '=', 'images.project_id')
					->where('category.link', '=', 'wip')
					->group_by('images.project_id')
					->order_by('images.date', 'desc')
					->with('category');
	}
}

