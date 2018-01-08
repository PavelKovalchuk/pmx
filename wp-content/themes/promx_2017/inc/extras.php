<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package StrapPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function strappress_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'strappress_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function strappress_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'strappress_pingback_header' );


/**
 * Add Bootstrap button classes to tag cloud
 */
function strappress_tag_cloud_btn( $return ) {
	$return = str_replace('<a', '<a class="btn btn-secondary btn-sm"', $return );
	return $return;
}
add_filter( 'wp_tag_cloud', 'strappress_tag_cloud_btn' );


/**
 * Customize the Read More Button
**/
function strappress_modify_read_more_link() {
    return '<a class="more-link btn btn-sm btn-secondary" href="' . get_permalink() . '">Read More</a>';
}
add_filter( 'the_content_more_link', 'strappress_modify_read_more_link' );


function the_excerpt_max_charlength( $charlength , $post_id){
	$excerpt = get_the_excerpt($post_id);
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}

function get_random_posts(){

	$posts_id_raw = get_option( '_thoughtscription_option_page_options' )['slider_posts_id'];

	$posts_id_trimed = preg_replace('/\s+/', '', $posts_id_raw);

	$posts_id_array = explode(",", $posts_id_trimed);

	$max = get_option( '_thoughtscription_option_page_options' )['slider_number_items'];

	shuffle($posts_id_array);

	$posts_id = array_slice($posts_id_array, 0, $max);

	$args = array(
		//'numberposts' => 3,
		'category'    => 0,
		'orderby'     => 'post__in',
		'order'       => 'DESC',
		'include'     => $posts_id,
		'exclude'     => array(),
		'meta_key'    => '',
		'meta_value'  =>'',
		'post_type'   => 'post',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	);

	$recent_posts = get_posts( $args );

	if($recent_posts){
		return $recent_posts;
	}else{
		return false;
	}

}


//Adding first / last CSS classes to menus
function nav_menu_add_classes( $items, $args ) {
	//Add first item class
	$items[1]->classes[] = 'menu-item-first';

	//Add last item class
	$i = count($items);
	while($items[$i]->menu_item_parent != 0 && $i > 0) {
		$i--;
	}
	$items[$i]->classes[] = 'menu-item-last';

	return $items;
}
add_filter( 'wp_nav_menu_objects', 'nav_menu_add_classes', 10, 2 );