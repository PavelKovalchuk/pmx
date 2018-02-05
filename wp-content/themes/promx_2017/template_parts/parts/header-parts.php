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

	if(empty($items)){
	    return;
    }

    foreach ($items as $item){ ?>
        <a href="<?php echo $item->url; ?>" class=" <?php echo implode(' ', $item->classes); ?> sprite-icon ">

        </a>
    <?php }
}

function get_template_header_menu($menu_handler){

	/*$args = array(
		'theme_location' => 'primary',
		'depth'      => 3,
		'container'  => false,
		'menu_class'     => 'nav navbar-nav multi-level',
		'walker'     => new Bootstrap_Walker_Nav_Menu()
	);*/

	$args = array(
		'theme_location' => 'primary',
		'depth'      => 3,
		'container'  => false,
		'menu_class'     => 'nav navbar-nav js-top-menu',
		'walker'     => $menu_handler
	);

	if (has_nav_menu('primary')) {
		wp_nav_menu($args);
	}

}

function get_template_menu_blocks($pages_id_arr, $menu_map){

	//$menu_data_from_db = get_promx_menu_items_data_by_page_id($pages_id_arr);

    $menu_article = [
            'title' => 'Get to real business results faster with cloud',
            'text' => 'Business solutions are often associated with extensive and rigid software suites that are laborious to 
                        implement, require considerable maintenance and are so complex that only absolute specialists.',
            'link_target' => '#',
            'link_text' => 'Learn about Hitachi Enterprise cloud',
            'image' => 11973
    ];

	$menu_data_from_db = get_promx_menu_items_data_by_menu_id($pages_id_arr);

	$response = [];

	$dir = wp_get_upload_dir();

	foreach ($menu_data_from_db as $key => $object){

		if(isset($object->attached_file)){
			$object->attached_file = $dir['baseurl'] . '/'. $object->attached_file;
		}

		$response['pages'][$object->page_id] = [
		        'page_excerpt' => $object->excerpt,
                'image' => $object->attached_file,
		        'image_alt' => $object->image_alt
        ];

		$link_text =  get_option( '_promx_buttons_and_links_options' )['menu_button_text_' . CURRENT_LANG_CODE];
	}

	?><div class="menu-blocks-container">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

    <?php
    //var_dump($menu_map['submenus']);
	foreach ($menu_map as $parent_id => $children_data){

	    if(!is_int($parent_id)){
	        continue;
        }

	    //var_dump($children_data);exit;
		$count = count($children_data);

	    ?>
        <div class="animated fadeInDown child-menu-level-0 hidden menu-page-container menu-page-container-<?php echo $parent_id; ?> count-items-<?php echo $count; ?>"
             id="menu-parent-item-<?php echo $parent_id; ?>">
        <?php
		$custom_article = false;
	    foreach ($children_data as $child_id => $child_data){

	        if( !array_key_exists($child_id, $response['pages']) ){
	            continue;
            }

		    ?><div class="<?php
                if($child_data['page_classes']){
	                echo implode(' ' , $child_data['page_classes']) ;
                }
                ?> count-item-<?php echo $count; ?>"
                <?php echo $children_data['page_attr']; ?>>

                <div class="menu-item-inner">

                    <h3 class="menu-page-title"><?php echo $child_data['page_title'] ; ?></h3>

                    <img src="<?php echo $response['pages'][$child_id]['image'] ; ?>"
                         alt="<?php echo $response['pages'][$child_id]['image_alt'] ; ?>"
                         class="menu-page-image" />

                    <?php if( array_key_exists($child_id, $menu_map['submenus']) ){
                        $custom_article = true;
                        ?>

                        <div class="submenu-page-link-outer">

                        <?php foreach ($menu_map['submenus'][$child_id] as $grandson_id => $grandson_data){ ?>

                            <a class="submenu-page-link" href="<?php echo $grandson_data['page_link']; ?>">

                            <?php print_button_text($grandson_data['page_title']); ?>

                            </a>

                        <?php } ?>
                        </div>

                    <?php }else{ ?>
                        <p class="menu-page-text"><?php echo $response['pages'][$child_id]['page_excerpt'] ; ?></p>

                        <a class="menu-page-link" href="<?php echo $child_data['page_link']; ?>">

                            <?php print_button_text($link_text); ?>

                        </a>
                    <?php } ?>

                </div>

            </div>


	    <?php } ?>

		<?php

		if($custom_article){
		    $custom_article_image = wp_get_attachment_image_url( $menu_article['image'], 'full' );
		    ?>
            <div class="menu-item menu-custom-item count-item-3" style="background-image: url(<?php echo $custom_article_image ; ?>);">

                <div class="menu-item-inner menu-custom-item-inner">

                    <h3 class="menu-page-title menu-custom-title"><?php echo $menu_article['title']; ?></h3>
                    <p class="menu-page-text"><?php echo $menu_article['text'] ; ?></p>
                    <a class="menu-page-link menu-custom-link" href="<?php echo $menu_article['link_target']; ?>">

		                <?php print_button_text($menu_article['link_text']); ?>

                    </a>

                </div>

            </div>

		<?php $custom_article = false;
		    }	?>

        </div><?php

	 } ?>

            </div>
        </div>
    </div>



    </div>



<?php

}

