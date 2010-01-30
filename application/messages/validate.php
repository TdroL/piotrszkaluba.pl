<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'not_empty'    => ':field must not be empty',
	'matches'      => ':field must be the same as :param1',
	'regex'        => ':field does not match the required format',
	'exact_length' => ':field must be exactly :param1 characters long',
	'min_length'   => ':field must be at least :param1 characters long',
	'max_length'   => ':field must be less than :param1 characters long',
	'in_array'     => ':field must be one of the available options',
	'digit'        => ':field must be a digit',
	'decimal'      => ':field must be a decimal with :param1 places',
	'range'        => ':field must be within the range of :param1 to :param2',
	'Upload::valid'    	=> 'file :field must be valid',
	'Upload::not_empty'	=> 'file :field must not be empty',
	'Upload::type'    	=> 'file :field (":param1") has wrong file type',
	'Upload::size'    	=> 'file :field (":param1") is too big',
	'file_exists'		=> 'file :field (":param1") already exists',
	'missing_file'		=> 'file :field - file ":param1" not found',
	'category_exists'	=> ':field - such category does not exist',
	'is_dir'			=> ':field - folder ":param1" does not exist',
	'url'				=> ':field must be valid url',
	'unique'			=> ':field must be unique',
	'alpha_dash'		=> ':field must contain only letters, digits, dashes and underscores characters',
	'username_available'	=> ':field must be unique',
	'email_available'		=> ':field must be unique',
	'validate::email'		=> ':field must be a valid email',
	'internal_error'		=> 'Internal error: :param1',
	'swiftmailer_error'		=> 'Server could not send your mail, please try again later',
);