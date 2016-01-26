<?php
require_once("interfaces/if.parser.php");
require_once("classes/class.iliasIniConfig.php");
require_once("classes/class.ClientIniConfig.php");
require_once("classes/class.dbConfig.php");
require_once("classes/class.gitHubConfig.php");
require_once("classes/class.languageConfig.php");

class mockParser implements parser {
	protected $config_data;

	public function parseConfigString($config_string) {
		$this->config_data = array("test"=>"huhu");
	}

	public function readIniConfig() {
		return new iliasIniConfig();
	}

	public function readClientConfig() {
		return new clientIniConfig();
	}

	public function readDBConfig() {
		return new dbConfig();
	}

	public function readGitHubConfig() {
		return new gitHubConfig();
	}

	public function readLanguageConfig() {
		return new languageConfig();
	}

	public function getConfigData() {
		return $this->config_data;
	}
}