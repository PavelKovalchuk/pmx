<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 24.01.2018
 * Time: 21:07
 */


$options_storage->addSubpageToPromxOptionPages(

	array(

		'page_title'	=> 'Events setings',
		'menu_title'	=> 'Events',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_events_buttons',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'general_events_button_data_id',
				'title'	=> 'General Events buttons title ',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'read_more_events_text_de',
						'title'	=> 'Read more text DE',
						'type'	=> 'text',
						'value' => 'Read it',
					),

					array(
						'id'	=> 'read_more_events_text_en',
						'title'	=> 'Read more text EN',
						'type'	=> 'text',
						'value' => 'Read it',
					),

					array(
						'id'	=> 'register_events_text_de',
						'title'	=> 'Register text DE',
						'type'	=> 'text',
						'value' => 'Register',
					),

					array(
						'id'	=> 'register_events_text_en',
						'title'	=> 'Register text EN',
						'type'	=> 'text',
						'value' => 'Register',
					),

				),
			),
		),

	)

);