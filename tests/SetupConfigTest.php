<?php

use \CaT\InstILIAS\Config\Setup;

class SetupConfigTest extends PHPUnit_Framework_TestCase{
	public function test_not_enough_params() {
		try {
			$config = new Setup();
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	/**
	 * @dataProvider	SetupConfigValueProvider
	 */
	public function test_SetupConfig($passwd, $valid) {
		if ($valid) {
			$this->_test_valid_SetupConfig($passwd);
		}
		else {
			$this->_test_invalid_SetupConfig($passwd);
		}
	}

	public function _test_valid_SetupConfig($passwd) {
		$config = new Setup($passwd);
		$this->assertEquals($passwd, $config->passwd());
	}

	public function _test_invalid_SetupConfig($passwd) {
		try {
			$config = new Setup($passwd);
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	public function SetupConfigValueProvider() {
		$ret = array();
		foreach ($this->passwdProvider() as $passwd) {
			$ret[] = array
				( $passwd[0]
				, $passwd[1]);
		}
		return $ret;
	}

	public function passwdProvider() {
		return array(
				array("pusteblume", true)
				, array(5, false)
				, array(true, false)
				, array(array(), false)
			);
	}
}
