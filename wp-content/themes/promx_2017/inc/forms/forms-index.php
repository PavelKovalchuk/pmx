<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 06.03.2018
 * Time: 22:29
 */

//require_once( FORMS_CLASSES_DIR . "ProMXFormsAutoloader.php");
//spl_autoload_register('ProMXFormsAutoloader::loader');
require_once( FORMS_ABSTRACT_CLASSES_DIR . 'ProMXFormsManager.php' );
require_once( FORMS_ABSTRACT_CLASSES_DIR . 'ProMXFormAbstract.php' );
require_once( FORMS_ABSTRACT_CLASSES_DIR . 'ProMXFetcherAbstract.php' ) ;


if(is_admin() == false){

	ProMXFormsManager::init();

	//ProMXFormsManager::test();
}


