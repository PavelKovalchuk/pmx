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
	ProMXFormsManager::logInFile('forms_handler', '_____START____');
	ProMXFormsManager::logInFile('forms_data', json_encode($forms_data));

	$form_name = trim($forms_data['form_name']);
	$form_nonce = trim($forms_data['form_nonce']);

	if(empty($form_name) || empty($form_nonce)){
		//We do not get necessary data for starting process
		ProMXFormsManager::logInFile('error_empty_hidden_inputs', json_encode($forms_data));
		return false;
	}

	$form_object = ProMXFormsManager::getForm($form_name);

	if(!$form_object){
		//We do not get registered form with name $form_name
		ProMXFormsManager::logInFile('error_registered_form', $form_name);
		return;
	}

	if(isset($_FILES['file']) || empty($_FILES['file'])){

		$uploadedfile = $_FILES['file'];
		if(!$form_object->getFetcherHandler()){
			return;
		}
		$rules_data = [
			'allowed_formats' => explode(',', $form_object->getFetcherHandler()->getOneGlobalSetting('available_file_formats_values')),
			'max_size' => $form_object->getFetcherHandler()->getOneGlobalSetting('available_file_max_size'),
			'allowed_formats_text' => $form_object->getFetcherHandler()->getOneDBSetting('allowed_formats_text'),
			'upload_error_text'=> $form_object->getFetcherHandler()->getOneDBSetting('allowed_formats_text'),
		];
		$upload_results = ProMXFormsManager::manageUploadFile($uploadedfile, $rules_data);

		if($upload_results['status'] == 'error'){
			//TODO = handle errors
			ProMXFormsManager::logInFile('error_uploads_file', json_encode($_FILES['file']));
			var_dump($upload_results);
		}
		$forms_data['file_url'] = $upload_results['url'];
	}

	$result = $form_object->getResult($forms_data);
	//$result = $form_object->getResult(false);

	//TODO = handle errors
	echo 'Result:';
	var_dump($result);
	if($result['status'] == 'error'){
		ProMXFormsManager::logInFile('ERROR forms_handler', $result['message']);
	}

	if($result['status'] == 'ok'){
		ProMXFormsManager::logInFile('SUCCESS forms_handler', $result['message']);
	}

	ProMXFormsManager::logInFile('forms_handler', '_____FINISH____');
	exit;

}