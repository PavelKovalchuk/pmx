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



	<footer id="colophon" class="container-fluid site_footer" role="contentinfo">
		<div class="container">

            <div class="row footer_social_block social_block">
                <div class="col-lg-12 justify-content-center">

                        <a class="d-inline-flex align-items-center justify-content-center social_item footer_social_item"
                           href="<?php echo get_option( '_thoughtscription_option_page_options' )['footer_facebook_link']; ?>">
                            <i class="social_icon footer_social_icon icon_facebook" aria-hidden="true"></i>
                        </a>

                        <a class="d-inline-flex align-items-center justify-content-center social_item footer_social_item"
                           href="<?php echo get_option( '_thoughtscription_option_page_options' )['footer_google_link']; ?>">
                            <i class="social_icon footer_social_icon icon_google_plus" aria-hidden="true"></i>
                        </a>

                        <a class="d-inline-flex align-items-center justify-content-center social_item footer_social_item"
                           href="<?php echo get_option( '_thoughtscription_option_page_options' )['footer_linkediin_link']; ?>">
                            <i class="social_icon footer_social_icon icon_linkedin" aria-hidden="true"></i>
                        </a>

                        <a class="d-inline-flex align-items-center justify-content-center social_item footer_social_item"
                           href="<?php echo get_option( '_thoughtscription_option_page_options' )['footer_twitter_link']; ?>">
                            <i class="social_icon footer_social_icon icon_twitter" aria-hidden="true"></i>
                        </a>


                </div>
            </div>

            <div class="row footer_copyright_block">
                <div class="col-lg-12 ">
                    <p class="footer_copyright_text">
	                    <?php echo get_option( '_thoughtscription_option_page_options' )['footer_copyright_text']; ?>
                    </p>
                </div>
            </div>

		</div><!--  .container -->
	</footer><!-- #colophon -->

</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
