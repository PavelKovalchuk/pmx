<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.01.2018
 * Time: 23:04
 */

function get_template_main_slider($sliders){

	if(empty($sliders)){
		return false;
	}

	?>

	<div id="homeSlider" class="featured-slider">

	<?php foreach ($sliders as $slider){ ?>

		<div class="slide">
			<div class="fullwidth" style="background-image: url(<?php echo $slider['image'] ; ?>);">
				<div class="container">
					<div class="row d-flex-row">

						<div class="col-sm-7 col-md-12 col-lg-7 d-flex">

                            <h2 class="slider-title">

                                <?php if( !empty($slider['title']) ){ ?>
                                    <span class="title-part"><?php echo $slider['title'] ; ?></span>
                                <?php } ?>

                                <span class="subtitle-part">

                                    <?php if( !empty($slider['subtitle_image']) ){ ?>

                                        <span class="slider-title-image">
                                            <img src="<?php echo $slider['subtitle_image'] ?>" alt="<?php print_image_alt($slider['subtitle']); ?>" />
                                        </span>

                                    <?php } ?>

                                    <span class="slider-title-text"><?php echo $slider['subtitle'] ; ?></span>
                                </span>

                            </h2>

							<p class="slider-text hidden-xs"><?php echo $slider['text_desktop'] ; ?></p>
							<p class="slider-text visible-xs"><?php echo $slider['text_mobile'] ; ?></p>



						</div>

		                <?php if( !empty($slider['extra_image']) ){ ?>
                            <div class="col-sm-5 col-md-12 col-lg-5 d-flex slider-extra-img">
                                <img src="<?php echo $slider['extra_image'] ?>" alt="<?php print_image_alt($slider['extra_image_alt']); ?>">
                            </div>
		                <?php } ?>

					</div>

                    <div class="row">

                        <div class="col-sm-7 col-md-12 col-lg-7">
	                        <?php
	                        if($slider['link_target']){
		                        ?>
                                <div class="hidden-xs">
                                    <a href="<?php echo $slider['link_target'] ; ?>" type="button" class="btn btn-primary btn-htransp">
				                        <?php print_button_text($slider['link_text']); ?>
                                    </a>
                                </div>
	                        <?php } ?>
                        </div>

                        <div class="col-sm-5 col-md-12 col-lg-5 d-flex slider-extra-img">

                        </div>

                    </div>

				</div>
			</div>
		</div>

	<?php } ?>

	</div>

<?php
}