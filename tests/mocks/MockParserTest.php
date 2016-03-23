<?php

class MockParserTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->parser = new \InstILIAS\mocks\MockParser();
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
		return array(array("asas", "\InstILIAS\configs\ClientConfig")
					, array("asas", "\InstILIAS\configs\DbConfig")
					, array("asas", "\InstILIAS\configs\IliasGitConfig")
					, array("asas", "\InstILIAS\configs\LanguageConfig")
					, array("asas", "\InstILIAS\configs\ServerConfig")
					, array("asas", "\InstILIAS\configs\SetupConfig")
					, array("asas", "\InstILIAS\configs\ToolsConfig")
				);
	}

	public function readConfigNoFileProvider() {
		return array(array("asas", "Client")
					, array("asas", "Db")
					, array("asas", "Git")
					, array("asas", "Language")
					, array("asas", "Server")
					, array("asas", "Setup")
					, array("asas", "Tools")
				);
	}

}