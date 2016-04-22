<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for the tools required by ILIAS.
 *
 * @method string getString()
 */
class Tools extends Base {
		/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "convert"	=> array("string", false)
			, "zip"		=> array("string", false)
			, "unzip"	=> array("string", false)
			, "java"	=> array("string", false)
			);
	}
}
