<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.03.2018
 * Time: 18:27
 */

class FetcherDefault extends ProMXFetcherAbstract{

	public function __construct() {
		parent::__construct();
	}

	protected function initFieldsSettings()
	{
		$this->fieldsMap['company']['required']= true;

	}
}