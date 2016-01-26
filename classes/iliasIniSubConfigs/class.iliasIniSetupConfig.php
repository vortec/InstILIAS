<?php
/**
*
*
*/
require_once("abstracts/baseConfig.php");

class iliasIniSetupConfig extends baseConfig {
	protected $passwd;

	protected $config_group = "setup";

	public function __construct() {
		
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
	* gets the config_group
	*
	* @return string
	*/
	public function configGroup() {
		return $this->config_group;
	}
}