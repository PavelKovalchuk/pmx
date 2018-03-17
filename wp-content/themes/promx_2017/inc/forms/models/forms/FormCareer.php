<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.03.2018
 * Time: 13:06
 */

class FormCareer extends ProMXFormAbstract {

	public function __construct(WP_Post $formPost)
	{
		parent::__construct($formPost);

		$this->setTemplate('career-contact-form.php');

	}
}