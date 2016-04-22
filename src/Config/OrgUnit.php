<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for an ILIAS database.
 *
 * @method string getString()
 */
class OrgUnit extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "title"	=> array("string", false)
			, "childs"	=> array(array("\\CaT\\InstILIAS\\Config\\OrgUnit"), true)
			);
	}
}