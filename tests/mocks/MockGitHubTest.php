<?php
require_once("mocks/MockGitHub.php");

class MockGitHubTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->git_hub = new MockGitHub();
	}

	/**
	* @dataProvider cloneProvider
	*/
	public function test_clone($git_url, $destination) {
		$this->git_hub->cloneGitTo($git_url, $destination);

		$this->assertEquals($this->git_hub->destination(), $destination);
		$this->assertInternalType("string", $this->git_hub->destination());
	}

	/**
	* @dataProvider cloneNoValidFolderProvider
	* @expectedException LogicException
	*/
	public function test_cloneNoValidFolder($git_url, $destination) {
		$this->git_hub->cloneGitTo($git_url, $destination);

		$this->assertNull($this->git_hub->destination());
	}

	/**
	* @dataProvider cloneNoValidUrlProvider
	* @expectedException LogicException
	*/
	public function test_cloneNoValidUrl($git_url, $destination) {
		$this->git_hub->cloneGitTo($git_url, $destination);

		$this->assertNull($this->git_hub->destination());
	}

	/**
	* @dataProvider checkoutProvider
	*/
	public function test_checkout($branch) {
		$this->git_hub->checkoutBranch($branch);

		$this->assertEquals($this->git_hub->selectedBranch(), $branch);
		$this->assertInternalType("string", $this->git_hub->selectedBranch());
	}

	public function cloneProvider() {
		return array(
			array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
			,array('https://github.com/conceptsandtraining/ILIAS.git', '/Library/WebServer/Documents/44generali2')
		);
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

	public function checkoutProvider() {
		return array(
			array('USER_EXISTS')
			,array('USER_EXISTS_TP')
			,array('USER_UNKNOWN')
			,array('USER_DIFFERENT_TP')
			,array('USER_DEACTIVATED')
			,array('USER_SERVICETYPE')
			,array('WRONG_USERDATA')
		);
	}
}