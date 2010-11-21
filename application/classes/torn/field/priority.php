<?php defined('SYSPATH') or die('No direct script access.');

class Torn_Field_Priority extends Torn_Field
{
	public function input(array $attributes = array())
	{
		$_POST[$this->field->name.'-mod'] = Arr::get($_POST, $this->field->name.'-mod', 1);
		
		$this->view->set(array(
			'name' => $this->field->name,
			'value' => $this->model->get($this->field->name),
			'options' => Jelly::select($this->model->meta()->table())->order_by('priority', 'desc')->execute()->as_array('priority', 'name'),
			'attributes' => $attributes,
		));
		
		return parent::input();
	}
}