<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 18.03.2018
 * Time: 11:47
 */

trait ProMXGlobalSettingsDBTrait {

	private $globalLabels = [];

	private $globalSettings = [];

	private $isGlobalSettingsSet = false;

	protected function initGlobalSettings()
	{
		$global_labels_data =  get_option( '_promx_forms_general_labels_options' );
		$is_labels_set = $this->setGlobalLabels($global_labels_data);

		$global_settings =  get_option( '_promx_forms_settings_options' );

		$is_global_settings_set = $this->setGlobalSettings($global_settings);

		if($is_labels_set && $is_global_settings_set){
			$this->setIsGlobalSettingsSet(true);
		}

	}

	/**
	 * @return array
	 */
	public function getGlobalLabels() {
		return $this->globalLabels;
	}

	/**
	 * @param array $globalLabels
	 */
	public function setGlobalLabels( $globalLabels ) {

		if(!$this->checkIsArray($globalLabels)){
			$this->globalLabels = false;
			return false;
		}

		$this->globalLabels = $globalLabels;

		return true;

	}

	/**
	 * @return bool
	 */
	public function isGlobalSettingsSet() {
		return $this->isGlobalSettingsSet;
	}

	/**
	 * @param bool $isGlobalSettingsSet
	 */
	public function setIsGlobalSettingsSet( $isGlobalSettingsSet ) {
		$this->isGlobalSettingsSet = $isGlobalSettingsSet;
	}

	/**
	 * @return array
	 */
	public function getGlobalSettings() {
		return $this->globalSettings;
	}

	public function getOneGlobalSetting($setting_name) {

		if(!$setting_name || !is_string($setting_name)){
			return false;
		}

		if(!array_key_exists( $setting_name, $this->getGlobalSettings() )){
			return false;
		}

		return $this->getGlobalSettings()[$setting_name];
	}

	/**
	 * @param array $globalSettings
	 */
	public function setGlobalSettings( $globalSettings ) {

		if(!$this->checkIsArray($globalSettings)){
			$this->globalSettings = false;
			return false;
		}

		$this->globalSettings = $globalSettings;

		return true;
	}



}