<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 30.01.2018
 * Time: 22:38
 */


add_action('wp_ajax_ajax_menu', 'menu_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_ajax_menu', 'menu_ajax_handler'); // wp_ajax_nopriv_{action}

function menu_ajax_handler(){

	// prepare our arguments for the query
	$data_map = json_decode( stripslashes( $_POST['pagesMap'] ), true );
	$data_pages_id = json_decode( stripslashes( $_POST['pagesId'] ), true );


	/*function get_image_url($post_id){
		$image_url = kdmfi_get_featured_image_src( 'top-menu-image', 'full', $post_id );

		if(!$image_url){
			return false;
		}

		return $image_url;
	}

	function get_menu_excerpt($post_id){
		$excerpt = get_the_excerpt( $post_id );

		if(!$excerpt){
			return false;
		}

		return $excerpt;
	}*/

	//var_dump($data_pages_id);

	$data_from_db = get_promx_menu_items_data($data_pages_id);

	$response = [];
	//var_dump($data_from_db);

	$dir = wp_get_upload_dir();

	foreach ($data_from_db as $key => $object){

		if(isset($object->attached_file)){
			$object->attached_file = $dir['baseurl'] . '/'. $object->attached_file;
		}

		$response['pages'][$object->ID] = $object;
	}
	/**
	 * TODO = pack data to answer
	 */


	echo json_encode($response);


	die; // here we exit the script and even no wp_reset_query() required!
}

function get_promx_menu_items_data($data){

	if(!is_array($data) || empty($data)){
		return false;
	}

	$data_sanitized = array_map('intval', $data);

	global $wpdb;

	//You can use _wp_attachment_metadata for full info

	$response = $wpdb->get_results("
		SELECT 
		p.ID
		,p.post_title AS title 
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

