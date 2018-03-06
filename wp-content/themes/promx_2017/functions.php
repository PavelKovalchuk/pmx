<?php
/**
 * promx_2017 functions and definitions
 *
 */

require_once(get_template_directory() . '/inc/constants.php');

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

if ( ! function_exists( 'promx_wp_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function promx_wp_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on StrapPress, use a find and replace
         * to change 'strappress' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'promx', get_template_directory() . '/languages' );

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

        add_image_size( 'preview-post-image', 470, 280, false );

	    //add_image_size( 'preview-gallery-image-cropped', 470, 280, true );

	    add_image_size( 'main-preview-gallery-image-cropped', 510, 320, true );

	    add_image_size( 'preview-post-image-blog', 510, 320, false );

	    add_image_size( 'preview-menu-image', 238, 71, false );
        /*add_image_size( 'post-main-image', 973, 500, true );
	    add_image_size( 'post-carousel-image', 370, 240, true );

	    add_image_size( 'post-tablet-image', 1000, 500, true );

	    add_image_size( 'post-mobile-image', 600, 400, true );

	    add_image_size( 'popular-post-image', 230, 121, true );

        add_image_size( 'post-full-image-cropped', 1530, 600, true );

	    add_image_size( 'post-full-image', 1530, 600, false );

	    add_image_size( 'post-large-imagee', 1000, 400, true );*/

        // This theme uses wp_nav_menu()
        register_nav_menus( array(
            'primary'   => esc_html__( 'Top primary menu', TEXTDOMAIN ),
            'header_icon_menu'   => esc_html__( 'Top icon menu', TEXTDOMAIN ),
            'footer_first'   => esc_html__( 'Footer first menu', TEXTDOMAIN ),
            'footer_second'   => esc_html__( 'Footer second menu', TEXTDOMAIN ),
            'categories' => esc_html__( 'Categories in left sidebar', TEXTDOMAIN ),
        ) );


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
add_action( 'after_setup_theme', 'promx_wp_setup' );


//Customizations of WP behaviour

add_post_type_support( 'page', 'excerpt' );

/**
 * Add CSS/JS Scritps
 */
require_once( INCLUDES_DIR . 'scripts.php');

/**
 * Register Widgets
 */

require_once( WIDGET_CLASSES_MAIN_DIR . 'widgets-index.php');

/**
 * Register Sidebars
 */

require_once( SIDEBARS_DIR . 'sidebars-index.php');

/**
 * Custom template tags for this theme.
 */
require_once( INCLUDES_DIR . 'template-tags.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require_once( INCLUDES_DIR . 'extras.php');

/**
 * Customizer additions.
 */
require_once( INCLUDES_DIR . 'customizer.php');

/**
 * Pagination
 */

require_once( INCLUDES_DIR . 'pagination.php');

/**
 * Bootstrap Walker.
 */
require_once( BOOTSTRAP_WALKERS_MAIN_DIR . 'bootstrap-walker-index.php');

/**
 * Custom Post Types
 */
require_once( CPT_MAIN_DIR . 'cpt-index.php');

/**
 * Custom Thumbnails - https://wordpress.org/plugins/multiple-featured-images/
 */
//require_once( CUSTOM_THUMBNAILS_MAIN_DIR . 'custom-thumbnails-index.php');

/**
 * Custom Post Types
 */
require_once( AJAX_HANDLERS_MAIN_DIR . 'ajax-handlers-index.php');

/**
 * Forms
 */
require_once( FORMS_MAIN_DIR . 'forms-index.php');

/**
 * Custom templates 
 */
/**
 * TODO - Should be deleted
 */
require_once( INCLUDES_DIR . 'template-parts.php');


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
require_once( TEMPLATE_PARTS_MAIN_DIR . 'template-parts-index.php');


// https://polylang.pro/doc/filter-reference/#pll_get_post_types
/**
 * Allows plugins to modify the list of post types which will be filtered by language.
 * The default are custom post types which have the parameter ‘public’ set to true.
 */
/*
add_filter( 'pll_get_post_types', 'add_cpt_to_pll', 10, 2 );

function add_cpt_to_pll( $post_types, $is_settings ) {
	if ( $is_settings ) {
		// hides 'my_cpt' from the list of custom post types in Polylang settings
		unset( $post_types['my_cpt'] );
	} else {
		// enables language and translation management for 'my_cpt'
		$post_types['my_cpt'] = 'my_cpt';
	}
	return $post_types;
}*/

// Admin Section

if ( is_admin() ) {

	require_once( INCLUDES_DIR . 'admin_functions.php');

	require_once( OPTION_PAGES_MAIN_DIR . 'option-pages-index.php');

	require_once( ACF_OPTION_PAGES_MAIN_DIR . 'acf-option-pages-index.php');
}

