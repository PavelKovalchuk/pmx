<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); ?>
    <main class="site-content">

        <section id="blog" class="">

            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <article>
                            <div class="row">
                                <div class="col-sm-12">

	                                <?php
	                                while ( have_posts() ) : the_post();

		                                the_content();

		                                //get_template_part( 'template-parts/content', 'page' );

		                                // If comments are open or we have at least one comment, load up the comment template.
		                                if ( comments_open() || get_comments_number() ) :
			                                comments_template();
		                                endif;

	                                endwhile; // End of the loop.
	                                ?>

                                </div>
                            </div>
                        </article>
                    </div>


                </div>
            </div>
        </section>
    </main>

<?php
//get_sidebar();
get_footer();
