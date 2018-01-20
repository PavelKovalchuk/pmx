<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 20.01.2018
 * Time: 19:53
 */

function get_template_featured_banner($title, $text, $image, $link_target, $link_text){

	if( !$title || !$text|| !$image || !$link_target){
		return false;
	}

	?>

	<section id="banner">
		<div class="featured-banner">
			<div class="fullwidth" style="background-image: url('<?php echo $image; ?>');">
				<div class="container">
					<div class="row">
						<div class="col-sm-7">
							<h1 class="subtitle light">
								<?php echo $title; ?>
							</h1>
							<p class="slider-text"><?php echo $text; ?></p>
							<div class="hidden-xs">
								<a href="<?php echo $link_target; ?>" type="button" class="btn btn-primary btn-htransp"><?php print_button_text($link_text); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}