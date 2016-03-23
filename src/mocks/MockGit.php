<?php
namespace InstILIAS\mocks;

class MockGit implements \InstILIAS\interfaces\Git {

	const URL_REG_EX = "/^(https:\/\/github\.com)/";

	public function cloneGitTo($git_url, $installation_path) {

		if(!preg_match(self::URL_REG_EX, strtolower($git_url))) {
			throw new \LogicException("MockGit::cloneGitTo: No valid gitHub URL ".$git_url);
		}

		if(!is_dir($installation_path)) {
			throw new \LogicException("MockGit::cloneGitTo: No valid destination ".$installation_path);
		}
	}

	public function checkoutBranch($git_branch_name, $installation_path) {
		if(!is_dir($installation_path)) {
			throw new \LogicException("MockGit::cloneGitTo: No valid destination ".$installation_path);
		}
	}
}