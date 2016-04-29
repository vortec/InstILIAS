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
	 * @dataProvider	LDAPConfigValueProvider
	 */
	public function test_LDAPConfig($name, $server, $basedn, $conType, $conUserDn, $conUserPw, $synchType
									, $atrNameUser, $protocolVersion, $userSearchScope, $valid) 
	{
		if ($valid) {
			$this->_test_valid_LDAPConfig($name, $server, $basedn, $conType, $conUserDn, $conUserPw, $synchType
										, $atrNameUser, $protocolVersion, $userSearchScope);
		}
		else {
			$this->_test_invalid_LDAPConfig($name, $server, $basedn, $conType, $conUserDn, $conUserPw, $synchType
										, $atrNameUser, $protocolVersion, $userSearchScope);
		}
	}

	public function _test_valid_LDAPConfig($name, $server, $basedn, $conType, $conUserDn, $conUserPw, $synchType
											, $atrNameUser, $protocolVersion, $userSearchScope) 
	{
		$config = new LDAP($name, $server, $basedn, $conType, $conUserDn, $conUserPw, $synchType, "", $atrNameUser, $protocolVersion, $userSearchScope);
		$this->assertEquals($name, $config->name());
		$this->assertEquals($basedn, $config->basedn());
		$this->assertEquals($conType, $config->conType());
		$this->assertEquals($conUserDn, $config->conUserDn());
		$this->assertEquals($conUserPw, $config->conUserPw());
		$this->assertEquals($synchType, $config->synchType());
		$this->assertEquals("", $config->userGroup());
		$this->assertEquals($atrNameUser, $config->attrNameUser());
		$this->assertEquals($protocolVersion, $config->protocolVersion());
		$this->assertEquals($userSearchScope, $config->userSearchScope());
	}

	public function _test_invalid_LDAPConfig($name, $server, $basedn, $conType, $conUserDn, $conUserPw, $synchType
											, $atrNameUser, $protocolVersion, $userSearchScope)
	{
		try {
			$config = new LDAP($name, $server, $basedn, $conType, $conUserDn, $conUserPw, $synchType, "", $atrNameUser, $protocolVersion, $userSearchScope);
			$this->assertFalse("Should have raised.");
		}
		catch (\InvalidArgumentException $e) {}
	}

	public function LDAPConfigValueProvider() {
		$ret = array();
		$take_it = 0;
		$take_every_Xth = 1000;
		foreach ($this->nameProvider() as $name) {
			foreach ($this->serverProvider() as $server) {
				foreach ($this->basednProvider() as $basedn) {
					foreach ($this->conTypeProvider() as $conType) {
						foreach ($this->conUserDnProvider() as $conUserDn) {
							foreach ($this->conUserPwProvider() as $conUserPw) {
								foreach ($this->synchTypeProvider() as $synchType) {
									foreach ($this->attrNameUserProvider() as $atrNameUser) {
										foreach ($this->protocolVersionProvider() as $protocolVersion) {
											foreach ($this->userSearchScopeProvider() as $userSearchScope) {
												$take_it++;
												if($take_it == $take_every_Xth) {
													$ret[] = array
														( $name[0], $server[0], $basedn[0], $conType[0], $conUserDn[0], $conUserPw[0]
															, $synchType[0], $atrNameUser[0], $protocolVersion[0], $userSearchScope[0]
														, $name[1] && $server[1] && $basedn[1] && $conType[1] && $conUserDn[1] 
														  && $conUserPw[1] && $synchType[1] && $atrNameUser[1] && $protocolVersion[1]
														  && $userSearchScope[1]);

													$take_it = 0;
												}
											}
										}
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
				, array("synch_on_login", true)
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

	public function protocolVersionProvider() {
		return array(
				array(2, true)
				, array("2", false)
				, array(true, false)
				, array(3, true)
				, array(array(), false)
			);
	}

		public function userSearchScopeProvider() {
		return array(
				array(1, true)
				, array("2", false)
				, array(true, false)
				, array(0, true)
				, array(array(), false)
			);
	}
}
