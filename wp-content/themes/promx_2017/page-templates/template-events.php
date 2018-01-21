<?php
/*
Template Name: Events page
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

<main class="site-content">

	<section id="events" class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
					<?php
					$events = get_field('promx_events_' . CURRENT_LANG_CODE, 'option');
					get_template_events_list($events);
					?>
				</div>
			</div>
		</div>
	</section>

	<section id="sendApp" class="sendApp-section bg-light" style="background-image: url('<?php echo $data['forms_section_image']; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<article>
                        <?php get_form_template_event(); ?>
					</article>
				</div>
			</div>
		</div>
	</section>

</main>


<?php get_footer(); ?>
