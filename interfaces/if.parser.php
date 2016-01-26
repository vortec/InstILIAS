<?php
/**
*
*
*/

interface parser{
	public function parseConfigString($config_string);
	public function readIliasIniConfig();
	public function readClientIniConfig();
	public function readGitHubConfig();
	public function getConfigData();

	/****************************************
	*
	* Client Ini Sub Configs
	*
	****************************************/
	public function readClientIniDBConfig();
	public function readClientIniLanguageConfig();

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