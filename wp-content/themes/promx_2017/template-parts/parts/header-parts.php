<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.01.2018
 * Time: 12:30
 */

function get_template_language_switcher(){

	$translations = pll_the_languages(array('raw'=>1));

	?>
	<div class="header-lang">

	<?php
	foreach($translations as $key => $data){

	    $is_current_lang = $data['current_lang'];
		$class_to_show = ($is_current_lang) ? '' : ' hidden lang-other js-lang-other ';

		?>
		<div class="lang-box <?php echo implode(" ", $data['classes']) . $class_to_show; ?> ">

            <?php if(!$is_current_lang){ ?>
                <a href="<?php echo $data['url']; ?>" class="language_switcher_link">
	        <?php } ?>

			<img class="flag-uk" src="<?php echo IMAGES_DIR ?>flags/<?php echo $data['slug']; ?>.png" alt="<?php echo $data['name']; ?>">
			<span><?php echo strtoupper($data['slug']); ?></span>

	        <?php if(!$is_current_lang){ ?>
                 </a>
		    <?php } ?>

		</div>
	<?php
	}

	?>

	</div>

<?php

}

function get_template_social_links(){

	$links =  get_option( '_promx_options_social_network_links_options' );

?>

    <div class="custom-btn-group">
        <a href="<?php echo $links['header_facebook_link']; ?>" class="custom-btn">
            <i class="fa fa-facebook"></i>
        </a>
        <a href="<?php echo $links['header_google_link']; ?>" class="custom-btn">
            <i class="fa fa-google-plus"></i>
        </a>
        <a href="<?php echo $links['header_instagram_link']; ?>" class="custom-btn">
            <i class="fa fa-instagram"></i>
        </a>
        <a href="<?php echo $links['header_linkediin_link']; ?>" class="custom-btn">
            <i class="fa fa-linkedin"></i>
        </a>
        <a href="<?php echo $links['header_twitter_link']; ?>" class="custom-btn">
            <i class="fa fa-twitter"></i>
        </a>
        <a href="<?php echo $links['header_youtube_link']; ?>" class="custom-btn">
            <i class="fa fa-youtube"></i>
        </a>
    </div>

<?php
}


function get_template_header_logo(){

	//$url =  get_option( '_promx_options_social_network_links_options' );

    $tag  = ( is_home() ) ? 'span' : 'a';

    echo '<' . $tag . ' class="navbar-brand"   href="' . get_home_url() . '">'

	?>

    <img src="./images/promx.png" alt="Promx logo" class="img-responsive">

	<?php echo '</' . $tag . '>';

}