<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.03.2018
 * Time: 14:30
 */

class ProMXTemplateEngine {

	protected static $fieldsSettings = [];

	protected static $localDbSettings = [];

	protected static $localPlaceholders = [];

	protected static $globalDbSettings = [];


	public static function init($fields_settings, $local_db_settings, $global_db_settings)
	{
		self::setFieldsSettings($fields_settings);

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


	}

	public static function finish()
	{
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

	protected static function getHelpBlock($text = '')
	{
		?>
		<span class="help-block" style="display: none;"><?php if($text){echo $text; }?></span>
		<?php
	}


	public static function inputTextField($name_attr, $is_required = false, $placeholder = '', $id_attr = '',  $field_class = '', $parent_class = '')
	{
		if(!$name_attr){
			return;
		}
		?>
		<div class="form-group <?php if($parent_class){echo $parent_class; }?>">
			<input
				type="text"
				name="<?php echo $name_attr; ?>"
				<?php if($id_attr){
					?>id="<?php echo $id_attr; ?>"
				<?php }	?>
				class="form-control <?php if($field_class){echo $field_class; }?>"
				<?php if($placeholder){ ?>
				placeholder="<?php echo $placeholder; if($is_required){echo self::getRequiredSign(); } }?>"
			>
			<?php self::getHelpBlock(); ?>
		</div>
		<?php

	}

	public static function textareaField($name_attr, $is_required = false, $placeholder = '', $id_attr = '',  $field_class = '', $parent_class = '', $rows = 4)
	{
		if(!$name_attr){
			return;
		}
		?>
		<div class="form-group <?php if($parent_class){echo $parent_class; }?>">
			<textarea
				rows="<?php if($rows){echo $rows; }?>"
				name="<?php echo $name_attr; ?>"
				<?php if($id_attr){
				?>id="<?php echo $id_attr; ?>"
				<?php }	?>
				class="form-control <?php if($field_class){echo $field_class; }?>"
				<?php if($placeholder){ ?>
				placeholder="<?php echo $placeholder; if($is_required){echo self::getRequiredSign(); } }?>"></textarea>

			<?php self::getHelpBlock(); ?>
		</div>
		<?php

	}

	public static function button($text = false, $id_attr = '',  $button_class = '', $parent_class = '')
	{
		$text_display = ($text) ? $text : self::getLocalDbSettings()['button_text'];

		?>

		<div class="form-group <?php if($parent_class){echo $parent_class; }?>">
			<button
				type="submit"
				<?php if($id_attr){
				?>id="<?php echo $id_attr; ?>"
				<?php }	?>
				class="js-contact-button btn <?php if($button_class){echo $button_class; }?>">
				<?php echo $text_display; ?>
			</button>
		</div>

		<?php

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

}