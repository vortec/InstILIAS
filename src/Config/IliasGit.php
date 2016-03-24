<?php
namespace InstILIAS\Config;

/**
 * Configuration for the git repo and branch name to get ILIAS from.
 *
 * TODO: This most probably is not specific to ILIAS, so it could be named
 * GitBranch or something.
 */
class IliasGit extends Base {
	/**
	 * @var	string
	 */
	protected $ilias_git_url;

	/**
	 * @var	string
	 */
	protected $ilias_git_branch_name;

	const NAME = "ilias_git";

	/**
	* sets the ilias_git_url
	*
	* @param string
	*/
	public function setIliasGitUrl($ilias_git_url) {
		assert(is_string($ilias_git_url));

		$this->ilias_git_url = $ilias_git_url;
	}

	/**
	* gets the git_url
	*
	* @return string
	*/
	public function iliasGitUrl() {
		return $this->ilias_git_url;
	}

	/**
	* sets the ilias_git_branch_name
	*
	* @param string
	*/
	public function setIliasGitBranchName($ilias_git_branch_name) {
		assert(is_string($ilias_git_branch_name));

		$this->ilias_git_branch_name = $ilias_git_branch_name;
	}

	/**
	* gets the ilias_git_branch_name
	*
	* @return string
	*/
	public function iliasGitBranchName() {
		return $this->ilias_git_branch_name;
	}
}
