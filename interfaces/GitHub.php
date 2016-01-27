<?php
/**
*
*
*/

interface GitHub{
	public function cloneGitTo($git_hub_url, $destination);
	public function checkoutBranch($git_hub_branch_name);
	public function selectedBranch();
}