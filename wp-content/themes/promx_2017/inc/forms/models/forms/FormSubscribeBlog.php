<?php
/**
 * Created by PhpStorm.
 * User: pkovalchuk
 * Date: 16.03.2018
 * Time: 14:00
 */

class FormSubscribeBlog extends ProMXFormAbstract
{
    public function __construct(WP_Post $formPost)
    {
        parent::__construct($formPost);

        $this->setTemplate('latest-news-form.php');

    }
}