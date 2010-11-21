<?php defined('SYSPATH') OR die('No direct access allowed.');

class Form extends Kohana_Form 
{
	public static $allow_upload = array('enctype' => 'multipart/form-data');
} // End form
