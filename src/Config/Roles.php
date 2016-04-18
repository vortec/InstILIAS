<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for Roles.
 */
class Roles extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "roles"			=> array(array("\\CaT\\InstILIAS\\Config\\Role"), false)
			);
	}
}