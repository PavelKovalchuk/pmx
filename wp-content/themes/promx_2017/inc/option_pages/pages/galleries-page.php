<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 28.01.2018
 * Time: 12:16
 */


$options_storage->addSubpageToPromxOptionPages(

	array(

		'page_title'	=> 'Galerries setings',
		'menu_title'	=> 'Galerries',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_galleries_data',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'general_galleries_button_data_id',
				'title'	=> 'General Galerries buttons title',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'galleries_back_text_de',
						'title'	=> 'Galleries back text DE',
						'type'	=> 'text',
						'value' => 'Back',

					),

					array(
						'id'	=> 'galleries_back_text_en',
						'title'	=> 'Galleries back text EN',
						'type'	=> 'text',
						'value' => 'Back',
					),

				),
			),

			array(
				'id'	=> 'galleries_slug_id',
				'title'	=> 'Galleries URL slug',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'galleries_slug_de',
						'title'	=> 'Galleries URL slug DE',
						'type'	=> 'text',
						'value' => 'unsere-fotogalerie',
						'description' => 'Change carefully!',
					),

					array(
						'id'	=> 'galleries_slug_en',
						'title'	=> 'Galleries URL slug EN',
						'type'	=> 'text',
						'value' => 'our-gallery',
						'description' => 'Change carefully!',
					),

				),
			),

			array(
				'id'	=> 'background_id',
				'title'	=> 'Galleries background image BY DEFAULT',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'galleries_background_image_id',
						'title'	=> 'Image ID',
						'type'	=> 'number',
						'value' => '',
						'description' => 'If galleries does not have its own image, it will be used',
					),

				),
			),


		),

	)

);