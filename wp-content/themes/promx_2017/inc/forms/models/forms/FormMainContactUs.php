<?php
/**
 * Created by PhpStorm.
 * User: pkovalchuk
 * Date: 16.03.2018
 * Time: 13:46
 */

class FormMainContactUs extends ProMXFormAbstract
{
    public function __construct(WP_Post $formPost)
    {
        parent::__construct($formPost);

        $this->setTemplate('home-contact-form.php');

    }

}