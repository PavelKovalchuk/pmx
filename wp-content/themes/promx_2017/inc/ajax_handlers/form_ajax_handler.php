<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.12.2017
 * Time: 0:25
 */

add_action('wp_ajax_nopriv_ajax_contact', 'ts_ajax_form' );
add_action('wp_ajax_ajax_contact', 'ts_ajax_form' );

function ts_ajax_form(){

	//var_dump($_POST);


	$response_status = 'ok';
	$response_message = '';

	$name = sanitize_text_field(trim($_POST['name']));
	$email = trim($_POST['email']);
	$message = sanitize_textarea_field(trim($_POST['message']));
	$captcha = $_POST['captcha'];

	if(!$name || !$email || !$captcha){
		$response_message .= ' Required data did not send ';
		$response_status = 'error';
	}

	$is_valid_captcha = check_recaptcha($captcha);

	if(!$is_valid_captcha){
		$response_message .= ' Error in recaptcha ';
		$response_status = 'error';
	}

	if(!is_email( $email ) ){
		$response_message .= ' Error in email ';
		$response_status = 'error';
	}


	if($response_status == 'ok'){
		$response_message = get_option( '_thoughtscription_option_page_options' )['form_success_message'];
		$address = get_option( '_thoughtscription_option_page_options' )['destination_email'];
	}



	$thm  = 'Message from ' . get_bloginfo('name');
	//$thm  = "=?utf-8?b?". base64_encode($thm) ."?=";
	$msg = "Name: ".$name."<br/>
        Email: ".$email ."<br/>
		Message: ".$message ."<br/>";

	$mail_to = $address;
	$headers = "Content-Type: text/html; charset=utf-8\n";
	//$headers .= 'From: имя отправителя' . "\r\n";

// Отправляем почтовое сообщение

	if(!mail($mail_to, $thm, $msg, $headers)){
		$response_status = 'error';
		$response_message .= ' Error in sending email ';
	}

// Сообщение о результате отправки почты

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){

		$response = array(
			'status' => $response_status,
			'message' => $response_message,

		);
		wp_send_json($response);

		wp_die();
	}





	$response = '';

	exit;
}

function check_recaptcha($data){

	if(!$data){
		return false;
	}

	$secret = get_option( '_thoughtscription_option_page_options' )['recaptcha_secret_key'];

	if(!$secret){
		return false;
	}

	$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$data}");

	$verify_result = json_decode($verify);

	if($verify_result->success == true) {

		return  true;

	}else{

		return false;
	}

}
