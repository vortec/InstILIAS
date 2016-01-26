<?php
/**
*
*
*/

interface gitHub{
	public function cloneGitTo($git_hub_url, $destination);
	public function checkoutBranch($git_hub_branch_name);
	public function destination();
	public function selectedBranch();
}