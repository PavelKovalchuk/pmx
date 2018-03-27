<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 20.01.2018
 * Time: 19:53
 */

function get_template_featured_banner($title, $text, $image, $link_target, $link_text, $image_subject, $image_subject_alt, $is_tricky_header = false, $is_video = false, $video = false, $subtitle = false){
	?>

	<section id="banner">
		<div class="featured-banner <?php if($is_video){ echo 'featured-banner-video'; } ?>">

			<?php if($is_video && is_array($video)){

				if( $video['type'] == 'video'){
					?>
                    <!-- The video -->
                    <video id="js-video" class="video-background js-video"  frameborder="0" allowfullscreen autoplay loop >
                        <source src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type']; ?>">
                    </video>

				<?php }

			}else{
			?>
            <div class="fullwidth" <?php if($image){ ?> style="background-image: url(<?php echo $image; ?>);" <?php } ?> >
			<?php } ?>

				<div class="container <?php if($is_video){ echo 'video-content'; } ?>">

					<div class="row d-flex-row">

						<div class="col-sm-7 d-flex">

                            <?php if(is_string($title) && !$is_tricky_header && !$subtitle){ ?>
                                <h2 class="subtitle light">
		                            <?php echo $title; ?>
                                </h2>
                            <?php } elseif(is_string($title) && is_string($subtitle) && !$is_tricky_header ){ ?>
                                <h2 class="slider-title">

                                    <span class="title-part"><?php echo $title ; ?></span>

                                    <span class="subtitle-part">

                                     <span class="slider-title-text"><?php echo $subtitle ; ?></span>
                                    </span>

                                </h2>
							<?php } elseif(is_array($title) && $is_tricky_header){ ?>
                                <div class="icontitle">
                                    <div class="icontitle__icon">
                                        <?php __get_fa_icon_html($title['icon']); ?>
                                    </div>
                                    <div class="icontitle__title">
                                        <h3><?php echo $title['title']; ?></h3>
                                        <div class="sub-title"><?php echo $title['subtitle']; ?></div>
                                        <div class="sub-sub-title"><?php echo $title['subsubtitle']; ?></div>
                                    </div>
                                </div>
							<?php } ?>

							<p class="slider-text"><?php echo $text; ?></p>

						</div>

                        <?php if($image_subject){ ?>

                            <div class="col-sm-5 d-flex slider-extra-img">
                                <img src="<?php echo $image_subject; ?>" alt="<?php print_image_alt($image_subject_alt); ?>">
                            </div>

                        <?php } ?>

					</div>

                    <div class="row">

                        <div class="col-sm-7 ">

                            <div class="hidden-xs">
	                        <?php

	                        if($link_target && $link_text){ ?>

                                    <a href="<?php echo $link_target; ?>" type="button" class="btn btn-primary btn-htransp"><?php print_button_text($link_text); ?></a>

	                        <?php }elseif(!$link_target && $link_text){ ?>

                                    <a href="#firstSection" type="button" class="btn btn-primary btn-htransp js-anchor-banner"><?php print_button_text($link_text); ?></a>

                            <?php }elseif(!$link_text){ ?>
	                            <span class="empty-hidden-block"></span>
                            <?php } ?>
                            </div>
                        </div>

                        <div class="col-sm-5">
                        </div>

                    </div>
			</div>
	    <?php if(!$is_video){ ?>
            </div>
		<?php } ?>
        </div>

	</section>
	<?php
}