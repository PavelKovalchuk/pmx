<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.03.2018
 * Time: 21:27
 */

class FetcherContactEvent extends ProMXFetcherAbstract{

	protected function initFieldsSettings() {
		$this->fieldsMap['first_name']['required'] = true;
		$this->fieldsMap['last_name']['required'] = true;
		$this->fieldsMap['email']['required'] = true;
		$this->fieldsMap['phone']['required'] = true;
		$this->fieldsMap['company']['required'] = true;
		//$this->fieldsMap['event']['required'] = true;
		$this->fieldsMap['salutation']['required'] = true;
	}

}