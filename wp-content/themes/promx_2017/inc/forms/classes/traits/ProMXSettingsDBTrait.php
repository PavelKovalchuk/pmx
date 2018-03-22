<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.03.2018
 * Time: 13:00
 */

//Specific data of current form in wp admin
trait ProMXSettingsDBTrait {

	private $DBSettings = [
		"is_recaptcha" => null,
		"campaign_value" => null,
		"fields_placeholders" => null,
		"fields_required" => null,
		"button_text" => null,
		"form_title" => null,
		"form_success_message" => null,
		"select_product" => null,
		"additional_products" => null,
		"allowed_formats" => null,
		"allowed_formats_text" => null,
		"max_size" => null,
		'upload_error_text' => null,

	];

	private $isDBSettingsSet = false;

	/**
	 * @return array
	 */
	protected function getDBSettings() {
		return $this->DBSettings;
	}

	/**
	 * @param array $formSettings
	 */
	protected function setDBSettings( $formSettings ) {
		if(!$this->checkIsArray($formSettings)){
			$this->DBSettings = false;
			return false;
		}

		if(!$this->isExpectedSettingsValid($formSettings)){
			$this->DBSettings = false;
			return false;
		}

		$this->setIsDBSettingsSet(true);
		$this->DBSettings = $formSettings;
	}

	private function isExpectedSettingsValid($formSettings)
	{
		$diff = array_diff_key($formSettings, $this->getDBSettings());

		if(!empty($diff)){
			return false;
		}

		return true;

	}

	/**
	 * @return bool
	 */
	protected function isDBSettingsSet() {
		return $this->isDBSettingsSet;
	}

	/**
	 * @param bool $isDBSettingsSet
	 */
	protected function setIsDBSettingsSet( $isDBSettingsSet ) {
		$this->isDBSettingsSet = $isDBSettingsSet;
	}

	//From settings of current form in wp admin
	public function getOneDBSetting($setting_name)
	{
		if(!$setting_name || !is_string($setting_name)){
			return false;
		}

		if(!array_key_exists( $setting_name, $this->getDBSettings() )){
			return false;
		}

		return $this->getDBSettings()[$setting_name];

	}

}