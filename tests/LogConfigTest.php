<?php

class LogConfigTest extends PHPUnit_Framework_TestCase{
	public function setUp() {
		$this->log_config = new \InstILIAS\Config\Log();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("\\InstILIAS\\Config\\Log", $this->log_config);
	}

	/**
	* @dataProvider setPathProvider
	*/
	public function test_setPath($path) {
		$this->log_config->setPath($path);

		$this->assertEquals($this->log_config->path(), $path);
		$this->assertInternalType("string", $this->log_config->path());
	}

	/**
	* @dataProvider setFileNameProvider
	*/
	public function test_setFileName($file_name) {
		$this->log_config->setFileName($file_name);

		$this->assertEquals($this->log_config->fileName(), $file_name);
		$this->assertInternalType("string", $this->log_config->fileName());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($path, $file_name) {
		$this->log_config->setPath($path);
		$this->log_config->setFileName($file_name);

		$all_properties = $this->log_config->getPropertiesOf();

		$this->assertEquals($all_properties["path"], $path);
		$this->assertInternalType("string", $all_properties["path"]);

		$this->assertEquals($all_properties["file_name"], $file_name);
		$this->assertInternalType("string", $all_properties["file_name"]);
	}

	public function setPathProvider() {
		return array(array("ilias.log"));
	}

	public function setFileNameProvider() {
		return array(array("/var/logs/ilias"));
	}

	public function getAllPropertiesProvider() {
		return array(array("ilias.log","/var/logs/ilias"));
	}
}
