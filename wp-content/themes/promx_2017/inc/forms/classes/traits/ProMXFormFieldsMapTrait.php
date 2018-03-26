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
			'max_length' => 100,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'city' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'City',
            'max_length' => 80,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'company' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Company',
            'max_length' => 100,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'country' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Country',
            'max_length' => 80,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'email' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Email',
            'max_length' => 100,
			'sanitizers' => ['sanitizeEmail', 'cutMaxLengthString'],
			'validators' => [],
		],

		'event_description' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Eventdescription',
            'max_length' => 300,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'first_name' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Firstname',
            'max_length' => 50,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'last_name' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Lastname',
            'max_length' => 50,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'message' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Message',
            'max_length' => 300,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'no_potential_customers' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'NoPotentialCustomers',
            'max_length' => 10,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'position' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Position',
            'max_length' => 50,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'postal_code' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Postalcode',
            'max_length' => 20,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
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
            'max_length' => 100,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'street' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Street',
            'max_length' => 250,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'street_2' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Street2',
            'max_length' => 250,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'phone' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'Telephone',
            'max_length' => 50,
			'sanitizers' => ['sanitizeNumber', 'cutMaxLengthString'],
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
            'max_length' => 100,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'current_page' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'CurrentPage',
            'max_length' => 200,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
			'validators' => [],
		],

		'refer_page' => [
			'placeholder' => [
				'en' => '',
				'de' => '',
			],
			'required' => false,
			'azure_parameter' => 'ReferPage',
            'max_length' => 200,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
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
            'max_length' => 150,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
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
            'max_length' => 150,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
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
            'max_length' => 150,
			'sanitizers' => ['sanitizeString', 'cutMaxLengthString'],
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
            'max_length' => 200,
			'sanitizers' => ['cutMaxLengthString'],
			'validators' => [],
		],


	);

    /**
     * Holder for empty fields, which will be added later to Azure parameter
     * @var array
     */
	protected $emptyFieldsMap = [];

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
                $this->addToEmptyFieldsMap($data['azure_parameter']);
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

	public function getFieldsMaxLength()
    {
        $fields_map = $this->getFieldsMap();
        $result = [];

        foreach ($fields_map as $field => $data){

            if(!array_key_exists('max_length', $data) || !$data['max_length']){
                continue;
            }

            $result[$field] = intval($data['max_length']);

        }

        return $result;
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

    /**
     * @return array
     */
    protected function getEmptyFieldsMap()
    {
        return $this->emptyFieldsMap;
    }

    /**
     * @param array $emptyFieldsMap
     */
    protected function setEmptyFieldsMap($emptyFieldsMap)
    {
        $this->emptyFieldsMap = $emptyFieldsMap;
    }

    protected function addToEmptyFieldsMap($emptyField)
    {
        if(!is_string($emptyField)){
            return false;
        }
        $this->emptyFieldsMap[$emptyField] = '';

        return true;
    }


}