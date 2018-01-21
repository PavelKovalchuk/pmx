<?php
/*
Template Name: Technologies page
*/

/* variables of content */
$data = get_fields();

get_header();

?>

<section id="slider-section">

	<?php get_template_main_slider($data['slides_items']); ?>

</section>

<main>

	<?php
    get_template_assignments_section($data['assignments_items']);

    get_template_instruction_video_section($data['instruction_video_section_title'], $data['instruction_video_section_text'], $data['instruction_video_section_youtube_link']);

	get_template_what_you_get_section($data['what_you_get_section_title'], $data['what_you_get_section_text'], $data['what_you_get_section_items'], $data['what_you_get_section_title_end_small'])

    ?>

</main>


<?php get_footer(); ?>
