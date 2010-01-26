<?php
/**
 *  KO3 FirePHP and Profiler
 *  Version 0.2
 *  Last changed: 2010-01-24
 *  Based on:
 *  Fire_Profiler by dlib: http://learn.kohanaphp.com/2008/07/21/introducing-fire-profiler/
 *  KO3 conversion by ralf: http://code.goldenzazu.de/fireprofiler.php
 */

// Grab the vendor api library
require Kohana::find_file('vendor', 'FirePHP/FirePHP', $ext = 'class.php');

/**
 *  Main Class
 */
class Vendor_FirePHP extends FirePHP {
    protected $_config = array();
    protected $_queries = array();

    public function  __construct(array $config=Null)
    {
	parent::__construct();
	$this->_config = Kohana::config('firephp.default');
	if (isset($config)) {
	    $this->_config = Arr::merge($this->_config, $config);
	}
	$this->enabled = Arr::get($this->_config, 'enabled', FALSE);
	$this->setOptions(Arr::get($this->_config, 'firephp', $this->getOptions()));
    }

    final private function  __clone() {
	// Shouldn't need more than one instance of this...
    }

    public function get_config($key, $default = NULL)
    {
	return Arr::path($this->_config, $key, $default);
    }

    public function set_config($key, $value=NULL)
    {
	if (empty($key)) return FALSE;
	if (is_array($key)) {
	    $value = $key;
	} else {
	    if ($this->get_config($key) === $value) return FALSE;
	    // Convert dot-noted key string to an array
	    $keys = explode('.', rtrim($key, '.'));
	    // This will set a value even if it didn't previously exist
	    do {
		$key = array_pop($keys);
		$value = array($key => $value);
	    } while ($keys);
	}
	$this->_config = Arr::merge($this->_config, $value);
	$this->enabled = Arr::get($this->_config, 'enabled', FALSE);
	$this->setOptions(Arr::get($this->_config, 'firephp', $this->getOptions()));
	return TRUE;
    }
    
    // Disable error and exception handling... KO3 does it for us...
    public function registerErrorHandler($throwErrorExceptions=true) {}
    public function registerExceptionHandler() {}
    // Disable assertion handler until I can verify it doesn't break anything...
    public function registerAssertionHandler($convertAssertionErrorsToExceptions=true, $throwAssertionExceptions=false) {}

    public function session()
    {
	return (isset($_SESSION)) ? $this->tabledata($_SESSION, 'Session') : $this;
    }

    public function cookie()
    {
	return (isset($_COOKIE)) ? $this->tabledata($_COOKIE, 'Cookie') : $this;
    }

    public function post()
    {
	return (isset($_POST)) ? $this->tabledata($_POST, 'Post') : $this;
    }

    public function get()
    {
	return (isset($_GET)) ? $this->tabledata($_GET, 'Get') : $this;
    }

    /**
     * Benchmark times and memory usage from the Benchmark library.
     */
    public function database()
    {
	if ($this->enabled) 
	{
	    if ( ! empty($this->_queries))
	    {
		$this->group(__('Database').' '. __('Queries').': ('.count($this->_queries).')');
		foreach ($this->_queries as $query)
		{
		    if ($query['fb'] == 'table')
		    {
			$table = array();
			foreach ($query['data'] as $num => $row)
			{
			    if ($num === 0) $table[$num]['row_num'] = '';
			    $table[$num+1]['row_num'] = $num+1;
			    foreach ($row as $field => $value)
			    {
				if ($num === 0)
				{
				    $table[$num][$field] = $field; // header
				}
				$table[$num+1][$field] = $value;
			    }
			}
			$this->table($query['sql'], $table);
		    } else {
			$this->log($query['sql'], $query['label']);
		    }
		}
		$this->groupEnd();
	    }
	    $this->benchmark('Database');
	}
	return $this;
    }

    protected function _store_query(array $query)
    {
	if (empty($query)) return false; // throw exception?
	if ($this->get_config('database.group', FALSE))
	{
	    $this->_queries[] = $query;
	}
	else
	{
	    if ($query['fb'] == 'log')
	    {
		$this->log($query['sql'], $query['label']);
	    } else {
		$table = array();
		foreach ($query['data'] as $num => $row)
		{
		    if ($num === 0) $table[$num]['row_num'] = '';
		    $table[$num+1]['row_num'] = $num+1;
		    foreach ($row as $field => $value)
		    {
			if ($num === 0)
			{
			    $table[$num][$field] = $field; // header
			}
			$table[$num+1][$field] = $value;
		    }
		}
		$this->table($query['sql'], $table);
	    }
	}
    }

