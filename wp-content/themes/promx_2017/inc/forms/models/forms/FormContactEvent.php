<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.03.2018
 * Time: 21:19
 */

class FormContactEvent extends ProMXFormAbstract{

	public function __construct(WP_Post $formPost)
	{
		parent::__construct($formPost);

		$this->setTemplate('event-contact-form.php');

	}
}