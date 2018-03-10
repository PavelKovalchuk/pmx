<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 06.03.2018
 * Time: 22:22
 */


abstract class ProMXFormsManager {

	const POST_TYPE = 'form';

	const FORMS_CLASS_PREFIX = 'Form';

	const FETCHER_CLASS_PREFIX = 'Fetcher';

	private static $fetchersDir = FORMS_MODELS_FETCHERS_DIR;

	private static $formsDir = FORMS_MODELS_FORMS_DIR;

	private static $templatesDir = FORMS_TEMPLATE_DIR;

	private static $fetcherDefaultClassName = 'FetcherDefault';

	private static $formsCache = array();

	public static function init()
	{
		self::loadForms();

		/*$client = new CrmClient();
		$client -> ajaxForm();*/

	}

	public static function test()
	{
		$forms = self::getFormsCache();
		//var_dump($forms);
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
		var_dump($form_object);
		if ($form_object) {
			/*ProMXVariables::set('fetcher', $form->getFetcher());
			ProMXVariables::set('form', $form);

			$handledSuccessfully = self::handleFormSubmission($form);

			ProMXVariables::set('form_submitted', true);
			if($successText){
				ProMXVariables::set('form_success_message', $successText);
			} else {
				ProMXVariables::set('form_success_message', $form->getSuccessMessage());
			}*/

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

	/**
	 * @param string $formKey
	 * @param bool $appendSlug
	 * @return WP_Post|null
	 */
	public static function getFormPost($formKey)
	{
		if( isset(self::$formsCache[$formKey]) ){
			return self::$formsCache[$formKey];
		}

		return false;
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
	 * @return array
	 */
	protected static function getFormsCache() {
		return self::$formsCache;
	}

	/**
	 * @param array $formsCache
	 */
	protected static function addFormToCache( WP_Post $form ) {
		self::$formsCache[$form->post_name] = $form;
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