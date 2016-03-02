<?php
namespace InstILIAS;

class GitHubExecuter implements \InstILIAS\interfaces\GitHub {

	const URL_REG_EX = "/^(https:\/\/github\.com)/";
	const SUCCESS_REG_EX = "/^Branch %s set up to track remote branch %s from origin./";
	const GIT_CLONE = "git clone %s %s";
	const GIT_CHECKOUT = "git --git-dir=%s/.git --work-tree=%s checkout %s";

	public function cloneGitTo($git_hub_url, $installation_path) {

		if(!preg_match(self::URL_REG_EX, strtolower($git_hub_url))) {
			throw new \LogicException("GitHubExecuter::cloneGitTo: No valid gitHub URL ".$git_hub_url);
		}

		if(is_dir($installation_path)) {
			throw new \LogicException("GitHubExecuter::cloneGitTo: No valid destination ".$installation_path);
		}

		$clone = escapeshellcmd(sprintf(self::GIT_CLONE, $git_hub_url, $installation_path));
		shell_exec($clone);
	}

	public function checkoutBranch($git_hub_branch_name, $installation_path) {
		if(!is_dir($installation_path)) {
			throw new \LogicException("GitHubExecuter::checkoutBranch: No valid destination ".$installation_path);
		}

		$checkout = escapeshellcmd(sprintf(self::GIT_CHECKOUT, $installation_path, $installation_path, $git_hub_branch_name));
		$ret = shell_exec($checkout);

		$regex = sprintf(self::SUCCESS_REG_EX, $git_hub_branch_name, $git_hub_branch_name);
		if(!preg_match($regex, $ret)) {
			throw new \LogicException("GitHubExecuter::checkoutBranch: Somethings went wrong at checkout branch ".$git_hub_branch_name);
		}
	}
}