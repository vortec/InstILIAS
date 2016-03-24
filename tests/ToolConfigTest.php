<?php

class ToolConfigTest extends PHPUnit_Framework_TestCase{
	public function setUp() {
		$this->tools_config = new \InstILIAS\Config\ToolsConfig();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("\InstILIAS\Config\ToolsConfig", $this->tools_config);
	}

	/**
	* @dataProvider setConvertProvider
	*/
	public function test_setConvert($convert) {
		$this->tools_config->setConvert($convert);

		$this->assertEquals($this->tools_config->convert(), $convert);
		$this->assertInternalType("string", $this->tools_config->convert());
	}

	/**
	* @dataProvider setZipProvider
	*/
	public function test_setZip($zip) {
		$this->tools_config->setZip($zip);

		$this->assertEquals($this->tools_config->zip(), $zip);
		$this->assertInternalType("string", $this->tools_config->zip());
	}

	/**
	* @dataProvider setUnzipProvider
	*/
	public function test_setUnzip($unzip) {
		$this->tools_config->setUnzip($unzip);

		$this->assertEquals($this->tools_config->unzip(), $unzip);
		$this->assertInternalType("string", $this->tools_config->unzip());
	}

	/**
	* @dataProvider setJavaProvider
	*/
	public function test_setJava($java) {
		$this->tools_config->setJava($java);

		$this->assertEquals($this->tools_config->java(), $java);
		$this->assertInternalType("string", $this->tools_config->java());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($convert, $zip, $unzip ,$java) {
		$this->tools_config->setConvert($convert);
		$this->tools_config->setZip($zip);
		$this->tools_config->setUnzip($unzip);
		$this->tools_config->setJava($java);

		$all_properties = $this->tools_config->getPropertiesOf();

		$this->assertEquals($all_properties["convert"], $convert);
		$this->assertInternalType("string", $all_properties["convert"]);

		$this->assertEquals($all_properties["zip"], $zip);
		$this->assertInternalType("string", $all_properties["zip"]);

		$this->assertEquals($all_properties["unzip"], $unzip);
		$this->assertInternalType("string", $all_properties["unzip"]);

		$this->assertEquals($all_properties["java"], $java);
		$this->assertInternalType("string", $all_properties["java"]);
	}

	public function setConvertProvider() {
		return array(array("/opt/ImageMagick"));
	}

	public function setZipProvider() {
		return array(array("/usr/bin/zip"));
	}

	public function setUnzipProvider() {
		return array(array("/usr/bin/unzip"));
	}

	public function setJavaProvider() {
		return array(array("/usr/bin/java"));
	}

	public function getAllPropertiesProvider() {
		return array(array("/opt/ImageMagick","/usr/bin/zip","/usr/bin/unzip","/usr/bin/java"));
	}
}
