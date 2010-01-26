<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Public_Pages extends Controller_Template
{
	public function action_index($pages)
	{
		$this->content->page = ORM('page', array('link' => $pages));
		if(!$this->content->page->loaded())
		{
			throw new Kohana_View_Exception('page ":link" does not exists', array(':link' => $pages));
		}
	}
}