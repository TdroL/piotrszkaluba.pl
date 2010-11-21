<?php defined('SYSPATH') or die('No direct script access.');

class Model_Builder_Image extends Jelly_Builder
{
	public function project($link)
	{
		return $this->with('project')->where('project.link', '=', (string) $link);
	}
	
	public function latest()
	{
		return $this->order_by('date', 'desc')->load();
	}
}