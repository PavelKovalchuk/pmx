<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.03.2018
 * Time: 15:07
 */

class ProMXFormSanitize{

	public static function sanitizeString($input)
	{
		$response = sanitize_text_field( $input );

		return $response;
	}

	public static function sanitizeEmail($input)
	{
		$response = sanitize_email( $input );

		return $response;
	}

	public static function sanitizeFileName($input)
	{
		$response = sanitize_file_name( $input );

		return $response;
	}

	public static function stripAllTags($input)
	{
		$response = wp_strip_all_tags( $input );

		return $response;
	}

	public static function sanitizeUrl($input)
	{
		$response = esc_url( $input );

		return $response;
	}

}