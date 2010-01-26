<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Template
{
	public $allow = array();
	public $override = NULL; // override required level
	public $auth = NULL;
	public $user = NULL;
	
	public function before()
	{
		parent::before();
		$this->user = User::instance();
		$this->auth =& $this->user->auth;
		
		if($this->user->logged)
		{
			if(!defined('ADMIN_LOGGED') and $this->user->has('admin'))
			{
				define('ADMIN_LOGGED', TRUE);
			}

			$level = ($this->override !== NULL ? $this->override : $this->request->controller);

			if(!$this->user->has($level) and !in_array($this->request->action, $this->allow))
			{
				$this->request->redirect('admin/main');
			}

			is_object($this->view) and $this->view->bind_global('user', $this->user);
		}
		elseif(!in_array($this->request->action, $this->allow))
		{
			$this->session->set('referrer', $this->request->uri);
			$this->request->redirect('admin/login');
		}
	}
	
	// --------------------- COMMON METHODS ---------------------
	
	public function check_file_source(Validate $array, $field, array $exallowed = NULL)
	{
		$allowed = array('none', 'upload', 'local');
		if($exallowed !== NULL)
		{
			$allowed = $exallowed;
		}
		
		$form = $array->as_array();

		if(in_array($form[$field], $allowed))
		{
			return TRUE;
		}

		$array->error($field, 'in_array');
		return FALSE;
	}

	public function check_file_local(Validate $array, $field, $parent, $dir, &$match = NULL)
	{
		$form = $array->as_array();

		if(!array_key_exists($parent, $form) or $form[$parent] != 'local')
		{
			return TRUE;
		}

		$file = rtrim($dir, '/').'/'.$form[$field];

		if(empty($form[$field]))
		{
			$array->error($field, 'choose_file');
			return FALSE;
		}

		if(!file_exists($file))
		{
			$array->error($field, 'file_missing', array($file));
			return FALSE;
		}

		$match = utf8::str_ireplace('/', '', $form[$field]);
		return TRUE;
	}

	public function check_file_upload(Validate $array, $field, $parent, $dir, $types, &$match = NULL)
	{
		$form = $array->as_array();
		$allowed = array();

		if(!array_key_exists($parent, $form) or $form[$parent] != 'upload')
		{
			return TRUE;
		}

		if(!isset($_FILES[$field]) or !upload::valid($_FILES[$field]))
		{
			$array->error($field, 'file_invalid');
			return FALSE;
		}
		$file = preg_replace('/\s+/', '_', $_FILES[$field]['name']);
		$i = 1;

		if(!upload::type($_FILES[$field], $types))
		{
			$array->error($field, 'file_disallowed');
			return FALSE;
		}

		if(empty($file))
		{
			$array->error($field, 'file_not_send');
			return FALSE;
		}

		if(count(explode('.', $file)) <= 1)
		{
			$array->error($field, 'file_corrupted');
			return FALSE;
		}

		$file_exists = FALSE;

		if(file_exists(rtrim($dir, '/').'/'.$file)and md5_file(rtrim($dir, '/').'/'.$file) == md5_file($_FILES[$field]['tmp_name']))
		{
			$file_exists = TRUE;
		}

		while(!$file_exists and file_exists(rtrim($dir, '/').'/'.$file))
		{
			$file = explode('.', $file);

			$file[count($file)-2] = $file[count($file)-2].$i;
			$i++;
			$file = join('.', $file);
		}
		
		if($file_exists or Upload::save($_FILES[$field], $file, $dir))
		{
			$match = $file;

			$array[$parent] = $this->post[$parent] = 'local';

			$local = utf8::str_ireplace('_source', '', $parent).'_local';
			$array[$local] = $this->post[$local] = $file;
			return TRUE;
		}
		$array->error($field, 'file_write_fail');
		return FALSE;
	}

################################################################################

	protected function list_files($dir, $types)
	{
		$files = array();

		if(is_dir($dir))
		{
			$tmp = new DirectoryIterator($dir); 
			foreach($tmp as $v)
			{
				if(!$v->isDot() and !$v->isDir() and $v->getSize() > 0)
				{
					$ext = explode('.', $v->getFilename());
					$ext = utf8::strtolower($ext[count($ext)-1]);

					if(!in_array($ext, $types))
					{
						continue;
					}

					$files[$v->getFilename()] = preg_replace('#\.[a-z0-9]+$#', '', $v->getFilename());
				}
			}
		}
		asort($files);
		return $files;
	}
}