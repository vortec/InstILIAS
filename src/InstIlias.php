<?php
namespace InstILIAS;

class InstIlias {
	protected $install_config_file_path;
	protected $install_config_file_data;
	protected $parser;
	protected $ilias_installator;
	protected $git_hub;

	public function __construct($install_config_file_path, $parser, $ilias_installator, $git_hub) {
		$this->install_config_file_path = $install_config_file_path;
		$this->parser = $parser;
		$this->ilias_installator = $ilias_installator;
		$this->git_hub = $git_hub;

		$this->readInstallConfigData();
		$this->run();
	}

	protected function readInstallConfigData() {
		if(!file_exists($this->install_config_file_path)) {
			throw new Exception("InstIlias::readInstallConfigData: file not found ".$this->install_config_file_path);
		}

		$this->install_config_file_data = file_get_contents($this->install_config_file_path);
	}

	protected function run() {
		$this->cloneIlias();
	}

	protected function cloneIlias() {
		$this->git_hub->cloneGitTo($this->gitHubConfig()->gitUrl(), $this->server_config()->absolutePath());
		$this->git_hub->checkoutBranch($this->gitHubConfig()->gitBranchName(), $this->server_config()->absolutePath());
	}

	protected function writeIliasConfig() {

	}

	protected function serverConfig() {
		if($this->server_config === null) {
			$this->server_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\ServerConfig");
		}

		return $this->server_config;
	}

	protected function gitHubConfig() {
		if($this->git_hub_config === null) {
			$this->git_hub_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\GitHubConfig");
		}

		return $this->git_hub_config;
	}
}