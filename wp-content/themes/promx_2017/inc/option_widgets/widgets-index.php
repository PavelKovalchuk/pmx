<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

require_once(WIDGET_CLASSES_DIR . 'LinksWidget.php');
require_once(WIDGET_CLASSES_DIR . 'SocialLinksWidget.php');
require_once(WIDGET_CLASSES_DIR . 'CustomMenuProductsWidget.php');

add_action( 'widgets_init', 'promx_widgets_init' );

function promx_widgets_init() {

	register_widget( 'LinksWidget' );
	register_widget( 'SocialLinksWidget' );
	register_widget( 'CustomMenuProductsWidget' );

}
