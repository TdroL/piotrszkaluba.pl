<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Liauth_Jelly extends Liauth
{
	/**
	 * Logs a user in.
	 *
	 * @param   string   username
	 * @param   string   password
	 * @param   boolean  enable auto-login
	 * @return  boolean
	 */
	public function _login($username, $password)
	{
		// Make sure we have a user object
		$user = $this->_get_object($username);

		// If the passwords match, perform a login
		if($user->loaded() AND $user->active AND $user->password === $password)
		{
			$this->complete_login($user);
			return TRUE;
		}

		// Login failed
		return FALSE;
	}

	/**
	 * Forces a user to be logged in, without specifying a password.
	 *
	 * @param   mixed    username
	 * @return  boolean
	 */
	public function force_login($username)
	{
		// Make sure we have a user object
		$user = $this->_get_object($username);

		// Mark the session as forced, to prevent users from changing account information
		$_SESSION['auth_forced'] = TRUE;

		// Run the standard completion
		$this->complete_login($user);
	}

	/**
	 * Get the stored password for a username.
	 *
	 * @param   mixed   username
	 * @return  string
	 */
	public function password($user)
	{
		// Make sure we have a user object
		$user = $this->_get_object($user);

		return $user->password;
	}

	/**
	 * Compare password with original (hashed). Works for current (logged in) user
	 *
	 * @param   string  $password
	 * @return  boolean
	 */
	public function check_password($password)
	{
		if($this->user === FALSE)
		{
			// nothing to compare
			return FALSE;
		}

		$hash = $this->hash_password($password, $this->find_salt($this->user->password));

		return $hash == $this->user->password;
	}

	/**
	 * Convert a unique identifier string to a user object
	 *
	 * @param mixed $user
	 * @return Model_User
	 */
	protected function _get_object($user)
	{
		static $current;

		//make sure the user is loaded only once.
		if( ! is_object($current) AND is_string($user))
		{
			// Load the user
			$current = Jelly::select('user')->where('username', '=', $user)->load();
		}

		if($user instanceof Model_User AND $user->loaded())
		{
			$current = $user;
		}

		return $current;
	}
} // End Liauth_Jelly Driver

