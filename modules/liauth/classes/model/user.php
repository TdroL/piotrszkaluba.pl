<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Jelly_Model
{
	public static function initialize(Jelly_Meta $meta)
	{
		$meta->name_key('username')
			->sorting(array('username' => 'ASC'))
			->fields(array(
			'id' => new Field_Primary,
			'username' => new Field_String(array(
				'unique' => TRUE,
				'rules' => array(
						'not_empty' => NULL,
						'regex' => array('/^[\pL_.-]+$/ui')
					)
				)),
			'password' => new Field_Password(array(
				'hash_with' => array(Liauth::instance(), 'hash_password'),
				'rules' => array(
					'not_empty' => NULL,
				)
			)),
			'password_confirm' => new Field_Password(array(
				'in_db' => FALSE,
				'rules' => array(
					'not_empty' => NULL,
					'matches' => array('password'),
				)
			)),
			'active' => new Field_Boolean(array(
				'label' => 'Aktywny',
				'default' => TRUE,
			)),
		));
	}
} // End Model_User

