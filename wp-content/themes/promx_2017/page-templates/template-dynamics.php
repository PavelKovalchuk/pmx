<?php
/*
Template Name: Dynamics page
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

	get_template_assignments_section($data['assignments_items'], $data['assignments_section_title']);

	get_template_instruction_video_section(
											$data['instruction_video_section_title'],
											$data['instruction_video_section_text'],
											$data['instruction_video_section_youtube_link']
	);

	get_template_cards_block( $data['what_microsoft_title'], $data['what_microsoft_items'] );

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