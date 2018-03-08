<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 11:51
 */

class ProMXVariables {

	const TPL_VAR_PREFIX = 'pro_';

	public static function set($name, $value, $isFlash = false) {
		self::setVar($name, $value, $isFlash);
	}

	public static function get($name, $default = null, $isFlash = false) {
		return self::getVar($name, $default, $isFlash);
	}

	protected static function setVar($name, $value, $isFlash = false)
	{
		if (!$isFlash) {
			set_query_var(self::TPL_VAR_PREFIX . $name, $value);
		} else {
			ProMXSession::setFlash($name, $value);
		}
	}

	protected static function getVar($name, $default = null, $isFlash = false)
	{
		if (!$isFlash) {
			$value = get_query_var(self::TPL_VAR_PREFIX . $name);

			return (!is_null($default) && $value == '') ? $default : $value;
		} else {
			return ProMXSession::getFlash($name, $default);
		}
	}

	protected static function unsetVar($name, $isFlash = false)
	{
		if (!$isFlash) {
			set_query_var(self::TPL_VAR_PREFIX . $name, null);
		} else {
			ProMXSession::unsetFlash($name);
		}
	}

}