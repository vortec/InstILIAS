<?php
namespace InstILIAS;
use Gitonomy\Git\Admin;

class GitExecuter implements \InstILIAS\interfaces\Git {

	const URL_REG_EX = "/^(https:\/\/github\.com)/";

	public function cloneGitTo($ilias_git_url, $installation_path) {

		if(!preg_match(self::URL_REG_EX, strtolower($ilias_git_url))) {
			throw new \LogicException("GitExecuter::cloneGitTo: No valid gitHub URL ".$ilias_git_url);
		}

		if(is_dir($installation_path)) {
			throw new \LogicException("GitExecuter::cloneGitTo: No valid destination ".$installation_path);
		}

		$repository = Admin::cloneTo($installation_path, $ilias_git_url, false);
	}

	public function checkoutBranch($ilias_git_branch_name, $installation_path) {
		if(!is_dir($installation_path)) {
			throw new \LogicException("GitExecuter::checkoutBranch: No valid destination ".$installation_path);
		}

		$repository = Admin::init($installation_path);
		$wc = $repository->getWorkingCopy();
		$wc->checkout($ilias_git_branch_name);
	}
}