<?php

class ServerConfigTest extends PHPUnit_Framework_TestCase{
	public function setUp() {
		$this->server_config = new \InstILIAS\configs\ServerConfig();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("\InstILIAS\configs\ServerConfig", $this->server_config);
	}

	/**
	* @dataProvider setHTTPPathProvider
	*/
	public function test_setPath($http_path) {
		$this->server_config->setHttpPath($http_path);

		$this->assertEquals($this->server_config->httpPath(), $http_path);
		$this->assertInternalType("string", $this->server_config->httpPath());
	}

	/**
	* @dataProvider setAbsolutePathProvider
	*/
	public function test_setAbsolutePath($absolute_path) {
		$this->server_config->setAbsolutePath($absolute_path);

		$this->assertEquals($this->server_config->absolutePath(), $absolute_path);
		$this->assertInternalType("string", $this->server_config->absolutePath());
	}

	/**
	* @dataProvider setTimezoneProvider
	*/
	public function test_setTimezone($timezone) {
		$this->server_config->setTimezone($timezone);

		$this->assertEquals($this->server_config->timezone(), $timezone);
		$this->assertInternalType("string", $this->server_config->timezone());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($http_path, $absolute_path, $timezone) {
		$this->server_config->setHttpPath($http_path);
		$this->server_config->setAbsolutePath($absolute_path);
		$this->server_config->setTimezone($timezone);

		$all_properties = $this->server_config->getPropertiesOf();

		$this->assertEquals($all_properties["http_path"], $http_path);
		$this->assertInternalType("string", $all_properties["http_path"]);

		$this->assertEquals($all_properties["absolute_path"], $absolute_path);
		$this->assertInternalType("string", $all_properties["absolute_path"]);

		$this->assertEquals($all_properties["timezone"], $timezone);
		$this->assertInternalType("string", $all_properties["timezone"]);
	}

	public function setHTTPPathProvider() {
		return array(array("http://localhost/44generali2"));
	}

	public function setAbsolutePathProvider() {
		return array(array("/Library/WebServer/Documents/44generali2"));
	}

	public function setTimezoneProvider() {
		return array(array("Europe/Berlin"));
	}

	public function getAllPropertiesProvider() {
		return array(array("http://localhost/44generali2","/Library/WebServer/Documents/44generali2","Europe/Berlin"));
	}
}