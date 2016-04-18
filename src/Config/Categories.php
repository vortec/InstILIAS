<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for OrgUnits.
 */
class Categories extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "categories" => array(array("\\CaT\\InstILIAS\\Config\\Category"), false)
			);
	}
}