<?php
/**
 * Created by PhpStorm.
 * User: pkovalchuk
 * Date: 22.03.2018
 * Time: 15:55
 */


$options_storage->addSubpageToPromxOptionPages(

    array(

        'page_title'	=> 'Forms settings',
        'menu_title'	=> 'Forms settings',
        'capability'	=> 'manage_options',
        'menu_slug'		=> 'promx_forms_settings',
        'sections'		=> array(
            //			A new section
            array(
                'id'	=> 'upload_settings_data',
                'title'	=> 'Upload settings data ',
                'fields'		=> array(

                    //https://wp-kama.ru/function/wp_get_mime_types
                    array(
                        'id'	=> 'available_file_formats_values',
                        'title'	=> 'available file formats values',
                        'type'	=> 'text',
                        'description' => 'comma separated. Danger! Do not change!!!',
                        'value' => 'application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ),

                    array(
                        'id'	=> 'available_file_formats_labels',
                        'title'	=> 'available file formats labels',
                        'type'	=> 'text',
                        'description' => 'comma separated',
                        'value' => '.pdf, .doc',
                    ),

                    array(
                        'id'	=> 'available_file_max_size',
                        'title'	=> 'available file max size',
                        'type'	=> 'number',
                        'description' => 'in MB, only integer',
                        'value' => '5',
                    ),


                ),
            ),

	        array(
		        'id'	=> 'forms_modal_settings_data',
		        'title'	=> 'Forms modal settings data ',
	        	'fields' => array(

			        array(
				        'id'	=> 'forms_default_success_message_de',
				        'title'	=> 'forms default success message DE',
				        'type'	=> 'textarea',
				        'description' => 'If form does not have a success message, this message will appear on the modal window',
				        'value' => 'Thank you!',
				        'args' => array(
					        'html' => true
				        )
			        ),

			        array(
				        'id'	=> 'forms_default_success_message_en',
				        'title'	=> 'forms default success message EN',
				        'type'	=> 'textarea',
				        'description' => 'if form does not have a success message, this message will appear on the modal window',
				        'value' => 'Thank you!',
				        'args' => array(
					        'html' => true
				        )
			        ),

			        array(
				        'id'	=> 'forms_default_success_button_de',
				        'title'	=> 'forms default success button DE',
				        'type'	=> 'text',
				        'value' => 'OK',
			        ),

			        array(
				        'id'	=> 'forms_default_success_button_en',
				        'title'	=> 'forms default success button EN',
				        'type'	=> 'text',
				        'value' => 'OK',
			        ),

		        ),

	        ),

	        array(
		        'id'	=> 'forms_privacy_policy_data',
		        'title'	=> 'Forms privacy policy data ',
		        'fields' => array(

			        array(
				        'id'	=> 'forms_privacy_policy_message_de',
				        'title'	=> 'forms privacy policy message DE',
				        'type'	=> 'textarea',
				        'value' => 'Wenn Sie uns diese Nachricht senden, erklären Sie sich mit unseren Datenschutzbedingungen einverstanden.',
				        'args' => array(
					        'html' => true
				        )
			        ),

			        array(
				        'id'	=> 'forms_privacy_policy_message_en',
				        'title'	=> 'forms privacy policy message EN',
				        'type'	=> 'textarea',
				        'value' => 'By sending us this message you agree to our privacy policy.',
				        'args' => array(
					        'html' => true
				        )
			        ),

		        ),

	        ),


        ),

    )

);