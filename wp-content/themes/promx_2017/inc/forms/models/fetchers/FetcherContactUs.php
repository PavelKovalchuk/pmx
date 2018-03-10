<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 11:07
 */

class FetcherContactUs extends ProMXFetcherAbstract{

	public function __construct()
	{
		parent::__construct();


		/** @var ProRMSettings $settings */
		//$settings = Registry::get('settings');

		/*$this->required['first_name'] = __('First Name', TEXTDOMAIN);
		$this->required['email'] = __('E-Mail', TEXTDOMAIN);
		$this->required['company'] = __('Company', TEXTDOMAIN);
		$this->required['data_usage'] = __('Data usage', TEXTDOMAIN);*/
	}

	protected function initFieldsSettings()
	{
		$this->fieldsMap['company']['required'] = true;

	}

}