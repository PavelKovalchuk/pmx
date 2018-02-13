<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package StrapPress
 */

/* variables of content */
$data = get_fields();

get_header(); ?>

<?php

$post_default_data =  get_option( '_promx_options_posts_options_options' );

$featured_banner_title = ($data['featured_banner_title']) ? $data['featured_banner_title']: $post_default_data['post_banner_title_' . CURRENT_LANG_CODE];
$featured_banner_text = ($data['featured_banner_text']) ? $data['featured_banner_text']: $post_default_data['post_banner_text_' . CURRENT_LANG_CODE];
$featured_banner_image_id = $post_default_data['post_background_image_id'];
$featured_banner_image_url = ($data['featured_banner_image']) ? $data['featured_banner_image'] : wp_get_attachment_image_url($featured_banner_image_id, 'full');
$featured_banner_link_target = ($data['featured_banner_link_target']) ? $data['featured_banner_link_target'] : $post_default_data['post_banner_link_target_' . CURRENT_LANG_CODE];
$featured_banner_link_text = ($data['featured_banner_link_text']) ? $data['featured_banner_link_text'] : $post_default_data['post_banner_link_text_' . CURRENT_LANG_CODE];


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
    <main class="site-content ">

        <section id="blog" class="single-post-content">
            <div class="container">

                <div class="row">

                    <div class="col-sm-12 text-center">

                        <header class="page-header">
                            <h1 class="section-title">
                                <?php echo get_the_title();?>
                            </h1>
                        </header>

                    </div>
                </div>

                <div class="row">

                        <div class="col-sm-12">

                            <div class="row d-flex">

                                <div class="col-md-8 col-lg-9">

		                            <?php
		                            $image_id = get_post_thumbnail_id();
		                            $image_url = wp_get_attachment_image_url( $image_id, 'main-preview-gallery-image-cropped');
		                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);

		                            if($image_url){ ?>

                                        <div class="single-post-thumbnail">

                                            <img src="<?php echo $image_url; ?>" class="post_image wp-post-image img-responsive" alt="<?php echo $image_alt; ?>" >

                                        </div>
		                            <?php } ?>

                                    <div class="single-post-content">

	                                    <?php the_content(); ?>

                                    </div>


                                    <div class="row share-row" >

                                        <div class="col-md-12 d-flex flex-align-center">

                                            <div class="share-block-outer ">
                                                <h5 class="share-block-header d-inline-flex">
	                                                <?php echo $post_default_data['post_share_title_' . CURRENT_LANG_CODE] . ': '; ?>
                                                </h5>
		                                        <?php echo promx_share_buttons(urlencode(get_permalink())); ?>
                                            </div>

                                            <div class="back-block-outer">
                                                <a href="<?php print $_SERVER['HTTP_REFERER']; ?>" class="btn btn-primary">
			                                        <?php echo $post_default_data['post_back_title_' . CURRENT_LANG_CODE]; ?>
                                                </a>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row share-row" >

                                        <div class="col-md-12 prev-next-block flex-align-center">

                                            <?php get_prev_next_part(
                                                                    get_previous_post(),
                                                                    get_next_post(),
                                                                    $post_default_data['post_prev_title_' . CURRENT_LANG_CODE],
                                                                    $post_default_data['post_next_title_' . CURRENT_LANG_CODE]
                                            ); ?>

                                        </div>

                                    </div>


                                </div>

                                <div class="col-md-4 col-lg-3 sidebar-block">

		                            <?php get_promx_recent_post( get_the_ID(),
                                                                $post_default_data['post_recent_title_' . CURRENT_LANG_CODE] ,
                                                                $post_default_data['post_form_sidebar_title_' . CURRENT_LANG_CODE]
                                    ); ?>

                                </div>

                            </div>

                        </div>
                </div>

            </div>
        </section>


        <section id="subscribe" class="bg-secondary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <article class="subscribe">
                            <div class="row">

                                <div class="col-sm-12 col-md-4">
                                    <header>
                                        <h2 class="entry-title"><?php echo $post_default_data['post_form_footer_title_' . CURRENT_LANG_CODE]; ?></h2>
                                        <p class="subscribe-text">
										    <?php echo $post_default_data['post_form_footer_text_' . CURRENT_LANG_CODE]; ?>
                                        </p>
                                    </header>
                                </div>

                                <div class="col-sm-12 col-md-8">

								    <?php get_form_template_latest_news(); ?>

                                </div>

                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </section>

    </main>

<?php

get_footer();
