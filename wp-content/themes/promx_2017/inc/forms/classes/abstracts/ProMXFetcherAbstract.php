<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 11:09
 */

abstract class ProMXFetcherAbstract {

	use ProMXErrorHandlerTrait;

	use ProMXCommonTrait;

	use ProMXFormFieldsMapTrait;

	use ProMXSettingsDBTrait;

	use ProMXGlobalSettingsDBTrait;

	private $lang = CURRENT_LANG_CODE;

	private $emptyRequiredFields = [];

	abstract protected function initFieldsSettings();

	public function __construct($global_labels, $global_settings, $db_settings)
	{
		$this->initSystemErrors();
		$this->initDisplayedField();
		$this->initFieldsSettingsWithDbData($global_labels, $global_settings, $db_settings);
		$this->initFieldsSettings();

	}

	protected function initFieldsSettingsWithDbData($global_labels, $global_settings, $db_settings)
	{
		if(!$this->checkIsArray($db_settings) || !$this->checkIsArray($global_labels) || !$this->checkIsArray($global_settings)){
			$this->setDBSettings(false);
			return false;
		}

		$this->setGlobalLabels($global_labels);
		$this->setGlobalSettings($global_settings);
		$this->setDBSettings($db_settings);
		$this->updateFieldsMapWithDbData();

	}

	public function getRequest($input_data, $db_settings)
    {

		if(!$this->checkIsArray($input_data) || !$this->checkIsArray($db_settings)){
			$this->addSystemError('data_format_error');
			return false;
		}

		$this->setDBSettings($db_settings);
		if(!$this->isDBSettingsSet()){
			$this->addError( $this->getAdminMessage('DB settings of this form is not equal to $DBSettings.') );
		}

		$nonce_verified = $this->checkFormNonce($input_data);
		if(!$nonce_verified){
			return false;
		}

		$data_filtered = $this->getAvailableFields($input_data);
		if(!$data_filtered){
			return false;
		}

		$data_sanitized = $this->sanitizeValues($data_filtered);
		if(!$data_sanitized){
			return false;
		}

		//Add Campaign to data
		$data_sanitized['campaign'] = $this->getOneDBSetting('campaign_value');

		$is_required_complete = $this->isRequiredValuesExist($data_sanitized);
		if(!$is_required_complete){
			return false;
		}

		$request = $this->createAzureRequest($data_sanitized);
		if(!$request){
			return false;
		}

		return $request;

	}

	protected function createAzureRequest($input_data)
	{
		$fields_map = $this->getFieldsMap();
		$request = [];
		$is_error = false;

		foreach ($input_data as $field_name => $value){

			if(!array_key_exists($field_name, $fields_map)){
				continue;
			}
			$azure_parameter = $fields_map[$field_name]['azure_parameter'];

			if(empty($azure_parameter)){
				$is_error = true;
				continue;
			}

			$request[$azure_parameter] = $value;

		}

		if($is_error){
			$this->addSystemError('azure_parameter_empty');
			return false;
		}

        $request_with_empty = array_merge( $request, $this->getEmptyFieldsMap());
		return $request_with_empty;

	}

	protected function isRequiredValuesExist($input_data)
	{
		$fields_map = $this->getFieldsMap();
		$required_fields = [];
		$skipped_required_fields = [];
		$number_required_fields = 0;

		foreach ($fields_map as $field_name => $settings){

			if(!$settings['required']){
				continue;
			}

			$number_required_fields++;

			if(!isset($input_data[$field_name]) || empty($input_data[$field_name]) ){
				$skipped_required_fields[] = $field_name;
			}

			$required_fields[$field_name] = $input_data[$field_name];

		}

		if(!empty($skipped_required_fields)){

			$this->addSystemError('required_fields_empty');
			$this->setEmptyRequiredFields($skipped_required_fields);
			return false;
		}

		if($number_required_fields != count($required_fields)){
			$this->addSystemError('required_fields_empty');
			return false;
		}

		return true;

	}

	protected function checkFormNonce($input_data)
	{
		$form_name = $input_data['form_name'];
		$nonce = $input_data['form_nonce'];

		if(empty($form_name) || empty($nonce)){
			$this->addSystemError('nonce_value_empty');
			return false;
		}

		if( wp_verify_nonce( $nonce, $form_name) == false){
			$this->addSystemError('nonce_value_error');
			return false;
		}

		return true;
	}

	protected function sanitizeValues($input_data)
	{
		$sanitized_data = [];

        ProMXFormSanitize::setMaxLengthMap( $this->getFieldsMaxLength() );

		foreach ($input_data as $field_name => $value){

			$sanitizers_map = $this->getOneFieldSettings($field_name)['sanitizers'];

			if(empty($sanitizers_map) || !$this->checkIsArray($sanitizers_map)){
				//raw value will be used
				$sanitized_data[$field_name] = $value;
				continue;
			}

			foreach ($sanitizers_map as $sanitizer){

				if(!method_exists('ProMXFormSanitize', $sanitizer)){
					continue;
				}

				$sanitized_data[$field_name] = ProMXFormSanitize::$sanitizer($field_name, $value);

			}

		}

		if(empty($sanitized_data)){

			$this->addSystemError('sanitized_values_empty');
			return false;

		}

		return $sanitized_data;

	}

	protected function getAvailableFields($input_data){

		$available_fields = [];
		$fields_map = $this->getFieldsMap();

		foreach ($input_data as $field_name => $value){

			if(array_key_exists($field_name, $fields_map)){

				if(empty($value)){
					continue;
				}

				$available_fields[$field_name] = $value;

			}

		}

		if(empty($available_fields)){

			$this->addSystemError('available_fields_empty');
			return false;

		}

		return $available_fields;

	}

	/**
	 * @return bool|string
	 */
	protected function getLang() {
		return $this->lang;
	}

	/**
	 * @param bool|string $lang
	 */
	protected function setLang( $lang ) {
		$this->lang = $lang;
	}

	/**
	 * @return array
	 */
	protected function getEmptyRequiredFields() {
		return $this->emptyRequiredFields;
	}

	/**
	 * @param array $emptyRequiredFields
	 */
	protected function setEmptyRequiredFields( $emptyRequiredFields ) {
		if(!$this->checkIsArray($emptyRequiredFields)){
			$this->emptyRequiredFields = false;
		}
		$this->emptyRequiredFields = $emptyRequiredFields;
	}

}