    /**
    * @param result  object   Database_Result for SELECT queries
    * @param result  mixed    the insert id for INSERT queries
    * @param result  integer  number of affected rows for all other queries
    */
    public function query($result, $type, $sql)
    {
	if ($this->enabled)
	{
	    $store = array('fb' => 'log', 'sql' => $sql);
	    $max = $this->get_config('database.rows', 10);
	    if ($type === Database::SELECT)
	    {
		if ($this->get_config('database.select', FALSE))
		{
			$rows = $result->as_array();
		    if ($result->count() > 0)
		    {
			$store['fb'] = 'table';
			$result->rewind();
			$store['data'] = array_slice($rows, 0, $max);
			
		    }
		    else
			$store['label'] = count($rows).' '.__('rows');
		}
	    }
	    elseif ($type === Database::INSERT)
	    {
		if ($this->get_config('database.insert', FALSE))
		{
		    if (count($result) > 0)
		    {
			$store['fb'] = 'table';
			$store['data'] = array_slice($result, 0, $max);
		    }
		    else
			$store['label'] = count($result).' '.__('rows');
		}
	    }
	    elseif ($type === Database::UPDATE) 
	    {
		if ($this->get_config('database.update', FALSE))
		{
		    $store['label'] = $result.' '.__('rows');
		}
	    }
	    else
		$store['label'] = $result.' '.__('rows');
	}
	$this->_store_query($store);
    }

    public function benchmark($table = FALSE)
    {
	if ($this->enabled)
	{
	    foreach (Profiler::groups() as $group => $benchmarks)
	    {
		$tablename = ucfirst($group);
		// Exclude database unless specifically run
		if ((empty($table) AND strpos($tablename,'Database') === FALSE) OR strpos($tablename,$table) === 0)
		{
		    $row = array( array(__('Benchmark'),__('Min'),__('Max'), __('Average'),__('Total')) );
		    foreach ($benchmarks as $name => $tokens)
		    {
			$stats = Profiler::stats($tokens);
			$cell = array( $name.' (' . count($tokens).')' );
			foreach (array('min', 'max', 'average', 'total') as $key)
			{
			    $cell[] =  ' ' . number_format($stats[$key]['time'], 6). ' '. __('seconds') ;
			}
			$row[] = $cell;
		    }
		    $cell = array('');
		    foreach (array('min', 'max', 'average', 'total') as $key)
		    {
			$cell[] = ' ' . number_format($stats[$key]['memory'] / 1024, 4) . ' kb';
		    }
		    $row[] = $cell;
		    // Translate before passing...
		    $this->fb(array(__($tablename), $row ),FirePHP::TABLE);
		}
	    }

	    if (empty($table) || strpos('Application',$table) === 0)
	    {
		$stats = Profiler::application();
		$tablename = array(__('Application Execution').' ('.$stats['count'].')');
		$row = array(array('','min', 'max', 'average', 'current'));
		$cell = array('Time');
		foreach (array('min', 'max', 'average', 'current') as $key)
		{
		    $cell[] = number_format($stats[$key]['time'], 6) . ' ' .  __('seconds');
		}
		$row[] = $cell;
		$cell = array('Memory');
		foreach (array('min', 'max', 'average', 'current') as $key)
		{
		    $cell[] = number_format($stats[$key]['memory'] / 1024, 4) . ' kb';
		}
		$row[] = $cell;
		$this->fb(array($tablename, $row ),FirePHP::TABLE);
	    }
	}
	return $this;
    }

    public function tabledata($data, $name='')
    {
	if ($this->enabled && !empty($data))
	{
	    $table = array();
	    $table[] = array(__('Key'), __('Value'));
	    foreach($data as $key => $value)
	    {
		if (is_object($value))
		    $value = ($this->get_config('tabledata.show_objects', FALSE)) ? $value : get_class($value).' [object]';
		$table[] = array($key, $value);
	    }
	    $this->fb(array($name.': ('.count($data).') ',  $table  ),FirePHP::TABLE);
	}
	return $this;
    }

    public function dump($Key, $Variable)
    {
	parent::dump($Key, $Variable);
	return $this;
    }

    public function error($Object, $Label=null)
    {
	parent::error($Object, $Label);
	return $this;
    }

    public function group($Name, $Options=null)
    {
	parent::group($Name, $Options) ;
	return $this;
    }

    public function groupEnd()
    {
	parent::groupEnd();
	return $this;
    }


    public function info($Object, $Label=null)
    {
	parent::info($Object, $Label);
	return $this;
    }


    public function log($Object, $Label=null)
    {
	parent::log($Object, $Label);
	return $this;
    }

    public function table($Label, $Table)
    {
	parent::table($Label, $Table);
	return $this;
    }

    public function trace($Label)
    {
	parent::trace($Label);
	return $this;
    }

    public function warn($Object, $Label=null)
    {
	parent::warn($Object, $Label);
	return $this;
    }

    public static function instance($_config=Null)
    {
	if( !self::$instance)
	{
	    self::$instance = new self($_config);
	} else {
	    self::$instance->set_config($_config);
	}
	return self::$instance;
    }


}
