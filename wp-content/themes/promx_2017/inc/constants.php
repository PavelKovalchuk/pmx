<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 12:55
 */


//Path and directories
define("CURRENT_HOME_URL", pll_home_url());

define("INCLUDES_DIR", get_template_directory() . "/inc/");

define("TEMPLATE_PARTS_DIR", get_template_directory() . "/template-parts/parts/");

define("IMAGES_DIR", get_template_directory_uri() . "/images/");

define("OPTION_PAGES_DIR", INCLUDES_DIR . "option_pages/pages/");

define("WIDGET_CLASSES_DIR", INCLUDES_DIR . "option_widgets/widgets/");

define("SIDEBARS_DIR", INCLUDES_DIR . "sidebars/");


//common used variables
define("CURRENT_LANG_CODE", pll_current_language('slug'));

define("GENERAL_IMAGE_ALT", get_option( '_promx_images_and_logos_options' )['common_image_alt']);

define("FALLBACK_IMAGE_ALT", 'proMX');

define("TEXTDOMAIN", 'prorm');

define("MENU_ITEM_SPAN_CLASS", 'menu-item-urlless');






