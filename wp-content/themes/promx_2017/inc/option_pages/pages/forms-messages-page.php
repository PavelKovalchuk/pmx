<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 21.03.2018
 * Time: 23:16
 */


$options_storage->addSubpageToPromxOptionPages(

	array(

		'page_title'	=> 'Forms messages',
		'menu_title'	=> 'Forms messages',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_forms_messages',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'forms_messages_errors_data',
				'title'	=> 'Forms messages errors data ',
				'fields'		=> array(

					array(
						'id'	=> 'required_field_de',
						'title'	=> 'required field DE',
						'type'	=> 'text',
						'value' => 'This field is required',
					),

					array(
						'id'	=> 'required_field_en',
						'title'	=> 'required field EN',
						'type'	=> 'text',
						'value' => 'This field is required',
					),

				),
			),


		),

	)

);