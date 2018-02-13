<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.02.2018
 * Time: 14:47
 */

function get_promx_recent_post( $post_id, $block_title, $form_block_title){

	$args = array(
		'numberposts' => 2,
//	'category' => 5,
		'post_status' => 'publish',
		'exclude'  => $post_id,
	);

	$result = wp_get_recent_posts($args);

	?>
	<div class="recent-block sticky row" id="recent-block">
        <div class="col-sm-12 recent-border">

		<h3 class="recent-block-header"><?php echo $block_title ; ?></h3>
		<div class="recent-link-group row">
			<?php
			foreach( $result as $p ){
				setup_postdata( $p );
				$img = '';
				?>
                <div class="col-sm-12 recent-link-item">

                    <a href="<?php echo get_permalink($p['ID']) ?>"
                       class="recent-link"
                       data-toggle="tooltip"
                       data-placement="left"
                       title="<?php if($p['post_excerpt']) { echo $p['post_excerpt']; }?>">

		                <?php
		                if( has_post_thumbnail($p['ID']) ) {
			                $post_thumbnail_id = get_post_thumbnail_id($p['ID']);
			                $img =  wp_get_attachment_image_url( $post_thumbnail_id, 'thumbnail' );
			                $image_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true);
		                }

		                //                            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );

		                if(!$img){

			                $attachment_image = get_children( array(
				                'numberposts' => 1,
				                'post_mime_type' => 'image',
				                'post_parent' => $p['ID'],
				                'post_type' => 'attachment'
			                ) );

			                // вынимаем первую картинку из массива
			                $attachment_image = array_shift($attachment_image);
			                $img = wp_get_attachment_url( $attachment_image->ID );
			                $image_alt = get_post_meta( $attachment_image->ID, '_wp_attachment_image_alt', true);
		                }

		                if(!$img){
			                //
		                }
		                ?>

                        <div class="recent-img-outer">
                            <img src="<?php echo $img; ?>"
                                 class="recent-img img-responsive"
                                 alt="<?php print_image_alt($image_alt); ; ?>"
                            />
                        </div>
                        <div class="recent-title-outer">
                            <h5 class="recent-title"><?php echo $p['post_title'] ; ?></h5>
                        </div>

                    </a>

                </div>


				<?php
			}
			?> </div> <?php
		wp_reset_postdata(); ?>
            <div class="recent-form-outer subscribe-sidebar row">

                <div class="col-sm-12">
                    <h3 class="recent-block-header recent-block-header-sidebar"><?php echo $form_block_title ; ?></h3>
                </div>

                <div class="col-sm-12">
	                <?php get_form_template_latest_news_sidebar(); ?>
                </div>

            </div>


        </div>

	</div>


<?php }

function promx_share_buttons($url){
	$qubes = '<div class="share_buttons ssb-share d-inline-flex">';

	$qubes .= '<a class="xing sb-prorm btn-eff-4" target="_blank" href="https://www.xing.com/spi/shares/new?url=' . $url . '"><i class="fa fa-xing fa-1x" aria-hidden="true"></i></a>';
	$qubes .= '<a class="facebook sb-prorm btn-eff-4" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u='.$url.'"><i class="fa fa-facebook fa-1x" aria-hidden="true"></i></a>';
	$qubes .= '<a class="gplus sb-prorm btn-eff-4" target="_blank" href="https://plus.google.com/share?url='.$url.'"><i class="fa fa-google-plus fa-1x" aria-hidden="true"></i></a>';
	$qubes .= '<a class="twitter sb-prorm btn-eff-4" target="_blank" href="https://twitter.com/home?status='.$url.'"><i class="fa fa-twitter fa-1x " aria-hidden="true"></i></a>';
	$qubes .= '<a class="linkedin sb-prorm btn-eff-4" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='.$url.'"><i class="fa fa-linkedin fa-1x" aria-hidden="true"></i></a>';

	$qubes .= '</div>';

	echo $qubes;
}

function get_prev_next_part($prev_post, $next_post, $prev_link_text, $next_link_text){

    ?>

		<?php

		if( ! empty($prev_post) ){ ?>
            <div class='prev-post-outer'>

                <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class='prev-next-link' >
					<?php if($prev_post->post_excerpt) { ?>
                        <?php // echo $prev_post->post_excerpt; ?>
					<?php } ?>

                    <div class="arrow"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                    <div class="link-label"><?php echo $prev_link_text; ?></div>

                    <div class="link-title"><h5 class="link-title-text"><?php echo $prev_post->post_title;  ?> </h5></div>
                </a>
            </div>

		<?php } ?>


		<?php
		if( ! empty($next_post) ){ ?>
            <div class='next-post-outer'>

                <a href="<?php echo get_permalink( $next_post->ID ); ?>" class='prev-next-link'>

					<?php if($next_post->post_excerpt) { ?>
                        <?php //echo $next_post->post_excerpt; ?>
					<?php } ?>

                    <div class="arrow"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                    <div class="link-label"><?php echo $next_link_text; ?></div>

                    <div class="link-title"><h5 class="link-title-text"><?php echo $next_post->post_title ; ?></h5></div>
                </a>
            </div>
		<?php } ?>



<?php

}