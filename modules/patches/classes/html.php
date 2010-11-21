<?php defined('SYSPATH') or die('No direct script access.');

class HTML extends Kohana_HTML
{
	public static function error_messages($errors = array())
	{
		if(empty($errors))
		{
			return PHP_EOL;
		}
		
		return View::factory('common/errors')->set('errors', $errors).PHP_EOL;
	}
}
