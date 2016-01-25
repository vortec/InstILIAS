<?php
require_once("../interfaces/if.gitHub.php");

class mockGitHub implements gitHub {
	protected $destination;
	protected $selected_branch;

	public function cloneGitTo($git_hub_url, $destination) {
		$this->desgtination = $destination;

		return true;
	}

	public function readGitHubConfig($git_hub_branch_name) {
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