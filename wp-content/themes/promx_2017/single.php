<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package StrapPress
 */

get_header(); ?>


    <main id="main" class="site-content"  role="main">
        <div class="container">
            <div class="row no-gutters">

                         <?php while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() );

                                //the_post_navigation();

                            endwhile; // End of the loop. ?>

            </div>
        </div>
    </main><!-- #main -->

<?php

get_footer();
