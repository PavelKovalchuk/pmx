<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 16:58
 */

add_subpage_to_general_option_page(

	array(

		'page_title'	=> 'Buttons',
		'menu_title'	=> 'Buttons',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_options_buttons',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'general_button_data_id',
				'title'	=> 'General buttons title ',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'read_more_text',
						'title'	=> 'Read more text',
						'type'	=> 'text',
						'description' => 'Appears in the buttons of the post preview.',
						'value' => 'Read Full Post',
					),

					array(
						'id'	=> 'get_more_posts_text',
						'title'	=> 'Get more posts text',
						'type'	=> 'text',
						'description' => 'Appears in the Category page - to get more posts.',
						'value' => 'More Posts',
					),
				),
			),
		),

	)

);