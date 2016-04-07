<?php
namespace CaT\InstILIAS\Config;

/**
 * TODO: This name seems odd. It's about the master password, right?
 */
class Setup extends Base {
	/**
	 * @inheritdocs
	 */
	public static function fields() {
		return array
			("passwd"		=> "string");
	}
}