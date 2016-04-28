<?php

use \CaT\InstILIAS\Config\LDAP;

class LDAPConfigTest extends PHPUnit_Framework_TestCase{
	public function test_not_enough_params() {
		try {
			$config = new LDAP();
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	/**
	 * @dataProvider	LogConfigValueProvider status
	 */
	public function test_LDAPConfig($path, $fileName, $valid) {
		if ($valid) {
			$this->_test_valid_LDAPConfig($path, $fileName);
		}
		else {
			$this->_test_invalid_LDAPConfig($path, $fileName);
		}
	}

	public function _test_valid_LDAPConfig($path, $fileName) {
		$config = new Log($path, $fileName);
		$this->assertEquals($path, $config->path());
		$this->assertEquals($fileName, $config->fileName());
	}

	public function _test_invalid_LDAPConfig($path, $fileName) {
		try {
			$config = new Log($path, $fileName);
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	public function LDAPConfigValueProvider() {
		$ret = array();
		$take_it = 0;
		$take_every_Xth = 10;
		foreach ($this->nameProvider() as $name) {
			foreach ($this->serverProvider() as $server) {
				foreach ($this->basednProvider() as $basedn) {
					foreach ($this->conTypeProvider() as $conType) {
						foreach ($this->conUserDnProvider() as $conUserDn) {
							foreach ($this->conUserPwProvider() as $conUserPw) {
								foreach ($this->synchTypeProvider() as $synchType) {
									foreach ($this->attrNameUserProvider() as $atrNameUser) {
										$ret[] = array
												( $name[0], $server[0], $basedn[0], $conType[0], $conUserDn[0], $conUserPw[0], $synchType[0], $atrNameUser[0]
												, $name[1] && $server[1] && $basedn[1] && $conType[1] && $conUserDn[1] 
												  && $conUserPw[1] && $synchType[1] && $atrNameUser[1]);
									}
								}
							}
						}
					}
				}
			}
		}

		return $ret;
	}

	public function nameProvider() {
		return array(
				array("ldap", true)
				, array(2, false)
				, array(true, false)
				, array(array(), false)
			);
	}

	public function serverProvider() {
		return array(
				array("ldap://129.184.11.1:389", true)
				, array(2, false)
				, array(true, false)
				, array(array(), false)
			);
	}

		public function basednProvider() {
		return array(
				array("cn=Users,dc=catdom,dc=localdomain", true)
				, array(2, false)
				, array(true, false)
				, array(array(), false)
			);
	}

	public function conTypeProvider() {
		return array(
				array(1, true)
				, array("2", false)
				, array(true, false)
				, array(0, true)
				, array(array(), false)
			);
	}

		public function conUserDnProvider() {
		return array(
				array("cn=ldap,cn=Users,dc=catdom,dc=localdomain", true)
				, array(2, false)
				, array(true, false)
				, array(array(), false)
			);
	}

	public function conUserPwProvider() {
		return array(
				array("abcd", true)
				, array(2, false)
				, array(true, false)
				, array(array(), false)
			);
	}

		public function synchTypeProvider() {
		return array(
				array("synch_per_cron", true)
				, array(2, false)
				, array(true, false)
				, array("synch_on_login", false)
				, array(array(), false)
			);
	}

	public function attrNameUserProvider() {
		return array(
				array("sAMAccountName", true)
				, array(2, false)
				, array(true, false)
				, array(array(), false)
			);
	}
}
