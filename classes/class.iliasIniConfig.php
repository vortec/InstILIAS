<?php
/**
*
*
*/
require_once("abstracts/baseConfig.php");

class iliasIniConfig extends baseConfig {
	protected $server_config;
	protected $client_config;
	protected $setup_config;
	protected $tools_config;
	protected $log_config;

	public function __construct() {
		
	}

	/**
	* sets the server_config
	*
	* @param iliasIniServerConfig
	*/
	public function setServerConfig(iliasIniServerConfig $server_config) {
		assert(is_string($server_config));

		$this->server_config = $server_config;
	}

	/**
	* gets the server_config
	*
	* @return iliasIniServerConfig
	*/
	public function serverConfig() {
		return $this->server_config;
	}

	/**
	* sets the client_config
	*
	* @param iliasIniClientConfig
	*/
	public function setClientConfig(iliasIniClientConfig $client_config) {
		assert(is_string($client_config));

		$this->client_config = $client_config;
	}

	/**
	* gets the client_config
	*
	* @return iliasIniClientConfig
	*/
	public function clientConfig() {
		return $this->client_config;
	}

	/**
	* sets the setup_config
	*
	* @param iliasIniSetupConfig
	*/
	public function setSetupConfig(iliasIniSetupConfig $setup_config) {
		assert(is_string($setup_config));

		$this->setup_config = $setup_config;
	}

	/**
	* gets the setup_config
	*
	* @return iliasIniSetupConfig
	*/
	public function setupConfig() {
		return $this->setup_config;
	}

	/**
	* sets the tools_config
	*
	* @param iliasIniToolsConfig
	*/
	public function setToolsConfig(iliasIniToolsConfig $tools_config) {
		assert(is_string($tools_config));

		$this->tools_config = $tools_config;
	}

	/**
	* gets the tools_config
	*
	* @return iliasIniToolsConfig
	*/
	public function toolsConfig() {
		return $this->tools_config;
	}

	/**
	* sets the log_config
	*
	* @param iliasIniLogConfig
	*/
	public function setLogConfig(iliasIniLogConfig $log_config) {
		assert(is_string($log_config));

		$this->log_config = $log_config;
	}

	/**
	* gets the log_config
	*
	* @return iliasIniLogConfig
	*/
	public function logConfig() {
		return $this->log_config;
	}
}