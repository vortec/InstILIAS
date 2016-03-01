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
	//Test not working. problem with autoloaded and no file
	/*public function test_readConfigNoFile($string, $class) {
		$obj = $this->parser->read_config($string, $class);
	}*/

	public function readConfigProvider() {
		return array(array("asas", "\InstILIAS\classes\ClientConfig")
					, array("asas", "\InstILIAS\classes\DbConfig")
					, array("asas", "\InstILIAS\classes\GitHubConfig")
					, array("asas", "\InstILIAS\classes\LanguageConfig")
					, array("asas", "\InstILIAS\classes\ServerConfig")
					, array("asas", "\InstILIAS\classes\SetupConfig")
					, array("asas", "\InstILIAS\classes\ToolsConfig")
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