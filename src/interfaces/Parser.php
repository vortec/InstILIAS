<?php
namespace CaT\InstILIAS\interfaces;

/**
 *
 *
 */
interface Parser {
	/**
	 * Construct a config of type $class from $string
	 *
	 * @param 	string 	$string
	 * @param 	string  $class
	 * @throws	DomainException		if there is badly typed content in the config
	 * 								or if we are missing a required key.
	 * @return 	mixed 	(this should be of type $class)
	 */
	public function read_config($string, $class);
}
