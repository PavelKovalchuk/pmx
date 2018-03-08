<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 10:36
 */

abstract class ProMXFormAbstract {

	protected $formName;

	protected $postObject;

	protected $fetcherHandler;

	protected $template;

	protected $ajaxHandler = 'promx_form_ajax_handler';


	public function __construct(WP_Post $formPost)
	{
		$this->setPostObject($formPost);

	}

	public function render()
	{
		if(empty($this->getTemplate())){

			$this->showAdminMessage('Template for this form was not defined!');
			return false;
		}

		$template_path = ProMXFormsManager::getTemplatesDir() . $this->getTemplate();

		if(!file_exists($template_path)){
			return false;
		}

		ob_start();
		$promx_form_name = $this->getFormName();
		require_once($template_path);

		$formHtml = ob_get_clean();

		return $formHtml;
	}

	public function getResult($input_data)
	{
		$fetcher = $this->getFetcherHandler();

		//TODO - analyze input data. If all required fields exists, validate email, if errors - return errors
		$fetcher_response = $fetcher->analyze($input_data);
	}

	public function isSubmitted()
	{
		return isset($_POST[$this->formName]);
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
		$this->formName = $formName;
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
	 * @param mixed $fetcherHandler
	 */
	public function setFetcherHandler( $fetcherHandler ) {
		$this->fetcherHandler = $fetcherHandler;
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

	protected function showAdminMessage($message)
	{
		if(!$message){
			return;
		}

		if(current_user_can('manage_options')){
			echo $message;
		}

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

}