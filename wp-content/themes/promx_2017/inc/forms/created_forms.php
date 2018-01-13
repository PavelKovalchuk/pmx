<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.01.2018
 * Time: 23:02
 */

//Creating forms
//https://github.com/jbrinley/wp-forms#creating-forms

add_action( 'wp_forms_register', 'register_my_form', 10, 0 );
function register_my_form() {
	wp_register_form( 'my-unique-form-id', 'my_form_building_callback' );
}
function my_form_building_callback( $form ) {

	$element = WP_Form_Element::create('text')
	                          ->set_name('first_name')
	                          ->set_label('First Name')
	                          ->set_attribute('placeholder', 'Your Name Here')
	                          ->set_description('This is where you put your first name');

	$button = WP_Form_Element::create('button')->set_value('This is <em>a button</em>!');
	$button->set_view(new WP_Form_View_Button()); // defaults to WP_Form_View_Input
	$button->apply_default_decorators();

	$form

		->add_element(
			WP_Form_Element::create('text')
			               ->set_name('first_name')
			               ->set_label('First Name')
		)
		->add_element(
			WP_form_Element::create('text')
			               ->set_name('last_name')
			               ->set_label('Last Name')
		)
		->add_element($element)
		/*->add_element(
			WP_form_Element::create('button')
							->set_name('Send')
							->set_value('ccccc')
							->set_view(new WP_Form_View_Button())
							->set_label('This is <em>a button</em>!')

		)*/
		//->add_element($button)
		->add_element(
			WP_Form_Element::create('submit')
							->set_name('Send 2')
		)

	;

	//adding validation
	$form->add_validator( 'my_validation_callback', 10 );

	//Processing - After a form has passed validation, its processing callback(s) will be called.
	$form->add_processor( 'my_processing_callback', 10 );

	//var_dump($form);
	$form->set_action( 'http://promx.loc/home-page/' );

	/*var_dump($form->get_errors());
	var_dump($form->get_processors());*/
}

//process of validating
function my_validation_callback( WP_Form_Submission $submission, WP_Form $form ) {
	if ( $submission->get_value('first_name') != 'Jonathan' ) {
		$submission->add_error('first_name', 'Your name should be Jonathan');

	}
	$submission->add_error('first_name', 'Your name should be Jonathan');
	/*echo 'dddddddd';
	var_dump($form);*/
}

//Processing -
function my_processing_callback( WP_Form_Submission $submission, WP_Form $form ) {
	$first_name = $submission->get_value('first_name');
	// do something with $first_name
var_dump($submission);
	// redirect the user after the form is submitted successfully
	//$submission->set_redirect(home_url('aPage'));
}