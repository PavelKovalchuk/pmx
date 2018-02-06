<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 16.01.2018
 * Time: 21:05
 */
add_action( 'widgets_init', 'promx_sidebars_init' );

function promx_sidebars_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', TEXTDOMAIN ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', TEXTDOMAIN ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title card-header">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Custom links', TEXTDOMAIN ),
		'id'            => 'sidebar-footer-custom-links',
		'description'   => esc_html__( 'Add Links Widgets here.', TEXTDOMAIN ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Social Icons links', TEXTDOMAIN ),
		'id'            => 'sidebar-social-icons-links',
		'description'   => esc_html__( 'Add Social Links widgets here.', TEXTDOMAIN ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Custom Menu Products Link', TEXTDOMAIN ),
		'id'            => 'sidebar-custom-menu-product-link',
		'description'   => esc_html__( 'Add Custom Menu Products widget here.', TEXTDOMAIN ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}

