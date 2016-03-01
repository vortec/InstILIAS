<?php
namespace InstILIAS\classes;

/**
*
*
*/

class ServerConfig extends \InstILIAS\abstracts\BaseConfig {
	protected $http_path;
	protected $absolute_path;
	protected $timezone;

	protected $config_group = "server";

	/**
	* sets the http_path
	*
	* @param string
	*/
	public function setHttpPath($http_path) {
		assert(is_string($http_path));

		$this->http_path = $http_path;
	}

	/**
	* gets the http_path
	*
	* @return string
	*/
	public function httpPath() {
		return $this->http_path;
	}

	/**
	* sets the absolute_path
	*
	* @param string
	*/
	public function setAbsolutePath($absolute_path) {
		assert(is_string($absolute_path));

		$this->absolute_path = $absolute_path;
	}

	/**
	* gets the absolute_path
	*
	* @return string
	*/
	public function absolutePath() {
		return $this->absolute_path;
	}

	/**
	* sets the timezone
	*
	* @param string
	*/
	public function setTimezone($timezone) {
		assert(is_string($timezone));

		$this->timezone = $timezone;
	}

	/**
	* gets the timezone
	*
	* @return string
	*/
	public function timezone() {
		return $this->timezone;
	}

	/**
	* gets the config_group
	*
	* @return string
	*/
	public function configGroup() {
		return $this->config_group;
	}
}