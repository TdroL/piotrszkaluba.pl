<?php defined('SYSPATH') or die('No direct script access.');

class Time
{
	const YEARS       = 31556926;
	const MONTHS      = 2629744;
	const WEEKS       = 604800;
	const DAYS        = 86400;
	const HOURS       = 3600;
	const MINUTES     = 60;
	const SECONDS     = 1;
	const MILISECONDS = 0.001;

	public static function get($type = 1, $rounded = FALSE)
	{
		$type = $type > 0 ? $type : 1;

		$time = microtime(TRUE) / $type; // seconds

		if($rounded)
		{
			return round($time);
		}

		return $time;
	}
}

