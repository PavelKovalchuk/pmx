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
define("TEMPLATE_MODALS_DIR", TEMPLATE_PARTS_DIR . "modals/");

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

define("CUSTOM_THUMBNAILS_MAIN_DIR", INCLUDES_DIR . "custom_thumbnails/");
define("CUSTOM_THUMBNAILS_DIR", CUSTOM_THUMBNAILS_MAIN_DIR . "items/");


define("AJAX_HANDLERS_MAIN_DIR", INCLUDES_DIR . "ajax_handlers/");
define("AJAX_HANDLERS_DIR", AJAX_HANDLERS_MAIN_DIR . "handlers/");

define("CORE_CHANGES_MAIN_DIR", INCLUDES_DIR . "core_changes/");
define("CORE_CHANGES_DIR", CORE_CHANGES_MAIN_DIR . "changes/");

define("SHORTCODES_MAIN_DIR", INCLUDES_DIR . "shortcodes/");
define("SHORTCODES_ITEMS_DIR", SHORTCODES_MAIN_DIR . "items/");

define("FORMS_MAIN_DIR", INCLUDES_DIR . "forms/");
define("FORMS_CLASSES_DIR", FORMS_MAIN_DIR . "classes/");
define("FORMS_ABSTRACT_CLASSES_DIR", FORMS_CLASSES_DIR . "abstracts/");
define("FORMS_TRAITS_DIR", FORMS_CLASSES_DIR . "traits/");
define("FORMS_HELPERS_DIR", FORMS_CLASSES_DIR . "helpers/");
define("FORMS_MODELS_DIR", FORMS_MAIN_DIR . "models/");
define("FORMS_MODELS_FORMS_DIR", FORMS_MODELS_DIR . "forms/");
define("FORMS_MODELS_FETCHERS_DIR", FORMS_MODELS_DIR . "fetchers/");
define("FORMS_TEMPLATE_DIR", TEMPLATE_PARTS_DIR . "forms/");
define("FORMS_LOGS_DIR", FORMS_MAIN_DIR . "logs/");


//common used variables

$promx_lang_code = pll_current_language('slug') ? pll_current_language('slug') : pll_default_language('slug');

define("CURRENT_LANG_CODE", $promx_lang_code);

define("GENERAL_IMAGE_ALT", get_option( '_promx_images_and_logos_options' )['common_image_alt']);

define("FALLBACK_IMAGE_ALT", 'proMX');

define("TEXTDOMAIN", 'prorm');

define("MENU_ITEM_SPAN_CLASS", 'menu-item-urlless');

define("GENERAL_READ_MORE", get_option( '_promx_buttons_and_links_options' )['read_more_text_'. CURRENT_LANG_CODE]);

define("FALLBACK_READ_MORE", 'Read');



//Slugs
define("TESTIMONIAL_SLUG", get_option( '_promx_testimonials_data_options' )['testimonials_slug_'. CURRENT_LANG_CODE]);

define("GALLERY_SLUG", get_option( '_promx_galleries_data_options' )['galleries_slug_'. CURRENT_LANG_CODE]);







