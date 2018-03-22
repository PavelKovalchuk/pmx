<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.03.2018
 * Time: 15:07
 */

class ProMXFormSanitize{

    public static $maxLengthMap = [];

	public static function sanitizeString($field_name, $input)
	{
		$response = sanitize_text_field( $input );

		return $response;
	}

    public static function cutMaxLengthString($field_name, $input)
    {
        $response = substr($input, 0, self::getMaxLengthByFieldName($field_name));

        return $response;
    }

	public static function sanitizeEmail($field_name, $input)
	{
		$response = sanitize_email( $input );

		return $response;
	}

	public static function sanitizeFileName($field_name, $input)
	{
		$response = sanitize_file_name( $input );

		return $response;
	}

	public static function stripAllTags($field_name, $input)
	{
		$response = wp_strip_all_tags( $input );

		return $response;
	}

	public static function sanitizeNumber($field_name, $input)
	{
		$response = filter_var($input, FILTER_SANITIZE_NUMBER_INT);

		return $response;
	}

	public static function sanitizeUrl($field_name, $input)
	{
		$response = esc_url( $input );

		return $response;
	}

    /**
     * @return array
     */
    public static function getMaxLengthMap()
    {
        return self::$maxLengthMap;
    }

    public static function getMaxLengthByFieldName($field)
    {
        if(!isset(self::$maxLengthMap[$field])){
            return false;
        }
        return self::$maxLengthMap[$field];
    }

    /**
     * @param array $maxLengthMap
     */
    public static function setMaxLengthMap($maxLengthMap)
    {
        self::$maxLengthMap = $maxLengthMap;
    }

}