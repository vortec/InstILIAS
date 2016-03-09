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

	protected $setup;
	protected $ilias_path;
	protected $db_update;

	public function __construct($ilias_path, $setup, $db_update) {
		$this->ilias_path = $ilias_path;
		$this->setup = $setup;
		$this->db_update = $db_update;
	}

	/**
	* @inheritdoc
	*/
	public function writeClientIni() {
		$ret = $this->getClientIniData();

		$this->setup->ini_client_exists = $this->setup->newClient($ret["client_id"]);
		$this->setup->getClient()->setId($ret["client_id"]);
		$this->setup->getClient()->setName($ret["client_id"]);
		$this->setup->getClient()->setDbHost($ret["db_host"]);
		$this->setup->getClient()->setDbName($ret["db_name"]);
		$this->setup->getClient()->setDbUser($ret["db_user"]);
		$this->setup->getClient()->setDbPort($ret["db_port"]);
		$this->setup->getClient()->setDbPass($ret["db_pass"]);
		$this->setup->getClient()->setDbType($ret["db_type"]);
		$this->setup->getClient()->setDSN();

		$this->setup->saveNewClient();
	}

	/**
	* @inheritdoc
	*/
	public function writeIliasIni() {
		global $ilCtrlStructureReader;
		$this->setup->saveMasterSetup($this->getIliasIniData());
		$ilCtrlStructureReader->setIniFile($this->setup->ini);

	}

	/**
	* @inheritdoc
	*/
	public function installDatabase() {
		$this->setup->createDatabase($this->db_config->encoding());
		$this->setup->installDatabase();
	}

	public function connectDatabase() {
		$this->setup->getClient()->connect();
	}

	public function applyHotfixes($db_updater) {
		$db_updater->applyHotfix();
	}

	public function applyUpdates($db_updater) {
		$db_updater->applyUpdate();
	}

	/**
	* @inheritdoc
	*/
	public function installLanguages($lng) {
		$lng->installLanguages($this->language_config->toInstallLangs(), array());
	}

	public function setDefaultLanguage() {
		$this->setup->getClient()->setDefaultLanguage($this->language_config->defaultLang());
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

	protected function getIliasIniData() {
		$ret = array();

		$ret["datadir_path"] = $this->client_config->dataDir();
		$ret["log_path"] = $this->log_config->path();
		$ret["time_zone"] = $this->server_config->timezone();
		$ret["convert_path"] = $this->tools_config->convert();
		$ret["zip_path"] = $this->tools_config->zip();
		$ret["unzip_path"] = $this->tools_config->unzip();
		$ret["java_path"] = $this->tools_config->java();
		$ret["setup_pass"] = $this->setup_config->passwd();

		return $ret;
	}

	protected function getClientIniData() {
		$ret = array();

		$ret["client_id"] = $this->client_config->defaultName();
		$ret["db_host"] = $this->db_config->host();
		$ret["db_name"] = $this->db_config->database();
		$ret["db_user"] = $this->db_config->user();
		$ret["db_pass"] = $this->db_config->passwd();
		$ret["db_type"] = $this->db_config->type();

		return $ret;
	}
}