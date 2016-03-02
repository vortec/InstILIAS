<?php
class GitHubConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->github_config = new \InstILIAS\configs\GitHubConfig();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("\InstILIAS\configs\GitHubConfig", $this->github_config);
	}

	/**
	* @dataProvider setGitUrlProvider
	*/
	public function test_setGitUrl($git_url) {
		$this->github_config->setGitUrl($git_url);

		$this->assertEquals($this->github_config->gitUrl(), $git_url);
		$this->assertInternalType("string", $this->github_config->gitUrl());
	}

	/**
	* @dataProvider setGitBranchNameProvider
	*/
	public function test_setGitBranchName($git_branch_name) {
		$this->github_config->setGitBranchName($git_branch_name);

		$this->assertEquals($this->github_config->gitBranchName(), $git_branch_name);
		$this->assertInternalType("string", $this->github_config->gitBranchName());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($git_url, $git_branch_name) {
		$this->github_config->setGitUrl($git_url);
		$this->github_config->setGitBranchName($git_branch_name);

		$all_properties = $this->github_config->getPropertiesOf();

		$this->assertEquals($all_properties["git_url"], $git_url);
		$this->assertInternalType("string", $all_properties["git_url"]);

		$this->assertEquals($all_properties["git_branch_name"], $git_branch_name);
		$this->assertInternalType("string", $all_properties["git_branch_name"]);
	}

	public function setGitUrlProvider() {
		return array(array("https://github.com/conceptsandtraining/ILIAS.git"));
	}

	public function setGitBranchNameProvider() {
		return array(array("testBranch"));
	}

	public function getAllPropertiesProvider() {
		return array(array("https://github.com/conceptsandtraining/ILIAS.git","testBranch"));
	}
}