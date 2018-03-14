<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 11:07
 */

class FetcherContactUs extends ProMXFetcherAbstract{

	protected function initFieldsSettings()
	{
		$this->fieldsMap['first_name']['required'] = true;
		$this->fieldsMap['last_name']['required'] = true;
		$this->fieldsMap['email']['required'] = true;
		$this->fieldsMap['phone']['required'] = true;
		$this->fieldsMap['company']['required'] = true;
		$this->fieldsMap['country']['required'] = true;

	}

}