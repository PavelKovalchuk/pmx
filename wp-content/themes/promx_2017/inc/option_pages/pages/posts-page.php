<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 17:01
 */


$options_storage->addSubpageToPromxOptionPages(

	array(

		'page_title'	=> 'Posts option',
		'menu_title'	=> 'Posts option',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_options_posts_options',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'posts_banner_id',
				'title'	=> 'Posts banner data BY DEFAULT',
				'description' => 'If post does not have its own data for banner, it will be used',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'post_background_image_id',
						'title'	=> 'Image ID',
						'type'	=> 'number',
						'value' => '',
					),

					array(
						'id'	=> 'post_banner_title_de',
						'title'	=> 'Post banner title DE',
						'type'	=> 'text',
						'value' => 'Blog',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_banner_title_en',
						'title'	=> 'Post banner title EN',
						'type'	=> 'text',
						'value' => 'Blog',
						'args' => array(
							'html' => true
						)

					),


					array(
						'id'	=> 'post_banner_text_de',
						'title'	=> 'Post banner text DE',
						'type'	=> 'textarea',
						'value' => '',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_banner_text_en',
						'title'	=> 'Post banner text EN',
						'type'	=> 'textarea',
						'value' => '',
						'args' => array(
							'html' => true
						)

					),


					array(
						'id'	=> 'post_banner_link_target_de',
						'title'	=> 'Post banner link target DE',
						'type'	=> 'text',
						'value' => '/produkte/',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_banner_link_target_en',
						'title'	=> 'Post banner link target EN',
						'type'	=> 'text',
						'value' => '/en/products/',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_banner_link_text_de',
						'title'	=> 'Post banner link text DE',
						'type'	=> 'text',
						'value' => '',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_banner_link_text_en',
						'title'	=> 'Post banner link text EN',
						'type'	=> 'text',
						'value' => '',
						'args' => array(
							'html' => true
						)

					),

				),
			),


			array(
				'id'	=> 'posts_forms_id',
				'title'	=> 'Posts form data',
				'description' => 'it will be used in forms in post template',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'post_form_footer_title_de',
						'title'	=> 'Post form footer title DE',
						'type'	=> 'text',
						'value' => 'Latest news',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_form_footer_title_en',
						'title'	=> 'Post form footer title EN',
						'type'	=> 'text',
						'value' => 'Latest news',
						'args' => array(
							'html' => true
						)

					),


					array(
						'id'	=> 'post_form_footer_text_de',
						'title'	=> 'Post form footer text DE',
						'type'	=> 'text',
						'value' => 'Subscribe to our newsletter to receive all the latest news conveniently via e-mail.',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_form_footer_text_en',
						'title'	=> 'Post form footer text EN',
						'type'	=> 'text',
						'value' => 'Subscribe to our newsletter to receive all the latest news conveniently via e-mail.',
						'args' => array(
							'html' => true
						)

					),


					array(
						'id'	=> 'post_form_sidebar_title_de',
						'title'	=> 'Post form sidebar title DE',
						'type'	=> 'text',
						'value' => 'Subscribe for news',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_form_sidebar_title_en',
						'title'	=> 'Post form sidebar title EN',
						'type'	=> 'text',
						'value' => 'Subscribe for news',
						'args' => array(
							'html' => true
						)

					),


				),
			),

			array(
				'id'	=> 'posts_headers_id',
				'title'	=> 'Posts headers data',
				'description' => 'it will be used in the post template',
				'fields'		=> array(
					//					A new field
					array(
						'id'	=> 'post_recent_title_de',
						'title'	=> 'Post recent title DE',
						'type'	=> 'text',
						'value' => 'Recent posts',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_recent_title_en',
						'title'	=> 'Post recent title EN',
						'type'	=> 'text',
						'value' => 'Recent posts',
						'args' => array(
							'html' => true
						)

					),


					array(
						'id'	=> 'post_back_title_de',
						'title'	=> 'Post back title DE',
						'type'	=> 'text',
						'value' => 'Back',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_back_title_en',
						'title'	=> 'Post back title EN',
						'type'	=> 'text',
						'value' => 'Back',
						'args' => array(
							'html' => true
						)

					),


					array(
						'id'	=> 'post_share_title_de',
						'title'	=> 'Post share title DE',
						'type'	=> 'text',
						'value' => 'Share this',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_share_title_en',
						'title'	=> 'Post share title EN',
						'type'	=> 'text',
						'value' => 'Share this',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_prev_title_de',
						'title'	=> 'Post Previous title DE',
						'type'	=> 'text',
						'value' => 'PREVIOUS POST',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_prev_title_en',
						'title'	=> 'Post Previous title EN',
						'type'	=> 'text',
						'value' => 'PREVIOUS POST',
						'args' => array(
							'html' => true
						)

					),


					array(
						'id'	=> 'post_next_title_de',
						'title'	=> 'Post Next title DE',
						'type'	=> 'text',
						'value' => 'NEXT POST',
						'args' => array(
							'html' => true
						)

					),

					array(
						'id'	=> 'post_next_title_en',
						'title'	=> 'Post Next title EN',
						'type'	=> 'text',
						'value' => 'NEXT POST',
						'args' => array(
							'html' => true
						)

					),




				),
			),

		),

	)

);