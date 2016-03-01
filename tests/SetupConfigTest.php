<?php

class SetupConfigTest extends PHPUnit_Framework_TestCase{
	public function setUp() {
		$this->setup_config = new \InstILIAS\configs\SetupConfig();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("\InstILIAS\configs\SetupConfig", $this->setup_config);
	}

	/**
	* @dataProvider setHTTPPathProvider
	*/
	public function test_setpasswd($passwd) {
		$this->setup_config->setPasswd($passwd);

		$this->assertEquals($this->setup_config->passwd(), $passwd);
		$this->assertInternalType("string", $this->setup_config->passwd());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($passwd) {
		$this->setup_config->setPasswd($passwd);

		$all_properties = $this->setup_config->getPropertiesOf();

		$this->assertEquals($all_properties["passwd"], $passwd);
		$this->assertInternalType("string", $all_properties["passwd"]);
	}

	public function setHTTPPathProvider() {
		return array(array("pusteblume"));
	}

	public function getAllPropertiesProvider() {
		return array(array("http://localhost/44generali2","/Library/WebServer/Documents/44generali2","Europe/Berlin"));
	}
}