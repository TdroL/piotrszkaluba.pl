<?php defined('SYSPATH') or die('No direct script access.');


class Zend
{
	public static $cache = array();
	public static $gc = 3;
	
	public static function cache(array $config = NULL)
	{
		if(empty(self::$cache['cache']))
		{
			$ext = array(
				'caching'	=> FALSE,
				'cache_dir' => APPPATH.'cache/zend/',
				'frontend'  => 'Core',
				'backend'   => 'File',
				'lifetime'  => IN_PRODUCTION ? 7200 : 0, // 7200 = 2 hr
				'automatic_serialization' => TRUE
			);
	
			$ext = (object) ((array) $config + $ext);
	
			if(!file_exists($ext->cache_dir))
			{
				try
				{
					mkdir(rtrim($ext->cache_dir, '/'));
				}
				catch (Exception $e)
				{
					throw new Exception('Could not create cache folder (Zend)');
				}
			}
	
			self::$cache['cache'] = Zend_Cache::factory(
							$ext->frontend, 
							$ext->backend, 
							array(
								'lifetime' => $ext->lifetime,
								'automatic_serialization' => $ext->automatic_serialization
							), 
							array('cache_dir' => $ext->cache_dir)
			);
		}
		
		if(mt_rand(0, 100) <= self::$gc)
		{
			self::$cache['cache']->clean(Zend_Cache::CLEANING_MODE_OLD);
		}
		return self::$cache['cache'];
	}
	
	public static function id($name, &$values = NULL)
	{
		if(empty($values))
		{
			return $name;
		}
		
		return $name.'_'.md5($name.serialize($values));
	}
}
