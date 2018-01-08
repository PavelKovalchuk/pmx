<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) { ?>
		</div><!--  .row -->
	</div><!--  .container -->
<?php } ?>

		<aside id="secondary" class="widget-area" role="complementary">
            <?php if ( has_nav_menu( 'categories' ) ) : ?>
                <?php wp_nav_menu( array( 'theme_location' => 'categories' ) ); ?>
            <?php endif; ?>
		</aside><!-- #secondary -->

	</div><!--  .row -->
</div><!--  .container -->



