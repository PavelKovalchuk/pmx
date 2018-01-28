<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 28.01.2018
 * Time: 11:41
 */

/* variables of content */
$data = get_fields();

get_header(); ?>

<?php
	get_template_testimonial_banner($data['text'], $data['person_photo'], $data['person'], $data['position'], $data['banner_background_image']);
?>
<main>

	<?php

	get_template_testimonial_intro($data['description'], $data['logo'], $data['company']);

	get_template_testimonial_content(
		$data['website'],
		$data['website_target'],
		$data['customer_size'],
		$data['country'],
		$data['industry'],
		$data['software_and_services'],
		get_the_content()
	);

	get_template_call_action_section(
		$data['call_to_action_text'],
		$data['call_to_action_link_target'],
		$data['call_to_action_link_text']
	);

	?>
</main>


<?php get_footer(); ?>
