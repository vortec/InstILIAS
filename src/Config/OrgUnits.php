<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for OrgUnits.
 *
 * @method string getString()
 */
class OrgUnits extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "orgunits" => array(array("\\CaT\\InstILIAS\\Config\\OrgUnit"), false)
			);
	}
}