<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 06.03.2018
 * Time: 22:22
 */

/**
 * Class ProMXFormsManager
 * Has basic functionality for load form object,
 *
 */
abstract class ProMXFormsManager {

	const POST_TYPE = 'form';

	const FORMS_CLASS_PREFIX = 'Form';

	const FETCHER_CLASS_PREFIX = 'Fetcher';

	private static $fetchersDir = FORMS_MODELS_FETCHERS_DIR;

	private static $formsDir = FORMS_MODELS_FORMS_DIR;

	private static $templatesDir = FORMS_TEMPLATE_DIR;

	private static $fetcherDefaultClassName = 'FetcherDefault';

	public static function init()
	{
		//self::loadForms();

	}

	protected static function loadForms()
	{
		$forms = get_posts(array(
			'numberposts' => -1,
			'post_type' => self::POST_TYPE,
			'lang' => CURRENT_LANG_CODE,
			'post_status' => 'publish'
		));

		foreach ($forms as $form) {

			self::addFormToCache($form);
		}

	}

	public static function handleForm($formName, $successText)
	{
		$form_object = self::getForm($formName);

		if ($form_object) {

			return $form_object->render();
		}

		return null;
	}

	/**
	 * @param $formName
	 * @return ProRMForms_Abstract
	 */
	public static function getForm($formName)
	{
		$formPost = self::getFormPost($formName);

		if (!$formPost || !$formPost instanceof WP_Post) {
			return false;
		}

		if($formPost->post_type !== self::POST_TYPE){
			return false;
		}

		if(empty($formPost->post_name)){
			return false;
		}

		$form_name_base = self::generateFormNameBase($formPost->post_name);
		$formClassName = self::generateFormClassName($form_name_base);
		$fetcherClassName = self::generateFetcherClassName($form_name_base);

		$form_include_result = self::includeClass($formClassName, self::FORMS_CLASS_PREFIX);
		$fetcher_include_result = self::includeClass($fetcherClassName, self::FETCHER_CLASS_PREFIX);

		if(!$form_include_result || !$fetcher_include_result){
			return false;
		}

		$form_object = new $formClassName($formPost);

		return $form_object;

	}

	public static function getFormSettings($wp_post_id)
	{
		$post_id = intval($wp_post_id);
		if(!is_int($post_id) || !$post_id > 0){
			return false;
		}

		$acf_settings = get_fields( $post_id );

		if(empty($acf_settings)){
			return false;
		}

		return $acf_settings;
	}


	/**
	 * @param string $formKey
	 * @param bool $appendSlug
	 * @return WP_Post|null
	 */
	public static function getFormPost($form_slug)
	{
		if(!$form_slug){
			return false;
		}
		$form_posts = get_posts(array(
			'name' => $form_slug,
			'numberposts' => 1,
			'post_type' => self::POST_TYPE,
			'lang' => CURRENT_LANG_CODE,
			'post_status' => 'publish',
		));

		if(!is_array($form_posts)){
			return false;
		}

		$form_post = false;

		foreach ($form_posts as $key => $post_object){

			$form_lang = pll_get_post_language($post_object->ID,  'slug');
			if($form_lang == CURRENT_LANG_CODE){
				$form_post = $post_object;
			}

		}

		return $form_post;
	}

	public static function includeClass($className, $model_type)
	{
		if(!$className || !$model_type){
			return false;
		}

		if($model_type == self::FORMS_CLASS_PREFIX){
			$path = self::getFormsDir();
		}elseif ($model_type == self::FETCHER_CLASS_PREFIX){
			$path = self::getFetchersDir();
		}else{
			return false;
		}

		$filename = $path . "/" . $className . ".php";

		if (file_exists($filename)) {
			include_once($filename);
			if (class_exists($className)) {
				return TRUE;
			}
		}
		return false;
	}

	public static function manageUploadFile($uploadedfile, $form_uploads_rules)
	{
		if(!is_array($form_uploads_rules) || !$uploadedfile){
			return false;
		}

		if (!function_exists('wp_handle_upload')) {
			require_once(ABSPATH . 'wp-admin/includes/file.php');
		}

		$upload_error_text = $form_uploads_rules['upload_error_text'];

		if ( 0 < $_FILES['file']['error'] ) {

			$result = [
				'status' => 'error',
				'message' => $upload_error_text,
			];
			return $result;
		}

		$filetype = $uploadedfile["type"];
		$filesize = $uploadedfile["size"];

		//Check format
		$allowed_formats = $form_uploads_rules['allowed_formats'];
		if(!in_array($filetype, $allowed_formats)){
			$result = [
				'status' => 'error',
				'message' => $upload_error_text,
			];
			return $result;
		}

		//Check size
		$allowed_size = $form_uploads_rules['max_size'];
		$maxsize = $allowed_size * 1024 * 1024;
		if($filesize > $maxsize){
			$result = [
				'status' => 'error',
				'message' => $upload_error_text,
			];
			return $result;
		}

		$upload_overrides = array('test_form' => false);
		add_filter( 'upload_dir', 'promx_change_resume_upload_dir' );
		$movefile = wp_handle_upload($uploadedfile, $upload_overrides);
		remove_filter( 'upload_dir', 'promx_change_resume_upload_dir' );

		if (!$movefile || isset($movefile['error'])) {
			$result = [
				'status' => 'error',
				'message' => $upload_error_text,
			];
			return $result;
		}

		$result = [
			'status' => 'ok',
			'url' => $movefile['url'],
		];

		return $result;

	}

	/**
	 * @return string
	 */
	public static function getFetchersDir() {
		return self::$fetchersDir;
	}

	/**
	 * @return string
	 */
	public static function getFormsDir() {
		return self::$formsDir;
	}

	/**
	 * @return string
	 */
	public static function getTemplatesDir() {
		return self::$templatesDir;
	}

	public function generateFormNameBase($form_name)
	{
		if(!$form_name){
			return false;
		}

		$delimiter = '-';

		$form_name_array = array_map('ucwords', explode($delimiter, $form_name));
		$form_name_base = implode('', $form_name_array);

		return $form_name_base;

	}

	public function generateFormClassName($form_name_base){

		if(!$form_name_base){
			return false;
		}
		return self::FORMS_CLASS_PREFIX . $form_name_base;
	}

	public function generateFetcherClassName($form_name_base){

		if(!$form_name_base){
			return false;
		}
		return self::FETCHER_CLASS_PREFIX . $form_name_base;
	}

	/**
	 * @return string
	 */
	public static function getFetcherDefaultClassName() {
		return self::$fetcherDefaultClassName;
	}


}