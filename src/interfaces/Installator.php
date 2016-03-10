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
	* open connection to DB
	* define global $ilDB
	*/
	public function connectDatabase();

	/**
	* return database handle
	*/
	public function getDatabaseHandle();

	public function applyUpdates($db_updater);
	public function applyHotfixes($db_updater);

	/**
	* install languages
	*/
	public function installLanguages($lng);

	/**
	* set the default language
	*/
	public function setDefaultLanguage();

	/**
	* set usage of proxy
	*/
	public function setProxy();

	/**
	* perform registration for an ILIAS nic
	*/
	public function registerNoNic();

	/**
	* sets the Password Encoder
	*/
	public function setPasswordEncoder();

	/**
	* finish the ILIAS setup
	*/
	public function finishSetup();

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