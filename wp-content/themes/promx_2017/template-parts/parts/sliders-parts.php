<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.01.2018
 * Time: 23:04
 */

function get_template_main_slider($sliders){

	if(! $sliders){
		return false;
	}

	?>

	<div id="homeSlider" class="featured-slider">

	<?php foreach ($sliders as $slider){ ?>

		<div class="slide">
			<div class="fullwidth" style="background-image: url(<?php echo $slider['image'] ; ?>);">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-lg-7">
							<h1 class="title"><?php echo $slider['title'] ; ?></h1>
							<h2 class="subtitle"><?php echo $slider['subtitle'] ; ?></h2>
							<p class="slider-text hidden-xs"><?php echo $slider['text_desktop'] ; ?></p>
							<p class="slider-text visible-xs"><?php echo $slider['text_mobile'] ; ?></p>
							<div class="hidden-xs">
								<a href="<?php echo $slider['link_target'] ; ?>" type="button" class="btn btn-primary btn-htransp">
                                    <?php print_button_text($slider['link_text']); ?>
                                </a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>

	</div>

<?php
}