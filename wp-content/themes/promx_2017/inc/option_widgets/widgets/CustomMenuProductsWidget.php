<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 06.02.2018
 * Time: 23:14
 */


class CustomMenuProductsWidget extends WP_Widget {

	function __construct() {
		// Запускаем родительский класс
		parent::__construct(
			'custom_menu_products_widget',
			'Custom Menu Products Widget',
			array('description' => 'Additional Menus object to Products submenu - Widget')
		);

	}

	// html форма настроек виджета в Админ-панели
	function form( $instance ) {
	}

	// Сохранение настроек виджета (очистка)
	function update( $new_instance, $old_instance ) {
	}

	// Вывод виджета
	function widget( $args, $instance ){

		echo $args['before_widget'];
		$widget_id = $args["widget_id"];
		$link_data = get_fields('widget_' . $widget_id);

		?>

        <div class="menu-item menu-custom-item count-item-3" style="background-image: url(<?php echo $link_data['custom_menu_products_background'] ; ?>);">

            <div class="menu-item-inner menu-custom-item-inner">

                <h3 class="menu-page-title menu-custom-title"><?php echo $link_data['custom_menu_products_title']; ?></h3>
                <p class="menu-page-text"><?php echo $link_data['custom_menu_products_text'] ; ?></p>

	            <?php
	            global $wp;
	            $current_url = home_url(add_query_arg(array(),$wp->request)) . '/';

	            $current_flag = ($current_url == $link_data['custom_menu_products_link_target']) ? true : false;

	            __get_seo_link_html($current_flag, $link_data['custom_menu_products_link_target'], 'menu-page-link menu-custom-link', $link_data['custom_menu_products_link_text']);

	             ?>

            </div>

        </div>

        <?php


		echo $args['after_widget'];
	}


}