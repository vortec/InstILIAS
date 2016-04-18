<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for an ILIAS database.
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