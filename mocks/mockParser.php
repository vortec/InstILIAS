<?php
require_once("../intefaces/if.parser.php");
require_once("mockIniConfig.php");
require_once("mockClientConfig.php");
require_once("mockDBConfig.php");
require_once("mockGitHubConfig.php");

class mockParser implements parser {
	protected $config_data;

	public function parseConfigString($config_string) {
		$this->config_data = array("Pusteblume"=>"Ist toll");
	}

	public function readIniConfig() {
		return new mockIniConfig();
	}

	public function readClientConfig() {
		return new mockClientConfig();
	}

	public function readDBConfig() {
		return new mockDBConfig();
	}

	public function readGitHubConfig() {
		return new mockGitHubConfig();
	}
}