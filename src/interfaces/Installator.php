<?php
namespace InstILIAS\interfaces;

/**
* intefgace for installing an ilias
*
* @author Stefan Hecken <stefan.hecken@concepts-and-training.de>
*/

interface Installator{
	/**
	* copy and write the client ini
	*/
	public function writeClientIni();

	/**
	* copy and write the ilias ini
	*/
	public function writeIliasIni();

	/**
	* install database
	*/
	public function installDatabase();

	/**
	* install languages
	*/
	public function installLanguages();

	/**
	* set all configs files
	*/
	public function setConfigFiles(\InstILIAS\configs\ClientConfig $client_config, \InstILIAS\configs\DbConfig $db_config, \InstILIAS\configs\LanguageConfig $language_config
								, \InstILIAS\configs\LogConfig $log_config, \InstILIAS\configs\ServerConfig $server_config, \InstILIAS\configs\SetupConfig $setup_config
								, \InstILIAS\configs\ToolsConfig $tools_config);

	public function setClientConfig(\InstILIAS\configs\ClientConfig $client_config);
	public function setDbConfig(\InstILIAS\configs\DbConfig $db_config);
	public function setLanguageConfig(\InstILIAS\configs\LanguageConfig $language_config);
	public function setLogConfig(\InstILIAS\configs\LogConfig $log_config);
	public function setServerConfig(\InstILIAS\configs\ServerConfig $server_config);
	public function setSetupConfig(\InstILIAS\configs\SetupConfig $setup_config);
	public function setToolsConfig(\InstILIAS\configs\ToolsConfig $tools_config);
}