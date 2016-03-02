<?php
namespace InstILIAS;

/**
* implementation of an ilias installator
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

	public function __construct(configs\ClientConfig $client_config, configs\DbConfig $db_config, configs\LanguageConfig $language_config
								, configs\LogConfig $log_config, configs\ServerConfig $server_config, configs\SetupConfig $setup_config
								, configs\ToolsConfig $tools_config)
	{
		$this->client_config = $client_config;
		$this->db_config = $db_config;
		$this->log_config = $log_config;
		$this->server_config = $server_config;
		$this->setup_config = $setup_config;
		$this->tools_config = $tools_config;
	}

	/**
	* @inheritdoc
	*/
	public function checkoutIlias() {

	}

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
}