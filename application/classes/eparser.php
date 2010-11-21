<?php

class Eparser
{
	public static function parse($string)
	{
		$parsed = array();

		if(empty($string) OR !is_string($string))
		{
			return $parsed;
		}
		
		foreach(explode("\n", $string) as $line)
		{
			$line = trim($line);
			
			if(!self::check($line))
			{
				continue;
			}

			list($key, $value) = explode('=', $line, 2);

			$key = trim($key);
			$value = trim($value);

			$parsed[$key] = $value;
		}

		return $parsed;
	}
	
	public static function check($string)
	{
		if(strpos($string, "\n") !== FALSE)
		{
			foreach(explode("\n", $string) as $line)
			{
				if(!self::check($line))
				{
					return FALSE;
				}
			}
		}
		else
		{
			$pos = strpos($string, '=');
			if(empty($string) OR !$pos) // 0 or FALSE
			{
				return FALSE;
			}
		}
		
		return TRUE;
	}
}
