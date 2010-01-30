<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

/**
 * Set the default time zone.
 *
 * @see  http://docs.kohanaphp.com/about.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/Warsaw');

/**
 * Set the default locale.
 *
 * @see  http://docs.kohanaphp.com/about.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'pl_PL.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://docs.kohanaphp.com/about.autoloading
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
define('IN_PRODUCTION', $_SERVER['SERVER_NAME'] != 'localhost');

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
 
if(IN_PRODUCTION)
{
	error_reporting(E_ALL ^ E_NOTICE);
}

Kohana::init
(
	array
	(
		'base_url' => IN_PRODUCTION ? '/' : '/WIP/morgin/', 
		'index_file' => FALSE,
		'profile' => !IN_PRODUCTION, // Disabling profiling if we are in production
		'caching' => IN_PRODUCTION, // Enable caching if we are in production
	)
);

I18n::$lang = 'pl-pl';

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
	 'firephp'    => MODPATH.'firephp',    // FirePHP library
	 'auth'       => MODPATH.'auth',       	// Basic authentication
	 'database'   => MODPATH.'database',   	// Database access
	 'orm'        => MODPATH.'orm',        	// Object Relationship Mapping
	 'pagination' => MODPATH.'pagination', 	// Paging of results
	));

if(is_file(APPPATH.'base.php'))
{
	require APPPATH.'base.php';
}

Kohana::$log->attach(new FirePHP_Log_Console());

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
if (!Route::cache())
{
	// ----------- ADMIN ----------- //
	Route::set('login', 'admin/login')
		->defaults(array(
			'directory'  => 'protected',
			'controller' => 'main',
			'action' 	 => 'login',
		));
	
	Route::set('logout', 'admin/logout')
		->defaults(array(
			'directory'  => 'protected',
			'controller' => 'main',
			'action' 	 => 'logout',
		));
	
	Route::set('admin-is-logged', 'admin/is_logged')
		->defaults(array(
			'directory'  => 'protected',
			'controller' => 'main',
			'action' 	 => 'is_logged',
		));
	
	Route::set('admin-main', 'admin/main')
		->defaults(array(
			'directory'  => 'protected',
			'controller' => 'main',
			'action' 	 => 'index',
		));
	
	Route::set('logs_list', 'admin/logs/list(/<path>)', 
		array(
			'path'		=> '[0-9\/]+(?:\.php)?',
		))
		->defaults(array(
			'directory'  => 'protected',
			'controller' => 'logs',
			'action' 	 => 'list',
		));
	
	Route::set('logs', 'admin/logs(/<path>)', 
		array(
			'path'		=> '[0-9\/]+(?:\.php)?',
		))
		->defaults(array(
			'directory'  => 'protected',
			'controller' => 'logs',
			'action' 	 => 'index',
		));
	
	Route::set('admin', 'admin/<controller>(/<action>(/<id>))(/only/<category>)(/sort/<field>(/<sort>))(/page/<page>)', 
		array(
			'id'		=> '\d+',
			'page'		=> '\d+',
			'field'		=> '[^/]+',
			'sort'		=> 'desc|asc',
		))
		->defaults(array(
			'directory'  => 'protected',
			'controller' => 'main',
			'action' 	 => 'index',
			'field'		 => NULL,
			'position'	 => NULL,
			'category'	 => NULL,
		));
	
	// ----------- ADMIN - END ----------- //
	
	Route::set('images', 'view/<category>(/<page>)', 
		array(
			'page' => '\d+',
			'ajax'	=> 'ajax',
		))
		->defaults(array(
			'directory'  => 'public',
			'controller' => 'images',
			'action'     => 'index',
			'page'		 => 1,
		));
	
	Route::set('pages', '<page>', 
		array(
			'page' => '[^\d(ajax)].+'
		))
		->defaults(array(
			'directory'  => 'public',
			'controller' => 'pages',
			'action'     => 'index',
		));
	
	Route::set('contact-email', 'contact/send')
		->defaults(array(
			'directory'  => 'public',
			'controller' => 'pages',
			'action'     => 'send',
		));
	
	Route::set('default', '(<page>)',
		array(
			'page'	=> '\d*',
		))
		->defaults(array(
			'directory'  => 'public',
			'controller' => 'images',
			'action'     => 'index',
			'category'	 => NULL,
			'page'		 => 1,
		));
	
	// Cache the routes if in production
	Route::cache(IN_PRODUCTION);
}
/**
 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
 * If no source is specified, the URI will be automatically detected.
 */
 

if(!isset($force_uri))
{
	$force_uri = TRUE;
}

$request = Request::instance($force_uri);
$request->headers['Cache-Control'] = 'no-cache, must-revalidate';
$request->headers['Expires'] = 'Sat, 26 Jul 1997 05:00:00 GMT';
//$request->headers['Content-Encoding'] = 'gzip';

if(IN_PRODUCTION === TRUE)
{
	try
	{
		// Attempt to execute the response
		$request->execute()
				->send_headers();
	}
	catch(Kohana_View_Exception $e)
	{
		// Create a 404 response
		$request->status = 404;
		$request->response = new View('public/template');
		$request->response->content = new View('public/404');
		$request->response->content->message = $e->getMessage();
	}
	catch(Exception $e)
	{
		// If there was an internal server error, we should record it for analysis
		Kohana::$log->add('500', $e.PHP_EOL.'URI: '.$request->uri);
		$request->status = 500;
		$request->response = new View('public/template');
		$request->response->content = new View('public/404');
		$request->response->content->message = 'error'.$e->getMessage();
	}
}
else
{
	// Attempt to execute the response
	try
	{
		$request->execute()
				->send_headers();
	}
	catch(Exception $e)
	{
		Kohana::$log->add('Exception', $e);
		throw $e;
	}
}

echo $request->response;

if(defined('ADMIN_LOGGED') and class_exists('FirePHP_Profiler'))
{
	FirePHP_Profiler::instance()
		->superglobals()
		->database()
		->benchmark();
}