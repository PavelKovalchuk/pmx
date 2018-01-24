<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 23.01.2018
 * Time: 0:31
 */

$cpt_storage->addDataArgument(

		'testimonial',

		array(

			//'label'  => null,
			'labels' => array(
				'name'               => __('testimonials', TEXTDOMAIN),// основное название для типа записи
				'singular_name'      => __('testimonial', TEXTDOMAIN),// название для одной записи этого типа
				'add_new'            => __('Add New', TEXTDOMAIN),// для добавления новой записи
				'add_new_item'       => __('Add New testimonial', TEXTDOMAIN),// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => __('Edit testimonial', TEXTDOMAIN),// для редактирования типа записи
				'new_item'           => __('New testimonial', TEXTDOMAIN),// текст новой записи
				'view_item'          => __('View testimonial', TEXTDOMAIN),// для просмотра записи этого типа.
				'search_items'       => __('Search testimonial', TEXTDOMAIN),// для поиска по этим типам записи
				'not_found'          => __('No testimonials found', TEXTDOMAIN),// если в результате поиска ничего не было найдено
				'not_found_in_trash' => __('No testimonials found in trash',TEXTDOMAIN), // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'proMX Testimonials', // название меню
				'all_items'          => __( 'All testimonials', TEXTDOMAIN),
			),
			'description'         => '',
			'public'              => false,
			'publicly_queryable'  => null,
			'exclude_from_search' => null,
			'show_ui'             => true,
			'show_in_menu'        => true, // показывать ли в меню адмнки
			'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
			'show_in_nav_menus'   => null,
			'show_in_rest'        => null, // добавить в REST API. C WP 4.7
			'rest_base'           => null, // $post_type. C WP 4.7
			'menu_position'       => 105,
			'menu_icon'           => 'dashicons-thumbs-up',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => array('title', 'custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => array(),
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,

		)

);
