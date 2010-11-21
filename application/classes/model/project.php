<?php defined('SYSPATH') or die('No direct script access.');

class Model_Project extends Jelly_Model
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
				'link' => new Field_String(array(
					'label' => 'Link',
					'unique' => TRUE,
					'filters' => array(
						'strtolower' => NULL,
					),
				)),
				'description' => new Field_Text(array(
					'label' => 'Opis',
					'rules' => array(
						'not_empty' => NULL,
					)
				)),
				'file' => new Field_File(array(
					'label' => 'Plik',
					'path' => 'media/files',
					'rules' => array(
						'Upload::not_empty' => NULL,
						'Upload::type' => array(array('jpg', 'png', 'gif')),
					)
				)),
				'priority' => new Field_Priority(array(
					'label' => 'Priorytet',
				)),
				'category' => new Field_BelongsTo(array(
					'label' => 'Kategoria',
					'rules' => array(
						'not_empty' => NULL,
					)
				)),
				'images' => new Field_HasMany(array(
					'label' => 'Obrazy',
				)),
				'keywords' => new Field_Text(array(
					'label' => 'Keywords',
					'null' => TRUE,
				))
			))
			->sorting(array('priority' => 'desc'));
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
	
	public function reset_priority()
	{
		$priority = $this->get('priority', FALSE);
		if(!$priority)
		{
			return;
		}
		
		Jelly::update($this->meta()->table())
			->set(array('priority' => DB::expr('priority - 1')))
			->where('priority', '>', $priority)
			->execute();
			
		$this->priority = 0;
	}
	
	public function delete($key = NULL)
	{
		foreach($this->images as $image)
		{
			$image->delete();
		}
		
		$this->reset_priority();
		
		$path = $this->_meta->fields('file')->path;
		
		try
		{
			unlink($path.$this->file);
		}
		catch (Exception $e)
		{
			Kohana::$log->add('info', 'Requested remove of ":file". Failed.', array(':file' => $path.$this->file));
		}
		
		return parent::delete($key);
	}
	
	protected function generate_link()
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

