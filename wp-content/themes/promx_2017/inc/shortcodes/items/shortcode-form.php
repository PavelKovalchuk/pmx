<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 11:33
 */

function formShortcodeHandler($attributes, $content = null) {
	$name = $attributes['name'];
	$content = preg_replace('/^\s*<\/p>(.*)<p>\s*$/is', '$1', $content);
	return ProMXFormsManager::handleForm($name, $content);
}