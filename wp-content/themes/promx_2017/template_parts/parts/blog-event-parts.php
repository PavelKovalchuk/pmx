<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 19.01.2018
 * Time: 1:41
 */


function __get_promo_event_part($title, $place, $time, $link_target, $image, $image_alt, $link_text){

	if( !$title || !$place || !$time || !$link_target || !$image){
		return false;
	}

	?>

	<div class="text-part bg-secondary first-flex">
		<h3><?php echo $title; ?></h3>
		<p class="text-justify">
			<?php echo $place; ?>
			<br> <?php echo $time; ?>
		</p>
		<a href="<?php echo $link_target; ?>" type="button" class="btn btn-primary btn-outline-inverted"><?php print_button_text($link_text); ?></a>
	</div>
	<div class="image-part second-flex ">
		<img src="<?php echo $image; ?>" alt="<?php print_image_alt($image_alt) ?>" class="img-responsive">
		<a href="<?php echo $link_target; ?>" type="button" class="btn btn-primary btn-outline-inverted visible-xs"><?php print_button_text($link_text); ?></a>
	</div>

	<?php
}

function get_template_blog_and_events_block($title, $subtitle, $image, $image_alt, $link_target, $link_text, $text, $event_link_text, $events){

	if( !$title || !$subtitle || !$image || !$link_target || !$text || empty($events)){
		return false;
	}

	$events_filtered = [];

	foreach ($events as $event){
		if($event['promoted'] == true){
			$events_filtered[] = $event;
		}
	}

	?>

	<article class="blogEvents_article">
		<header class="text-center">
			<h2 class="header-title white small-gap"><?php echo $title; ?></h2>
		</header>
		<div class="hr dark_hr">&nbsp;</div>
		<div class="blogEvents_article_row">
			<div class="blogEvents_article_row_left">
				<div class="blogEvents_article_row_left_first">
					<div class="text-part bg-dark first-flex">
						<h3><?php echo $subtitle; ?></h3>
						<p class="text-justify"><?php echo $text; ?> </p>
						<button type="button" class="btn btn-link">Read more</button>
					</div>
					<div class="image-part second-flex">
						<img src="<?php echo $image; ?>" alt="<?php print_image_alt($image_alt) ?>" class="img-responsive">
						<a href="<?php echo $link_target; ?>" type="button" class="btn btn-primary btn-outline-inverted visible-xs"><?php print_button_text($link_text);?></a>
					</div>
				</div>
			</div>
			<div class="blogEvents_article_row_right">
				<div class="blogEvents_article_row_right_wrap">


					<div class="blogEvents_article_row_right_first">
						<?php __get_promo_event_part(
							$events_filtered[0]['title'],
							$events_filtered[0]['place'],
							$events_filtered[0]['time'],
							$events_filtered[0]['link_target'],
							$events_filtered[0]['image'],
							$events_filtered[0]['image_alt'],
							$event_link_text
						);
						?>
					</div>

					<div class="blogEvents_article_row_right_second">
						<?php __get_promo_event_part(
							$events_filtered[1]['title'],
							$events_filtered[1]['place'],
							$events_filtered[1]['time'],
							$events_filtered[1]['link_target'],
							$events_filtered[1]['image'],
							$events_filtered[1]['image_alt'],
							$event_link_text
						);
						?>
					</div>

				</div>
			</div>
		</div>
	</article>



	<?php
}
