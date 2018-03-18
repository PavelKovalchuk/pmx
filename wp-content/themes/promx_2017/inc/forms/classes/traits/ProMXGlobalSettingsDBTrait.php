<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 18.03.2018
 * Time: 11:47
 */

trait ProMXGlobalSettingsDBTrait {

	private $globalLabels = [];

	private $isGlobalSettingsSet = false;

	protected function initGlobalSettings()
	{
		$global_labels_data =  get_option( '_promx_forms_general_labels_options' );

		$this->setGlobalLabels($global_labels_data);

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

		$this->setIsGlobalSettingsSet(true);
		$this->globalLabels = $globalLabels;

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



}