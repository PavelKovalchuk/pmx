<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.03.2018
 * Time: 11:03
 */

class FetcherSupport extends ProMXFetcherAbstract
{
	protected $displayedFields = [
		'salutation',
		'first_name',
		'last_name',
		'email',
		'phone',
		'company',
		'country',
		'product',
		'message',
	];

	protected function initFieldsSettings(){}
}