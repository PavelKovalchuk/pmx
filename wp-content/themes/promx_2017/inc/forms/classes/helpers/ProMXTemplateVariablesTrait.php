<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.03.2018
 * Time: 22:08
 */

trait ProMXTemplateVariablesTrait {

	protected static $formName = false;

	protected static $formTitle = '';

	protected static $formSuccessMessage = '';

	protected static $fieldsSettings = [];

	protected static $localDbSettings = [];

	protected static $localPlaceholders = [];

	protected static $globalDbSettings = [];


	public static function init($form_name, $fields_settings, $local_db_settings, $global_db_settings)
	{
		self::setFieldsSettings($fields_settings);
		self::setFormName($form_name);

		if(is_array($local_db_settings)){
			self::setLocalDbSettings($local_db_settings);
			self::setLocalPlaceholders($local_db_settings['fields_placeholders'][0]);
			self::setFormTitle($local_db_settings['form_title']);
			self::setFormSuccessMessage($local_db_settings['form_success_message']);
		}

		if(!self::getGlobalDbSettings() && is_array($global_db_settings)){
			self::setGlobalDbSettings($global_db_settings);
		}
		var_dump(self::getLocalPlaceholders());
		var_dump(self::getFormTitle());
		var_dump(self::getFormSuccessMessage());
	}

	public static function finish()
	{
		self::setFormName(false);
		self::setFieldsSettings(false);
		self::setLocalDbSettings(false);
		self::setLocalPlaceholders(false);
		self::setFormTitle(false);
		self::setFormSuccessMessage(false);
	}

	public static function getPlaceholder($field_name)
	{
		if(!$field_name){
			return;
		}

		//Data from Current form from admin panel
		$form_db_setting = self::getLocalPlaceholders()[$field_name];
		if($form_db_setting){
			return $form_db_setting;
		}

		//TODO = GLOBAL settings
		//Data from global settings in admin panel
		if(self::getGlobalDbSettings()['none']){
			return self::getGlobalDbSettings()['none'];
		}

		//Data from Fetcher class of Current form
		$script_field_setting = self::getFieldsSettings()[$field_name]['placeholder'][CURRENT_LANG_CODE];
		if($script_field_setting){
			return $script_field_setting;
		}

		return;

	}

	protected static function getJSFormClass()
	{
		return 'js-contact-form';
	}

	public static function getRadio($field_name, $option_key)
	{
		if(!$option_key || !$field_name){
			return;
		}

		//Data from Current form from admin panel
		$form_db_setting = self::getLocalPlaceholders()[$field_name][0][$option_key];
		if($form_db_setting){
			return $form_db_setting;
		}

		//TODO = GLOBAL settings
		//Data from global settings in admin panel
		if(self::getGlobalDbSettings()['none']){
			return self::getGlobalDbSettings()['none'];
		}

		//Data from Fetcher class of Current form
		$script_field_setting = self::getFieldsSettings()[$field_name]['options'][$option_key][CURRENT_LANG_CODE];
		if($script_field_setting){
			return $script_field_setting;
		}

		return;

	}

	/*public static function getButtonId($form_name)
	{
		if(!$form_name){
			return false;
		}

		$id = $form_name . '-' . CURRENT_LANG_CODE;

		return $id;

	}*/

	public static function getRequired($field_name)
	{
		return self::getFieldsSettings()[$field_name]['required'];
	}

	protected static function getRequiredSign()
	{
		return '*';
	}

	protected static function getRequiredClass()
	{
		return 'required';
	}

	/**
	 * @return array
	 */
	protected static function getFieldsSettings() {
		return self::$fieldsSettings;
	}

	/**
	 * @param array $fieldsSettings
	 */
	public static function setFieldsSettings( $fieldsSettings ) {
		self::$fieldsSettings = $fieldsSettings;
	}

	/**
	 * @return array
	 */
	protected static function getLocalDbSettings() {
		return self::$localDbSettings;
	}

	/**
	 * @param array $localDbSettings
	 */
	public static function setLocalDbSettings( $localDbSettings ) {
		self::$localDbSettings = $localDbSettings;
	}

	/**
	 * @return array
	 */
	protected static function getGlobalDbSettings() {
		return self::$globalDbSettings;
	}

	/**
	 * @param array $globalDbSettings
	 */
	public static function setGlobalDbSettings( $globalDbSettings ) {
		self::$globalDbSettings = $globalDbSettings;
	}

	/**
	 * @return array
	 */
	protected static function getLocalPlaceholders() {
		return self::$localPlaceholders;
	}

	/**
	 * @param array $localPlaceholders
	 */
	protected static function setLocalPlaceholders( $localPlaceholders ) {
		self::$localPlaceholders = $localPlaceholders;
	}

	/**
	 * @return mixed
	 */
	public static function getFormName() {
		return self::$formName;
	}

	/**
	 * @param mixed $formName
	 */
	public static function setFormName( $formName ) {
		self::$formName = $formName;
	}

	/**
	 * @return string
	 */
	public static function getFormTitle() {
		return self::$formTitle;
	}

	/**
	 * @param string $formTitle
	 */
	protected static function setFormTitle( $formTitle ) {
		self::$formTitle = $formTitle;
	}

	/**
	 * @return string
	 */
	public static function getFormSuccessMessage() {
		return self::$formSuccessMessage;
	}

	/**
	 * @param string $formSuccessMessage
	 */
	protected static function setFormSuccessMessage( $formSuccessMessage ) {
		self::$formSuccessMessage = $formSuccessMessage;
	}

}