<?php
class IliasGitConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->ilias_git_config = new \InstILIAS\configs\IliasGitConfig();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("\InstILIAS\configs\IliasGitConfig", $this->ilias_git_config);
	}

	/**
	* @dataProvider setIliasGitUrlProvider
	*/
	public function test_setGitUrl($ilias_git_url) {
		$this->ilias_git_config->setIliasGitUrl($ilias_git_url);

		$this->assertEquals($this->ilias_git_config->iliasGitUrl(), $ilias_git_url);
		$this->assertInternalType("string", $this->ilias_git_config->iliasGitUrl());
	}

	/**
	* @dataProvider setIliasGitBranchNameProvider
	*/
	public function test_setGitBranchName($ilias_git_branch_name) {
		$this->ilias_git_config->setIliasGitBranchName($ilias_git_branch_name);

		$this->assertEquals($this->ilias_git_config->iliasGitBranchName(), $ilias_git_branch_name);
		$this->assertInternalType("string", $this->ilias_git_config->iliasGitBranchName());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($ilias_git_url, $ilias_git_branch_name) {
		$this->ilias_git_config->setIliasGitUrl($ilias_git_url);
		$this->ilias_git_config->setIliasGitBranchName($ilias_git_branch_name);

		$all_properties = $this->ilias_git_config->getPropertiesOf();

		$this->assertEquals($all_properties["ilias_git_url"], $ilias_git_url);
		$this->assertInternalType("string", $all_properties["ilias_git_url"]);

		$this->assertEquals($all_properties["ilias_git_branch_name"], $ilias_git_branch_name);
		$this->assertInternalType("string", $all_properties["ilias_git_branch_name"]);
	}

	public function setIliasGitUrlProvider() {
		return array(array("https://github.com/conceptsandtraining/ILIAS.git"));
	}

	public function setIliasGitBranchNameProvider() {
		return array(array("testBranch"));
	}

	public function getAllPropertiesProvider() {
		return array(array("https://github.com/conceptsandtraining/ILIAS.git","testBranch"));
	}
}