<?php
/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'promx_scripts', 200 );
//add_action( 'admin_print_styles', 'ts_admin_menu_assets' );


function promx_scripts() {

	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/app/css/bootstrap.min.css', array(), '3.3.7' );

	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/app/css/main.css', array('bootstrap'), filemtime( get_theme_file_path('/app/css/main.css')) );

	wp_enqueue_style( 'promx-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_theme_file_path('/style.css')) );


    wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/app/js/vendor/jQuery/jquery-3.2.1.min.js', array(), '3.2.1', true);

	wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . '/app/js/vendor/jQuery/jquery-migrate.min.js', array('jquery'), '3.2.1', true);

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/app/js/vendor/bootstrap/bootstrap.min.js', array('jquery'), '3.3.7', true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/app/js/vendor/slick/slick1.8.1.min.js', array('jquery'), '1.8.1', true );

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/app/js/vendor/waypoints/waypoints.min.js', array('jquery'), '4.0.1', true );

	wp_enqueue_script( 'circle-progres', get_template_directory_uri() . '/app/js/vendor/jquery-circle-progress-1.2.2/circle-progress.min.js', array('jquery'), '1.2.2', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/app/js/scripts.js', array('jquery'), filemtime( get_theme_file_path('/app/js/scripts.js')), true );

	wp_enqueue_script( 'new_app-js', get_template_directory_uri() . '/js/new_app.js', array('jquery'), filemtime( get_theme_file_path('/js/new_app.js')), true );

	/*wp_localize_script( 'ts-js', 'SiteParams', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX

	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}*/
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
