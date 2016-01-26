<?php
require_once("interfaces/if.parser.php");
require_once("mocks/mockIniConfig.php");
require_once("mocks/mockClientIniConfig.php");
require_once("mocks/mockDBConfig.php");
require_once("mocks/mockGitHubConfig.php");

class mockParser implements parser {
	protected $config_data;

	public function parseConfigString($config_string) {
		$this->config_data = array("test"=>"huhu");
	}

	public function readIniConfig() {
		return new mockIniConfig();
	}

	public function readClientConfig() {
		return new mockClientIniConfig();
	}

	public function readDBConfig() {
		return new mockDBConfig();
	}

	public function readGitHubConfig() {
		return new mockGitHubConfig();
	}

	public function getConfigData() {
		return $this->config_data;
	}
}