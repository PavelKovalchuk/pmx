<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14.01.2018
 * Time: 23:32
 */
class LinksWidget extends WP_Widget {

	function __construct() {
		// Запускаем родительский класс
		parent::__construct(
			'links_widget',
			'Links Widget',
			array('description' => 'Links Widget')
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
		$items = get_field('items', 'widget_' . $widget_id);

		if($items){
			?><ul class="first-flex"><?php
			foreach($items as $item){ ?>

				<li>
					<a href="<?php echo $item['item_link'] ?>"><?php echo $item['item_text'] ?></a>
				</li>

			<?php } ?>
			</ul>
		<?php }

		echo $args['after_widget'];
	}


}