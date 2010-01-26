<?php defined('SYSPATH') or die('No direct script access.');

abstract class Model extends Kohana_Model 
{
	public $cache;
	
	public function __construct()
	{
		parent::__construct();
		$this->cache = Zend::cache();
	}
	
	public static function prepare_title($title)
	{
		$chars = array(
			'ę' => 'e',
			'ó' => 'o',
			'ą' => 'a',
			'ś' => 's',
			'ł' => 'l',
			'ż' => 'z',
			'ź' => 'z',
			'ć' => 'c',
			'ń' => 'n',
			'Ę' => 'E',
			'Ó' => 'O',
			'Ą' => 'A',
			'Ś' => 'S',
			'Ł' => 'L',
			'Ż' => 'Z',
			'Ź' => 'Z',
			'Ć' => 'C',
			'Ń' => 'N',
		);

		foreach($chars as $k => $v)
		{
			$title = str_ireplace($k, $v, $title);
		}
		
		return url::title(preg_replace('/[^a-z0-9-\+\/_ ]/iU', '_', $title));
	}
	
	public static function prepare_title_ext($title, $table, $field = 'link', $id = NULL)
	{
		$title = self::prepare_title($title);

		$link = $title;

		$count = DB::select(DB::expr('count(id) as count'))
					->from($table)
					->as_object();

		if(!empty($id))
		{
			$count = $count->where('id', '!=', (int) $id);
		}

		$clone = clone $count;

		$count = (int) $count
						->where($field, '=', $link)
						->execute()
						->current()
						->count;

		$i = 2;
		while($count > 0)
		{
			$link = $title.'-'.$i;
			$count = (int) $clone
						->where($field, '=', $link)
						->execute()
						->current()
						->count;
			$i++;
		}

		return $link;
	}
}
