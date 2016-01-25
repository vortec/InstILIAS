<?php
/**
* Basic class or each Config like ClientInitConfig
*
*/

abstract class baseConfig{
	
	public function __construct() {

	}

	/**
	* gets all propertys in an assoc array
	* $key = property name
	* $value = property value
	*
	* @param array (ReflectionProperty) type of the propertys should be returned
	*
	* @return array
	*/
	public function getPropertysOf($reflection_propertys = array(ReflectionProperty::IS_PROTECTED)) {
		$ret = array();

		foreach ($reflection_propertys as $$reflection_property) {
			$reflect = new ReflectionClass($this);
			$props = $reflect->getProperties($reflection_property);

			foreach ($props as $key => $value) {
				$ret[$value->name] = $this->{$value->name};
			}
		}

		return $ret;
	}
}