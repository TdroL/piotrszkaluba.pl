<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Yaminify extends Controller_Kohana_Yaminify {

	public function action_css()
	{
		$file = $this->request->param('file');

		$dir = DOCROOT.trim(Arr::path($this->_config, 'css.dir'), '/');

		$path = $dir.'/'.$file;

		$source = $this->_yaminify->css($path);

		if ( ! is_writable($dir))
		{
			$warning = __('Directory :dir is not writable - minified css file :file won\'t be saved.', array(
				':dir' => str_ireplace(DOCROOT, '', $dir),
				':file' => $file
			));

			Kohana::$log->add(Log::WARNING, $warning);

			if (Arr::get($this->_config, 'verbose'))
			{
				$source = '/* '.$warning.' */'.PHP_EOL.$source;
			}
		}
		else
		{
			$this->_yaminify->cache($path, $source);
		}

		$this->set_headers($path, 'css');

		$this->request->response = $source;
	}

	public function action_js()
	{
		$file = $this->request->param('file');

		$dir = DOCROOT.trim(Arr::path($this->_config, 'js.dir'), '/');

		$path = $dir.'/'.$file;

		$source = $this->_yaminify->js($path);

		if ( ! is_writable($dir))
		{
			$warning = __('Directory :dir is not writable - minified js file :file won\'t be saved.', array(
				':dir' => str_ireplace(DOCROOT, '', $dir),
				':file' => $file
			));

			Kohana::$log->add(Log::WARNING, $warning);

			if (Arr::get($this->_config, 'verbose'))
			{
				$source = '/* '.$warning.' */'.PHP_EOL.$source;
			}
		}
		else
		{
			$this->_yaminify->cache($path, $source);
		}

		$this->set_headers($path, 'js');

		$this->request->response = $source;
	}

	protected function set_headers($path, $default_ext = NULL)
	{
		$time = file_exists($path) ? filemtime($path) : time();
		$last_modified = gmdate('D, d M Y H:i:s T', $time);
		$this->request->headers['Last-Modified'] = $last_modified;

		if ($mime = File::mime_by_ext(pathinfo($path, PATHINFO_EXTENSION))
		 OR $mime = File::mime_by_ext($path, $default_ext))
		{
			$this->request->headers['Content-Type'] =  $mime;
		}
	}
}
