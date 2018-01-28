<?php
/*
Template Name: References archive page
*/

/* variables of content */
$data = get_fields();

get_header(); ?>

<?php  get_template_featured_banner(
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
        $references = get_data_cpt_from_array($data['references_group_items']);
        get_template_references_cards_block($data['promo_info_title'], $data['promo_info_text'], $references);

        get_template_call_action_section(
                                            $data['call_to_action_text'],
                                            $data['call_to_action_link_target'],
                                            $data['call_to_action_link_text']
        );
?>

	</main>


<?php get_footer(); ?>