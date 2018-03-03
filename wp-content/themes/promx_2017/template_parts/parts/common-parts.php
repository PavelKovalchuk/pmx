<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.01.2018
 * Time: 23:33
 */


function __get_seo_link_html($current_flag, $link_target, $class, $link_text){

	if(!$current_flag){

		?>
        <a class="<?php echo $class; ?>" href="<?php echo$link_target; ?>">

			<?php if($link_text){
				print_button_text($link_text);
            } ?>

        </a>
		<?php
	}else{
		?>
        <span class="<?php echo $class; ?>">

			<?php if($link_text){
				print_button_text($link_text);
            } ?>

        </span>
		<?php
	}

}


function __get_fa_icon_html($icon){

    if(!$icon){
        return false;
    }

?>

    <i class="fa <?php echo $icon; ?>" aria-hidden="true"></i>

<?php
}


function get_template_simple_text($title, $text){

	if( !$title || !$text){
		return false;
	}

	?>

	<div class="row">
		<div class="col-sm-12 text-center">
			<article class="experienced_article">
				<header>
					<h2 class="header-title"><?php echo $title; ?></h2>
				</header>
				<p><?php echo $text; ?></p>
			</article>
		</div>
	</div>

	<?php
}

function get_template_transformation_blocks($title, $items){

	if( !$title || empty($items)){
		return false;
	}

	?>

	<div class="row">
		<div class="col-sm-12 text-center">
			<article class="transformation_article">

				<header>
					<h2 class="header-title"><?php echo $title; ?></h2>
				</header>

				<div class="row">

					<?php foreach ($items as $item){ ?>

					<div class="col-sm-6 col-md-3 transformation_article_item">
						<img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['image_alt']); ?>" class="img-responsive">
						<p><?php echo $item['text'];; ?></p>
					</div>

					<?php } ?>

				</div>

			</article>
		</div>
	</div>


	<?php
}

function get_template_product_promo($title, $image, $image_alt, $link_target, $link_text, $text){

	if( !$title || !$image || !$link_target || !$text){
		return false;
	}

	?>

    <section id="dynamics">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <article class="dynamics_article">
                        <div class="dynamics_article_left">
                            <figure>
                                <img src="<?php echo $image; ?>" alt="<?php print_image_alt($image_alt) ?>" class="img-responsive">
                            </figure>
                            <div class="visible-xs text-center">
                                <a href="<?php echo $link_target; ?>" type="button" class="btn btn-primary">
                                    <span><?php print_button_text($link_text); ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="dynamics_article_right">
                            <header>
                                <h2 class="header-title"><?php echo $title; ?></h2>
                            </header>
                            <p><?php echo $text; ?></p>
                        </div>
                    </article>

                </div>
            </div>
        </div>

    </section>

	<?php
}

