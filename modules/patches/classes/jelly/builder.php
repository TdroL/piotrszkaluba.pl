<?php defined('SYSPATH') or die('No direct script access.');

class Jelly_Builder extends Jelly_Builder_Core
{
	protected function _column($field, $join = TRUE, $value = NULL)
	{
		if(!is_string($field))
		{
			return $field;
		}
		
		return parent::_column($field, $join, $value);
	}
	
	public function paginate()
	{
		$limit = Kohana::config('pagination')->default['items_per_page'];
		$page = max(0, (int) Request::current()->param('page') - 1);
		
		return $this->limit($limit)->offset($page*$limit);
	}
	
	public function pagination()
	{
		return new Pagination(array(
				'total_items' => $this->count_last_query(),
		));
	}
	
	public function count_last_query()
	{
		$count = clone $this;
		$count->_limit = NULL;
		$count->_offset = NULL;
		
		return $count->count();
	}
	
	public function loaded()
	{
		return !empty($this->_result);
	}
}