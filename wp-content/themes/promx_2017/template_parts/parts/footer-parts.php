<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14.01.2018
 * Time: 20:23
 */


function get_template_footer_social_block($footer_options_data){

    if(!$footer_options_data){
        return;
    }

	?>

	<div class="second-flex">
		<h3><?php echo $footer_options_data['header_social_text_' . CURRENT_LANG_CODE]; ?></h3>
		<p>
			<?php echo $footer_options_data['body_social_text_' . CURRENT_LANG_CODE]; ?>
		</p>

		<?php get_template_social_links(); ?>

	</div>
	<div>
		<a href="<?php echo $footer_options_data['button_link_' . CURRENT_LANG_CODE]; ?>" type="button" class="btn btn-primary btn-outline-inverted hidden-xs">
			<?php echo $footer_options_data['button_text_' . CURRENT_LANG_CODE]; ?>
		</a>

	</div>


	<?php
}