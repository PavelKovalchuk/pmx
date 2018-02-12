<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12.02.2018
 * Time: 13:18
 */

if( defined('GALLERY_SLUG')){
	$slug_gallery = GALLERY_SLUG;
}else{
	$slug_gallery = false;
}

$cpt_storage->addDataArgument(

	'gallery',

	array(

		//'label'  => null,
		'labels' => array(
			'name'               => __('galleries', TEXTDOMAIN),// основное название для типа записи
			'singular_name'      => __('gallery', TEXTDOMAIN),// название для одной записи этого типа
			'add_new'            => __('Add New', TEXTDOMAIN),// для добавления новой записи
			'add_new_item'       => __('Add New gallery', TEXTDOMAIN),// заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => __('Edit gallery', TEXTDOMAIN),// для редактирования типа записи
			'new_item'           => __('New gallery', TEXTDOMAIN),// текст новой записи
			'view_item'          => __('View gallery', TEXTDOMAIN),// для просмотра записи этого типа.
			'search_items'       => __('Search gallery', TEXTDOMAIN),// для поиска по этим типам записи
			'not_found'          => __('No galleries found', TEXTDOMAIN),// если в результате поиска ничего не было найдено
			'not_found_in_trash' => __('No galleries found in trash',TEXTDOMAIN), // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'proMX Galleries', // название меню
			'all_items'          => __( 'All Galleries', TEXTDOMAIN),
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => null,
		'show_ui'             => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null,
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 109,
		'menu_icon'           => 'dashicons-format-gallery',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'page-attributes', 'custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => array( 'slug' => $slug_gallery, 'with_front' => false ),
		'query_var'           => true,

	)

);