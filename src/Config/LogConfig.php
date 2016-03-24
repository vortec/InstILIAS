<?php
namespace InstILIAS\Config;

/**
*
*
*/

class LogConfig extends \InstILIAS\abstracts\BaseConfig {
	protected $path;
	protected $file_name;
	const NAME = "log";

	/**
	* sets the path
	*
	* @param string
	*/
	public function setPath($path) {
		assert(is_string($path));

		$this->path = $path;
	}

	/**
	* gets the path
	*
	* @return string
	*/
	public function path() {
		return $this->path;
	}

	/**
	* sets the file_name
	*
	* @param string
	*/
	public function setFileName($file_name) {
		assert(is_string($file_name));

		$this->file_name = $file_name;
	}

	/**
	* gets the file_name
	*
	* @return string
	*/
	public function fileName() {
		return $this->file_name;
	}
}
