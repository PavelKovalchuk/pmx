<?php
/*
Template Name: Microsoft technologies page
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

	get_template_promo_info_section($data['promo_info_title'], $data['promo_info_text']);

	get_template_tech_list_section($data['technologies_list_title'], $data['technologies_list_text'], $data['technologies_list_items']);

?>

	</main>


<?php get_footer(); ?>
