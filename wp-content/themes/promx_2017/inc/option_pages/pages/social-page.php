<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 15:54
 */

add_subpage_to_general_option_page(

	array(

		'page_title'	=> 'Social Networks Links',
		'menu_title'	=> 'Social Networks Links',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_options_social_network_links',
		'sections'		=> array(
			//			A new section
						array(
							'id'	=> 'general_social_data_id',
							'title'	=> 'Social networks links data',
							'fields'		=> array(
			//					A new field

								array(
									'id'	=> 'header_facebook_link',
									'title'	=> 'Facebook link',
									'type'	=> 'text',
									'description' => 'General social link',
									'value' => 'https://uk-ua.facebook.com/',
								),

								array(
									'id'	=> 'header_google_link',
									'title'	=> 'Google link',
									'type'	=> 'text',
									'description' => 'General social link',
									'value' => 'https://plus.google.com/people',
								),

								array(
									'id'	=> 'header_instagram_link',
									'title'	=> 'Instagram link',
									'type'	=> 'text',
									'description' => 'General social link',
									'value' => 'https://www.instagram.com/?hl=ru',
								),

								array(
									'id'	=> 'header_linkediin_link',
									'title'	=> 'Linkediin link',
									'type'	=> 'text',
									'description' => 'General social link',
									'value' => 'https://www.linkedin.com/feed/',
								),

								array(
									'id'	=> 'header_twitter_link',
									'title'	=> 'Twitter link',
									'type'	=> 'text',
									'description' => 'General social link',
									'value' => 'https://twitter.com/?lang=ru',
								),

								array(
									'id'	=> 'header_youtube_link',
									'title'	=> 'Youtube link',
									'type'	=> 'text',
									'description' => 'General social link',
									'value' => 'https://www.youtube.com/?gl=UA&hl=ru',
								),
							),
						),

					),

	)

);
