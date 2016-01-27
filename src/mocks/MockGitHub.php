<?php
namespace InstIlias_Mocks;

require_once("interfaces/GitHub.php");

class MockGitHub implements GitHub {

	const URL_REG_EX = "/^(https:\/\/github\.com)/";

	public function cloneGitTo($git_hub_url, $installation_path) {

		if(!preg_match(self::URL_REG_EX, strtolower($git_hub_url))) {
			throw new LogicException("MockGitHub::cloneGitTo: No valid gitHub URL ".$git_hub_url);
		}

		if(!is_dir($installation_path)) {
			throw new LogicException("MockGitHub::cloneGitTo: No valid destination ".$installation_path);
		}
	}

	public function checkoutBranch($git_hub_branch_name, $installation_path) {
		if(!is_dir($installation_path)) {
			throw new LogicException("MockGitHub::cloneGitTo: No valid destination ".$installation_path);
		}
	}
}