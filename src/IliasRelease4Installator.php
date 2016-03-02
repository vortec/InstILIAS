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

	public function __construct($ilias_path) {
		$this->ilias_path = $ilias_path;

		require_once($ilias_path."setup/classes/class.ilSetup.php");
		$this->setup = new ilSetup(true,"admin");
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
		$this->setup->saveMasterSetup($this->getIliasIniData());
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
}