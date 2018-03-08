<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 14:58
 */

add_action('wp_ajax_promx_form', 'promx_form_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_promx_form', 'promx_form_ajax_handler'); // wp_ajax_nopriv_{action}

function promx_form_ajax_handler(){

	if(!isset($_POST['forms_data']) || empty($_POST['forms_data'])){
		return false;
	}

	parse_str($_POST['forms_data'], $forms_data_raw);

	$forms_data = array_map('trim', $forms_data_raw);

	$form_name = $forms_data['form-name'];

	if(empty($form_name)){
		return false;
	}

	ProMXFormsManager::init();

	$form_object = ProMXFormsManager::getForm($form_name);

	$result = $form_object->getResult();
	var_dump($form_object);

	exit;

}