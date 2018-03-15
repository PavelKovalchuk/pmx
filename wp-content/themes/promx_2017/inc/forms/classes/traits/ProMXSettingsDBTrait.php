<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.03.2018
 * Time: 13:00
 */

trait ProMXSettingsDBTrait {

	private $DBSettings = [
		"is_recaptcha" => null,
		"campaign_value" => null,
		"fields_placeholders" => null,
		"fields_required" => null,
		"button_text" => null,
		"form_title" => null,
		"form_success_message" => null,
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

	protected function getOneDBSetting($setting_name)
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