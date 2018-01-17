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

    <section id="services">
        <div class="fullwidth bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
	                    <?php get_template_services_blocks($data['services_title'], $data['services_blocks']); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="dynamics">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

	                <?php get_template_product_promo(
	                                                $data['product_promo_title'],
                                                    $data['product_promo_image'],
                                                    $data['product_promo_image_alt'],
                                                    $data['product_promo_link'],
                                                    $data['product_promo_link_text'],
                                                    $data['product_promo_text']
                    ); ?>

                </div>
            </div>
        </div>

    </section>

</main>

<?php get_footer(); ?>
