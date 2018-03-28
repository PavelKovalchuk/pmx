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

function get_template_article_preview_string($post_item, $link_text, $default_image){

    if( !$post_item){
        return false;
    }

    $cat_data = get_the_category( $post_item->ID );
    $cat_name = $cat_data[0]->cat_name;
    $post_link = get_permalink($post_item->ID);

    $html = "";

    $html .= "<article class='post'>";

        $html .="<div class='row'>";

            $html .= "<div class='col-sm-5 col-md-4 col-lg-4'>";

                $html .= "<figure>";

                $img = get_field('preview_post_image', $post_item->ID);
               //$img = get_the_post_thumbnail_url( $post_item->ID, 'main-preview-gallery-image-cropped' );
	            if(!$img){
		            $img = get_the_post_thumbnail_url( $post_item->ID, 'large' );
                }

                if(!$img){
                    $img = $default_image;
                }

                if($img){
                    $html .= "<a href='$post_link' class='blog_item_img_link'>$link_text</a><img class='blog_item_img' src='$img' alt='$post_item->post_title' />";
                }

                $html .= "</figure>";

            $html .= "</div>";


            $html .= "<div class='col-sm-7 col-md-8 col-lg-8 '>";

	            $html .= "<div class='post-content'>";

                    $html .= "<header>";

                        $html .= "<h3 class='entry-title'><a href='$post_link' class='entry-title-link'>$post_item->post_title</a></h3>";
                        $html .= "<div class='entry-meta'><span class='category-name'>$cat_name</span> / " .  get_posted_on($post_item->ID) . "</div>";

                    $html .= "</header>";

                    $html .= "<div class='entry-content'>";

                        if( $post_item->post_excerpt ){
                            $html .= "<p>$post_item->post_excerpt</p>";
                        }

                        $html .= "<a href='" . $post_link . "' class='btn btn-primary read-more'>";

                            $html .= get_button_text($link_text);

                        $html .= "</a>";

                    $html .= "</div>";

	            $html .= "</div>";

            $html .= "</div>";


        $html .= "</div>";

    $html .= '</article>';

    return $html;

}