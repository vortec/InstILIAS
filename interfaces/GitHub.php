<?php
/**
*
*
*/

interface GitHub{
	public function cloneGitTo($git_hub_url, $installation_path);
	public function checkoutBranch($git_hub_branch_name, $installation_path);
}