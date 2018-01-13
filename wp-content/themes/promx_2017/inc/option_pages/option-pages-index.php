<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 15:55
 */
require get_template_directory() . '/inc/classes/option-pages/option-pages.php';

require OPTION_PAGES_DIR . 'social-page.php';
require OPTION_PAGES_DIR . 'forms-page.php';
require OPTION_PAGES_DIR . 'buttons-page.php';
require OPTION_PAGES_DIR . 'posts-page.php';

$options_page = new OptionPages();

$options_page->pages( $options_page_options );