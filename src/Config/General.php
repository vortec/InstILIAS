<?php
namespace CaT\InstILIAS\Config;

/**
 * General Configuration for an ILIAS.
 *
 * @method \\CaT\\InstILIAS\\Config\\GitBranch mainRepo()
 * @method array client()
 * @method string database()
 * @method array language()
 * @method array server()
 * @method string setup()
 * @method array tools()
 * @method array log()
 * @method string gitBranch()
 * @method array category()
 * @method array orgunit()
 * @method string role()
 * @method array ldap()
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
			, "category"	=> array("\\CaT\\InstILIAS\\Config\\Categories", true)
			, "orgunit"	=> array("\\CaT\\InstILIAS\\Config\\OrgUnits", true)
			, "role"	=> array("\\CaT\\InstILIAS\\Config\\Roles", true)
			, "ldap"	=> array("\\CaT\\InstILIAS\\Config\\LDAP", true)
			);
	}
}