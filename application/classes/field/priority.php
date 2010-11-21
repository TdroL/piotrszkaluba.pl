<?php defined('SYSPATH') or die('No direct script access.'); 

class Field_Priority extends Field_Integer
{
	public function save($model, $value, $loaded)
	{

		$old = $model->get($this->name, FALSE);
		$mod = Arr::get($_POST, $this->name.'-mod', 0) ? 1 : 0;
		
		if($loaded and $old == $value or $old == ($value + $mod) or (!$mod and $old == ($value - 1)))
		{
			return $value;
		}
		
		if($loaded)
		{
			$model->reset_priority();
			
			if($value > $old)
			{
				$value--;
			}
		}
		
		$value = $value + $mod;
		$value = $value > 0 ? $value : 1;
		
		Jelly::update($model->meta()->table())
			->set(array($this->name => DB::expr($this->name.' + 1')))
			->where($this->name, '>=', $value)
			->execute();
			
		return $value;
	}
}