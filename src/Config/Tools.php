<?php
namespace InstILIAS\Config;

/**
 * Configuration for the tools required by ILIAS.
 */
class Tools extends Base {
		/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			( "convert"	=> "string"
			, "zip"		=> "string"
			, "unzip"	=> "string"
			, "java"	=> "string"
			);
	}
}
