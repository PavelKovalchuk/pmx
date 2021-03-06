<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 19.01.2018
 * Time: 1:41
 */


function __get_promo_events_image_part($big_image, $link_target, $event_link_text, $image_alt){

	if( !$big_image || !$link_target || !$event_link_text ){
		return false;
	}

	?>

    <div class="image-part second-flex ">
        <img src="<?php echo $big_image; ?>" alt="<?php print_image_alt($image_alt) ?>" class="img-responsive">
        <a href="<?php echo $link_target; ?>" type="button" class="btn btn-primary btn-outline-inverted visible-xs">
            <?php print_button_text($event_link_text); ?>
        </a>
    </div>

	<?php
}

function __get_promo_events_text_part($title, $place, $time, $link_target, $link_text){
	if( !$title || !$place || !$time || !$link_target){
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

	<?php
}

function __get_promo_events_part($events, $event_link_text){

	if( empty($events)){
		return false;
	}

	$event_classes = [
		'blogEvents_article_row_right_first',
		'blogEvents_article_row_right_second'
	];

	for($i = 0; $i <= count($event_classes); $i++){

		if( empty($events[$i])){
			return false;
		} ?>

        <div class="<?php echo $event_classes[$i];?>">

	        <?php if ($i % 2 !== 0) {
		        __get_promo_events_image_part( $events[$i]['big_image'], $events[$i]['link_target'], $event_link_text, $events[$i]['image_alt']);
		        __get_promo_events_text_part($events[$i]['title'], $events[$i]['place'], $events[$i]['time'], $events[$i]['link_target'], $event_link_text);

	        }else{
		        __get_promo_events_text_part($events[$i]['title'], $events[$i]['place'], $events[$i]['time'], $events[$i]['link_target'], $event_link_text);
		        __get_promo_events_image_part( $events[$i]['big_image'], $events[$i]['link_target'], $event_link_text, $events[$i]['image_alt']);

	        } ?>


        </div>

	<?php }

}

function get_template_blog_and_events_block($title, $subtitle, $image, $image_alt, $link_target, $link_text, $text, $event_link_text, $events){

	if( !$title || !$subtitle || !$image || !$link_target || !$text || empty($events)){
		return false;
	}

	$events_filtered = array_slice($events, 0, 2);

	?>

    <section id="blogEvents">
        <div class="fullwidth bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

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

					                    <?php __get_promo_events_part($events_filtered, $event_link_text); ?>

                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>
    </section>

	<?php
}

function get_template_events_list($events){

	if( empty($events)){
		return false;
	}

	$options = get_option( '_promx_events_buttons_options' );
	$option_read_more = $options['read_more_events_text_' . CURRENT_LANG_CODE];
	$option_register = $options['register_events_text_' . CURRENT_LANG_CODE];

	?>
    <section id="events" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">

                    <article>
                        <div class="events-list">

			                <?php foreach ($events as $event){ ?>

                                <div class="events-list__item">
                                    <div class="events-list__item_img">
                                        <img src="<?php echo $event['image']; ?>" class="img-responsive" alt="<?php print_image_alt($event['image_alt']); ?>">
                                    </div>
                                    <div class="events-list__item_info">
                                        <h2><?php echo $event['title']; ?></h2>
                                        <div class="entry-tag">
                                            <span><?php echo $event['place']; ?></span> /
                                            <span><?php echo $event['time']; ?></span>
                                        </div>
                                        <p>
							                <?php echo $event['text']; ?>
                                        </p>
                                    </div>
                                    <div class="events-list__item_links">

						                <?php if($event['link_target']){ ?>
                                            <a href="<?php echo $event['link_target']; ?>" class="link-item">
                                                <div>
                                                    <i class="icon-next"></i>
                                                </div>
								                <?php
                                                if($event['link_text']){
	                                                print_button_text($event['link_text']);
                                                }else{
                                                    echo $option_read_more;
                                                }

                                                ?>
                                            </a>
						                <?php }else{ ?>
                                            <span></span>
						                <?php } ?>

                                        <a href="#form-section" class="link-item js-anchor js-form-select-checker" data-event-target="<?php echo $event['code']; ?>">
                                            <div>
                                                <i class="icon-calendar"></i>
                                            </div>
							                <?php print_button_text($option_register); ?>
                                        </a>

                                    </div>
                                </div>

			                <?php } ?>


                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

	<?php
}
