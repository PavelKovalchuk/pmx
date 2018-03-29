<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 18.01.2018
 * Time: 0:28
 */


function __get_services_image_part($data){
?>
	<div class="image-part image-bg second-flex" style="background-image: url(<?php echo $data['image'] ; ?>);">
		<!--<img src="<?php /*echo $data['image']; */?>" alt="<?php /*print_image_alt($data['image_alt']); */?>" class="img-responsive">-->
	</div>

	<?php
}

function __get_services_text_part($data, $class){
	?>
	<div class="text-part <?php echo $class; ?> ">
		<h3><?php echo $data['title']; ?></h3>
		<p class="text-justify"><?php echo $data['text']; ?>
		</p>
	</div>

	<?php
}

function get_template_services_blocks($title, $items){

	if( !$title || empty($items)){
		return false;
	}

	?>

    <section id="services">
        <div class="fullwidth bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <article class="services_article">

                            <header class="text-center">
                                <h2 class="header-title white small-gap"><?php echo $title; ?></h2>
                            </header>
                            <div class="hr dark_hr">&nbsp;</div>

                            <div class="services_article_row">

                                <div class="services_article_row_left">

				                    <?php if(!empty($items[0])){ ?>
                                        <div class="services_article_row_left_first">

						                    <?php __get_services_image_part($items[0]) ?>
						                    <?php __get_services_text_part($items[0], 'bg-dark first-flex'); ?>

                                        </div>
				                    <?php } ?>

				                    <?php if(!empty($items[1])){ ?>
                                        <div class="services_article_row_left_second">

						                    <?php __get_services_text_part($items[1], 'bg-secondary'); ?>
						                    <?php __get_services_image_part($items[1]) ?>

                                        </div>
				                    <?php } ?>

                                </div>

                                <div class="services_article_row_right">
                                    <div class="services_article_row_right_wrap">

					                    <?php if(!empty($items[2])){ ?>
                                            <div class="services_article_row_right_first">

							                    <?php __get_services_image_part($items[2]) ?>
							                    <?php __get_services_text_part($items[2], 'bg-dark first-flex'); ?>

                                            </div>
					                    <?php } ?>

					                    <?php if(!empty($items[3])){ ?>
                                            <div class="services_article_row_right_second">

							                    <?php __get_services_text_part($items[3], 'bg-secondary first-flex'); ?>
							                    <?php __get_services_image_part($items[3]) ?>

                                            </div>
					                    <?php } ?>

                                    </div>
                                </div>

                            </div>

                        </article>

                    </div>
                </div>
            </div>
        </div>
    </section>

	<?php
}