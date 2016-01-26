<?php
require_once("interfaces/if.parser.php");
require_once("classes/class.iliasIniConfig.php");
require_once("classes/class.ClientIniConfig.php");
require_once("classes/class.gitHubConfig.php");

require_once("classes/clientIniSubConfigs/class.clientIniDbConfig.php");
require_once("classes/clientIniSubConfigs/class.clientIniLanguageConfig.php");

require_once("classes/iliasIniSubConfigs/class.iliasIniClientConfig.php");
require_once("classes/iliasIniSubConfigs/class.iliasIniLogConfig.php");
require_once("classes/iliasIniSubConfigs/class.iliasIniServerConfig.php");
require_once("classes/iliasIniSubConfigs/class.iliasIniSetupConfig.php");
require_once("classes/iliasIniSubConfigs/class.iliasIniToolsConfig.php");

class mockParser implements parser {
	protected $config_data;

	public function parseConfigString($config_string) {
		$this->config_data = array("test"=>"huhu");
	}

	public function readIliasIniConfig() {
		return new iliasIniConfig();
	}

	public function readClientIniConfig() {
		return new clientIniConfig();
	}

	public function readGitHubConfig() {
		return new gitHubConfig();
	}

	public function getConfigData() {
		return $this->config_data;
	}

	/****************************************
	*
	* Client Ini Sub Configs
	*
	****************************************/
	public function readClientIniDBConfig() {
		return new clientIniDbConfig();
	}

	public function readClientIniLanguageConfig() {
		return new clientIniLanguageConfig();
	}

	/****************************************
	*
	* ILIAS Ini Sub Configs
	*
	****************************************/
	public function readIliasIniClientConfig() {
		return new iliasIniClientConfig();
	}

	public function readIliasIniLogConfig() {
		return new iliasIniLogConfig();
	}

	public function readIliasIniServerConfig() {
		return new iliasIniServerConfig();
	}

	public function readIliasIniSetupConfig() {
		return new iliasIniSetupConfig();
	}

	public function readIliasIniToolsConfig() {
		return new iliasIniToolsConfig();
	}
}