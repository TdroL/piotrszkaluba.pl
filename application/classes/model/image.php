<?php defined('SYSPATH') or die('No direct script access.');

class Model_Image extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
		$meta->fields(array(
				'id' => new Field_Primary,
				'file' => new Field_File(array(
					'label' => 'Plik',
					'path' => 'media/files',
					'rules' => array(
						'Upload::not_empty' => NULL,
						'Upload::type' => array(array('jpg', 'png', 'gif')),
					)
				)),
				'description' => new Field_Text(array(
					'label' => 'Opis',
				)),
				'attributes' => new Field_Text(array(
					'label' => 'Atrybuty HTML',
				)),
				'date' => new Field_Timestamp(array(
					'label' => 'Data',
					'auto_now_create' => TRUE,
					'auto_now_update' => TRUE,
				)),
				'project' => new Field_BelongsTo(array(
					'label' => 'Projekt',
				))
			))
			->sorting(array('date' => 'asc'));
	}
	
	public function delete($key = NULL)
	{
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
}

