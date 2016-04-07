<?php

use \InstILIAS\Config\Log;

class LogConfigTest extends PHPUnit_Framework_TestCase{
	/**
	 * @dataProvider	LogConfigValueProvidergit status
	 */
	public function test_LogConfig($path, $fileName, $valid) {
		if ($valid) {
			$this->_test_valid_LogConfig($path, $fileName);
		}
		else {
			$this->_test_invalid_LogConfig($path, $fileName);
		}
	}

	public function _test_valid_LogConfig($path, $fileName) {
		$config = new Log($path, $fileName);
		$this->assertEquals($path, $config->path());
		$this->assertEquals($fileName, $config->fileName());
	}

	public function _test_invalid_LogConfig($path, $fileName) {
		try {
			$config = new Log($path, $fileName);
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	public function LogConfigValueProvider() {
		$ret = array();
		$take_it = 0;
		$take_every_Xth = 10;
		foreach ($this->pathProvider() as $path) {
			foreach ($this->fileNameProvider() as $fileName) {
				$ret[] = array
					( $path[0], $fileName[0]
					, $path[1] && $fileName[1]);
			}
		}
		return $ret;
	}

	public function fileNameProvider() {
		return array(
				array("ilias.log", true)
				,array(2, false)
				,array(true, false)
			);
	}

	public function pathProvider() {
		return array(
				array("/var/logs/ilias", true)
				,array(2, false)
				,array(true, false)
			);
	}
}
