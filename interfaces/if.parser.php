<?php
/**
*
*
*/

interface parser{
	public function parseConfigString($config_string);
	public function readIniConfig();
	public function readClientConfig();
	public function readGitHubConfig();
	public function getConfigData();

	/****************************************
	*
	* Client Ini Sub Configs
	*
	****************************************/
	public function readDBConfig();
	public function readLanguageConfig();

	/****************************************
	*
	* ILIAS Ini Sub Configs
	*
	****************************************/
	public function readIliasIniClientConfig();
	public function readIliasIniLogConfig();
	public function readIliasIniServerConfig();
	public function readIliasIniSetupConfig();
	public function readIliasIniToolsConfig();
}