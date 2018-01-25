<?php
/*
Template Name: Office page
*/

/* variables of content */
$data = get_fields();

get_header();

?>

	<section id="slider-section">

		<?php get_template_main_slider($data['slides_items']); ?>

	</section>

	<main>

<?php

	get_template_about_microsoft_office(
										$data['what_you_get_product_section_title'],
										$data['what_you_get_product_section_image'],
										$data['what_you_get_product_section_image_alt'],
										$data['what_you_get_product_section_text']
	);


	get_template_why_choose_promx(
									$data['why_choose_title'],
									$data['why_choose_title_end_small'],
									$data['why_choose_image'],
									$data['why_choose_image_alt'],
		                            $data['why_choose_text']
	);

    $testimonials_related_items = get_data_cpt_from_array($data['testimonials_related_items']);
    get_template_testimonials_section(
                                        $data['testimonials_static_title'],
                                        $testimonials_related_items
    );

    get_template_call_action_section(
                                        $data['call_to_action_text'],
                                        $data['call_to_action_link_target'],
                                        $data['call_to_action_link_text']
    );


    $products_items =  get_data_cpt_from_array($data['referant_products_items']);
    get_template_referant_section(
                                    $data['referant_products_title'],
                                    $products_items
    );

?>

	</main>


<?php get_footer(); ?>