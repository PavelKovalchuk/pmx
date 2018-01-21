<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 20.01.2018
 * Time: 21:59
 */


function get_template_article($post_item, $link_text, $default_image){

	if( !$post_item){
		return false;
	}

	?>

	<article class="post">
		<div class="row">

			<div class="col-sm-4 col-md-4 col-lg-4">
				<figure>
					<?php

					$img = get_the_post_thumbnail_url( $post_item->ID, 'preview-post-image' );

					if(!$img){
					    $img = $default_image;
                    }

					if($img){ ?>

						<img class="blog_item_img" src="<?php echo $img; ?>" alt="<?php echo $post_item->post_title; ?>"/>

					<?php } ?>

				</figure>
			</div>

			<div class="col-sm-8 col-md-8 col-lg-7 col-lg-offset-1">

				<header>
					<h3 class="entry-title"><?php echo $post_item->post_title; ?></h3>
					<div class="entry-meta"> <?php strappress_posted_on(); ?></div>
				</header>

				<div class="entry-content">

					<?php if( $post_item->post_excerpt ){ ?>

						<p><?php echo $post_item->post_excerpt; ?></p>

					<?php } ?>

					<a href="<?php echo get_permalink($post_item->ID); ?>" class="btn btn-primary read-more">

						<?php print_button_text($link_text); ?>

					</a>

				</div>

			</div>
		</div>
	</article>


	<?php
}