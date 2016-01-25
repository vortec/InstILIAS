<?php
/**
*
*
*/

interface gitHub{
	public function cloneGitTo($git_hub_url, $destination);
	public function readGitHubConfig($git_hub_branch_name);
	public function destination();
	public function selectedBranch();
}