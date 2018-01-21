<?php
/*
Template Name: About Author page
*/

/* variables of content */
 $data = get_fields();

get_header();
$duration = '1.2s';
$delay = '0.6s';

 ?>
<main id="content" class="site-content" role="main">
<div class="wrapper" id="wrapper-bloh">
    <?php //the_breadcrumb(); ?>


   <!-- <section class="container-fluid author_page">-->
    <section class="author_page">


        <div class="container">

            <div class="row no-gutters author_top_outer">
                <div class="col-lg-12">

                    <div class="author_top_image_outer">


                        <!--<div class="author_top_image_bg"></div>-->

                        <picture>
                            <source media="(min-width: 992px)" srcset="<?php echo $data['page_hero_image_main']['sizes']['post-full-image-cropped']; ?>">
                            <source media="(min-width: 600px)" srcset="<?php echo  $data['page_hero_image_main']['sizes']['post-tablet-image'];  ?>">
                            <source media="(min-width: 300px)" srcset="<?php echo $data['page_hero_image_main']['sizes']['post-mobile-image'];  ?>">
                            <img src="<?php echo $data['page_hero_image_main']['sizes']['post-full-image-cropped']; ?>" class="author_top_image" alt="<?php echo $data['page_hero_image_main']['alt']; ?>" >
                        </picture>

                        <!--<img src="<?php /*echo $data['page_hero_image_main']['url']; */?>" class="author_top_image" alt="<?php /*echo $data['page_hero_image_main']['alt']; */?>"/>-->

                        <div class="author_top_text_outer">
                            <h2 class="author_top_text_question wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4">

		                    <?php echo $data['page_hero_text']; ?>

                            </h2>

                            <h1 class="author_top_text_answer wow fadeIn" data-wow-duration="2s>" data-wow-delay="1s">

		                    <?php echo $data['page_hero_text_answer']; ?>

                            </h1>
                        </div>

                    </div>

                </div>
            </div>



            <div class="row no-gutters author_content_outer">
                <div class="col-lg-12 author_content_inner">

                    <div class="row no-gutters author_content_container">

                        <div class="author_share"><?php  get_social_sharing_buttons(); ?></div>

                        <div class="author_content">

                            <div class="row no-gutters">

                                <div class="col-md-6 author-left">

                                    <div class="author_profile_img_outer">

                                        <p class="author_position wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
		                                    <?php echo $data['author_position']; ?>
                                        </p>

                                        <h3 class="author_name author_name_mobile wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
		                                    <?php echo $data['author_name']; ?>
		                                    <?php echo $data['author_surname']; ?>
                                        </h3><?php //var_dump( $data['author_photo_1']); ?>

                                        <img src="<?php echo $data['author_photo_1']['url']; ?>"
                                             class="grayscale author_content_image author_profile wow fadeInUp"
                                             alt="<?php echo $data['author_photo_1']['alt']; ?>"
                                             data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>" />

                                        <p class="position_description position_description_mobile wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
		                                    <?php echo $data['author_position_description']; ?>
                                        </p>

                                    </div>

                                    <div class="author_blog_aim">

                                        <h3 class="author_blog_aim_title wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
	                                        <?php echo $data['ts_title']; ?>

                                        </h3>

                                        <p class="author_blog_aim_text wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
		                                    <?php echo $data['ts_text']; ?>
                                        </p>

                                        <blockquote class="author_blog_aim_quote wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
	                                        <?php echo $data['ts_quote']; ?>
                                        </blockquote>


                                    </div>


                                </div>

                                <div class="col-md-6 author-right">

                                    <div class="data_shifted_left">


                                        <!--<p class="author_position">
		                                    <?php /*echo $data['author_position']; */?>
                                        </p>-->

                                        <h3 class="bottom-animated author_name author_name_desktop wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
		                                    <?php echo $data['author_name']; ?>
		                                    <?php echo $data['author_surname']; ?>
                                        </h3>

                                        <div class="author_speaker_img_outer wow fadeInUp"
                                             data-wow-duration="<?php echo $duration; ?>"
                                             data-wow-delay="0s"
                                             data-wow-offset="0" >
                                            <img src="<?php echo $data['author_photo_2']['url']; ?>" class="grayscale author_content_image author_speaker" alt="<?php echo $data['author_photo_2']['alt']; ?>" />
                                        </div>

                                        <p class="position_description position_description_desktop wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
	                                        <?php echo $data['author_position_description']; ?>
                                        </p>

                                        <div class="author_place_img_outer d-none d-md-block wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
                                            <img src="<?php echo $data['author_photo_3']['url']; ?>" class="grayscale author_content_image author_place" alt="<?php echo $data['author_photo_3']['alt']; ?>" />
                                        </div>

                                    </div>



                                </div>

                            </div>

                            <div class="row no-gutters author_marketing_outer section_style">

                                <div class="col-lg-12 author_marketing_inner">

                                    <div class="row no-gutters author_marketing_container">

                                        <div class="col-lg-12 col-xl-6 marketing_left">

                                            <div class="row marketing_title_row">
                                                <div class="col-md-12">

                                                    <h3 class="marketing_title  wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
								                        <?php echo $data['marketing_blog_title']; ?>
                                                    </h3>

                                                    <h4 class="marketing_title_second  wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
                                                        <span id="js-scrolled-counter" ><?php echo $data['marketing_blog_title_second']; ?></span><span>...</span>
                                                    </h4>

                                                    <p class="marketing_title_description  wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
								                        <?php echo $data['marketing_blog_title_description']; ?>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-12 col-xl-6  marketing_right">

                                            <div class="row marketing_text_row">
                                                <div class="col-md-12">

                                                    <p class="marketing_text_1  wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
								                        <?php echo $data['marketing_blog_text_1']; ?>
                                                    </p>

                                                    <p class="marketing_text_2  wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
								                        <?php echo $data['marketing_blog_text_2']; ?>
                                                    </p>

                                                    <p class="marketing_text_3  wow fadeInUp" data-wow-duration="<?php echo $duration; ?>" data-wow-delay="<?php echo $delay; ?>">
								                        <?php echo $data['marketing_blog_text_3']; ?>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="row no-gutters author_form_outer section_style">

                                <div class="col-lg-12 author_form_inner">

                                    <div class="row no-gutters author_form_container">

                                        <div class="col-lg-12 wow fadeInUp " data-wow-duration="<?php echo $duration; ?>" data-wow-delay="0.3s">

                                            <h2 class="form-header">
	                                            <?php echo $data['form_header']; ?>
                                            </h2>

                                            <?php get_form('author_form') ;?>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>



                    </div>

                </div>
            </div>


        </div>

        
    </section>



</div><!-- Wrapper end -->
</main>
<?php get_footer(); ?>
