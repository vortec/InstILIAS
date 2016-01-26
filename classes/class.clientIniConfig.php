<?php
/**
*
*
*/
require_once("abstracts/baseConfig.php");

class clientIniConfig extends baseConfig {
	protected $client_name;

	public function __construct() {
		
	}

	/**
	* sets the name of the client
	*
	* @param string
	*/
	public function setClientName($client_name) {
		assert(is_string($client_name));

		$this->client_name = $client_name;
	}

	/**
	* gets the name of the client
	*
	* @return string
	*/
	public function clientName() {
		return $this->client_name;
	}
}