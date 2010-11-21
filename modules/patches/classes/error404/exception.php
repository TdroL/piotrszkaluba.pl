<?php defined('SYSPATH') or die('No direct script access.');

class Error404_Exception extends Kohana_View_Exception
{
	public function __construct($message = 'Error 404', array $variables = NULL, $code = 0)
	{
		parent::__construct($message, $variables, $code);
	}
}