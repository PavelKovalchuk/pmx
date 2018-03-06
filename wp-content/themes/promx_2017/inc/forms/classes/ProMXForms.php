<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 06.03.2018
 * Time: 22:22
 */

abstract class ProMXForms {

	const POST_TYPE = 'form';

	private static $fetchersDir = FORMS_MODELS_FETCHERS_DIR;

	private static $formsDir = FORMS_MODELS_FORMS_DIR;

	private static $formsCache = array();

	public static function init()
	{
		self::loadForms();

		/*$client = new CrmClient();
		$client -> ajaxForm();*/

	}

	public static function test()
	{
		$forms = self::getFormsCache();
		var_dump($forms);
	}

	protected static function loadForms()
	{
		$forms = get_posts(array(
			'numberposts' => -1,
			'post_type' => self::POST_TYPE,
			'lang' => CURRENT_LANG_CODE,
			'post_status' => 'publish'
		));

		foreach ($forms as $form) {

			self::addFormToCache($form);
		}

	}

	/**
	 * @return string
	 */
	protected static function getFetchersDir() {
		return self::$fetchersDir;
	}

	/**
	 * @return string
	 */
	protected static function getFormsDir() {
		return self::$formsDir;
	}

	/**
	 * @return array
	 */
	protected static function getFormsCache() {
		return self::$formsCache;
	}

	/**
	 * @param array $formsCache
	 */
	public static function addFormToCache( WP_Post $form ) {
		self::$formsCache[$form->post_name] = $form;
	}



}