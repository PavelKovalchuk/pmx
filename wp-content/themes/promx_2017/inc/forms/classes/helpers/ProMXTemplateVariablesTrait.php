<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.03.2018
 * Time: 22:08
 */

/**
 * Trait ProMXTemplateVariablesTrait
 * Has and returns texts representations of the forms settings
 *
 */
trait ProMXTemplateVariablesTrait {

	protected static $formName = false;

	protected static $formTitle = '';

	protected static $formPostId = '';

	protected static $formButton = '';

	protected static $uploadAllowedFormatsText = '';

	protected static $formSuccessMessage = '';

	protected static $fieldsSettings = [];

	//protected static $localDbSettings = [];

	protected static $globalDbSettings = [];


	public static function init($form_name, $form_post_id, $fields_settings, $local_db_settings, $global_db_settings)
	{
		self::setFieldsSettings($fields_settings);
		self::setFormName($form_name);
		self::setFormPostId($form_post_id);

		if(!self::getGlobalDbSettings() && is_array($global_db_settings)){
			self::setGlobalDbSettings($global_db_settings);
		}

		if(!is_array($local_db_settings)){
			return;
		}

		self::setFormTitle($local_db_settings['form_title']);
		self::setFormSuccessMessage($local_db_settings['form_success_message']);
		self::setFormButton($local_db_settings['button_text']);

		if(!empty($local_db_settings["allowed_formats_text"])){
			self::setUploadAllowedFormatsText($local_db_settings["allowed_formats_text"]);
		}
	}

	public static function finish()
	{
		self::setFormName(false);
		self::setFieldsSettings(false);
		self::setFormPostId(false);
		self::setFormTitle(false);
		self::setFormButton(false);
		self::setFormSuccessMessage(false);
		self::setUploadAllowedFormatsText(false);
	}

	public static function getPlaceholder($field_name)
	{
		if(!$field_name){
			return;
		}

		//Data from Fetcher class of Current form, changed by admin panel of current form
		$form_field_setting = self::getFieldsSettings()[$field_name]['placeholder'][CURRENT_LANG_CODE];
		if($form_field_setting){
			return $form_field_setting;
		}

		return;

	}

    public static function getFieldMaxLength($field_name)
    {
        if(!$field_name){
            return;
        }

        //Data from Fetcher class of Current form, changed by admin panel of current form
        $form_field_setting = self::getFieldsSettings()[$field_name]['max_length'];
        if($form_field_setting){
            return $form_field_setting;
        }

        return;

    }

	protected static function getJSFormClass()
	{
		return 'js-contact-form';
	}

	public static function createOptionsForSelect($code, $value, $title)
	{
		if(!$value || !$title || !$code){
			return false;
		}

		return [
			'code' => $code,
			'value' => strtolower($value),
			'title' => $title,
		];

	}

	public static function getRadio($field_name, $option_key)
	{
		if(!$option_key || !$field_name){
			return;
		}

		//Data from Fetcher class of Current form, changed by admin panel of current form
		$form_field_setting = self::getFieldsSettings()[$field_name]['options'][$option_key][CURRENT_LANG_CODE];
		if($form_field_setting){
			return $form_field_setting;
		}

		return;

	}

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
	 * @return string
	 */
	public static function getFormPostId() {
		return self::$formPostId;
	}

	/**
	 * @param string $formPostId
	 */
	public static function setFormPostId( $formPostId ) {
		self::$formPostId = $formPostId;
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
	public static function getFormButton() {
		return self::$formButton;
	}

	/**
	 * @param string $formButton
	 */
	public static function setFormButton( $formButton ) {
		self::$formButton = $formButton;
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

	/**
	 * @return string
	 */
	public static function getUploadAllowedFormatsText() {
		return self::$uploadAllowedFormatsText;
	}

	/**
	 * @param string $uploadAllowedFormatsText
	 */
	protected static function setUploadAllowedFormatsText( $uploadAllowedFormatsText ) {
		self::$uploadAllowedFormatsText = $uploadAllowedFormatsText;
	}

}