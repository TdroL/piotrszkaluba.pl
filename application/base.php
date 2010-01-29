<?php defined('SYSPATH') or die('No direct script access.');

if ( ! defined('KOHANA_START_TIME'))
{
	/**
	 * Define the start time of the application, used for profiling.
	 */
	define('KOHANA_START_TIME', microtime(TRUE));
}

if ( ! defined('KOHANA_START_MEMORY'))
{
	/**
	 * Define the memory usage at the start of the application, used for profiling.
	 */
	define('KOHANA_START_MEMORY', memory_get_usage());
}

// ----------------
function ORM($model, $id = NULL)
{
	return ORM::factory($model, $id);
}

function Auth()
{
	return Auth::instance();
}