<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.03.2018
 * Time: 11:01
 */

class FormSupport extends ProMXFormAbstract
{
	public function __construct(WP_Post $formPost)
	{
		parent::__construct($formPost);

		$this->setTemplate('support-contact-form.php');

	}

}