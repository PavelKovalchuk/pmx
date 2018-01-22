<?php
/*
Template Name: Home page
*/

/* variables of content */
$data = get_fields();

get_header(); ?>

<section id="slider-section">

  <?php get_template_main_slider($data['slides_items']); ?>

</section>

<main>

     <section id="experienced" class="experienced-section">
      <div class="container">
          <?php get_template_simple_text($data['experienced_title'], $data['experienced_text']); ?>
          <?php get_template_transformation_blocks($data['transformation_title'], $data['transformation_items']); ?>
      </div>
     </section>


	 <?php

     get_template_services_blocks($data['services_title'], $data['services_blocks']);

	 get_template_product_promo(
                                $data['product_promo_title'],
                                 $data['product_promo_image'],
                                 $data['product_promo_image_alt'],
                                 $data['product_promo_link'],
                                 $data['product_promo_link_text'],
                                 $data['product_promo_text']
      );

	 $events = get_field('promx_events_' . CURRENT_LANG_CODE, 'option');

	 get_template_blog_and_events_block(
                                         $data['blog_promo_title_section'],
                                         $data['blog_promo_title_subtitle'],
                                         $data['blog_promo_image'],
                                         $data['blog_promo_image_alt'],
                                         $data['blog_promo_link_target'],
                                         $data['blog_promo_link_text'],
                                         $data['blog_promo_text'],
                                         $data['blog_promo_event_link_text'],
                                         $events
	 );

	 get_template_our_numbers($data['our_numbers_title'], $data['our_numbers_items']); ?>


    <section id="contactUs" class="contact-us-section">


        <?php
        get_template_contact_us_block(
                            $data['contact_us_image_block_title'],
                            $data['contact_us_image_block_text'],
                            $data['contact_us_image_block_text_author']
         );

        get_template_fullwidth_image_part(
                                        $data['contact_us_image_block_image'],
                                        $data['contact_us_image_block_image_alt'],
                                        'contact-us-img'
        );
        ?>
    </section>

</main>

<?php get_footer(); ?>
