<?php
/**
 * Created by PhpStorm.
 * User: pkovalchuk
 * Date: 16.03.2018
 * Time: 13:48
 */

class FetcherMainContactUs extends ProMXFetcherAbstract
{
    protected $displayedFields = [
        'salutation',
        'first_name',
        'last_name',
        'email',
        'company',
        'message',
    ];

    protected function initFieldsSettings(){}

}