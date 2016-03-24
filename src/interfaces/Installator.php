<?php
namespace InstILIAS\interfaces;

/**
 * Interface for installing ILIAS with a client.
 *
 * TODO: We might want to add comments for the methods which are allowed
 *       to use the global $ilDB to at least document the steps in the dance
 *       in comments.
 *
 * @author Stefan Hecken <stefan.hecken@concepts-and-training.de>
 */
interface Installator {
	/**
	 * Write the client.ini.
	 *
	 * @return	null
	 */
	public function writeClientIni();

	/**
	 * Write the ilias.ini.
	 *
	 * @return	null
	 */
	public function writeIliasIni();

	/**
	 * Install Database.
	 *
	 * @return	null
	 */
	public function installDatabase();

	/**
	 * Open connection to the database.
	 *
	 * ATTENTION: This should also define the global $ilDB.
	 *
	 * @return	null
	 */
	public function connectDatabase();

	/**
	 * Get the handle to the database.
	 *
	 * @return	null
	 */
	public function getDatabaseHandle();
	
	/**
	 * Apply hotfixes to the database.
	 *
	 * @param	\ilDBUpdate		$db_updater
	 * @return	null
	 */
	public function applyHotfixes(\ilDBUpdate $db_updater);
	
	/**
	 * Apply updates to the database.
	 *
	 * @param	\ilDBUpdate		$db_updater
	 * @return	null
	 */
	public function applyUpdates(\ilDBUpdate $db_updater);
	
	/**
	 * Install languages.
	 *
	 * @param	ilLanguage		$lng	handles the installing process
	 * @return	null
	 */
	public function installLanguages(\ilLanguage $lng);

	/**
	 * Set the usage of a proxy.
	 *
	 * TODO: I guess this could have a better name like setProxySettings?
	 *
	 * @return	null
	 */
	public function setProxy();

	/**
	 * Do not register this installation for an ILIAS NIC.
	 *
	 * @return	null
	 */
	public function registerNoNic();

	/**
	 * Set the factory for password encoders.
	 *
	 * @param	ilUserPasswordEncoderFactory	$encoder_factory
	 * @return	null
	 */
	public function setPasswordEncoder(ilUserPasswordEncoderFactory $encoder_factory);

	/**
	 * Finish the ILIAS setup process.
	 *
	 * @return	null
	 */
	public function finishSetup();

	/**
	 * set all configs files
	 *
	 * TODO: This seems odd. We might want to pass just one config to the
	 *       constructor.
	 *
	 * @return	null
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