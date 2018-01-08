<?php
/**
 * Enqueue scripts and styles.
 */
//add_action( 'wp_enqueue_scripts', 'ts_scripts', 200 );
//add_action( 'admin_print_styles', 'ts_admin_menu_assets' );


function ts_scripts() {
	wp_enqueue_style( 'ts-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_theme_file_path('/style.css')) );

    wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), '3.2.1', true);

	if ( is_page( 'blog' ) || is_category()){

		global $wp_query;

		//This is needed for working shuffle in IE
		wp_register_script( 'shuffle_shim', 'https://unpkg.com/core-js/client/shim.min.js');
		wp_enqueue_script( 'shuffle_shim' );

		wp_enqueue_script( 'shuffle', get_template_directory_uri() . '/js/libs/shuffle/shuffle.min.js', array(), '2.0.1', true);

		$published_posts = wp_count_posts()->publish;
		$posts_per_page = get_option('posts_per_page');
		$page_number_max = ceil($published_posts / $posts_per_page);
		// now the most interesting part
		// we have to pass parameters to js script but we can get the parameters values only in PHP
		// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
		wp_localize_script( 'shuffle', 'blog_loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
			'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $page_number_max
		) );


	}

	//Author page
	if( is_page( 11 ) ){

		wp_register_script( 'captcha', 'https://www.google.com/recaptcha/api.js#asyncload', array(), '2', false);
		wp_enqueue_script( 'captcha' );

		wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/bower_components/waypoints/lib/jquery.waypoints.min.js', array('jquery'), '4.0.0', true);
	}

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
