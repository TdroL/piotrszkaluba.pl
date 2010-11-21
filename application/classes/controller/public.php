<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Public extends Controller_Kohana_Public
{
	public function after()
	{
		if($this->template instanceof View)
		{
			$this->template->set_global('date_short', 'd.m.Y');
			$this->template->set_global('date_long', 'd.m.Y H:i');
			$this->template->set_global('ftime_short', '%d.%m.%Y');
			$this->template->set_global('ftime_long', '%d.%m.%Y, %H:%M');
			
			if($this->request->directory == 'public')
			{
				$this->template->latest = Jelly::select('image')->latest();
				$this->template->wips = Jelly::select('category')->link('wip')->load();	
			}
			
			$this->template->categories = Jelly::select('category');
			$this->template->title = empty($this->template->title) ? 'Piotr Szkałuba - Portfolio' : $this->template->title;
		}
		parent::after();
	}
}

