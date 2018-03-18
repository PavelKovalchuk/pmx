<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 15:55
 */
require_once(INCLUDES_CLASSES_DIR . 'option-pages/option-pages.php');
require_once(OPTION_PAGES_MAIN_DIR . 'OptionsStorage.php');

$options_storage = new OptionsStorage();
$options_page = new OptionPages();

//require_once(OPTION_PAGES_DIR . 'social-page.php');
require_once(OPTION_PAGES_DIR . 'forms-page.php');
require_once(OPTION_PAGES_DIR . 'forms-labels-page.php');
require_once(OPTION_PAGES_DIR . 'buttons-page.php');
require_once(OPTION_PAGES_DIR . 'posts-page.php');
require_once(OPTION_PAGES_DIR . 'images-page.php');
require_once(OPTION_PAGES_DIR . 'footer-page.php');
require_once(OPTION_PAGES_DIR . 'events-page.php');
require_once(OPTION_PAGES_DIR . 'testimonials-page.php');
require_once(OPTION_PAGES_DIR . 'icons-page.php');
require_once(OPTION_PAGES_DIR . 'galleries-page.php');

$options_page->pages( $options_storage->getGeneralSubpages() );