<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14.01.2018
 * Time: 20:17
 */


$options_storage->addSubpageToPromxOptionPages(
	array(

		'page_title'	=> 'Footer general data',
		'menu_title'	=> 'Footer general data',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_options_footer_general_data',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'footer_social_text_id',
				'title'	=> 'Footer social text',
				'fields'		=> array(
					//					A new field

					array(
						'id'	=> 'header_social_text_de',
						'title'	=> 'Header social text DE',
						'type'	=> 'text',
						/*'description' => 'General social link',*/
						'value' => 'Follow proMX',
					),

					array(
						'id'	=> 'header_social_text_en',
						'title'	=> 'Header social text EN',
						'type'	=> 'text',
						'value' => 'Follow proMX',
					),

					array(
						'id'	=> 'body_social_text_de',
						'title'	=> 'Description social text DE',
						'type'	=> 'textarea',
						'value' => 'DEOur expert team is standing by to help answer questions and get you the best solutions.',
					),

					array(
						'id'	=> 'body_social_text_en',
						'title'	=> 'Description social text EN',
						'type'	=> 'textarea',
						'value' => 'Our expert team is standing by to help answer questions and get you the best solutions.',
					),

					array(
						'id'	=> 'button_text_de',
						'title'	=> 'Button text DE',
						'type'	=> 'text',
						'value' => 'CONTACT US',
					),

					array(
						'id'	=> 'button_text_en',
						'title'	=> 'Button text EN',
						'type'	=> 'text',
						'value' => 'CONTACT US',
					),


					array(
						'id'	=> 'button_link_de',
						'title'	=> 'Button link DE',
						'type'	=> 'text',
						'value' => '/kontakt/',
					),

					array(
						'id'	=> 'button_link_en',
						'title'	=> 'Button link EN',
						'type'	=> 'text',
						'value' => 'en/contact-us/',
					),


					array(
						'id'	=> 'copyright_de',
						'title'	=> 'Copyright text DE',
						'type'	=> 'text',
						'value' => '&copy; proMX Gmbh 1994, 2017. All Rights Reserved. Terms of Use Privacy Policy',
					),

					array(
						'id'	=> 'copyright_en',
						'title'	=> 'Copyright text EN',
						'type'	=> 'text',
						'value' => '&copy; proMX Gmbh 1994, 2017. All Rights Reserved. Terms of Use Privacy Policy',
					),


				),
			),

		),

	)
);
