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
		return array
			( array("asas", "\\InstILIAS\\Config\\Client")
			, array("asas", "\\InstILIAS\\Config\\DB")
			, array("asas", "\\InstILIAS\\Config\\IliasGit")
			, array("asas", "\\InstILIAS\\Config\\Language")
			, array("asas", "\\InstILIAS\\Config\\Server")
			, array("asas", "\\InstILIAS\\Config\\Setup")
			, array("asas", "\\InstILIAS\\Config\\Tools")
			);
	}

	public function readConfigNoFileProvider() {
		return array
			( array("asas", "Client")
			, array("asas", "DB")
			, array("asas", "Git")
			, array("asas", "Language")
			, array("asas", "Server")
			, array("asas", "Setup")
			, array("asas", "Tools")
			);
	}

}
