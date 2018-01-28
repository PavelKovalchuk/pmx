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

			array(
				'id'	=> 'testimonials_background_id',
				'title'	=> 'Testimonials background image BY DEFAULT',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'background_image_id',
						'title'	=> 'Image ID',
						'type'	=> 'number',
						'value' => '',
						'description' => 'If testimonial does not have its own image, it will be used',
					),

				),
			),


			array(
				'id'	=> 'testimonials_headers_title_id',
				'title'	=> 'Testimonials Headers title',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'website_de',
						'title'	=> 'Website title DE',
						'type'	=> 'text',
						'value' => 'Website',

					),

					array(
						'id'	=> 'website_en',
						'title'	=> 'Website title EN',
						'type'	=> 'text',
						'value' => 'Website',

					),

					//					A new field
					array(
						'id'	=> 'customer_size_de',
						'title'	=> 'Customer size DE',
						'type'	=> 'text',
						'value' => 'Customer size',

					),

					array(
						'id'	=> 'customer_size_en',
						'title'	=> 'Customer size EN',
						'type'	=> 'text',
						'value' => 'Customer size',

					),

					//					A new field
					array(
						'id'	=> 'country_de',
						'title'	=> 'Country DE',
						'type'	=> 'text',
						'value' => 'Country',

					),

					array(
						'id'	=> 'country_en',
						'title'	=> 'Country EN',
						'type'	=> 'text',
						'value' => 'Country',

					),

					//					A new field
					array(
						'id'	=> 'industry_de',
						'title'	=> 'Industry DE',
						'type'	=> 'text',
						'value' => 'Industry',

					),

					array(
						'id'	=> 'industry_en',
						'title'	=> 'Industry EN',
						'type'	=> 'text',
						'value' => 'Industry',

					),

					//					A new field
					array(
						'id'	=> 'software_de',
						'title'	=> 'Software DE',
						'type'	=> 'text',
						'value' => 'Software and Services',

					),

					array(
						'id'	=> 'software_en',
						'title'	=> 'Software EN',
						'type'	=> 'text',
						'value' => 'Software and Services',

					),

					//					A new field
					array(
						'id'	=> 'inform_title_de',
						'title'	=> 'Inform title DE',
						'type'	=> 'text',
						'value' => '<strong>Customer</strong> MANAGEMENT AND KNOWLEDGE BASE',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'inform_title_en',
						'title'	=> 'Inform title EN',
						'type'	=> 'text',
						'value' => '<strong>Customer</strong> MANAGEMENT AND KNOWLEDGE BASE',
						'args' => array(
							'html' => true
						)

					),

				),
			),


		),

	)

);