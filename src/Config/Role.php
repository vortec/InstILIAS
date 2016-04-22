<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for an ILIAS database.
 *
 * @method string getString()
 */
class Role extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "name"			=> array("string", false)
			, "description" 	=> array("string", false)
			);
	}
}