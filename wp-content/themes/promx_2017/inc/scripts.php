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
	wp_enqueue_style( 'bootstrap', TEMPLATE_URI . 'app/css/bootstrap.min.css', array(), '3.3.7' );

	wp_enqueue_style( 'main-style', TEMPLATE_URI . 'app/css/main.css', array('bootstrap'), filemtime( get_theme_file_path('/app/css/main.css')) );

	wp_enqueue_style( 'promx-style', TEMPLATE_URI . 'style.css', array(), filemtime( get_theme_file_path('/style.css')) );


    wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'jquery', TEMPLATE_URI . 'app/js/vendor/jQuery/jquery-3.2.1.min.js', array(), '3.2.1', true);

	wp_enqueue_script( 'jquery-migrate', TEMPLATE_URI . 'app/js/vendor/jQuery/jquery-migrate.min.js', array('jquery'), '3.2.1', true);

	wp_enqueue_script( 'bootstrap-js', TEMPLATE_URI . 'app/js/vendor/bootstrap/bootstrap.min.js', array('jquery'), '3.3.7', true );

	wp_enqueue_script( 'menu-handler-js', TEMPLATE_URI . 'js/menu_handler.js', array('jquery'), '0.0.1', true );

	wp_enqueue_script( 'slick', TEMPLATE_URI . 'app/js/vendor/slick/slick1.8.1.min.js', array('jquery'), '1.8.1', true );

	wp_enqueue_script( 'slick-select', TEMPLATE_URI . 'app/js/vendor/select2/select2.min.js', array('jquery', 'slick'), '4.0.6', true );

	wp_enqueue_script( 'waypoints', TEMPLATE_URI . 'app/js/vendor/waypoints/waypoints.min.js', array('jquery'), '4.0.1', true );

	wp_enqueue_script( 'circle-progres', TEMPLATE_URI . 'app/js/vendor/jquery-circle-progress-1.2.2/circle-progress.min.js', array('jquery'), '1.2.2', true );

	wp_enqueue_script( 'main-js', TEMPLATE_URI . 'app/js/scripts.js', array('jquery'), filemtime( get_theme_file_path('/app/js/scripts.js')), true );

	wp_enqueue_script( 'cookie-js', TEMPLATE_URI . 'js/libs/js-cookie/src/js.cookie.js', array(), '2.2.0', true );

	wp_enqueue_script( 'forms-handler', TEMPLATE_URI . 'js/forms_handler.js', array('jquery'), filemtime( get_theme_file_path('/js/forms_handler.js')), true );

	wp_enqueue_script( 'new_app-js', TEMPLATE_URI . 'js/new_app.js', array('jquery', 'cookie-js'), filemtime( get_theme_file_path('/js/new_app.js')), true );


	if( is_page_template( 'page-templates/template-contact-us.php' ) ){

		wp_enqueue_script( 'maps-google', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDIVyYOOoUTOuNrr18bi-A3J0GlriHtoBA',  array('jquery'), '0.0.1', true);

		wp_enqueue_script( 'maps', TEMPLATE_URI . 'app/js/map.js', array('jquery', 'maps-google'), '0.0.1', true);
	}

	if( is_singular( 'gallery' ) ){

		wp_enqueue_script( 'fancybox', TEMPLATE_URI . 'app/js/vendor/fancybox/fancybox.min.js', array('jquery'), '3.2.5', true);
	}

    if ( is_page( 'blog' ) || is_category()){

        global $wp_query;

	    //This is needed for working shuffle in IE
	    wp_register_script( 'shuffle_shim', 'https://unpkg.com/core-js/client/shim.min.js');
	    wp_enqueue_script( 'shuffle_shim' );

        wp_enqueue_script( 'shuffle', TEMPLATE_URI . 'js/libs/shuffle/shuffle.min.js', array(), '2.0.1', true);
        wp_enqueue_script( 'imagesloaded', TEMPLATE_URI . 'js/libs/imagesloaded/imagesloaded.js', array('jquery', 'shuffle'), '4.1.3', true);
        wp_enqueue_script( 'shuffle-handler-js', TEMPLATE_URI . 'js/shuffle_handler.js', array('jquery', 'shuffle'), '0.0.1', true );

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

        //wp_enqueue_script( 'my_loadmore' );
    }

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
