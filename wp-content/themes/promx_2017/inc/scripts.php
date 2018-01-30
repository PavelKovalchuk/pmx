<?php
/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'promx_scripts', 200 );
add_action( 'admin_print_styles', 'promx_load_wp_admin_assets' );
add_action( 'admin_enqueue_scripts', 'promx_load_wp_admin_script' );


function promx_scripts() {

	/**
	 * TODO - refactorthis by organizing in one js file or smth else
	 */
	wp_enqueue_style( 'bootstrap', TEMPLATE_URI . '/app/css/bootstrap.min.css', array(), '3.3.7' );

	wp_enqueue_style( 'main-style', TEMPLATE_URI . '/app/css/main.css', array('bootstrap'), filemtime( get_theme_file_path('/app/css/main.css')) );

	wp_enqueue_style( 'promx-style', TEMPLATE_URI . '/style.css', array(), filemtime( get_theme_file_path('/style.css')) );


    wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'jquery', TEMPLATE_URI . '/app/js/vendor/jQuery/jquery-3.2.1.min.js', array(), '3.2.1', true);

	wp_enqueue_script( 'jquery-migrate', TEMPLATE_URI . '/app/js/vendor/jQuery/jquery-migrate.min.js', array('jquery'), '3.2.1', true);

	wp_enqueue_script( 'bootstrap-js', TEMPLATE_URI . '/app/js/vendor/bootstrap/bootstrap.min.js', array('jquery'), '3.3.7', true );

	wp_enqueue_script( 'menu-handler-js', TEMPLATE_URI . '/js/menu_handler.js', array('jquery'), '0.0.1', true );

	wp_enqueue_script( 'slick', TEMPLATE_URI . '/app/js/vendor/slick/slick1.8.1.min.js', array('jquery'), '1.8.1', true );

	wp_enqueue_script( 'slick-select', TEMPLATE_URI . '/app/js/vendor/select2/select2.min.js', array('jquery', 'slick'), '4.0.6', true );

	wp_enqueue_script( 'waypoints', TEMPLATE_URI . '/app/js/vendor/waypoints/waypoints.min.js', array('jquery'), '4.0.1', true );

	wp_enqueue_script( 'circle-progres', TEMPLATE_URI . '/app/js/vendor/jquery-circle-progress-1.2.2/circle-progress.min.js', array('jquery'), '1.2.2', true );

	wp_enqueue_script( 'main-js', TEMPLATE_URI . '/app/js/scripts.js', array('jquery'), filemtime( get_theme_file_path('/app/js/scripts.js')), true );

	wp_enqueue_script( 'new_app-js', TEMPLATE_URI . '/js/new_app.js', array('jquery'), filemtime( get_theme_file_path('/js/new_app.js')), true );



	wp_localize_script( 'main-js', 'SiteParams', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX

	) );

	/*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}*/
}

function promx_load_wp_admin_assets() {
	wp_enqueue_style( 'adminStyle', TEMPLATE_URI . 'admin/css/admin_style.css' );

}

function promx_load_wp_admin_script($hook){

	if($hook == 'toplevel_page_promx-icons-options'){
		wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/063e6393a1.js?ver=4.6.10', array(), '4.6.10', true);
	}

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
