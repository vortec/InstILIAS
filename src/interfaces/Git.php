<?php
namespace InstILIAS\interfaces;

/**
*
*
*/

interface Git{
	public function cloneGitTo($ilias_git_url, $installation_path);
	public function checkoutBranch($ilias_git_branch_name, $installation_path);
}