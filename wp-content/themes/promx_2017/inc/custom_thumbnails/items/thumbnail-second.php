<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 30.01.2018
 * Time: 0:57
 */

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
	$args = array(
		'id' => 'top-menu-image',
		'desc' => 'Image for the Top menu. Size: 238x71',
		'label_name' => 'Top menu image',
		'label_set' => 'Set Top menu image',
		'label_remove' => 'Remove Top menu image',
		'label_use' => 'Set Top menu image',
		'post_type' => array( 'page' ),
	);

	$featured_images[] = $args;

	return $featured_images;
});