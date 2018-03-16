<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.03.2018
 * Time: 14:20
 */

trait ProMXErrorHandlerTrait {

	private $systemErrors = [];

	private $devCode = 'dev';

	private $errors = array();

	private $isErrors = false;

	protected function initSystemErrors()
	{
		$this->systemErrors = [

			'data_format_error' => [
				'en' => 'Sorry, we did not receive your data. Check each fields and try again!',
				'de' => 'Sorry, we did not receive your data. Check each fields and try again!',
				'dev' => 'Received data has bad format.'
			],

			'nonce_value_empty' => [
				'en' => 'Sorry, we did not receive security value. Update page and try again!',
				'de' => 'Sorry, we did not receive security value. Update page and try again!',
				'dev' => 'Nonce field is empty.'
			],

			'nonce_value_error' => [
				'en' => 'Sorry, we did not receive security value. Update page and try again!',
				'de' => 'Sorry, we did not receive security value. Update page and try again!',
				'dev' => 'Nonce field is nor verified.'
			],

			'available_fields_empty' => [
				'en' => 'Sorry, we did not receive your data. Check each fields and try again!',
				'de' => 'Sorry, we did not receive your data. Check each fields and try again!',
				'dev' => 'Empty form!'
			],

			'sanitized_values_empty' => [
				'en' => 'Sorry, we did not receive your data. Check each fields and try again!',
				'de' => 'Sorry, we did not receive your data. Check each fields and try again!',
				'dev' => 'After sanitizing all fields are empty.'
			],

			'required_fields_empty' => [
				'en' => 'Sorry, we did not receive all required data. Check each fields marked with * and try again!',
				'de' => 'Sorry, we did not receive all required data. Check each fields marked with * and try again!',
				'dev' => 'Required fields are empty.'
			],

			'azure_parameter_empty'=> [
				'en' => 'Sorry, we cannot handle received data. Ttry again later!',
				'de' => 'Sorry, we cannot handle received data. Ttry again later!!',
				'dev' => 'Some of the Azure parameter is empty.'
			],

		];
	}

	/**
	 * @return bool
	 */
	public function hasErrors() {
		return $this->isErrors;
	}

	/**
	 * @return array
	 */
	public function getErrors() {
		return $this->errors;
	}

	public function getErrorsInString(){

		if($this->hasErrors() == false || empty($this->getErrors())){
			return false;
		}

		return implode(' ', $this->getErrors());

	}

	/**
	 * @param array $errors
	 */
	protected function setErrors( $errors ) {

		if(!is_array($errors)){
			return false;
		}

		$this->setErrors(true);

		$this->errors = $errors;
	}

	protected function addError( $error ) {

		if(!is_string($error)){
			return false;
		}

		$this->setIsErrors(true);

		$this->errors[] = $error;

		return true;

	}

	protected function addSystemError( $error_code ) {

		if(!array_key_exists($error_code, $this->getSystemErrors())){
			return false;
		}

		$code = (current_user_can('manage_options')) ? $this->getDevCode() : CURRENT_LANG_CODE;

		return $this->addError($this->getSystemErrors()[$error_code][$code]);
	}

	/**
	 * @param bool $isError
	 */
	protected function setIsErrors( $isError ) {

		if(!is_bool($isError)){
			return false;
		}

		$this->isErrors = $isError;

	}

	/**
	 * @return array
	 */
	protected function getSystemErrors() {
		return $this->systemErrors;
	}

	protected function getOneSystemError($error_code) {

		if(! is_string($error_code) || !$error_code){
			return false;
		}

		if(!isset($this->getSystemErrors()[$error_code])){
			return false;
		}
		return $this->getSystemErrors()[$error_code];
	}

	/**
	 * @return string
	 */
	protected function getDevCode() {
		return $this->devCode;
	}



}