<?php defined('SYSPATH') or die('No direct script access.');

class Request extends Extended_Request
{
	public static function load($uri, $as_ajax = FALSE)
	{
		if($as_ajax)
		{
			$ajax = Request::$is_ajax;
			Request::$is_ajax = TRUE;

			$request = Request::factory($uri);

			try
			{
				$request->execute()->send_headers()->response;
			}
			catch (Error404_Exception $e)
			{
				$request->response = new View($request->directory.'/404');
			}

			Request::$is_ajax = $ajax;
			
			return $request;
		}
		
		return Request::factory($uri)->execute()->send_headers()->response;
	}
	
	public function redirect($url, $code = 302)
	{
		if (strpos($url, '://') === FALSE)
		{
			// Make the URI into a URL
			$url = URL::site($url);
		}

		// Set the response status
		$this->status = $code;

		// Set the location header
		$this->headers['Location'] = $url;

		// Send headers
		$this->send_headers();

		if($code === 302)
		{
			echo Html::anchor($url, empty($url) ? '/' : $url).'<br />';
		}

		// Stop execution
		exit;
	}
}