<?php
class GitHubConfigTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		$this->github_config = new \InstILIAS\classes\GitHubConfig();
	}

	public function test_instanceOf() {
		$this->assertInstanceOf("\InstILIAS\classes\GitHubConfig", $this->github_config);
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
	* @dataProvider setDestinationProvider
	*/
	public function test_setDestination($destination) {
		$this->github_config->setDestination($destination);

		$this->assertEquals($this->github_config->destination(), $destination);
		$this->assertInternalType("string", $this->github_config->destination());
	}

	/**
	* @dataProvider getAllPropertiesProvider
	*/
	public function test_getAllProperties($git_url, $git_branch_name, $destination) {
		$this->github_config->setGitUrl($git_url);
		$this->github_config->setGitBranchName($git_branch_name);
		$this->github_config->setDestination($destination);

		$all_properties = $this->github_config->getPropertiesOf();

		$this->assertEquals($all_properties["git_url"], $git_url);
		$this->assertInternalType("string", $all_properties["git_url"]);

		$this->assertEquals($all_properties["git_branch_name"], $git_branch_name);
		$this->assertInternalType("string", $all_properties["git_branch_name"]);

		$this->assertEquals($all_properties["destination"], $destination);
		$this->assertInternalType("string", $all_properties["destination"]);
	}

	public function setGitUrlProvider() {
		return array(array("https://github.com/conceptsandtraining/ILIAS.git"));
	}

	public function setGitBranchNameProvider() {
		return array(array("testBranch"));
	}

	public function setDestinationProvider() {
		return array(array("/var/dar/bar/testBranch"));
	}

	public function getAllPropertiesProvider() {
		return array(array("https://github.com/conceptsandtraining/ILIAS.git","testBranch","/var/dar/bar/testBranch"));
	}
}