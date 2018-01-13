<?php
/**
 * promx_2017 functions and definitions
 *
 */

require get_template_directory() . '/inc/constants.php';

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

if ( ! function_exists( 'gm_wp_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function gm_wp_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on StrapPress, use a find and replace
         * to change 'strappress' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'gm_wp', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size( 'category-post-image', 672, 360, true );
        add_image_size( 'post-main-image', 973, 500, true );
	    add_image_size( 'post-carousel-image', 370, 240, true );

	    add_image_size( 'post-tablet-image', 1000, 500, true );

	    add_image_size( 'post-mobile-image', 600, 400, true );

	    add_image_size( 'popular-post-image', 230, 121, true );

        add_image_size( 'post-full-image-cropped', 1530, 600, true );

	    add_image_size( 'post-full-image', 1530, 600, false );

	    add_image_size( 'post-large-imagee', 1000, 400, true );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary'   => esc_html__( 'Top primary menu', 'gm_wp' ),
            'categories' => __( 'Categories in left sidebar', 'greenmarket_blog' ),
        ) );

        // This theme uses wp_nav_menu() in one location.
        /*register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'gm_wp' ),
        ) );*/

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'strappress_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;
add_action( 'after_setup_theme', 'gm_wp_setup' );

function get_responsive_image(){

	$html = '<img src="banner.jpg" 
	srcset="banner.jpg 1280w,
	banner-300x90.jpg 300w,
	banner-768x231.jpg 768w,
	banner-1024x308.jpg 1024w" 
	sizes="(max-width: 1280px) 100vw, 1280px"
	alt="Front page banner alt text">';

	return $html;

}


/**
 * Add CSS/JS Scritps
 */
require INCLUDES_DIR . 'scripts.php';

/**
 * Register Widget Areas
 */
require INCLUDES_DIR . 'widgets.php';

/**
 * Custom template tags for this theme.
 */
require INCLUDES_DIR . 'template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require INCLUDES_DIR . 'extras.php';

/**
 * Customizer additions.
 */
require INCLUDES_DIR . 'customizer.php';

/**
 * Bootstrap Walker.
 */
require INCLUDES_DIR . 'bootstrap-walker.php';


/**
 * Custom templates 
 */
require INCLUDES_DIR . 'template-parts.php';


/**
 * Forms class https://github.com/jbrinley/wp-forms
 */
//require get_template_directory() . '/inc/forms.php';

/**
 * Custom ajax handler
 */
//require get_template_directory() . '/inc/ajax_handler.php';


/**
 * Custom functions in the admin panel
 */
//require get_template_directory() . '/inc/admin_functions.php';

/**
 * HTML markup parts
 */
require get_template_directory() . '/template-parts/template-parts-index.php';





// Admin Section

if ( is_admin() ) {



	$options_page_options =  array(
		array(
			'page_title'	=> 'proMX General Options',
			'menu_title'	=> 'proMX General Options',
			'capability'	=> 'manage_options',
			'menu_slug'		=> 'promx_option_pages',
			'icon_url'		=> 'dashicons-editor-code',
			'position'		=> 99,
			'sections'		=> array(),
			'subpages'		=> array(),
		)
	);

	require INCLUDES_DIR . 'admin_functions.php';

	require INCLUDES_DIR . 'option_pages/option-pages-index.php';
}

