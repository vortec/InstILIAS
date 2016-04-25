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
			( "client"	=> array("\\CaT\\InstILIAS\\Config\\Client", true)
			, "database"	=> array("\\CaT\\InstILIAS\\Config\\DB", true)
			, "language"	=> array("\\CaT\\InstILIAS\\Config\\Language", true)
			, "server"	=> array("\\CaT\\InstILIAS\\Config\\Server", true)
			, "setup"	=> array("\\CaT\\InstILIAS\\Config\\Setup", true)
			, "tools"	=> array("\\CaT\\InstILIAS\\Config\\Tools", true)
			, "log"	=> array("\\CaT\\InstILIAS\\Config\\Log", true)
			, "git_branch"	=> array("\\CaT\\InstILIAS\\Config\\GitBranch", true)
			);
	}
}