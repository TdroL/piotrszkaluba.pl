<?php defined('SYSPATH') or die('No direct script access.');
 
abstract class Controller_Kohana_Public extends Controller
{
	public $template = 'template';
	public $content = TRUE;
	public $no_view = array();
	public $no_template = array();

	public $auto_render = TRUE;
	
	public $session;

	public function before()
	{
		I18n::lang('pl-pl');
		
		$this->session = Session::instance();
		if ($this->auto_render === TRUE and $this->template !== NULL and !in_array($this->request->action, $this->no_view))
		{
			if(Request::$is_ajax)
			{
				$this->content = new View((!empty($this->request->directory) ? $this->request->directory.'/' : NULL).$this->request->controller.'/'.$this->request->action);
				$this->template =& $this->content;
			}
			else
			{
				if(!in_array($this->request->action, $this->no_template))
				{
					$this->template = new View((!empty($this->request->directory) ? $this->request->directory.'/' : NULL).$this->template);
					
					if($this->content === TRUE)
					{
						$this->template->content = new View((!empty($this->request->directory) ? $this->request->directory.'/' : NULL).$this->request->controller.'/'.$this->request->action);
						$this->content =& $this->template->content;
					}
				}
				else
				{
					if($this->content === TRUE)
					{
						$this->content = new View((!empty($this->request->directory) ? $this->request->directory.'/' : NULL).$this->request->controller.'/'.$this->request->action);
					}
					
					$this->template =& $this->content;
				}
			}
		}
	}

	public function after()
	{
		if ($this->auto_render === TRUE and !in_array($this->request->action, $this->no_view))
		{
			// Assign the template as the request response and render it
			$this->template->set_global('request', Request::instance());
			$this->template->bind_global('obj', $this);
			$this->request->response = $this->template;
		}
	}
}