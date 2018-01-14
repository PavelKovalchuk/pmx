<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function promx_widgets_init() {
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
		'description'   => esc_html__( 'Add widgets here.', TEXTDOMAIN ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'promx_widgets_init' );