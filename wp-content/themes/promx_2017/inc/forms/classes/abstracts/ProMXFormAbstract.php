<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 10:36
 */

abstract class ProMXFormAbstract {

	use ProMXCommonTrait;

	use ProMXSettingsDBTrait;

	use ProMXGlobalSettingsDBTrait;

	private $postObject;

	private $formName;

	private $fetcherHandler;

	private $template;

	private $ajaxHandler = 'promx_form_ajax_handler';

	private $availableStatuses = [
		'ok' => 'everything is good',
		'error' => 'there are some errors',
		'none' => 'no response was specified',
	];


	public function __construct(WP_Post $formPost)
	{
		$this->setPostObject($formPost);
		$this->setIsAdmin( current_user_can('manage_options') );
		$this->setFormName($formPost->post_name);

		$form_name_base = ProMXFormsManager::generateFormNameBase($this->getFormName());
		$fetcherClassName = ProMXFormsManager::generateFetcherClassName($form_name_base);

		if(!$this->isDBSettingsSet()){
			$this->setDBSettings( ProMXFormsManager::getFormSettings($this->getPostObject()->ID) );
		}

		if(!$this->isGlobalSettingsSet()){
			$this->initGlobalSettings();
		}

		$this->setFetcherHandler($fetcherClassName, $this->getDBSettings());

	}

	public function render()
	{

		if(!$this->isDBSettingsSet()){
			$this->showAdminMessage('DB settings of this form is not equal to $DBSettings.');
		}

        if(empty($this->getFetcherHandler()->getDisplayedFields())){
            $this->showAdminMessage('Fields to display in the form are not specified!');
            return false;
        }

		if(empty($this->getTemplate())){

			$this->showAdminMessage('Template for this form was not defined!');
			return false;
		}

		$template_path = ProMXFormsManager::getTemplatesDir() . $this->getTemplate();

		if(!file_exists($template_path)){
			return false;
		}

		$global_db_settings = [

		];

		ProMXTemplateEngine::init(
			$this->getFormName()
			,$this->getPostObject()->ID
			,$this->getFetcherHandler()->getFieldsMap()
			,$this->getDBSettings()
			,$global_db_settings
		);

		require_once($template_path);

		ProMXTemplateEngine::finish();

		return;
	}

	public function getResult($input_data)
	{
		$fetcher = $this->getFetcherHandler();

		if(!$fetcher){
			$this->showAdminMessage('Fetcher for this form was not defined!');
			return false;
		}

		if(!$this->isDBSettingsSet()){
			$this->setDBSettings( ProMXFormsManager::getFormSettings($this->getPostObject()->ID) );
		}

		$request = $fetcher->getRequest($input_data, $this->getDBSettings());
		//Log in file
		ProMXFormsManager::logInFile('ProMXFormAbstract_getResult_request', json_encode($request));
		//var_dump($request);
		if($fetcher->hasErrors() || !$request){
			return $this->createResponse('error', $fetcher->getErrorsInString());
		}

		$success_message = $this->getOneDBSetting('form_success_message');
		if(!$success_message){
			$success_message = $this->getOneGlobalSetting('forms_default_success_message_' . CURRENT_LANG_CODE);
		}

		$button_text = $this->getOneDBSetting('form_success_message_button');

		return $this->createResponse('ok', $success_message, $button_text);
	}

	public function createResponse($status, $message, $button = '')
	{
		if(!$button){
			$button = $this->getOneGlobalSetting('forms_default_success_button_' . CURRENT_LANG_CODE);
		}

		$responce = [
			'status' => 'none',
			'message' => '',
			'button' => $button
		];

		if(empty($status) || !is_string($message)){
			return $responce;
		}

		if(!array_key_exists($status, $this->getAvailableStatuses())){
			return $responce;
		}

		$responce = [
			'status' => $status,
			'message' => $message,
			'button' => $button
		];

		return $responce;

	}

	/**
	 * @return WP_Post
	 */
	public function getPostObject() {
		return $this->postObject;
	}

	/**
	 * @param WP_Post $postObject
	 */
	public function setPostObject( $postObject ) {
		$this->postObject = $postObject;
	}

	/**
	 * @return mixed
	 */
	public function getFetcherHandler() {
		return $this->fetcherHandler;
	}

	/**
	 * @param string $fetcherHandlerClassName
	 */
	public function setFetcherHandler( $fetcherHandlerClassName, $db_settings )
	{
		if(class_exists($fetcherHandlerClassName)){
			$fetcher_object = new $fetcherHandlerClassName($this->getGlobalLabels(), $this->getGlobalSettings(), $db_settings);
		}

		if(!$fetcher_object instanceof ProMXFetcherAbstract){
			$fetcherHandlerClassName = ProMXFormsManager::getFetcherDefaultClassName();
			$fetcher_object = new $fetcherHandlerClassName($this->getGlobalLabels(), $this->getGlobalSettings(), $db_settings);
		}

		$this->fetcherHandler = $fetcher_object;
	}

	/**
	 * @return mixed
	 */
	public function getTemplate() {
		return $this->template;
	}

	/**
	 * @param mixed $template
	 */
	public function setTemplate( $template ) {
		$this->template = $template;
	}


	/**
	 * @return mixed
	 */
	protected function getAjaxHandler() {
		return $this->ajaxHandler;
	}

	/**
	 * @param mixed $ajaxHandler
	 */
	protected function setAjaxHandler( $ajaxHandler ) {
		$this->ajaxHandler = $ajaxHandler;
	}

	/**
	 * @return array
	 */
	protected function getAvailableStatuses() {
		return $this->availableStatuses;
	}
	/**
	 * @return mixed
	 */
	public function getFormName() {
		return $this->formName;
	}

	/**
	 * @param mixed $formName
	 */
	public function setFormName( $formName ) {

		if(empty($formName) || !is_string($formName)){
			return false;
		}

		$this->formName = $formName;
	}


}