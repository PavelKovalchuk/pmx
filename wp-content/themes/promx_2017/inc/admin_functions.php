<?php


// add custom styles to the WordPress editor

function ts_mce_before_init_insert_formats( $init_array ) {
// These are the custom styles
	//var_dump($init_array['style_formats']);
	$style_formats = array(

		array(
			'title' => 'Phrase Highlighter',
			'inline' => 'span',
			'classes' => 'ts_bg_highlighter',
			'wrapper' => true,
			'styles' => array(
				'background-color' => '#aae4fe'
			)
		)
	);
// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'ts_mce_before_init_insert_formats');