<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */

?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">

                <?php

                wp_nav_menu( array(
	                'theme_location'  => '',
	                'menu'            => 'footer_first',
	                'container'       => 'div',
	                'container_class' => 'footer-inner-container',
	                'container_id'    => '',
	                'menu_class'      => 'footer-inner-list',
	                'menu_id'         => '',
	                'echo'            => true,
	                'fallback_cb'     => 'wp_page_menu',
	                'before'          => '',
	                'after'           => '',
	                'link_before'     => '',
	                'link_after'      => '',
	                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	                'depth'           => 0,
	                'walker'          => new Bootstrap_Walker_Footer_Menu(),
                ) );

                ?>

            </div>
            <div class="col-sm-6 col-md-4">
	            <?php

	            wp_nav_menu( array(
		            'theme_location'  => 'footer_second',
		            'menu'            => '',
		            'container'       => 'div',
		            'container_class' => 'footer-inner-container',
		            'container_id'    => '',
		            'menu_class'      => 'footer-inner-list',
		            'menu_id'         => '',
		            'echo'            => true,
		            'fallback_cb'     => 'wp_page_menu',
		            'before'          => '',
		            'after'           => '',
		            'link_before'     => '',
		            'link_after'      => '',
		            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		            'depth'           => 0,
		            'walker'          => new Bootstrap_Walker_Footer_Menu(),
	            ) );

	            ?>
            </div>
            <div class="col-sm-12 col-md-4 footer-promx-col">

                <?php $footer_options_data =  get_option( '_promx_options_footer_general_data_options' ); ?>

                <?php get_template_footer_social_block($footer_options_data); ?>
	            <?php
	            if ( function_exists('dynamic_sidebar') )
		            dynamic_sidebar('sidebar-footer-custom-links');
	            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p class="copyright"><?php echo $footer_options_data['copyright_' . CURRENT_LANG_CODE]; ?></p>
            </div>
        </div>
    </div>
</footer>

<div class="session-block">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">

                    <div class="col-sm-8">
                        <p class="text-block">
	                        <?php echo $footer_options_data['cookie_text_' . CURRENT_LANG_CODE]; ?>
                        </p>
                    </div>

                    <div class="col-sm-4">
                        <div class="right-block">
                            <a href="<?php echo $footer_options_data['link_cookie_target_' . CURRENT_LANG_CODE]; ?>" class="learn-more-link">
	                            <?php echo $footer_options_data['link_cookie_text_' . CURRENT_LANG_CODE]; ?>
                            </a>
                            <button class="session_btn btn" type="button">&times;</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>


<?php wp_footer(); ?>

</body>
</html>
