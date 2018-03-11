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

	const DIR_TMP_UPLOADFILES = "tmp-uploadfiles/";

	private $lang = CURRENT_LANG_CODE;

	/** @var string  */
	/*protected $formSubject = array(
		'de' => '',
		'en' => '',
		'es' => ''
	);

	protected $langTitles = array(
		'de' => 'German',
		'en' => 'English',
		'es' => 'Spanish'
	);*/

	abstract protected function initFieldsSettings();

	public function __construct()
	{
		$this->initSystemErrors();
		$this->initFieldsSettings();

	}

	public function analyze($input_data){

		if(!$this->checkIsArray($input_data)){
			$this->addSystemError('data_format_error');
			return false;
		}
		var_dump($input_data);

		$nonce_verified = $this->checkFormNonce($input_data);
		if(!$nonce_verified){
			return false;
		}
		var_dump($nonce_verified);

		$data_filtered = $this->getAvailableFields($input_data);
		var_dump($data_filtered);

		if(!$data_filtered){
			return false;
		}

		$data_sanitized = $this->sanitizeValues($data_filtered);
		var_dump($data_sanitized);
		if(!$data_sanitized){
			return false;
		}

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
		$sanitizeClassName = 'ProMXFormSanitize';

		foreach ($input_data as $field_name => $value){

			$sanitizers_map = $this->getOneFieldSettings($field_name)['sanitizers'];

			if(empty($sanitizers_map) || !$this->checkIsArray($sanitizers_map)){
				//raw value will be used
				$sanitized_data[$field_name] = $value;
				continue;
			}

			foreach ($sanitizers_map as $sanitizer){

				if(!method_exists($sanitizeClassName, $sanitizer)){
					continue;
				}

				$sanitized_data[$field_name] = $sanitizeClassName::$sanitizer($value);

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

				$available_fields[$field_name] = $value;

			}

		}

		if(empty($available_fields)){

			$this->addSystemError('available_fields_empty');
			return false;

		}

		return $available_fields;

	}

	protected function isRequiredValuesExists($input_data)
	{

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






}