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

		'country' => [
			'placeholder' => [
				'en' => 'Country',
				'de' => 'Country',
			],
			'required' => false,
			'azure_parameter' => 'Country',
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
			'type' => 'multiple',
			'options' => [
				'he' => [
					'en' => 'Mr',
					'de' => 'Her',
				],
				'she' => [
					'en' => 'Ms',
					'de' => 'Frau',
				],
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

		//NEW Azure parameters
		'language' => [
			'placeholder' => [
				'en' => 'Language',
				'de' => 'Language',
			],
			'required' => false,
			'azure_parameter' => 'PageLanguage',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'event' => [
			'placeholder' => [
				'en' => 'Event',
				'de' => 'Event',
			],
			'type' => 'select',
			'options' => [
				[],
			],
			'required' => false,
			'azure_parameter' => 'Event',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'product' => [
			'placeholder' => [
				'en' => 'Product',
				'de' => 'Product',
			],
			'type' => 'select',
			'options' => [
				[],
			],
			'required' => false,
			'azure_parameter' => 'Product',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

	);

	// Fields wich will be displayed on the frontend
	protected $displayedFields = [];

    /**
     * @return array
     */
    public function getDisplayedFields()
    {
        return $this->displayedFields;
    }

    /**
     * @param string $displayedField
     */
    protected function addDisplayedField($displayedField)
    {
        $this->displayedFields[] = $displayedField;
    }

    protected function initDisplayedField()
    {
        if(empty($this->getDisplayedFields())){
            $this->addError( $this->showAdminMessage('Fields to display are not specified!'));
            return false;
        }

        $this->addDisplayedField('campaign');
        $this->updateFieldsMap();

    }

    protected function updateFieldsMap()
    {
        foreach ($this->getFieldsMap() as $field => $data){

            if(! in_array($field, $this->getDisplayedFields())){
                unset($this->fieldsMap[$field]);
            }

        }

        return true;
    }

	/**
	 * @return array
	 */
	public function getFieldsMap() {

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

	protected function updateRequiredWithDbData($db_settings)
	{
		$fields_required = $db_settings["fields_required"][0];
		if(!$this->checkIsArray($fields_required)){
			return;
		}
		foreach ($fields_required as $field => $value){
			$this->changeRequiredSetting($field, $value);
		}

		return true;

	}

	protected function updatePlaceholderWithDbData($db_settings)
	{
		$fields_placeholders = $db_settings["fields_placeholders"][0];
		if(!$this->checkIsArray($fields_placeholders)){
			return;
		}
		foreach ($fields_placeholders as $field => $value){
			$this->changePlaceholderSetting($field, $value);
		}

		return true;

	}

	protected function updateFieldsMapWithDbData($db_settings)
	{
		$this->updateRequiredWithDbData($db_settings);
		$this->updatePlaceholderWithDbData($db_settings);

		if(isset($db_settings["fields_placeholders"][0]['salutation'][0])){
			$this->updateSalutationWithDbData($db_settings["fields_placeholders"][0]['salutation'][0]);
		}

	}

	protected function updateSalutationWithDbData($data_array)
	{
		if(!$this->checkIsArray($data_array) ){
			return false;
		}

		$field_name = 'salutation';

		if(!isset($this->getFieldsMap()[$field_name]['options'])){
			return false;
		}

		foreach ($data_array as $key => $value){

			if(!array_key_exists($key, $this->getFieldsMap()[$field_name]['options'])){
				continue;
			}
			if(empty($value)){
				continue;
			}
			$this->fieldsMap[$field_name]['options'][$key][CURRENT_LANG_CODE] = $value;
		}

	}


	protected function changeRequiredSetting($field_name, $value){

		$key = 'required';

		if(!$this->getFieldsMap()[$field_name]){
            return false;
        }
		if(!array_key_exists($key, $this->getFieldsMap()[$field_name])){
			return false;
		}

		$this->fieldsMap[$field_name][$key] = $value;

	}

	protected function changePlaceholderSetting($field_name, $value){

		if(empty($value)){
			return;
		}

		$key = 'placeholder';

        if(!$this->getFieldsMap()[$field_name]){
            return false;
        }
		if(!array_key_exists($key, $this->getFieldsMap()[$field_name])){
			return false;
		}

		$this->fieldsMap[$field_name][$key][CURRENT_LANG_CODE] = $value;

	}


}