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

$post_default_data =  get_option( '_promx_galleries_data_options' );

$featured_banner_title = ($data['featured_banner_title']) ? $data['featured_banner_title']: $post_default_data['gallery_banner_title_' . CURRENT_LANG_CODE];
$featured_banner_text = ($data['featured_banner_text']) ? $data['featured_banner_text']: $post_default_data['gallery_banner_text_' . CURRENT_LANG_CODE];
$featured_banner_image_id = $post_default_data['gallery_background_image_id'];
$featured_banner_image_url = ($data['featured_banner_image']) ? $data['featured_banner_image'] : wp_get_attachment_image_url($featured_banner_image_id, 'full');
$featured_banner_link_target = ($data['featured_banner_link_target']) ? $data['featured_banner_link_target'] : $post_default_data['gallery_banner_link_target_' . CURRENT_LANG_CODE];
$featured_banner_link_text = ($data['featured_banner_link_text']) ? $data['featured_banner_link_text'] : $post_default_data['gallery_banner_link_text_' . CURRENT_LANG_CODE];


if($data['featured_banner_tricky_header']){

	$featured_banner_header = [
		'title' => $data['featured_banner_tricky_header_title'],
		'subtitle' => $data['featured_banner_tricky_header_subtitle'],
		'subsubtitle' => $data['featured_banner_tricky_header_subsubtitle'],
		'icon' => $data['featured_banner_tricky_header_icon']
	];
}else{
	$featured_banner_header = ($data['featured_banner_title']) ? $data['featured_banner_title']: $featured_banner_title;
}



get_template_featured_banner(
	$featured_banner_header,
	$featured_banner_text,
	$featured_banner_image_url,
	$featured_banner_link_target,
	$featured_banner_link_text,
	$data['featured_banner_image_subject'],
	$data['featured_banner_image_subject_alt'],
	$data['featured_banner_tricky_header']
);
?>

<main class="site-content">

	<?php

	get_template_galleries_cards_section($data['galerry_title'], get_the_content(), $data['galerry_items'], true);

	?>

    <?php if($_SERVER['HTTP_REFERER']){

	    $button_back_text =  get_option( '_promx_galleries_data_options' )['galleries_back_text_' . CURRENT_LANG_CODE];
        ?>
        <div class="container">
            <div class="row gallery-btn-row">

                <div class="col-sm-12 text-center">

                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-primary"><?php echo $button_back_text; ?></a>

                </div>

            </div>
        </div>

    <?php } ?>

</main>


<?php get_footer(); ?>
