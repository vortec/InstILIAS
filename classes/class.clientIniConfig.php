<?php
/**
*
*
*/
require_once("abstracts/baseConfig.php");

class clientIniConfig extends baseConfig {
	protected $client_name;
	protected $db_config;
	protected $language_config;

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

	/**
	* sets the db_config
	*
	* @param clientIniDbConfig
	*/
	public function setDbConfig(clientIniDbConfig $db_config) {
		assert(is_string($db_config));

		$this->db_config = $db_config;
	}

	/**
	* gets the db_config
	*
	* @return clientIniDbConfig
	*/
	public function dbConfig() {
		return $this->db_config;
	}

	/**
	* sets the language_config
	*
	* @param clientIniLanguageConfig
	*/
	public function setLanguageConfig(clientIniLanguageConfig $language_config) {
		assert(is_string($language_config));

		$this->language_config = $language_config;
	}

	/**
	* gets the language_config
	*
	* @return clientIniLanguageConfig
	*/
	public function languageConfig() {
		return $this->language_config;
	}
}