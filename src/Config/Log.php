<?php
namespace CaT\InstILIAS\Config;

/**
 * Configuration for the log of ILIAS.
 *
 * @method string getString()
 */
class Log extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "path"			=> array("string", false)
			, "file_name"		=> array("string", false)
			);
	}
}