function get_promx_menu_items_data_by_page_id($data){

	if(!is_array($data) || empty($data)){
		return false;
	}

	$data_sanitized = array_map('intval', $data);

	global $wpdb;

	//You can use _wp_attachment_metadata for full info

	$response = $wpdb->get_results("
		SELECT 
		p.ID		
		,p.post_excerpt AS excerpt
		,pm.meta_value AS pm_meta_value
		,pm_2.meta_value AS attached_file
		,pm_3.meta_value AS image_alt
		 
		FROM $wpdb->posts AS p
		
		LEFT JOIN $wpdb->postmeta AS pm ON (p.ID = pm.post_id)
		
		LEFT JOIN $wpdb->postmeta AS pm_2 ON (pm.meta_value = pm_2.post_id)
		
		LEFT JOIN $wpdb->postmeta AS pm_3 ON (pm.meta_value = pm_3.post_id)
		
		WHERE p.post_type='page'
		AND p.post_status = 'publish'		
		AND p.ID IN (" . implode(',', $data_sanitized) . ")
		AND pm.meta_key = '_kdmfi_top-menu-image'
		AND pm_2.meta_key = '_wp_attached_file'
		AND pm_3.meta_key = '_wp_attachment_image_alt'
		
		ORDER BY ID ASC
		");

	return $response;
}

function get_promx_menu_items_data_by_menu_id($data){

	if(!is_array($data) || empty($data)){
		return false;
	}

	$data_sanitized = array_map('intval', $data);

	global $wpdb;

	//You can use _wp_attachment_metadata for full info
    //https://wordpress.org/plugins/nav-menu-images/
    //http://blog.milandinic.com/2012/11/23/nav-menu-images-developers-guide/

	$response = $wpdb->get_results("
		SELECT 
			
		pm.post_id	AS menu_item_id	
		,pm.meta_value AS image_post_id
		,pm_2.meta_value AS attached_file
		,pm_3.meta_value AS image_alt
		,pm_4.meta_value AS page_id
		,p.post_excerpt AS excerpt
		
		FROM $wpdb->postmeta AS pm
		
		LEFT JOIN $wpdb->postmeta AS pm_2 ON (pm.meta_value = pm_2.post_id)
		LEFT JOIN $wpdb->postmeta AS pm_3 ON (pm.meta_value = pm_3.post_id)
		LEFT JOIN $wpdb->postmeta AS pm_4 ON (pm.post_id = pm_4.post_id)
		LEFT JOIN $wpdb->posts AS p ON (pm_4.meta_value = p.ID)
				
		WHERE 
				
		pm.post_id IN (" . implode(',', $data_sanitized) . ")
		AND pm.meta_key = '_thumbnail_id'
		AND pm_2.meta_key = '_wp_attached_file'
		AND pm_3.meta_key = '_wp_attachment_image_alt'
		AND pm_4.meta_key = '_menu_item_object_id'
		
		
		");

	return $response;
}