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