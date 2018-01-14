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

	?>
    <div class="dropdown dropdown-inline">
        <a href="#" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="zoomIn zoomIn zoomIn zoomIn">Dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu dropdownhover-bottom" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li class="dropdown">
                <a href="#">Another dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu dropdownhover-right">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Another dropdown 2 <span class="caret"></span></a>
                <ul class="dropdown-menu dropdownhover-right">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li class="dropdown">
                        <a href="#">Another dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>

                        </ul>
                    </li>

                </ul>
            </li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
        </ul>
    </div>

        <a href="<?php echo $items[0]->url; ?>" class="header-menu-icon btn hidden-xs">
            <i class="fa fa-cog" aria-hidden="true"></i>
        </a>

        <a href="<?php echo $items[1]->url; ?>" class="header-menu-icon btn">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
        </a>

	<?php
}

function get_template_header_menu(){

	$args = array(
		'theme_location' => 'primary',
		'depth'      => 3,
		'container'  => false,
		'menu_class'     => 'nav navbar-nav',
		'walker'     => new Bootstrap_Walker_Nav_Menu()
	);
	if (has_nav_menu('primary')) {
		wp_nav_menu($args);
	}

}