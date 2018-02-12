<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 27.01.2018
 * Time: 12:24
 */


function get_template_cards_block($title, $items){

	if( !$title || empty($items)){
		return false;
	}

	?>

    <section id="whatYouGet" class="whatYouGet-section bg-light">
        <div class="fullwidth">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <article class="whatYouGet_article pb-0">
                            <header class="text-center">
                                <h2 class="header-title text-center"><?php echo $title; ?></h2>
                            </header>

                            <div class="row pros-row mt-1">

								<?php foreach ($items as $item){ ?>

                                    <div class="col-sm-6 col-md-3 col-lg-3">
                                        <div class="pros-row__item">
                                            <img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['image_alt']); ?>">
                                            <h4><?php echo $item['title']; ?></h4>
                                            <p><?php echo $item['text']; ?></p>
                                        </div>
                                    </div>

								<?php } ?>

                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<?php
}

function get_template_modern_cards_block($title, $text, $items){

	if( !$title || !$text || empty($items)){
		return false;
	}

	?>

	<div class="row">
	<div class="col-sm-12 col-md-8 col-md-offset-2 text-center">
		<article class="addons-article pb-0">
			<header>

				<h2 class="header-title small-gap""><?php echo $title; ?></h2>

			</header>
			<div class="hr light_hr">&nbsp;</div>
			<p class="font-big mt-1"><?php echo $text; ?></p>
		</article>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="article">
				<div class="row referant_article_row">

					<?php foreach ($items as $item){ ?>

						<div class="col-sm-6 col-md-3">
							<div class="referant_article_item box-shadow">
								<div class="referant_article_item_img">
									<img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['title']); ?>" class="img-responsive">
								</div>
								<div class="referant_article_item_text">
									<p><?php echo $item['text']; ?>	</p>
								</div>
								<div class="referant_article_item_link">
									<a href="<?php echo $item['link_target']; ?>"><?php print_button_text($item['link_text']); ?></a>
								</div>
							</div>
						</div>

					<?php } ?>

				</div>
			</div>
		</div>
	</div>

	<?php
}


function get_template_references_cards_block($title, $text, $items){

	if( !$title || !$text || empty($items)){
		return false;
	}

	$link_text = get_option( '_promx_testimonials_data_options' )['testimonials_read_more_text_'. CURRENT_LANG_CODE];

	?>

    <section id="references">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
                                <header class="text-center">
                                    <h1>
										<?php echo $title; ?>
                                    </h1>
                                </header>
                                <div class="entry-content">
                                    <p class="text-center"><?php echo $text; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="ref-items">

	                        <?php foreach ($items as $id => $item){ ?>

                                <div class="ref-items__item">
                                    <div class="ref-items__item_head">
                                        <img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['company']); ?>">
                                    </div>
                                    <div class="ref-items__item_content">
                                        <p><?php echo $item['text']; ?></p>
                                        <a href="<?php echo get_post_permalink($id); ?>" class="btn btn-primary"><?php print_button_text($link_text); ?></a>
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


function get_template_people_cards_block($title, $text, $items){

	if( !$title || !$text || empty($items)){
		return false;
	}

	?>

    <section id="events">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-lg-offset-3">
                                <header class="text-center">
                                    <h1><?php echo $title; ?></h1>
                                </header>
                                <div class="entry-content">
                                    <p class="text-center font-big">
	                                    <?php echo $text; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="article team-list">

	                        <?php foreach ($items as $item){ ?>

                                <div class="team-list__member">
                                    <div class="team-list__member_photo">
                                        <img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['name']); ?>" class="img-responsive">
                                    </div>
                                    <div class="team-list__member_socials">

		                                <?php foreach ($item['social_networks'] as $network){ ?>

                                            <a href="<?php echo $network['social_network_link']; ?>" class="link-item">

                                                <?php __get_fa_icon_html($network['social_network_name']); ?>
                                            </a>

                                        <?php } ?>


                                    </div>
                                    <div class="team-list__member_name">
                                        <h3><?php echo $item['name']; ?></h3>
                                        <div class="position"><?php echo $item['position']; ?></div>
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

function get_template_galleries_cards_section($title, $text, $items, $is_single = false){

	if( !$title || empty($items)){
		return false;
	}

	?>

    <section id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <header class="page-header">
                        <h1 class="section-title">
	                        <?php echo $title; ?>
                        </h1>

	                    <?php if($is_single && $text){ ?>

                        <div class="row gallery-text">
                            <div class="col-sm-12 col-md-10 col-lg-offset-1 text-center">
	                            <?php echo $text; ?>
                            </div>
                        </div>
                        <?php } ?>

                    </header>
                </div>
                <div class="col-sm-12">
                    <article class="entry-gallery">
                        <div class="row">

	                        <?php foreach ($items as $id => $item){

		                        $link_target = get_post_permalink($id);

		                        if($is_single){

			                        $link_attr = "href='" .  $item['url'] . "' data-fancybox='gallery' " ;
			                        $image_preview = $item['sizes']['main-preview-gallery-image-cropped'];
			                        $figure_class = 'single-gallery';
			                        $img_class = 'box-shadow';

		                        }else{

			                        $link_attr = "href='" .  $link_target . "' ";
			                        $image_preview = $item['galerry_preview_image']['sizes']['main-preview-gallery-image-cropped'];
			                        $figure_class = '';
			                        $img_class = '';
		                        }

                                ?>

                                <figure class="col-sm-6 col-md-4 <?php echo $figure_class; ?>">

                                    <a <?php echo $link_attr; ?> >

                                       <img src="<?php echo $image_preview; ?>" alt="<?php print_image_alt($item['galerry_title']); ?>" class="<?php echo $img_class; ?>">
                                    </a>

                                    <?php if(!$is_single){?>

                                    <figcaption>
                                        <a href="<?php echo $link_target; ?>" class="gallery-link">
                                            <?php echo $item['galerry_preview_text']; ?>
                                        </a>
                                    </figcaption>

                                    <?php } ?>

                                </figure>

	                        <?php } ?>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

	<?php
}
