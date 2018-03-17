<?php
/*
Template Name: Support page
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

	<section id="support" class="support-section" style="background-image: url('<?php echo $data['support_section_image']; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<article>
						<div class="row">
							<div class="col-sm-12 col-md-7 col-lg-6">
								<?php echo do_shortcode('[form name=support]'); ?>
							</div>
							<?php get_template_support_section($data['support_section_title'], $data['support_section_text'], $data['support_section_contacts']); ?>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>


</main>


<?php get_footer(); ?>
