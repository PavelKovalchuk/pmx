<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.11.2017
 * Time: 13:00
 */


add_action('wp_ajax_loadmore', 'blog_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'blog_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

function blog_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$data_args = json_decode( stripslashes( $_POST['paged'] ), true );

	$args = array(
		'posts_per_page' => get_option('posts_per_page'),
		'orderby' => 'date',
		'post_status' => 'publish',
		'paged' => intval($data_args) + 1
	);


	// it is always better to use WP_Query but not here
	$query = new WP_Query( $args );

	$posts = $query->query($args);

	$response = [];

	if(!$posts){
		echo json_encode(array('answer' => 'end'));
		die;
	}




	foreach( $posts as $post_item ){

		$cat_data = get_the_category( $post_item->ID );

		$response[] = array(
			'classes' => "grid__brick col-sm-12 col-md-6 col-lg-4 col-xl-3 shuffle-item shuffle-item--visible",
			'data_groups' => $cat_data[0]->slug,
			'html' => get_template_article_preview_string($post_item)
		);

	 }

	 echo json_encode($response);


	die; // here we exit the script and even no wp_reset_query() required!
}

