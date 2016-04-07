<?php
namespace InstILIAS\Config;

/**
 * Configuration for the log of ILIAS.
 */
class Log extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "path"			=> "string"
			, "file_name"		=> "string"
			);
	}
}