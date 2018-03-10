<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 06.03.2018
 * Time: 23:24
 */

class FormContactUs extends ProMXFormAbstract{

	//const FORM_NAME = 'contact-us';

	public function __construct(WP_Post $formPost)
	{
		parent::__construct($formPost);


		$this->setTemplate('contact-us-contact-form.php');

	}

}