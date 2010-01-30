<?php defined('SYSPATH') or die('No direct script access.');

class Form extends Kohana_Form
{
	public static function fields($post = array())
	{
		return new FormFields($post);
	}
}

class FormFields implements ArrayAccess, Iterator
{
	protected $_data = array();
	protected $_ignored = array('password', 'password_confirm');
	public static $_separator = ', ';
	
	public function __construct(array $post = array())
	{
		$this->_data = $post;
		
		foreach($this->_data as $k => $v)
		{
			if(in_array($k, $this->_ignored))
			{
				unset($this->_data[$k]);
			}
		}
	}
	
	public function __toString()
	{
		if(IN_PRODUCTION)
		{
			foreach($this->_data as $k => $v)
			{
				if(is_null($v))
				{
					unset($this->_data[$k]);
				}
			}
			return join(self::$_separator, $this->_data);
		}
		
		foreach($this->_data as $k => $v)
		{
			if(is_string($v))
			{
				$v = '"'.$v.'"';
			}
			else if(is_null($v))
			{
				$v = 'NULL';
			}
			
			$this->_data[$k] = $k.':'.$v;
		}
		return '[(FormFields) '.join(self::$_separator, $this->_data).']';
		// można bylo print_r, ale...
	}
	
	public function clear()
	{
		$this->_data = array();
	}
	
	public function set($post = array())
	{
		if($post instanceof Validate)
		{
			$post = $post->as_array();
		}
		
		$this->_data = $post;
		
		foreach($this->_data as $k => $v)
		{
			if(in_array($k, $this->_ignored))
			{
				unset($this->_data[$k]);
			}
		}
	}
	
	public function override($post)
	{
		if($post instanceof Validate)
		{
			$post = $post->as_array();
		}
		
		if($post instanceof ORM)
		{
			$post = $post->as_array();
		}
		
		foreach($post as $k => $v)
		{
			$this->_data[$k] = $v;
		}
		
		foreach($this->_data as $k => $v)
		{
			if(in_array($k, $this->_ignored))
			{
				unset($this->_data[$k]);
			}
		}
	}
	
	public function __get($key)
	{
		if(in_array($key, $this->_ignored))
		{
			return NULL;
		}
		return array_key_exists($key, $this->_data) ? $this->_data[$key] : NULL;
	}

	public function __set($key, $value)
	{
		if(in_array($key, $this->_ignored))
		{
			return;
		}
		$this->_data[$key] = $value;
	}
	
	public function __isset($key)
	{
		return array_key_exists($key, $this->_data);
	}
	
	public function __unset($key)
	{
		if(array_key_exists($key, $this->_data))
		{
			unset($this->_data[$key]);
		}
	}
	
	public function offsetExists($key)
	{
		return array_key_exists($key, $this->_data);
	}
	
	public function offsetGet($key)
	{
		if(in_array($key, $this->_ignored))
		{
			return NULL;
		}
		return array_key_exists($key, $this->_data) ? $this->_data[$key] : NULL;
	}
	
	public function offsetSet($key, $value)
	{
		if(in_array($key, $this->_ignored))
		{
			return;
		}
		$this->_data[$key] = $value;
	}
	
	public function offsetUnset($key)
	{
		if(array_key_exists($key, $this->_data))
		{
			unset($this->_data[$key]);
		}
	}
	
	public function rewind() {
		return reset($this->_data);
	}
	
	public function current() {
		return current($this->_data);
	}
	
	public function key() {
		return key($this->_data);
	}
	
	public function next() {
		return next($this->_data);
	}
	
	public function valid() {
		return key($this->_data) !== NULL;
	}
}