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

		$this->setFetcherHandler($fetcherClassName);

	}

	public function render()
	{
		if(!$this->isDBSettingsSet()){
			$this->setDBSettings( ProMXFormsManager::getFormSettings($this->getPostObject()->ID) );
		}

		if(!$this->isDBSettingsSet()){
			$this->showAdminMessage('DB settings of this form is not equal to $DBSettings.');
		}

		if(empty($this->getTemplate())){

			$this->showAdminMessage('Template for this form was not defined!');
			return false;
		}

		$template_path = ProMXFormsManager::getTemplatesDir() . $this->getTemplate();

		if(!file_exists($template_path)){
			return false;
		}

		//ob_start();
		/**
		 * TODO - create form in admin for common settings
		 * common_db_settings
		 */

		$FORM_DATA = [
			'form_name' => $this->getFormName(),
			'db_settings' => $this->getDBSettings(),
			'common_db_settings' => false,
			'fields_settings' => $this->getFetcherHandler()->getFieldsMap(),
		];


		$global_db_settings = [];

		ProMXTemplateEngine::init(
			$this->getFormName()
			,$FORM_DATA['fields_settings']
			,$FORM_DATA['db_settings']
			,$global_db_settings
		);


		require_once($template_path);

		//$formHtml = ob_get_clean();

		ProMXTemplateEngine::finish();
		//return $formHtml;
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
		var_dump($request);
		if($fetcher->hasErrors() || !$request){
			return $this->createResponse('error', $fetcher->getErrorsInString());
		}

		return $this->createResponse('ok', 'Fetcher does not have errors.');
	}

	public function createResponse($status, $message)
	{
		$responce = [
			'status' => 'none',
			'message' => ''
		];

		if(empty($status) || empty($message) || !is_string($message)){
			return $responce;
		}

		if(!array_key_exists($status, $this->getAvailableStatuses())){
			return $responce;
		}

		$responce = [
			'status' => $status,
			'message' => $message
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
	public function setFetcherHandler( $fetcherHandlerClassName ) {

		if(class_exists($fetcherHandlerClassName)){
			$fetcher_object = new $fetcherHandlerClassName();
		}

		if(!$fetcher_object instanceof ProMXFetcherAbstract){
			$fetcherHandlerClassName = ProMXFormsManager::getFetcherDefaultClassName();
			$fetcher_object = new $fetcherHandlerClassName();
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