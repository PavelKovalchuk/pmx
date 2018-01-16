<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 16.01.2018
 * Time: 19:56
 */

class SocialLinksWidget extends WP_Widget {


	function __construct() {
		// Запускаем родительский класс
		parent::__construct(
			'social_links_widget',
			'Social Links Widget',
			array('description' => 'Social Links Widget')
		);

	}

	// Вывод виджета
	function widget( $args, $instance ){

		echo $args['before_widget'];
		$widget_id = $args["widget_id"];
		$items = get_field('social_networks_items', 'widget_' . $widget_id);

		if($items){
			?><div class="social-links-group"><?php
			foreach($items as $item){ ?>

				<a href="<?php echo $item['social_networks_link'] ?>" class="social-link">
                    <i class="fa fa-<?php echo $item['social_network_name'] ?>"></i>
				</a>

			<?php } ?>
			</div>
		<?php }

		echo $args['after_widget'];
	}



}