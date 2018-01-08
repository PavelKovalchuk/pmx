<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package StrapPress
 */

get_header(); ?>

    <main id="content" class="site-content" role="main">
        <div class="wrapper" >

            <section class="not_found_page">

                <div class="container">

                    <div class="row no-gutters ">

                        <div class="col-lg-12 text-center">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/not_found-min.png" class="not_found_hero_img" alt="page not found">
                        </div>

                    </div>

                    <div class="row no-gutters ">

                        <div class="col-lg-12 text-center">
                            <h1 class="not_found_page_title">
                                Looks like you are in a maze
                            </h1>

                            <p class="not_found_page_text">
                                Use the keyboard with control the bolt to<br/>
                                maze exit to return to the home,  or
                            </p>

                            <a href="<?php echo get_home_url(); ?>" class="not_found_page_link">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/back_to_home-min.png" class="not_found_page_link_img" alt="Back home">
                            </a>
                        </div>

                    </div>

                </div>

            </section>

        </div>
    </main>

<?php
get_footer();
