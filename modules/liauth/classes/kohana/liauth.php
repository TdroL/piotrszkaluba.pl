<?php defined('SYSPATH') or die('No direct script access.');

/*
 	Liauth - simpler version of official Auth
 */

abstract class Kohana_Liauth
{
	public $user = FALSE;

	protected $_config;
	protected $_session;

	protected static $_instance;

	public static function instance()
	{
		if( ! isset(Liauth::$_instance))
		{
			// Load the configuration for this type
			$config = Kohana::config('liauth');

			if( ! $type = $config->get('driver'))
			{
				$type = 'Jelly';
			}

			// Set the session class name
			$class = 'Liauth_'.ucfirst($type);

			// Create a new session instance
			Liauth::$_instance = new $class($config);
		}

		return Liauth::$_instance;
	}

	public function __construct($config = array())
	{
		$config['salt_pattern'] = preg_split('/,\s*/', $config['salt_pattern']);

		$this->_config = $config;
		$this->_session = Session::instance();

		$this->user = $this->_session->get($this->_config['session_key'], FALSE);
	}

	abstract public function _login($username, $password);

	abstract public function password($username);

	public function login($username, $password, $remember = FALSE)
	{
		if(empty($password))
			return FALSE;

		if(is_string($password))
		{
			// Get the salt from the stored password
			$salt = $this->find_salt($this->password($username));

			// Create a hashed password using the salt from the stored password
			$password = $this->hash_password($password, $salt);
		}

		return $this->_login($username, $password, $remember);
	}

	public function force_login($username)
	{

	}

	public function logout()
	{
		$this->_session->delete($this->_config['session_key']);
	}

	public function logged_in()
	{
		return (bool) $this->user;
	}

	/**
	 * Creates a hashed password from a plaintext password, inserting salt
	 * based on the configured salt pattern.
	 *
	 * @param   string  plaintext password
	 * @return  string  hashed password string
	 */

	public function hash_password($password, $salt = FALSE)
	{
		if($salt === FALSE)
		{
			// Create a salt seed, same length as the number of offsets in the pattern
			$salt = substr($this->hash(uniqid(NULL, TRUE)), 0, count($this->_config['salt_pattern']));
		}

		// Password hash that the salt will be inserted into
		$hash = $this->hash($salt.$password);

		// Change salt to an array
		$salt = str_split($salt, 1);

		// Returned password
		$password = '';

		// Used to calculate the length of splits
		$last_offset = 0;

		foreach($this->_config['salt_pattern'] as $offset)
		{
			// Split a new part of the hash off
			$part = substr($hash, 0, $offset - $last_offset);

			// Cut the current part out of the hash
			$hash = substr($hash, $offset - $last_offset);

			// Add the part to the password, appending the salt character
			$password .= $part.array_shift($salt);

			// Set the last offset to the current offset
			$last_offset = $offset;
		}

		// Return the password, with the remaining hash appended
		return $password.$hash;
	}

	/**
	 * Perform a hash, using the configured method.
	 *
	 * @param   string  string to hash
	 * @return  string
	 */
	public function hash($str)
	{
		return hash($this->_config['hash_method'], $str);
	}

	/**
	 * Finds the salt from a password, based on the configured salt pattern.
	 *
	 * @param   string  hashed password
	 * @return  string
	 */
	public function find_salt($password)
	{
		$salt = '';

		foreach($this->_config['salt_pattern'] as $i => $offset)
		{
			// Find salt characters, take a good long look...
			$salt .= substr($password, $offset + $i, 1);
		}

		return $salt;
	}

	protected function complete_login($user)
	{
		// Regenerate session_id
		$this->_session->regenerate();

		// Store username in session
		$this->_session->set($this->_config['session_key'], $user);

		$this->user = $user;

		return TRUE;
	}
} // End Liauth

