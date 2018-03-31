<?php
/*
Template Name: Project Gantt page
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

        <?php get_template_assignments_section($data['assignments_items'], $data['assignments_section_title']); ?>

        <!--<section id="ganttProject" class="gantt-project">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <?php /*get_template_instruction_image_block(
                                    $data['instuction_product_block_title'],
                                    $data['instuction_product_block_text_first'],
                                    $data['instuction_product_block_image'],
                                    $data['instuction_product_block_subtitle'],
                                    $data['instuction_product_block_text_second'],
                                    $data['instuction_product_block_image_alt']
                            );
                        */?>

                    </div>
                </div>
            </div>
        </section>-->

        <?php

        get_template_instruction_video_section(
	        $data['instruction_video_section_title'],
	        $data['instruction_video_section_text'],
	        $data['instruction_video_section_youtube_link']
        );

       /* get_template_product_description_section(
                    $data['product_description_section_title'],
                    $data['product_description_section_text'],
                    $data['product_description_section_image'],
                    $data['product_description_section_image_alt']);*/

        get_template_image_tab($data['image_tabs_title'], $data['image_tabs_text'], $data['image_tabs_items']);

		$testimonials_related_items = get_data_cpt_from_array($data['testimonials_related_items']);
		get_template_testimonials_section(
			$data['testimonials_static_title'],
			$testimonials_related_items
		);

		get_template_call_action_section(
			$data['call_to_action_text'],
			$data['call_to_action_link_target'],
			$data['call_to_action_link_text']
		);


		$products_items =  get_data_cpt_from_array($data['referant_products_items']);
		get_template_referant_section(
			$data['referant_products_title'],
			$products_items
		);

		?>

	</main>


<?php get_footer(); ?>