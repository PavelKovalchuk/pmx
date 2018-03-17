<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.03.2018
 * Time: 13:07
 */

class FetcherCareer extends ProMXFetcherAbstract{

	protected $displayedFields = [

		'first_name',
		'email',
		'message',
		'career_position',
		'file_url'
	];

	protected function initFieldsSettings(){}
}