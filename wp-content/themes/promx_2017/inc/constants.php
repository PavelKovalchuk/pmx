<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 12:55
 */


//Path and directories
define("CURRENT_HOME_URL", pll_home_url());

define("TEMPLATE_DIR", get_template_directory() . '/');

define("TEMPLATE_URI", get_template_directory_uri() . '/');

define("INCLUDES_DIR", TEMPLATE_DIR . "inc/");

define("INCLUDES_CLASSES_DIR", INCLUDES_DIR . "classes/");

define("TEMPLATE_PARTS_MAIN_DIR", TEMPLATE_DIR . "template_parts/");
define("TEMPLATE_PARTS_DIR", TEMPLATE_PARTS_MAIN_DIR . "parts/");

define("IMAGES_DIR", TEMPLATE_URI . "images/");

define("OPTION_PAGES_MAIN_DIR", INCLUDES_DIR . "option_pages/");
define("OPTION_PAGES_DIR", OPTION_PAGES_MAIN_DIR . "pages/");

define("ACF_OPTION_PAGES_MAIN_DIR", INCLUDES_DIR . "acf_option_pages/");
define("ACF_OPTION_PAGES_DIR", ACF_OPTION_PAGES_MAIN_DIR . "acf_pages/");

define("BOOTSTRAP_WALKERS_MAIN_DIR", INCLUDES_DIR . "bootstrap_walkers/");
define("BOOTSTRAP_WALKERS_DIR", BOOTSTRAP_WALKERS_MAIN_DIR . "classes/");

define("WIDGET_CLASSES_MAIN_DIR", INCLUDES_DIR . "option_widgets/");
define("WIDGET_CLASSES_DIR", WIDGET_CLASSES_MAIN_DIR . "widgets/");

define("SIDEBARS_DIR", INCLUDES_DIR . "sidebars/");

define("CPT_MAIN_DIR", INCLUDES_DIR . "custom_post_types/");
define("CPT_DIR", CPT_MAIN_DIR . "types/");


//common used variables
define("CURRENT_LANG_CODE", pll_current_language('slug'));

define("GENERAL_IMAGE_ALT", get_option( '_promx_images_and_logos_options' )['common_image_alt']);

define("FALLBACK_IMAGE_ALT", 'proMX');

define("TEXTDOMAIN", 'prorm');

define("MENU_ITEM_SPAN_CLASS", 'menu-item-urlless');

define("GENERAL_READ_MORE", get_option( '_promx_buttons_and_links_options' )['read_more_text_'. CURRENT_LANG_CODE]);

define("FALLBACK_READ_MORE", 'Read');



//Slugs
define("TESTIMONIAL_SLUG", get_option( '_promx_testimonials_data_options' )['testimonials_slug_'. CURRENT_LANG_CODE]);







