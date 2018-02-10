<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 20.01.2018
 * Time: 19:53
 */

function get_template_featured_banner($title, $text, $image, $link_target, $link_text, $image_subject, $image_subject_alt){

	if( !$text|| !$image || !$link_target){
		return false;
	}

	?>

	<section id="banner">
		<div class="featured-banner">
			<div class="fullwidth" style="background-image: url('<?php echo $image; ?>');">
				<div class="container">
					<div class="row">

						<div class="col-sm-7">

                            <?php if($title){ ?>
                                <h1 class="subtitle light">
		                            <?php echo $title; ?>
                                </h1>
                            <?php } ?>

							<p class="slider-text"><?php echo $text; ?></p>
							<div class="hidden-xs">
								<a href="<?php echo $link_target; ?>" type="button" class="btn btn-primary btn-htransp"><?php print_button_text($link_text); ?></a>
							</div>
						</div>

                        <?php if($image_subject){ ?>

                            <div class="col-sm-5 slider-extra-img">
                                <img src="<?php echo $image_subject; ?>" alt="<?php print_image_alt($image_subject_alt); ?>">
                            </div>

                        <?php } ?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}