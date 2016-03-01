<?php
namespace InstILIAS\configs;
/**
*
*
*/

class ClientConfig extends \InstILIAS\abstracts\BaseConfig {
	protected $data_dir;
	protected $default_name;
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
}