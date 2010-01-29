<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Protected_Logs extends Controller_Auth
{
	protected $_access = array(
		TRUE => 'admin'
	);
	
	public $no_template = array('list');
	
	public function action_index()
	{
		$path = $this->param('path');
		$this->content->path = $path;
		$this->content->bind('file', $file);
		
		$path = APPPATH.'logs/'.$path;
		
		$file = array();
		
		if(file_exists($path) and is_file($path))
		{
			$lines = file($path);
			$i = -1;
			
			foreach($lines as $k => $v)
			{
				$v = trim($v);
				
				if(empty($v) or preg_match('/^<\?php .*? \?>$/i', $v))
				{
					continue;
				}
				
				if(preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/i', $v))
				{
					$i++;
					$file[$i] = $v;
				}
				else
				{
					$file[$i] .= PHP_EOL.$v;
				}
			}
		}
	}
	
	public function action_list()
	{
		$logs = Kohana::list_files('logs');

		$active = $this->param('path');
		
		if( $logs )
		{
			// Create directory array
			$dir = array();

			krsort($logs);

			foreach( $logs as $years => $months )
			{
				krsort( $months );

				foreach( $months as $path => $files )
				{
					krsort($files);

					foreach( $files as $file => $path )
					{
						$file = str_replace('\\', '/', $file);
						list( $logs, $year, $month, $fn ) = explode( '/', $file );
						$day = explode('.', $fn);
						$dir[$year][$month][$day[0]] = str_replace('logs/', '', $file);
					}

				}

			}

			$this->content->dir = $dir;
			$this->content->active = $active;
		}
	}
	
	public static function get_month($month)
	{
		$months = Kohana::message('months');
		return $months[$month];
	}
}