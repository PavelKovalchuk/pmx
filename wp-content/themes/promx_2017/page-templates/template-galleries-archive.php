<?php
/*
Template Name: Galleries archive page
*/

/* variables of content */
$data = get_fields();

get_header(); ?>

<?php
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

	<main class="site-content">

		<?php
		$galleries = get_data_cpt_from_array($data['galleries_group_items']);
		get_template_galleries_cards_section($data['promo_info_title'], $data['promo_info_text'], $galleries);

		?>

	</main>


<?php get_footer(); ?>