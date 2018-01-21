<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

?>
<?php //the_breadcrumb(); ?>
<article id="post-<?php the_ID(); ?>" class="col-lg-12 <?php echo join(' ', get_post_class() ); ?>" >

    <div class="row no-gutters post_container_outer">

        <div class="col-lg-12 ">

            <?php if ( has_post_thumbnail() && is_single() ) :

                    ?>

                    <div class="row post-thumbnail">
                        <?php //the_post_thumbnail('post-full-image-cropped', array('class' => 'rounded post_image')); ?>


	                    <?php
	                    $image_id = get_post_thumbnail_id();
	                    $image_url = wp_get_attachment_image_url( $image_id, 'post-full-image-cropped');
	                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
	                    ?>


                        <picture>
                            <source media="(min-width: 992px)" srcset="<?php echo $image_url; ?>">
                            <source media="(min-width: 600px)" srcset="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'post-tablet-image' );  ?>">
                            <source media="(min-width: 300px)" srcset="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'post-mobile-image' );  ?>">
                            <img src="<?php echo $image_url; ?>" class="col-lg-12 rounded post_image wp-post-image" alt="<?php echo $image_alt; ?>" >
                        </picture>


                    </div><!--  .post-thumbnail -->
                    <?php else : ?>

                    <div class="row no-gutters post-thumbnail">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail('full', array('class' => 'col-lg-12 rounded post_image')); ?>

                        </a>
                    </div><!--  .post-thumbnail -->

                <?php endif; ?>

                <div class="row no-gutters post_container_inner">

                    <?php get_siblings_links(); ?>

                    <div class="col-lg-12 post_container">

                        <header class="row entry-header post_element post_header_container">
                            <div class="col-lg-12 entry-title ">

		                    <?php
		                    if ( is_single() ) :
			                    the_title( '<h1 class="post_title  ">', '</h1>' );
		                    else :
			                    the_title( '<h2 class="post_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		                    endif;

		                    if ( 'post' === get_post_type() ) : ?>

                                <div class="row">
                                    <div class="col-lg-12 entry-meta post_meta">

		                                <?php strappress_posted_on(); ?>

                                    </div><!-- .entry-meta -->
                                </div>

			                <?php endif; ?>


                            </div>
                        </header><!-- .entry-header -->

                        <div class="row entry-content post_content_container">
                            <?php // get_social_sharing_buttons(); ?>
                            <div class="post_element post_content">

			                    <?php

			                    the_content( sprintf(
			                    /* translators: %s: Name of current post. */
				                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gm_wp' ), array( 'span' => array( 'class' => array() ) ) ),
				                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
			                    ) );

			                    wp_link_pages( array(
				                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gm_wp' ),
				                    'after'  => '</div>',
			                    ) );
			                    ?>

                            </div>
                        </div><!-- .entry-content -->

                        <footer class="row entry-footer post_element post_footer_container">
		                    <?php strappress_entry_footer(); ?>
                        </footer><!-- .entry-footer -->

	                    <?php
	                    if ( comments_open() || get_comments_number() ) : ?>
                            <div class="post_element disqus_contaainer">
                                <?php comments_template(); ?>
                            </div>

	                    <?php endif; ?>

	                    <?php

	                    $recent_posts = get_random_posts();

	                    $slider_text = get_option( '_thoughtscription_option_page_options' )['slider_post_text'];

	                    //var_dump($data['slider_items']); ?>
                        <div class="row entry-content post_element post_slider_container">
                            <div class="col-lg-12 post_slider">

                            <?php get_template_carousel($slider_text, '', $recent_posts, 'post_articles', false); ?>

                            </div>
                        </div>


                    </div>
                </div>



        </div>
    </div>




</article><!-- #post-## -->
