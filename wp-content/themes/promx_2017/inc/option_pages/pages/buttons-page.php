<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 16:58
 */

$options_storage->addSubpageToPromxOptionPages(

	array(

		'page_title'	=> 'Buttons',
		'menu_title'	=> 'Buttons',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_buttons_and_links',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'general_button_data_id',
				'title'	=> 'General buttons title ',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'read_more_text_de',
						'title'	=> 'Read more text DE',
						'type'	=> 'text',
						'value' => 'Read it',
					),

					array(
						'id'	=> 'read_more_text_en',
						'title'	=> 'Read more text EN',
						'type'	=> 'text',
						'value' => 'Read it',
					),

					array(
						'id'	=> 'menu_button_text_de',
						'title'	=> 'Menu button text DE',
						'type'	=> 'text',
						'value' => 'Read more',
					),

					array(
						'id'	=> 'menu_button_text_en',
						'title'	=> 'Menu button text EN',
						'type'	=> 'text',
						'value' => 'Read more',
					),

				),
			),

            //			A new section
            array(
                'id'	=> 'mobile_menu_button_data_id',
                'title'	=> 'General buttons title ',
                'fields'		=> array(
                    //					A new field
                    array(
                        'id'	=> 'toggler_text_de',
                        'title'	=> 'Mobile menu toggler text DE',
                        'type'	=> 'text',
                        'value' => 'MENU',
                    ),

                    array(
                        'id'	=> 'toggler_text_en',
                        'title'	=> 'Mobile menu toggler text EN',
                        'type'	=> 'text',
                        'value' => 'MENU',
                    ),

                    array(
                        'id'	=> 'toggler_close_text_de',
                        'title'	=> 'Mobile menu close toggler text DE',
                        'type'	=> 'text',
                        'value' => 'CLOSE MENU',
                    ),

                    array(
                        'id'	=> 'toggler_close_text_en',
                        'title'	=> 'Mobile menu close toggler text EN',
                        'type'	=> 'text',
                        'value' => 'CLOSE MENU',
                    ),



                ),
            ),

		),

	)

);