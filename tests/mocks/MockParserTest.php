<?php
require_once("mocks/mockParser.php");

class MockParserTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->parser = new mockParser();
	}

	public function test_parseConfigString() {
		$this->parser->parseConfigString("Text");

		$this->assertTrue(!empty($this->parser->getConfigData()));
		$this->assertInternalType("array", $this->parser->getConfigData());
	}

	public function test_readIliasIniConfig() {
		$ilias_ini_config = $this->parser->readIliasIniConfig();
		$this->assertIntanceOf("iliasIniConfig", $ilias_ini_config);
	}

	public function test_readClientIniConfig() {
		$client_ini_config = $this->parser->readClientIniConfig();
		$this->assertIntanceOf("clientIniConfig", $ilias_ini_config);
	}

	public function test_readGitHubConfig() {
		$git_hub_config = $this->parser->readGitHubConfig();
		$this->assertIntanceOf("gitHubConfig", $git_hub_config);
	}

	public function test_readClientIniDBConfig() {
		$client_ini_db_config = $this->parser->readClientIniDBConfig();
		$this->assertIntanceOf("clientIniDbConfig", $client_ini_db_config);
	}

	public function test_readClientIniLanguageConfig() {
		$client_ini_language_config = $this->parser->readClientIniLanguageConfig();
		$this->assertIntanceOf("clientIniLanguageConfig", $client_ini_language_config);
	}

	public function readIliasIniClientConfig() {
		$ilias_ini_client_config = $this->parser->readIliasIniClientConfig();
		$this->assertIntanceOf("iliasIniClientConfig", $ilias_ini_client_config);
	}

	public function readIliasIniLogConfig() {
		$ilias_ini_log_config = $this->parser->readIliasIniLogConfig();
		$this->assertIntanceOf("iliasIniLogConfig", $ilias_ini_log_config);
	}

	public function readIliasIniServerConfig() {
		$ilias_ini_server_config = $this->parser->readIliasIniServerConfig();
		$this->assertIntanceOf("iliasIniServerConfig", $ilias_ini_server_config);
	}

	public function readIliasIniSetupConfig() {
		$ilias_ini_setup_config = $this->parser->readIliasIniSetupConfig();
		$this->assertIntanceOf("iliasIniSetupConfig", $ilias_ini_setup_config);
	}

	public function readIliasIniToolsConfig() {
		$ilias_ini_tools_config = $this->parser->readIliasIniToolsConfig();
		$this->assertIntanceOf("iliasIniToolsConfig", $ilias_ini_tools_config);
	}
}