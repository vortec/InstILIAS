<?php
namespace InstILIAS_Tests;

require_once("mocks/MockParser.php");

class MockParserTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->parser = new MockParser();
	}

	/**
	* @dataProvider readConfigProvider
	*/
	public function test_readConfig($string, $class) {
		$obj = $this->parser->read_config($string, $class);

		$this->assertInstanceOf($class, $obj);
	}

	/**
	* @dataProvider readConfigNoFileProvider
	* @expectedException LogicException
	*/
	public function test_readConfigNoFile($string, $class) {
		$obj = $this->parser->read_config($string, $class);
	}

	public function readConfigProvider() {
		return array(array("asas", "ClientConfig")
					, array("asas", "DbConfig")
					, array("asas", "GitHubConfig")
					, array("asas", "LanguageConfig")
					, array("asas", "ServerConfig")
					, array("asas", "SetupConfig")
					, array("asas", "ToolsConfig")
				);
	}

	public function readConfigNoFileProvider() {
		return array(array("asas", "Client")
					, array("asas", "Db")
					, array("asas", "GitHub")
					, array("asas", "Language")
					, array("asas", "Server")
					, array("asas", "Setup")
					, array("asas", "Tools")
				);
	}

}