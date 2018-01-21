<?php
/*
Template Name: Blog page
*/

/* variables of content */
 $data = get_fields();

get_header();

 ?>

<?php  get_template_featured_banner(
	$data['featured_banner_title'],
	$data['featured_banner_text'],
	$data['featured_banner_image'],
	$data['featured_banner_link_target'],
	$data['featured_banner_link_text'],
	$data['featured_banner_image_subject'],
	$data['featured_banner_image_subject_alt']
);
?>

<main class="site-content">

    <section id="blog" class="">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 text-center">

                    <header class="page-header">
                        <h1 class="section-title">
                            <?php echo $data['simple_header_text'];?>
                        </h1>
                    </header>

                </div>

                <div class="col-sm-12">

	                <?php $paged =  ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	                $args = array(
		                'posts_per_page' => get_option('posts_per_page'),
		                'orderby' => 'date',
		                'post_status' => 'publish',
		                'paged' => $paged
	                );

	                $blog_query = new WP_Query( $args );

	                if ( $blog_query->have_posts() ) {
		                while ( $blog_query->have_posts() ) {
			                $blog_query->the_post();

			                get_template_article( get_post(), $data['blog_read_more_text'], $data['blog_page_default_thumbnail'] );

		                }
	                }
                    ?>

                    <section id="pagination" class="text-center">
                        <nav aria-label="Page navigation">
	                <?php

	                promx_pagenavi($blog_query); ?>
	                <?php wp_reset_postdata(); ?>

                        </nav>
                    </section>

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
                                    <h2 class="entry-title"><?php echo $data['blog_page_subscribe_title']; ?></h2>
                                    <p class="subscribe-text">
	                                    <?php echo $data['blog_page_subscribe_text']; ?>
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

<?php get_footer(); ?>
