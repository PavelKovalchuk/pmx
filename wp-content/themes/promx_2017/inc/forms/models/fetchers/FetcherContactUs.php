<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 11:07
 */

class FetcherContactUs extends ProMXFetcherAbstract{

	protected $formSubject = array(
		'de' => 'Kontaktaufnahme über proRM-Webseite_DE',
		'en' => 'Kontaktaufnahme über proRM-Webseite_EN',
		'es' => 'Kontaktaufnahme über proRM-Webseite_ES',
	);

	public function __construct($source)
	{
		parent::__construct($source);

		/** @var ProRMSettings $settings */
		//$settings = Registry::get('settings');

		$this->required['first_name'] = __('First Name', TEXTDOMAIN);
		$this->required['email'] = __('E-Mail', TEXTDOMAIN);
		$this->required['company'] = __('Company', TEXTDOMAIN);
		$this->required['data_usage'] = __('Data usage', TEXTDOMAIN);
	}

}