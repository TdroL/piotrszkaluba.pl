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

		/* Commands
			usage:
			{command( param)}
			example:
			{send contact/send}
			 ^--^ ^----------^
			command  param
		*/
		
		$this->content->page->content = preg_replace_callback('/\{(?<command>[^ ]+)(?: (?<param>[^\}]+))?\}/im', array($this, 'inline_commands'), $this->content->page->content);
	}
	
	public function inline_commands($matches)
	{
		if(isset($matches['command']))
		{
			switch($matches['command'])
			{
				case 'site':
				{
					return isset($matches['param']) ? url::site($matches['param']) : url::base();
				}
			}
		}
		return $matches[0]; // unknown command or normal text
	}
}