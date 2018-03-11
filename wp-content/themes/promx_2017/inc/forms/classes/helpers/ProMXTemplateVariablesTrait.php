<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.03.2018
 * Time: 22:08
 */

trait ProMXTemplateVariablesTrait {

	protected static $formName = false;

	protected static $keySalutationHe = 'he';

	protected static $keySalutationShe = 'she';

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
		}else{
			self::setLocalDbSettings(false);
			self::setLocalPlaceholders(false);
		}

		if(!self::getGlobalDbSettings() && is_array($global_db_settings)){
			self::setGlobalDbSettings($global_db_settings);
		}
		var_dump(self::getLocalPlaceholders());
	}

	public static function finish()
	{
		self::setFormName(false);
		self::setFieldsSettings(false);
		self::setLocalDbSettings(false);
		self::setLocalPlaceholders(false);
	}

	public static function getPlaceholder($field_name)
	{
		if(self::getLocalPlaceholders()[$field_name]){
			return self::getLocalPlaceholders()[$field_name];
		}

		if(self::getGlobalDbSettings()['none']){
			return self::getGlobalDbSettings()['none'];
		}

		if(self::getFieldsSettings()[$field_name]['placeholder'][CURRENT_LANG_CODE]){
			return self::getFieldsSettings()[$field_name]['placeholder'][CURRENT_LANG_CODE];
		}

		return;

	}

	public static function getRadio($field_name, $db_key)
	{
		if(self::getLocalPlaceholders()[$field_name][0][$db_key]){
			return self::getLocalPlaceholders()[$field_name][0][$db_key];
		}

		if(self::getGlobalDbSettings()['none']){
			return self::getGlobalDbSettings()['none'];
		}

		/*if(self::getFieldsSettings()[$field_name]['placeholder'][CURRENT_LANG_CODE]){
			return self::getFieldsSettings()[$field_name]['placeholder'][CURRENT_LANG_CODE];
		}*/

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
	public static function getKeySalutationHe() {
		return self::$keySalutationHe;
	}

	/**
	 * @return string
	 */
	public static function getKeySalutationShe() {
		return self::$keySalutationShe;
	}



}