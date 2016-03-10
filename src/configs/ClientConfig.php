<?php
namespace InstILIAS\configs;
/**
*
*
*/

class ClientConfig extends \InstILIAS\abstracts\BaseConfig {
	protected $data_dir;
	protected $default_name;
	protected $default_password_encoder;
	const NAME = "client";

	/**
	* sets the data_dir
	*
	* @param string
	*/
	public function setDataDir($data_dir) {
		assert(is_string($data_dir));

		$this->data_dir = $data_dir;
	}

	/**
	* gets the data_dir
	*
	* @return string
	*/
	public function dataDir() {
		return $this->data_dir;
	}

	/**
	* sets the default_name
	*
	* @param string
	*/
	public function setDefaultName($default_name) {
		assert(is_string($default_name));

		$this->default_name = $default_name;
	}

	/**
	* gets the default_name
	*
	* @return string
	*/
	public function defaultName() {
		return $this->default_name;
	}

	/**
	* sets the default_password_encoder
	*
	* @param string
	*/
	public function setDefaultPasswordEncoder($default_password_encoder) {
		assert(is_string($default_password_encoder));

		$this->default_password_encoder = $default_password_encoder;
	}

	/**
	* gets the default_password_encoder
	*
	* @return string
	*/
	public function defaultPasswordEncoder() {
		return $this->default_password_encoder;
	}
}