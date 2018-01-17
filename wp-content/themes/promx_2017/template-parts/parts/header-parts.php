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
        <div class="js-lang-switcher lang-switcher">

	<?php
	foreach($translations as $key => $data){

	    $is_current_lang = $data['current_lang'];
		$class_to_show = ($is_current_lang) ? '' : ' hidden animated lang-other js-lang-other ';

		?>
		<div class="lang-box <?php echo implode(" ", $data['classes']) . $class_to_show; ?> ">

            <?php if(!$is_current_lang){ ?>
                <div class="lang-other-inner">
                    <a href="<?php echo $data['url']; ?>" class="language-switcher-link">
	        <?php } ?>

			<!--<img class="flag-uk" src="<?php /*echo IMAGES_DIR */?>flags/<?php /*echo $data['slug']; */?>.png" alt="<?php /*echo $data['name']; */?>">-->
                    <span class="lang-flag flag-<?php echo $data['slug']; ?>"></span>
			<span class="lang-code"><?php echo strtoupper($data['slug']); ?></span>

	        <?php if(!$is_current_lang){ ?>
                    </a>
                </div>

		    <?php } ?>

		</div>
	<?php
	}

	?>
        </div>
	</div>

<?php

}

function get_template_social_links(){

	if ( function_exists('dynamic_sidebar') ){
		dynamic_sidebar('sidebar-social-icons-links');
    }

}


function get_template_header_logo(){

	$logo_data =  get_option( '_promx_images_and_logos_options' );
	$url = wp_get_attachment_url( $logo_data['logo_image_id'] );
    $tag  = ( is_front_page() ) ? 'span' : 'a';

    echo '<' . $tag . ' class="navbar-brand"   href="' . CURRENT_HOME_URL . '">'

	?>

    <?php if($url){ ?>

        <img src="<?php echo $url; ?>" alt="<?php print_image_alt( $logo_data['logo_image_alt']); ?>" class="img-responsive">

	<?php } ?>

	<?php echo '</' . $tag . '>';

}


function get_template_header_menu_icons(){

	$args = array(
		'order'                  => 'ASC',
		'orderby'                => 'menu_order',
		'output'                 => ARRAY_A,
		'output_key'             => 'menu_order',
		'update_post_term_cache' => false,
	);

	$items = wp_get_nav_menu_items( 'Header icon menu ' . strtoupper(CURRENT_LANG_CODE), $args );

	if(!$items){
	    return;
    }

    foreach ($items as $item){ ?>
        <a href="<?php echo $item->url; ?>" class=" <?php echo implode(' ', $item->classes); ?> sprite-icon ">

        </a>
    <?php }
}

function get_template_header_menu(){

	$args = array(
		'theme_location' => 'primary',
		'depth'      => 3,
		'container'  => false,
		'menu_class'     => 'nav navbar-nav multi-level',
		'walker'     => new Bootstrap_Walker_Nav_Menu()
	);
	if (has_nav_menu('primary')) {
		wp_nav_menu($args);
	}

}