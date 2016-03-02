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
		$this->installIlias();
	}

	protected function cloneIlias() {
		$this->git_hub->cloneGitTo($this->gitHubConfig()->gitUrl(), $this->server_config()->absolutePath());
		$this->git_hub->checkoutBranch($this->gitHubConfig()->gitBranchName(), $this->server_config()->absolutePath());
	}

	protected function installIlias() {
		
	}

	protected function clientConfig() {
		if($this->client_config === null) {
			$this->client_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\ClientConfig");
		}

		return $this->client_config;
	}

	protected function dbConfig() {
		if($this->db_config === null) {
			$this->db_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\DbConfig");
		}

		return $this->db_config;
	}

	protected function gitHubConfig() {
		if($this->git_hub_config === null) {
			$this->git_hub_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\GitHubConfig");
		}

		return $this->git_hub_config;
	}

	protected function languageConfig() {
		if($this->language_config === null) {
			$this->language_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\LanguageConfig");
		}

		return $this->language_config;
	}

	protected function logConfig() {
		if($this->log_config === null) {
			$this->log_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\LogConfig");
		}

		return $this->log_config;
	}

	protected function serverConfig() {
		if($this->server_config === null) {
			$this->server_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\ServerConfig");
		}

		return $this->server_config;
	}

	protected function setupConfig() {
		if($this->setup_config === null) {
			$this->setup_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\SetupConfig");
		}

		return $this->setup_config;
	}

	protected function toolsConfig() {
		if($this->tools_config === null) {
			$this->tools_config = $this->parser->read_config($this->install_config_file_data, "\InstILIAS\configs\ToolsConfig");
		}

		return $this->tools_config;
	}
}