function get_template_our_numbers($title, $items){

	if( !$title || empty($items)){
		return false;
	}

	?>
    <section id="numbers">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">

                    <article class="experienced_article">
                        <header>
                            <h2 class="header-title"><?php echo $title; ?></h2>
                        </header>
                        <div class="numbers-wrap">

			                <?php
			                $i = 0;
			                foreach ($items as $item){
				                $i++; ?>

                                <div class="numbers-item">
                                    <div id="number<?php echo $i; ?>" data-number-block-item="<?php echo $item['number']; ?>">
                                        <p></p>
                                    </div>
                                    <span><?php echo $item['text']; ?></span>
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

function get_template_fullwidth_image_part($image, $image_alt, $parent_class){
	if( !$image || !$image_alt){
		return false;
	} ?>

    <div class="fullwidth <?php  echo $parent_class; ?>">
        <img src="<?php echo $image; ?>" alt="<?php print_image_alt($image_alt); ?>" class="img-responsive">
    </div>

	<?php
}


function get_template_contact_us_block($title, $text, $person){

	if( !$title || !$text || !$person){
		return false;
	}

	?>

    <div class="container contact-us-form">
        <div class="row">
            <div class="col-sm-12">

                <article class="contact_article">
                    <header>
                        <h2 class="header-title text-center"><?php echo $title; ?></h2>
                    </header>
                    <div class="row">
                        <div class="col-sm-12 col-md-7 col-lg-6">
				            <?php get_form_template_main(); ?>
                        </div>
                        <div class="col-md-5 col-lg-6 hidden-xs hidden-sm">
                            <p class="text-justify contact-text"><?php echo $text; ?></p>
                            <p class="text-right contact-text"><?php echo $person; ?></p>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>

	<?php
}


function get_template_assignments_section($items, $title = false){

	if(empty($items)){
		return false;
	}

	$quantity = count($items);

	if( $quantity == 4 ){
	    $class = 'col-sm-3 col-md-3 subslider-section_item four-items';
    }elseif ( $quantity < 4 ){
		$class = 'col-sm-4 col-md-4 subslider-section_item';
    }else{
		return false;
    }



	?>

    <section id="subslider" class="subslider-section bg-primary">
        <div class="container">

            <?php if($title){ ?>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="header-title header-title-white"><?php echo $title; ?></h2>
                </div>
            </div>
            <?php } ?>

            <div class="row">

	            <?php foreach ($items as $item){ ?>

                    <div class="<?php echo $class; ?>">
                        <h2>
                            <?php if($item['image']){ ?>
                                <img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['title']); ?>">
                            <?php }elseif($item['icon']){

	                            __get_fa_icon_html( $item['icon']);
                                ?>

                            <?php } ?>

                            <?php echo $item['title']; ?>
                        </h2>
                        <p><?php echo $item['text']; ?></p>
                    </div>

	            <?php } ?>

            </div>
        </div>
    </section>


	<?php
}


function get_template_instruction_video_section($title, $text, $video_link){

	if( !$title || !$text || !$video_link){
		return false;
	}

	?>

    <section id="howToUse">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="howToUse_article">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 howToUse_article_left">

                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="758" height="426" src="<?php echo $video_link; ?>?rel=0&amp;controls=0" frameborder="0" allowfullscreen></iframe>
                                </div>

                            </div>
                            <div class="col-sm-6 col-md-6 howToUse_article_right">
                                <header>

                                    <h2 class="how-use-header-title"><?php echo $title; ?></h2>

                                </header>
                                <p><?php echo $text; ?></p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>


	<?php
}


function get_template_instruction_image_block($title, $text_1, $image, $subtitle, $text_2, $image_alt){

	if( !$title || !$text_1 || !$image){
		return false;
	}

	?>

    <article class="howToUse_article">
         <div class="row">
             <div class="col-sm-6 col-md-6 howToUse_article_left">
                 <div class="embed-responsive embed-responsive-16by9">
                     <img src="<?php echo $image; ?>" alt="<?php print_image_alt($image_alt); ?>" class="img-responsive">
                 </div>
             </div>
             <div class="col-sm-6 col-md-6 howToUse_article_right">
                 <header>
                     <h2 class="how-use-header-title"><?php echo $title; ?></h2>
                 </header>
                 <div class="entry-content">
                     <p><?php echo $text_1; ?></p>

                     <?php if($subtitle){?>
                        <h2 class="how-use-subtitle"><?php echo $subtitle; ?></h2>
                     <?php } ?>

                    <?php if($text_2){?>
                        <p><?php echo $text_2; ?></p>
                    <?php } ?>

                 </div>
             </div>
         </div>
    </article>

	<?php
}


function get_template_testimonials_section($title, $items){

	if( !$title || empty($items)){
		return false;
	}

	?>

    <section id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="testimonials_article">
                        <header>
                            <h2 class="header-title text-center"><?php echo $title; ?></h2>
                        </header>
                        <div class="row">

	                        <?php foreach ($items as $item){ ?>

                                <div class="col-sm-6 clearfix testimonials_article_item">
                                    <div class="testimonials_article_logo">
                                        <img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['company']); ?>">
                                    </div>
                                    <p><?php echo $item['text']; ?></p>
                                    <div class="testimonials_article_sign">
                                        <span><?php echo $item['person']; ?></span>
	                                    <?php echo $item['position']; ?>
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


function get_template_call_action_section($text, $link_target, $link_text ){

	if( !$text || !$link_target){
		return false;
	}

	?>

    <section id="callAction" class="bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="callAction_article">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
                                <p class="text-white"><?php echo $text; ?></p>
                                <?php //TODO - pass parameter GET page_from to link target page or SESSION
                                //$current_url="//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                                //$_SERVER['HTTP_REFERER'];
                                ?>
                                <a href="<?php echo $link_target; ?>" type="button" class="btn btn-primary btn-outline-inverted">
	                                <?php print_button_text($link_text); ?>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>


	<?php
}

function get_template_referant_section($title, $items){

	if( !$title || empty($items)){
		return false;
	}

	?>

    <section id="referant">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="referant_article">
                        <header>
                            <h2 class="header-title text-center"><?php echo $title; ?></h2>
                        </header>
                        <div class="row referant_article_row">

	                        <?php foreach ($items as $item){ ?>

                                <div class="col-sm-6 col-md-3">
                                    <div class="referant_article_item">
                                        <div class="referant_article_item_img">
                                            <img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['title']); ?>" class="img-responsive">
                                        </div>
                                        <div class="referant_article_item_text">
                                            <p><?php echo $item['text']; ?></p>
                                        </div>
                                        <div class="referant_article_item_link">
                                            <a href="<?php echo $item['link_target']; ?>"><?php print_button_text($item['link_text']); ?></a>
                                        </div>
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

function get_template_promo_info_section($title, $text){

	if( !$title || !$text){
		return false;
	}

	?>
    <section id="aboutMicrosoft">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
                                <header class="text-center">
                                    <h2 class="header-title"><?php echo $title; ?></h2>

                                </header>
                                <div class="entry-content">
                                    <p class="text-center font-big"><?php echo $text; ?></p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

	<?php
}



function get_template_support_section($title, $text, $contacts){

	if( !$title || !$text || !$contacts){
		return false;
	}

	?>


    <div class="col-sm-12 col-md-5 col-lg-6">
        <div class="contacts-info">
            <h1 class="title"><?php echo $title; ?></h1>
            <h3 class="subtitle"><?php echo $text; ?></h3>

	        <?php foreach ($contacts as $contact){ ?>

                <div class="contacts">

                    <?php
                    __get_fa_icon_html($contact['icon']);

                    if($contact['title']){
                        echo $contact['title'];
                    }
                    ?>
                    <a href="<?php echo $contact['link_target']; ?>"><?php print_button_text($contact['link_text']); ?></a>
                </div>

	        <?php } ?>

        </div>
    </div>

	<?php
}

function get_template_product_description_section($title, $text, $image, $image_alt){

	if( !$title || !$text || !$image){
		return false;
	}

	?>

    <section id="timeTracking" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="text-center">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
                                <header>
                                    <h2 class="header-title"><?php echo $title; ?></h2>
                                </header>
                                <div class="entry-content">
                                    <p><?php echo $text; ?></p>
                                    <img src="<?php echo $image; ?>" alt="<?php print_image_alt($image_alt); ?>" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

	<?php
}

function get_template_product_zoom_image_section($items){

	if( empty($items)){
		return false;
	}

	?>

    <section id="timeTracking" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="b-pic-s-text-article">

	                    <?php foreach ($items as $item){ ?>

                            <div class="row b-pic-s-text-article__content">
                                <div class="col-sm-12">
                                    <img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['title']); ?>" class="img-responsive">
                                    <div class="text text-position-<?php echo $item['text_position']; ?>">
                                        <p><?php echo $item['text']; ?></p>
                                    </div>
                                </div>
                            </div>

	                    <?php } ?>

                    </article>
                </div>
            </div>
        </div>
    </section>

	<?php
}

function get_template_contact_us_section($title, $subtitle, $items){

	if( !$title || !$subtitle || empty($items)){
		return false;
	}

	?>

    <div class="contacts-info">
        <h1 class="title"><?php echo $title; ?></h1>
        <h3 class="subtitle"><?php echo $subtitle; ?></h3>

	    <?php foreach ($items as $item){ ?>

            <div class="contacts">

                <?php __get_fa_icon_html($item['icon']); ?>
	            <?php echo $item['title']; ?>
                <?php if($item['is_link_only']){ ?>

                    <a href="<?php echo $item['link_target']; ?>"><?php echo $item['link_text']; ?></a>

                <?php }else{

			        foreach ($item['text_items'] as $text_item){ ?>

                        <p class="contacts-details"><?php echo $text_item['text']; ?></p>

                    <?php } ?>

                <?php } ?>

            </div>

	    <?php } ?>

    </div>

	<?php
}

function get_template_map_block($lat, $long, $zoom){

	if( !$long || !$lat || !$zoom){
		return false;
	}

	?>

    <div class="contact-map">
        <div id="mapWrap">
            <div id="map" data-lat="<?php echo $lat; ?>" data-long="<?php echo $long; ?>" data-zoom="<?php echo $zoom; ?>"></div>
        </div>
    </div>

	<?php
}
