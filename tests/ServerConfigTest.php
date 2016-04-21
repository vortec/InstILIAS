<?php

use \CaT\InstILIAS\Config\Server;

class ServerConfigTest extends PHPUnit_Framework_TestCase{
	public function test_not_enough_params() {
		try {
			$config = new Server();
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	/**
	 * @dataProvider	ServerConfigValueProvider
	 */
	public function test_ServerConfig($http_path, $absolute_path, $timezone, $valid) {
		if ($valid) {
			$this->_test_valid_ServerConfig($http_path, $absolute_path, $timezone);
		}
		else {
			$this->_test_invalid_ServerConfig($http_path, $absolute_path, $timezone);
		}
	}

	public function _test_valid_ServerConfig($http_path, $absolute_path) {
		$config = new Server($http_path, $absolute_path);
		$this->assertEquals($http_path, $config->defaultLang());
		$this->assertEquals($absolute_path, $config->toInstallLangs());
	}

	public function _test_invalid_ServerConfig($http_path, $absolute_path) {
		try {
			$config = new Server($http_path, $absolute_path);
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	public function ServerConfigValueProvider() {
		$ret = array();
		foreach ($this->HTTPPathProvider() as $http_path) {
			foreach ($this->absolutePathProvider() as $absolute_path) {
				foreach ($this->timezoneProvider() as $timezone) {
					$ret[] = array
						( $http_path[0], $absolute_path[0], $timezone[0]
						, $http_path[1] && $absolute_path[1] && $timezone[1]);
				}
			}
		}
		return $ret;
	}

	public function HTTPPathProvider() {
		return array(
				array("http://localhost/44generali2", true)
				, array("htt://localhost/44generali2", false)
				, array(4, false)
				, array(false, false)
				, array(array(), false)
				, array("https://localhost/44generali2", true)
			);
	}

	public function absolutePathProvider() {
		return array(
				array("/Library/WebServer/Documents/44generali2")
				, array(4, false)
				, array(false, false)
				, array(array(), false)
			);
	}

	public function timezoneProvider() {
		return array(
				array("Europe/Berlin", true)
				, array(4, false)
				, array("Europe", false)
				, array("Europe/Bern", true)
				, array(false, false)
				, array(array(), false)
			);
	}
}
