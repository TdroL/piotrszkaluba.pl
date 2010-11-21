<?php defined('SYSPATH') or die('No direct script access.');

class Model_Category extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
		$meta->fields(array(
				'id' => new Field_Primary,
				'name' => new Field_String(array(
					'label' => 'Nazwa',
					'rules' => array(
						'not_empty' => NULL,
					)
				)),
				'title' => new Field_String(array(
					'label' => 'Tytuł',
					'rules' => array(
						'not_empty' => NULL,
					)
				)),
				'link' => new Field_String(array(
					'label' => 'Link',
					'unique' => TRUE,
					'rules' => array(
						'not_empty' => NULL,
					)
				)),
				'projects' => new Field_HasMany(array(
					'label' => 'Projekty',
				)),
				'keywords' => new Field_Text(array(
					'label' => 'Keywords',
					'null' => TRUE,
				))
			));
	}

	public function set($values, $value = NULL)
	{
		parent::set($values, $value);
	
		if(!$this->saved())
		{
			$this->generate_link();
		}

		return $this;
	}
	
	public function generate_link()
	{
		if(empty($this->name) or !empty($this->link))
		{
			return FALSE;
		}
		
		$name = $this->name;
		
		$name = preg_replace('/\s/iD', '-', $name);
		$name = strtolower(Text::normalize($name));
		$name = preg_replace('/[-]{2,}/iD', '-', $name);
		
		$name = preg_replace('/[-]$/iD', '', $name);
		
		$this->link = $name;
		
		return TRUE;
	}
}

