<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 11:07
 */

class FetcherContactUs extends ProMXFetcherAbstract{

    protected $displayedFields = [
        'salutation',
        'first_name',
        'last_name',
        'email',
        'phone',
        'company',
        'country',
        'message',
    ];

	protected function initFieldsSettings(){}

}