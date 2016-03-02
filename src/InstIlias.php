<?php
namespace InstILIAS;

class InstIlias {
	protected $install_config_file_path;
	protected $install_config_file_data;
	protected $parser;
	protected $ilias_configurator;
	protected $git_hub;

	public function __construct($install_config_file_path, $parser, $ilias_configurator, $git_hub) {
		$this->install_config_file_path = $install_config_file_path;
		$this->parser = $parser;
		$this->ilias_configurator = $ilias_configurator;
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

	}
}