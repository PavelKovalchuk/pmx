<?php
/*
Template Name: Products page
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
?>
		<section id="addons" class="bg-light">
			<div class="container">

			<?php

			$dynamics_items = get_data_cpt_from_array($data['products_cards_dynamics_items']);
			get_template_modern_cards_block( $data['products_cards_dynamics_title'], $data['products_cards_dynamics_text'], $dynamics_items );

			$psa_items = get_data_cpt_from_array($data['products_cards_psa_items']);
			get_template_modern_cards_block( $data['products_cards_psa_title'], $data['products_cards_psa_text'], $psa_items );

			$smart_city_items = get_data_cpt_from_array($data['products_cards_smart_city_items']);
			get_template_modern_cards_block( $data['products_cards_smart_city_title'], $data['products_cards_smart_city_text'], $smart_city_items );

			?>

			</div>
		</section>

		<?php
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

		?>

	</main>


<?php get_footer(); ?>