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

	$form_name = trim($forms_data['form_name']);
	$form_nonce = trim($forms_data['form_nonce']);

	if(empty($form_name) || empty($form_nonce)){
		//We do not get necessary data for starting process
		return false;
	}

	ProMXFormsManager::init();

	$form_object = ProMXFormsManager::getForm($form_name);

	if(!$form_object){
		//We do not get registered form with name $form_name
		return;
	}

	$result = $form_object->getResult($forms_data);
	//$result = $form_object->getResult(false);

	//var_dump($result);

	exit;

}