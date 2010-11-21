<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/Warsaw');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'pl_PL.UTF-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

//-- Configuration and initialization -----------------------------------------

/**
 * Set if the application is in development (FALSE)
 * or if the application is in production (TRUE).
 */
Kohana::$environment = (Arr::get($_SERVER, 'SERVER_NAME') != 'localhost') ? Kohana::PRODUCTION : Kohana::DEVELOPMENT;
/**
 * Display errors only when in development.
 */
ini_set('display_errors', Kohana::$environment != Kohana::PRODUCTION);

if(Kohana::$environment == Kohana::PRODUCTION)
{
	error_reporting(E_ALL ^ E_NOTICE);
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url	path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"	   index.php
 * - string   charset	 internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory				   APPPATH/cache
 * - boolean  errors	  enable or disable error handling				   TRUE
 * - boolean  profile	 enable or disable internal profiling			   TRUE
 * - boolean  caching	 enable or disable internal caching				 FALSE
 */
Kohana::init(array(
	'base_url'   => (Kohana::$environment != Kohana::PRODUCTION) ? '/WIP/portfolio/' : '/',
	'index_file' => FALSE,
	'profile' => Kohana::$environment != Kohana::PRODUCTION, // Disabling profiling if we are in production
	'caching' => Kohana::$environment == Kohana::PRODUCTION, // Enable caching if we are in production
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Kohana_Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	'patches'    => MODPATH.'patches',
	'firephp'    => MODPATH.'firephp',	  // FirePHP Log handler
	'params'     => MODPATH.'params',	  // Params
	'jelly-torn' => MODPATH.'jelly-torn', // Jelly form generator
	'jelly'      => MODPATH.'jelly',	  // Sweet ORM
	'liauth'     => MODPATH.'liauth',	  // Light authentication
	'cache'      => MODPATH.'cache',	  // Caching with multiple backends
	'database'   => MODPATH.'database',   // Database access
	'image'      => MODPATH.'image',	  // Image manipulation
	'pagination' => MODPATH.'pagination', // Paging of results
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
if( ! Route::cache())
{
	Route::set('category', 'kategoria-<link>(/page-<page>)',
		array(
			'link' => '[a-z0-9\-_]+'
		))
		->defaults(array(
			'directory'  => 'public',
			'controller' => 'category',
			'action'	 => 'index',
		));

	Route::set('project', 'projekt-<link>',
		array(
			'link' => '[a-z0-9\-_]+'
		))
		->defaults(array(
			'directory'  => 'public',
			'controller' => 'project',
			'action'	 => 'index',
		));

	Route::set('wip', 'wip(/page-<page>)')
		->defaults(array(
			'directory'  => 'public',
			'controller' => 'home',
			'action'	 => 'wip',
		));

	Route::set('home', '')
		->defaults(array(
			'directory'  => 'public',
			'controller' => 'home',
			'action'	 => 'index',
		));

	Route::set('protected', 'admin(/<controller>(/<action>(/<id>)))')
		->defaults(array(
			'directory'  => 'protected',
			'controller' => 'home',
			'action'	 => 'index',
		));

	Route::set('default', '<any>',
		array(
			'any' => '.*'
		))
		->defaults(array(
			'directory'  => 'public',
			'controller' => 'home',
			'action'	 => '404',
		));

	Route::cache(Kohana::$environment == Kohana::PRODUCTION);
}

/**
 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
 * If no source is specified, the URI will be automatically detected.
 */
if ( ! defined('SUPPRESS_REQUEST'))
{
	$request = Request::instance();

	try
	{
		$request->execute();
		$request->headers['Etag'] = $request->generate_etag();
	}
	catch(Error404_Exception $e)
	{
		$request = Request::factory('404')->execute();
	}
	catch(Exception $e)
	{
		if(Kohana::$environment != Kohana::PRODUCTION)
		{
			throw $e; // re-throw
		}
		
		$request = Request::factory('500')->execute();
	}
	echo $request->send_headers()->response;

	if(Kohana::$environment != Kohana::PRODUCTION)
	{
		FirePHP_Profiler::instance()
						->superglobals()
						->database()
						->benchmark();
	}
}

