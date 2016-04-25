<?php
namespace CaT\InstILIAS\Config;

/**
 * General Configuration for an ILIAS.
 *
 * @method \\CaT\\InstILIAS\\Config\\GitBranch mainRepo()
 * @method array logs()
 * @method string text()
 * @method array plugins()
 */
class General extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "client"	=> array("\\CaT\\InstILIAS\\Config\\Client", false)
			, "database"	=> array("\\CaT\\InstILIAS\\Config\\DB", false)
			, "language"	=> array("\\CaT\\InstILIAS\\Config\\Language", false)
			, "server"	=> array("\\CaT\\InstILIAS\\Config\\Server", false)
			, "setup"	=> array("\\CaT\\InstILIAS\\Config\\Setup", false)
			, "tools"	=> array("\\CaT\\InstILIAS\\Config\\Tools", false)
			, "log"	=> array("\\CaT\\InstILIAS\\Config\\Log", false)
			, "git_branch"	=> array("\\CaT\\InstILIAS\\Config\\GitBranch", false)
			);
	}
}