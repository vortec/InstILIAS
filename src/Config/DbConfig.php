<?php
namespace InstILIAS\Config;
/**
*
*
*/

class DbConfig extends \InstILIAS\abstracts\BaseConfig {
	protected $host;
	protected $database;
	protected $user;
	protected $passwd;
	protected $encoding;
	protected $type;
	const NAME = "db";

	/**
	* sets the host
	*
	* @param string
	*/
	public function setHost($host) {
		assert(is_string($host));

		$this->host = $host;
	}

	/**
	* gets the host
	*
	* @return string
	*/
	public function host() {
		return $this->host;
	}

	/**
	* sets the database
	*
	* @param string
	*/
	public function setDatabase($database) {
		assert(is_string($database));

		$this->database = $database;
	}

	/**
	* gets the database
	*
	* @return string
	*/
	public function database() {
		return $this->database;
	}

	/**
	* sets the user
	*
	* @param string
	*/
	public function setUser($user) {
		assert(is_string($user));

		$this->user = $user;
	}

	/**
	* gets the user
	*
	* @return string
	*/
	public function user() {
		return $this->user;
	}

	/**
	* sets the passwd
	*
	* @param string
	*/
	public function setPasswd($passwd) {
		assert(is_string($passwd));

		$this->passwd = $passwd;
	}

	/**
	* gets the passwd
	*
	* @return string
	*/
	public function passwd() {
		return $this->passwd;
	}

	/**
	* sets the encoding
	*
	* @param string
	*/
	public function setEncoding($encoding) {
		assert(is_string($encoding));

		$this->encoding = $encoding;
	}

	/**
	* gets the encoding
	*
	* @return string
	*/
	public function encoding() {
		return $this->encoding;
	}

	/**
	* set the type of DB
	*
	* @param $type 		string
	*/
	public function setType($type) {
		assert(is_string($type));

		$this->type = $type;
	}

	/**
	* gets the type of DB
	*
	* @return string
	*/
	public function type() {
		return $this->type;
	}
}
