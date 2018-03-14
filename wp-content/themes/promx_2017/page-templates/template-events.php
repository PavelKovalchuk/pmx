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


	<?php

	$events = get_data_cpt_from_array($data['upcoming_events']);
    get_template_events_list($events);

    //$form_events_data is needed by event-contact-form.php
    $form_events_data = [];
    foreach ($events as $event_post_id => $event_data){
	    $form_events_data[] = ProMXTemplateEngine::createOptionsForSelect($event_data['code'], $event_data['title'], $event_data['title']);
    }

    ?>


	<section id="sendApp" class="sendApp-section bg-light" style="background-image: url('<?php echo $data['forms_section_image']; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<article>
						<?php echo do_shortcode('[form name=contact-event]'); ?>
					</article>
				</div>
			</div>
		</div>
	</section>

</main>


<?php get_footer(); ?>
