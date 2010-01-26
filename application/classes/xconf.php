<?php defined('SYSPATH') or die('No direct script access.');


class Xconf
{
	public static $data = array();
	public static $loaded = FALSE;
	public static $cache = FALSE;

	public static function load($force = FALSE)
	{
		$id = 'xconf';
	
		self::$cache === FALSE and self::$cache = Zend::cache();
		if(self::$loaded !== FALSE && $force === FALSE) return;
		
		self::$loaded = TRUE;
		
		if(self::$data = self::$cache->load($id))
		{
			return;
		}
		
		$q = DB::select('*')->from('settings')->as_object()->execute();
		
		foreach($q as $v)
		{
			self::$data[$v->key] = $v->value;
		}
		
		self::$cache->save(self::$data, $id, array('xconf'), 7200); // 7200 = 2hr
	}

	public static function get($key, $alt = NULL)
	{
		self::$loaded === FALSE and self::load();
		
		return isset(self::$data[$key]) ? self::$data[$key] : $alt;
	}

	public static function set($key, $value, $save = FALSE)
	{
		self::$data[$key] = $value;
		
		$save !== FALSE and self::save();
	}
	
	public static function save()
	{

	}

}
