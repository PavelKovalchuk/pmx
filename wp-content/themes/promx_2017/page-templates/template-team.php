<?php
/*
Template Name: Team page
*/

/* variables of content */
$data = get_fields();

get_header();

get_template_featured_banner(
	$data['featured_banner_title'],
	$data['featured_banner_text'],
	$data['featured_banner_image'],
	$data['featured_banner_link_target'],
	$data['featured_banner_link_text'],
	false,
	false
);
?>

<main>

	<?php

		get_template_people_cards_block($data['team_section_title'], $data['team_section_text'], $data['team_section_items']);

		get_template_call_action_section(
			$data['call_to_action_text'],
			$data['call_to_action_link_target'],
			$data['call_to_action_link_text']
		);
	?>

</main>


<?php get_footer(); ?>