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
                            <div class="hidden-xs">
	                        <?php
	                        if($slider['link_target'] && $slider['link_text']){ ?>

                                <a href="<?php echo $slider['link_target'] ; ?>" type="button" class="btn btn-primary btn-htransp">
                                    <?php print_button_text($slider['link_text']); ?>
                                </a>

                            <?php }elseif(!$slider['link_target'] && $slider['link_text']){ ?>

                                <a href="#firstSection" type="button" class="btn btn-primary btn-htransp js-anchor-banner"><?php print_button_text($slider['link_text']); ?></a>

                            <?php }elseif(!$slider['link_text']){ ?>
                                <span class="empty-hidden-block"></span>
                            <?php } ?>

                                </div>
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


function get_template_image_tab($title, $text, $items){

	if(empty($items)){
		return false;
	}

	?>

    <section id="timeTracking" class="bg-light image-tabs-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php if($title){ ?>
                                    <header>
                                        <h2 class="header-title text-center"><?php echo $title; ?></h2>
                                    </header>
                                <?php } ?>
                                <div class="entry-content">
                                    <p class="text-center"><?php echo $text; ?></p>
                                </div>

                                <div class="image-tabs-block text-center">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs image-tabs-nav" role="tablist">

	                                    <?php
                                        $i = 0;
                                        foreach ($items as $item){
                                            $i++;
                                            if($i == 1){
                                                $tab_control_class = 'active';
                                            }else{
	                                            $tab_control_class = '';
                                            }
	                                        $tab_name = 'tab_' . $i;
                                            ?>

                                            <li role="presentation" class="<?php echo $tab_control_class; ?>">
                                                <a href="#<?php echo $tab_name; ?>" aria-controls="<?php echo $tab_name; ?>" role="tab" data-toggle="tab">
                                                    <?php echo $item['title']; ?>
                                                </a>
                                            </li>

	                                    <?php } ?>

                                    </ul>

                                    <div class="hr grey_hr">&nbsp;</div>

                                    <!-- Tab panes -->
                                    <div class="tab-content">

                                        <?php
                                        $k = 0;
                                        foreach ($items as $item){

	                                        $k++;
	                                        if($k == 1){
		                                        $tab_class = 'active';
	                                        }else{
		                                        $tab_class = '';
	                                        }
	                                        $tab_name = 'tab_' . $k;

                                            ?>


                                            <div role="tabpanel" class="tab-pane fade in <?php echo $tab_class; ?>" id="<?php echo $tab_name; ?>">

                                                <img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['image_alt']); ?>" class="img-responsive tab-image">
                                            </div>

                                        <?php } ?>

                                    </div>

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