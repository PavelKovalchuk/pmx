<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 28.01.2018
 * Time: 12:16
 */


$options_storage->addSubpageToPromxOptionPages(

	array(

		'page_title'	=> 'Testimonials setings',
		'menu_title'	=> 'Testimonials',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_testimonials_data',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'general_testimonials_button_data_id',
				'title'	=> 'General Testimonials buttons title',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'testimonials_read_more_text_de',
						'title'	=> 'Read more text DE',
						'type'	=> 'text',
						'value' => 'Read it',

					),

					array(
						'id'	=> 'testimonials_read_more_text_en',
						'title'	=> 'Read more text EN',
						'type'	=> 'text',
						'value' => 'Read it',
					),

				),
			),

			array(
				'id'	=> 'testimonials_slug_id',
				'title'	=> 'Testimonials URL slug',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'testimonials_slug_de',
						'title'	=> 'Testimonials URL slug DE',
						'type'	=> 'text',
						'value' => 'referenzen',
						'description' => 'Change carefully!',
					),

					array(
						'id'	=> 'testimonials_slug_en',
						'title'	=> 'Testimonials URL slug EN',
						'type'	=> 'text',
						'value' => 'references',
						'description' => 'Change carefully!',
					),

				),
			),

		),

	)

);