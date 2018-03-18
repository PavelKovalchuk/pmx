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
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'City',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'company' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Company',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'country' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Country',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'email' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Email',
			'sanitizers' => ['sanitizeEmail'],
			'validators' => [],
		],

		'event_description' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Eventdescription',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'first_name' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Firstname',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'last_name' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Lastname',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'message' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Message',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'no_potential_customers' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'NoPotentialCustomers',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'position' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Position',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'postal_code' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Postalcode',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'salutation' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
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
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Street',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'street_2' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Street2',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'phone' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Telephone',
			'sanitizers' => ['sanitizeNumber'],
			'validators' => [],
		],

		//NEW Azure parameters
		'language' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'PageLanguage',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'current_page' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'CurrentPage',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'refer_page' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'ReferPage',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'event' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
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
				'en' => '',
				'de' => '',
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

		'career_position' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'type' => 'select',
			'options' => [
				[],
			],
			'required' => false,
			'azure_parameter' => 'CareerPosition',
			'sanitizers' => ['sanitizeString'],
			'validators' => [],
		],

		'file_url' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			//'type' => 'file',
			'required' => false,
			'azure_parameter' => 'FileUrl',
			'sanitizers' => [],
			'validators' => [],
		],


	);

	// Fields - will be displayed on the frontend
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
        $this->addDisplayedField('current_page');
        $this->addDisplayedField('refer_page');
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

	protected function updatePlaceholderWithLocalDbData($db_settings)
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

	protected function updatePlaceholderWithGlobalDbData($global_labels)
	{

		$global_labels_data = [];

		foreach ($global_labels as $key => $value){
			$field_data = explode('-', $key);

			if($field_data[1] == CURRENT_LANG_CODE){
				$global_labels_data[$field_data[0]] = $value;
			}
		}

		foreach ($global_labels_data as $field => $value){
			$this->changePlaceholderSetting($field, $value);
		}

		if( isset($global_labels_data["salutation_option_he"]) || isset($global_labels_data["salutation_option_she"]) ){
			$salutation_options = [
				'he' => $global_labels_data["salutation_option_he"],
				'she' => $global_labels_data["salutation_option_she"],
			];
			$this->updateSalutationWithDbData($salutation_options);
		}

		return true;
	}

	protected function updateFieldsMapWithDbData()
	{
		$db_settings =  $this->getDBSettings();
		$global_labels =  $this->getGlobalLabels();

		$this->updateRequiredWithDbData($db_settings);
		$this->updatePlaceholderWithGlobalDbData($global_labels);
		$this->updatePlaceholderWithLocalDbData($db_settings);


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