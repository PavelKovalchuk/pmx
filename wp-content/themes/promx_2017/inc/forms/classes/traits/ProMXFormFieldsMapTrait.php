<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.03.2018
 * Time: 19:40
 */

trait ProMXFormFieldsMapTrait {

	/**
	 * @var array
	 *
	 * azure_parameter - parameter acceptable in AZURE system
	 * sanitizers - functions in ProMXFormSanitize, which should be applied to value
	 */
	protected $fieldsMap = array(

		'campaign' => [
			'placeholder' => [
				'en' => 'Campaign',
				'de' => 'Campaign',
			],
			'required' => true,
			'azure_parameter' => 'Campaign',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'city' => [
			'placeholder' => [
				'en' => 'City',
				'de' => 'City',
			],
			'required' => false,
			'azure_parameter' => 'City',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'company' => [
			'placeholder' => [
				'en' => 'Company',
				'de' => 'Firma',
			],
			'required' => false,
			'azure_parameter' => 'Company',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'email' => [
			'placeholder' => [
				'en' => 'Email',
				'de' => 'Email',
			],
			'required' => false,
			'azure_parameter' => 'Email',
			'sanitizers' => ['sanitizeEmail'],
			'validators' => [],
		],

		'event_description' => [
			'placeholder' => [
				'en' => 'Event Description',
				'de' => 'Event Description',
			],
			'required' => false,
			'azure_parameter' => 'Eventdescription',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'first_name' => [
			'placeholder' => [
				'en' => 'First name',
				'de' => 'Name',
			],
			'required' => false,
			'azure_parameter' => 'Firstname',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'last_name' => [
			'placeholder' => [
				'en' => 'Last name',
				'de' => 'Last name',
			],
			'required' => false,
			'azure_parameter' => 'Lastname',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'message' => [
			'placeholder' => [
				'en' => 'Message',
				'de' => 'Message',
			],
			'required' => false,
			'azure_parameter' => 'Message',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'no_potential_customers' => [
			'placeholder' => [
				'en' => 'No Potential Customers',
				'de' => 'No Potential Customers',
			],
			'required' => false,
			'azure_parameter' => 'NoPotentialCustomers',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'position' => [
			'placeholder' => [
				'en' => 'Position',
				'de' => 'Position',
			],
			'required' => false,
			'azure_parameter' => 'Position',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'postal_code' => [
			'placeholder' => [
				'en' => 'Postal Code',
				'de' => 'Postal Code',
			],
			'required' => false,
			'azure_parameter' => 'Postalcode',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'salutation' => [
			'placeholder' => [
				'en' => 'Salutation',
				'de' => 'Salutation',
			],
			'required' => false,
			'azure_parameter' => 'Salutation',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'street' => [
			'placeholder' => [
				'en' => 'Street',
				'de' => 'Street',
			],
			'required' => false,
			'azure_parameter' => 'Street',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'street_2' => [
			'placeholder' => [
				'en' => 'Street 2',
				'de' => 'Street 2',
			],
			'required' => false,
			'azure_parameter' => 'Street2',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'phone' => [
			'placeholder' => [
				'en' => 'Phone',
				'de' => 'Telephone',
			],
			'required' => false,
			'azure_parameter' => 'Telephone',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],




	);


	/**
	 * @return array
	 */
	protected function getFieldsMap() {

		if(empty($this->fieldsMap)){
			return false;
		}
		return $this->fieldsMap;
	}

	protected function getOneFieldSettings($field_name) {

		if(! is_string($field_name) || !$field_name){
			return false;
		}

		if(!isset($this->getFieldsMap()[$field_name])){
			return false;
		}
		return $this->getFieldsMap()[$field_name];
	}


}