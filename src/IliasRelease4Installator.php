<?php
namespace InstILIAS;

/**
* implementation of an ilias installator for release 4.*
*
* @author Stefan Hecken <stefan.hecken@concepts-and-training.de>
*/

class IliasRelease4Installator implements \InstILIAS\interfaces\Installator {
	protected $client_config;
	protected $db_config;
	protected $language_config;
	protected $log_config;
	protected $server_config;
	protected $setup_config;
	protected $tools_config;

	/**
	* @inheritdoc
	*/
	public function writeClientIni() {

	}

	/**
	* @inheritdoc
	*/
	public function writeIliasIni() {

	}

	/**
	* @inheritdoc
	*/
	public function installDatabase() {

	}

	/**
	* @inheritdoc
	*/
	public function installLanguages() {

	}

	/**
	* @inheritdoc
	*/
	public function setConfigFiles(\InstILIAS\configs\ClientConfig $client_config, \InstILIAS\configs\DbConfig $db_config, \InstILIAS\configs\LanguageConfig $language_config
								, \InstILIAS\configs\LogConfig $log_config, \InstILIAS\configs\ServerConfig $server_config, \InstILIAS\configs\SetupConfig $setup_config
								, \InstILIAS\configs\ToolsConfig $tools_config)
	{
		$this->client_config = $client_config;
		$this->db_config = $db_config;
		$this->language_config = $language_config;
		$this->log_config = $log_config;
		$this->server_config = $server_config;
		$this->setup_config = $setup_config;
		$this->tools_config = $tools_config;
	}

	public function setClientConfig(\InstILIAS\configs\ClientConfig $client_config) {
		$this->client_config = $client_config;
	}

	public function setDbConfig(\InstILIAS\configs\DbConfig $db_config) {
		$this->db_config = $db_config;
	}

	public function setLanguageConfig(\InstILIAS\configs\LanguageConfig $language_config) {
		$this->language_config = $language_config;
	}

	public function setLogConfig(\InstILIAS\configs\LogConfig $log_config) {
		$this->log_config = $log_config;
	}

	public function setServerConfig(\InstILIAS\configs\ServerConfig $server_config) {
		$this->server_config = $server_config;
	}

	public function setSetupConfig(\InstILIAS\configs\SetupConfig $setup_config) {
		$this->setup_config = $setup_config;
	}

	public function setToolsConfig(\InstILIAS\configs\ToolsConfig $tools_config) {
		$this->tools_config = $tools_config;
	}
}