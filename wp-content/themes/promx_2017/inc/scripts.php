<?php
/**
 * Enqueue scripts and styles.
 */
//add_action( 'wp_enqueue_scripts', 'ts_scripts', 200 );
//add_action( 'admin_print_styles', 'ts_admin_menu_assets' );


function ts_scripts() {
	wp_enqueue_style( 'promx-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_theme_file_path('/style.css')) );

    wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), '3.2.1', true);

	wp_enqueue_script( 'ts-js', get_template_directory_uri() . '/build/js/main.min.js', array(), filemtime( get_theme_file_path('/build/js/main.min.js')), true );

	wp_localize_script( 'ts-js', 'SiteParams', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX

	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function ts_admin_menu_assets() {
	wp_enqueue_style( 'TSadminStyle', get_stylesheet_directory_uri() . '/css/adminStyle.css' );
}

// Async load
function ts_async_scripts($url)
{
	if ( strpos( $url, '#asyncload') === false )
		return $url;
	else if ( is_admin() )
		return str_replace( '#asyncload', '', $url );
	else
		return str_replace( '#asyncload', '', $url )."' async='async";
}
add_filter( 'clean_url', 'ts_async_scripts', 11, 1 );
