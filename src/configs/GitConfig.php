<?php
namespace InstILIAS\configs;

/**
*
*
*/

class GitHubConfig extends \InstILIAS\abstracts\BaseConfig {
	protected $git_url;
	protected $git_branch_name;
	const NAME = "github";

	/**
	* sets the git_url
	*
	* @param string
	*/
	public function setGitUrl($git_url) {
		assert(is_string($git_url));

		$this->git_url = $git_url;
	}

	/**
	* gets the git_url
	*
	* @return string
	*/
	public function gitUrl() {
		return $this->git_url;
	}

	/**
	* sets the git_branch_name
	*
	* @param string
	*/
	public function setGitBranchName($git_branch_name) {
		assert(is_string($git_branch_name));

		$this->git_branch_name = $git_branch_name;
	}

	/**
	* gets the git_branch_name
	*
	* @return string
	*/
	public function gitBranchName() {
		return $this->git_branch_name;
	}
}