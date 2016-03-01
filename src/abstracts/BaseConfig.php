<?php
namespace InstILIAS\abstracts;
/**
* Basic class or each Config like ClientInitConfig
*
*/

abstract class BaseConfig {

	/**
	* gets all propertys in an assoc array
	* $key = property name
	* $value = property value
	*
	* @param array (ReflectionProperty) type of the properties should be returned
	*
	* @return array
	*/
	public function getPropertiesOf($reflection_properties = array(\ReflectionProperty::IS_PROTECTED)) {
		$ret = array();

		foreach ($reflection_properties as $reflection_property) {
			$reflect = new \ReflectionClass($this);
			$props = $reflect->getProperties($reflection_property);

			foreach ($props as $key => $value) {
				$ret[$value->name] = $this->{$value->name};
			}
		}

		return $ret;
	}
}