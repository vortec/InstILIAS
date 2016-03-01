<?php

class MockGitHubTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->git_hub = new \InstILIAS\mocks\MockGitHub();
	}

	/**
	* @dataProvider cloneNoValidFolderProvider
	* @expectedException LogicException
	*/
	public function test_cloneNoValidFolder($git_url, $installation_path) {
		$this->git_hub->cloneGitTo($git_url, $installation_path);
	}

	/**
	* @dataProvider cloneNoValidUrlProvider
	* @expectedException LogicException
	*/
	public function test_cloneNoValidUrl($git_url, $installation_path) {
		$this->git_hub->cloneGitTo($git_url, $installation_path);
	}

	/**
	* @dataProvider checkoutNoValidFolderProvider
	* @expectedException LogicException
	*/
	public function test_checkoutNoValidFolder($branch, $installation_path) {
		$this->git_hub->checkoutBranch($branch, $installation_path);
	}

	public function cloneNoValidFolderProvider() {
		return array(
			array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Document/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Document/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Document/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Document/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Document/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Document/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Document/44generali2')
		);
	}

	public function cloneNoValidUrlProvider() {
		return array(
			array('https://githu.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://githu.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://githu.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://githu.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://githu.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://githu.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://githu.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
		);
	}

	public function checkoutNoValidFolderProvider() {
		return array(
			array('USER_EXISTS', '/Library/WebServer/Document/44generali2')
			,array('USER_EXISTS_TP', '/Library/WebServer/Document/44generali2')
			,array('USER_UNKNOWN', '/Library/WebServer/Document/44generali2')
			,array('USER_DIFFERENT_TP', '/Library/WebServer/Document/44generali2')
			,array('USER_DEACTIVATED', '/Library/WebServer/Document/44generali2')
			,array('USER_SERVICETYPE', '/Library/WebServer/Document/44generali2')
			,array('WRONG_USERDATA', '/Library/WebServer/Document/44generali2')
		);
	}
}