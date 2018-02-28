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

                    <nav class="navbar navbar-toggleable-md navbar-expand-md navbar-light blog_top_cat_nav ">

                        <button class="navbar-toggler align-self-center w-100 navbar_toggler_cat" type="button" data-toggle="collapse"
                                data-target="#navbarNavCat" aria-controls="navbarNavCat"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar_cat_mobile">Categories</span>
                        </button>


                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavCat">

                            <div class="navbar-nav blog_top_cat_outer" id="sorter">

                                <button type="button"
                                        id="term_id_all"
                                        data-group="all"
                                        class="btn btn-link js-filter-option blog_top_cat_item">
                                    All
                                </button>

                                <?php foreach($data['blog_page_categories'] as $cat){ ?>

                                    <button type="button"
                                            id="term_id_<?php echo $cat->term_id; ?>"
                                            data-group="<?php echo $cat->slug ?>"
                                            class="btn btn-link js-filter-option blog_top_cat_item ">
                                        <?php echo $cat->name; ?>
                                    </button>

                                <?php } ?>

                            </div>

                        </div>


                    </nav>

                </div>

                <div class="col-sm-12">

	                <?php

                    /*$paged =  ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

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
	                }*/

	                ?>

                    <div id="shuffle_grid_container" class="row shuffle_container"
                         data-read-more-text="<?php echo $data['blog_read_more_text']; ?>"
                         data-default-thumbnail="<?php echo $data['blog_page_default_thumbnail']; ?>">

                        <?php

                        $args = array(
                            'posts_per_page' => get_option('posts_per_page'),
                            'orderby' => 'date',
                            'post_status' => 'publish',
                        );

                        $query = new WP_Query( $args );

                        $posts = $query->query($args);

                        foreach( $posts as $article_post ){

                            $cat_data = get_the_category( $article_post->ID );

                            ?>

                            <div class="grid__brick col-sm-12 shuffle-item shuffle-item--visible"
                                 data-groups='["<?php echo $cat_data[0]->slug; ?>"]' >

                                <?php echo get_template_article_preview_string($article_post, $data['blog_read_more_text'], $data['blog_page_default_thumbnail']); ?>

                            </div>

                            <div class="col-sm-12 shuffle_sizer"></div>

                        <?php } ?>



                        <?php wp_reset_postdata(); ?>

                    </div>

                    <div class="row btn-more-posts_row">
                        <div class="col-lg-12 btn-more-posts-outer text-center">

                            <button id="js_more_posts" type="button" class="btn btn-primary ts_btn_more_posts ">
                                <?php echo $more_posts ? $more_posts : 'More' ; ?>
                            </button>

                        </div>
                    </div>

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
