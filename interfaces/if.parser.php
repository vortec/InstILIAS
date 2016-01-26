<?php
/**
*
*
*/

interface parser{
	public function parseConfigString($config_string);
	public function readIniConfig();
	public function readClientConfig();
	public function readDBConfig();
	public function readGitHubConfig();
	public function getConfigData();
}