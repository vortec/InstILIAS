<?php
/** 
  * TODO: There is the vendor missing in the namespace, it should be
  * CaT/InstILIAS/Config (and in the other locations accordingly.)
  */
namespace InstILIAS\Config;

/**
 * Base class for all configs.
 */
abstract class Base {

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

	public function setValues(array $properties_with_values) {
		foreach ($properties_with_values as $key => $value) {
			$this->$key = $value;
		}
	}
}