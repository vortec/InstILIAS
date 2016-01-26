<?php
require_once("interfaces/if.gitHub.php");

class mockGitHub implements gitHub {
	protected $destination;
	protected $selected_branch;

	const URL_REG_EX = "/^(https:\/\/github\.com)/";

	public function cloneGitTo($git_hub_url, $destination) {

		if(!preg_match(self::URL_REG_EX, strtolower($git_hub_url))) {
			throw new LogicException("mockGitHub::cloneGitTo: No valid gitHub URL ".$git_hub_url);
		}

		if(!is_dir($destination)) {
			throw new LogicException("mockGitHub::cloneGitTo: No valid destination ".$destination);
		}

		$this->destination = $destination;

		return true;
	}

	public function checkoutBranch($git_hub_branch_name) {
		$this->selected_branch = $git_hub_branch_name;
		return true;
	}

	public function destination() {
		return $this->destination;
	}

	public function selectedBranch() {
		return $this->selected_branch;
	}
}