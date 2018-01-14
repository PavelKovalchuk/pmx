<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 23:38
 */

$options_storage->addSubpageToPromxOptionPages(

	array(

		'page_title'	=> 'Images and Logos',
		'menu_title'	=> 'Images and Logos',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_images_and_logos',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'general_logos_data_id',
				'title'	=> 'General logos data',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'logo_image_id',
						'title'	=> 'Logo image id',
						'type'	=> 'number',
						'description' => 'Appears in the header.',
						'value' => '11098',
					),

					array(
						'id'	=> 'logo_image_alt',
						'title'	=> 'Logo image alt',
						'type'	=> 'text',
						'description' => 'Appears in the header.',
						'value' => 'proMX',
					),

				),
			),

			array(
				'id'	=> 'common_image_data',
				'title'	=> 'Common image data',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'common_image_alt',
						'title'	=> 'Common image alt',
						'type'	=> 'text',
						'description' => 'Appears if attribute does not exist.',
						'value' => 'proMX',
					),


				),
			),

		),

	)

);