<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 19.01.2018
 * Time: 0:17
 */

$acf_event_option_page = acf_add_options_page(array(
	'page_title' 	=> 'proMX Events Settings',
	'menu_title' 	=> 'proMX Events Settings',
	'menu_slug' 	=> 'promx-event-settings',
	'capability' 	=> 'edit_posts',
	'position' => 102,
	'parent_slug' => '',
	'icon_url' => 'dashicons-groups',
	'redirect' 	=> false
));

