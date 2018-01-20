<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.01.2018
 * Time: 23:33
 */


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



	<?php
}

function get_template_our_numbers($title, $items){

	if( !$title || empty($items)){
		return false;
	}

	?>

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


	<?php
}

