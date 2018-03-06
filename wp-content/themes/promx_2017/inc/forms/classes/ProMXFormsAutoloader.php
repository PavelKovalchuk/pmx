<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 06.03.2018
 * Time: 23:10
 */

class ProMXFormsAutoloader {

	static public function loader($className) {
		$filename = FORMS_MAIN_DIR . "/" . str_replace("\\", '/', $className) . ".php";
		if (file_exists($filename)) {
			include($filename);
			if (class_exists($className)) {
				return TRUE;
			}
		}
		return FALSE;
	}

}
