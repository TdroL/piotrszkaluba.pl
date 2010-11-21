<?php defined('SYSPATH') or die('No direct script access.');

class Model_Builder_Category extends Jelly_Builder
{
	public function link($category)
	{
		return $this->where('link', '=', (string) $category)->limit(1);
	}
}

