<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.03.2018
 * Time: 21:27
 */

class FetcherContactEvent extends ProMXFetcherAbstract
{
    protected $displayedFields = [
        'salutation',
        'first_name',
        'last_name',
        'email',
        'phone',
        'company',
        'event',
    ];

	protected function initFieldsSettings(){}

}