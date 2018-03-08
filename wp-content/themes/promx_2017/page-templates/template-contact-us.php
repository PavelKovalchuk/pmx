<?php
/*
Template Name: Contact Us page
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

		<section id="contact" class="contact-section">
			<div class="container relative">
				<div class="row">
					<div class="col-sm-12">
						<article>
							<div class="row">
								<div class="col-sm-12 col-md-7 col-lg-6">

									<?php //get_form_template_contact_us(); ?>
                                    <!-- TEST ONLY -->
									<?php
									$form_name = 'contact-us';
									echo do_shortcode('[form name=' .$form_name . ']'); ?>
                                    <!-- TEST ONLY -->

								</div>

								<div class="col-sm-12 col-md-5 col-lg-6">

									<?php get_template_contact_us_section($data['contact_us_full_section_title'], $data['contact_us_full_section_subtitle'], $data['contact_us_full_section_items']); ?>

								</div>
							</div>
						</article>
					</div>
				</div>
			</div>

			<?php get_template_map_block($data['maps_data_latitude'], $data['maps_data_longitude'], $data['maps_data_zoom']); ?>

		</section>

	</main>

<?php get_footer(); ?>