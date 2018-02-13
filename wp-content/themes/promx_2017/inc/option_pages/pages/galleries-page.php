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
				'id'	=> 'galleries_banner_id',
				'title'	=> 'Galleries banner data BY DEFAULT',
				'description' => 'If gallery does not have its own data for banner, it will be used',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'gallery_background_image_id',
						'title'	=> 'Image ID',
						'type'	=> 'number',
						'value' => '',
					),

					array(
						'id'	=> 'gallery_banner_title_de',
						'title'	=> 'Gallery banner title DE',
						'type'	=> 'text',
						'value' => 'Gallery Default',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'gallery_banner_title_en',
						'title'	=> 'Gallery banner title EN',
						'type'	=> 'text',
						'value' => 'Gallery Default',
						'args' => array(
							'html' => true
						)

					),


					array(
						'id'	=> 'gallery_banner_text_de',
						'title'	=> 'Gallery banner text DE',
						'type'	=> 'textarea',
						'value' => 'Gallery Default text',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'gallery_banner_text_en',
						'title'	=> 'Gallery banner text EN',
						'type'	=> 'textarea',
						'value' => 'Gallery Default text',
						'args' => array(
							'html' => true
						)

					),


					array(
						'id'	=> 'gallery_banner_link_target_de',
						'title'	=> 'Gallery banner link target DE',
						'type'	=> 'text',
						'value' => '/produkte/',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'gallery_banner_link_target_en',
						'title'	=> 'Gallery banner link target EN',
						'type'	=> 'text',
						'value' => '/en/products/',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'gallery_banner_link_text_de',
						'title'	=> 'Gallery banner link text DE',
						'type'	=> 'text',
						'value' => 'Read more',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'gallery_banner_link_text_en',
						'title'	=> 'Gallery banner link text EN',
						'type'	=> 'text',
						'value' => 'Read more',
						'args' => array(
							'html' => true
						)

					),

				),
			),


		),

	)

);