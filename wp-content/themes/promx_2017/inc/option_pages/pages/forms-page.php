<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 16:54
 */

$options_storage->addSubpageToPromxOptionPages(

	array(

		'page_title'	=> 'Forms',
		'menu_title'	=> 'Forms',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_options_forms',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'recaptcha_data',
				'title'	=> 'Recaptcha data ',
				'fields'		=> array(

					array(
						'id'	=> 'recaptcha_key',
						'title'	=> 'Recaptcha key',
						'type'	=> 'text',
						'description' => '',
						'value' => '',
					),

					array(
						'id'	=> 'recaptcha_secret_key',
						'title'	=> 'Recaptcha secret key',
						'type'	=> 'text',
						'description' => '',
						'value' => '',
					),

				),
			),

			array(
				'id'	=> 'form_data',
				'title'	=> 'Form data ',
				'fields'		=> array(

					array(
						'id'	=> 'form_success_message',
						'title'	=> 'Form success message',
						'type'	=> 'textarea',
						'description' => 'Appears after success sending message',
						'value' => 'Thank you',
					),

					array(
						'id'	=> 'destination_email',
						'title'	=> 'Destination email',
						'type'	=> 'text',
						'description' => '',
						'value' => '',
					),

				),
			),

		),

	)

);
