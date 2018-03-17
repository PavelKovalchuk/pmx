<?php
/*
Template Name: Careers page
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

		<section id="vacancies" class="bg-light">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">

						<?php get_template_careers_text($data['promo_info_title'], $data['promo_info_text']); ?>

					</div>

					<div class="col-sm-12">
						<article class="pt-0">
							<div class="row">

								<div class="col-sm-12 col-md-6">

									<?php get_template_accordion($data['accordion_items']); ?>

								</div>

                                <div class="col-sm-12 col-md-6">

	                                <?php

	                                //$form_positios_data is needed by career-contact-form.php
	                                $form_positions_data = [];
	                                foreach ($data['accordion_items'] as $key => $position_data){
		                                $form_positions_data[] = ProMXTemplateEngine::createOptionsForSelect($position_data['unique_id'], $position_data['position'], $position_data['position']);
	                                }

                                    echo do_shortcode('[form name=career]');
                                    ?>

                                </div>

							</div>
						</article>
					</div>

				</div>
			</div>
		</section>

        <?php get_template_photo_office_section($data['photos_section_title'], $data['photos_section_text'], $data['photos_section_items']); ?>

		<?php

		?>

	</main>


<?php get_footer(); ?>