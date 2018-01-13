<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 17:01
 */


add_subpage_to_general_option_page(

	array(

		'page_title'	=> 'Posts option',
		'menu_title'	=> 'Posts option',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_options_posts_options',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'posts_template_data',
				'title'	=> 'Posts option ',
				'fields'		=> array(

					array(
						'id'	=> 'prev_article_text',
						'title'	=> 'Title for PREVIOUS ARTICLE link',
						'type'	=> 'text',
						//'description' => 'Default image for post in slider',
						'value' => 'PREVIOUS ARTICLE',
					),

					array(
						'id'	=> 'next_article_text',
						'title'	=> 'Title for NEXT ARTICLE link',
						'type'	=> 'text',
						//'description' => 'Default image for post in slider',
						'value' => 'NEXT ARTICLE',
					),

					array(
						'id'	=> 'slider_post_text',
						'title'	=> 'Title for slider',
						'type'	=> 'text',
						//'description' => 'Default image for post in slider',
						'value' => 'You will also be interested',
					),

					array(
						'id'	=> 'slider_posts_id',
						'title'	=> 'Posts id for slider',
						'type'	=> 'text',
						'description' => 'Comma separeted posts id',
						'value' => '',
					),
					array(
						'id'	=> 'slider_number_items',
						'title'	=> 'Number of posts to display',
						'type'	=> 'text',
						'description' => 'Max number of posts to display in post slider',
						'value' => '4',
					),


				),
			),
		),

	)

);