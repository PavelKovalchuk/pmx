<?php
/*
Template Name: Time tracking page
*/


/* variables of content */
$data = get_fields();

get_header();

if($data['featured_banner_tricky_header']){

	$featured_banner_header = [
		'title' => $data['featured_banner_tricky_header_title'],
		'subtitle' => $data['featured_banner_tricky_header_subtitle'],
		'subsubtitle' => $data['featured_banner_tricky_header_subsubtitle'],
		'icon' => $data['featured_banner_tricky_header_icon']
	];
}else{
	$featured_banner_header = $data['featured_banner_title'];
}

get_template_featured_banner(
	$featured_banner_header,
	$data['featured_banner_text'],
	$data['featured_banner_image'],
	$data['featured_banner_link_target'],
	$data['featured_banner_link_text'],
	$data['featured_banner_image_subject'],
	$data['featured_banner_image_subject_alt'],
	$data['featured_banner_tricky_header']
);

?>

	<main>

		<?php

		get_template_assignments_section($data['assignments_items'], $data['assignments_section_title']);

		get_template_product_zoom_image_section($data['zoom_image_items']);

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