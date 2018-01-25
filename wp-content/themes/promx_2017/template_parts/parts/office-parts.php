<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 25.01.2018
 * Time: 23:57
 */


function get_template_about_microsoft_office($title, $image, $image_alt, $text){

	if( !$title || !$image || !$text){
		return false;
	}

	?>

	<section id="aboutMicrosoftOffice">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<article>
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
								<header class="text-center">
									<h2 class="header-title">
										<?php echo $title; ?>
									</h2>
								</header>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<figure>
									<img src="<?php echo $image; ?>" class="img-rsponsive mb-1" alt="<?php print_image_alt($image_alt); ?>">
								</figure>
							</div>
							<div class="col-sm-6">
								<?php echo $text; ?>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>

	<?php
}


function get_template_why_choose_promx($title, $title_small, $image, $image_alt, $text){

	if( !$title || !$image || !$text){
		return false;
	}

	?>

	<section id="whyChoosePromx" class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<article class="addons-article">
						<header>

							<h2 class="header-title small-gap text-center">
								<?php echo $title; ?>
                                <?php if($title_small){ ?>
                                    <span class="text-normal"><?php echo $title_small; ?></span>
                                <?php } ?>
							</h2>
						</header>
						<div class="hr light_hr">&nbsp;</div>

						<div class="row flex-row mt-1">
							<div class="col-sm-6">
								<figure>
									<img src="<?php echo $image; ?>" class="img-rsponsive mb-1" alt="<?php print_image_alt($image_alt); ?>">
								</figure>
							</div>
							<div class="col-sm-6 flex-column justyfy-between font-big">
								<?php echo $text; ?>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>

	<?php
}