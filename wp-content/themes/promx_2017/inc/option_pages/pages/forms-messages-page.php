<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 21.03.2018
 * Time: 23:16
 */


$options_storage->addSubpageToPromxOptionPages(

	array(

		'page_title'	=> 'Forms messages',
		'menu_title'	=> 'Forms messages',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_forms_messages',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'forms_messages_errors_data',
				'title'	=> 'Forms messages errors data ',
				'fields'		=> array(

					array(
						'id'	=> 'required_field_de',
						'title'	=> 'required field DE',
						'type'	=> 'text',
						'value' => 'This field is required DE',
					),

					array(
						'id'	=> 'required_field_en',
						'title'	=> 'required field EN',
						'type'	=> 'text',
						'value' => 'This field is required',
					),


                    array(
                        'id'	=> 'email_error_de',
                        'title'	=> 'email error DE',
                        'type'	=> 'text',
                        'value' => 'It is not a valid email DE',
                    ),

                    array(
                        'id'	=> 'email_error_en',
                        'title'	=> 'email error EN',
                        'type'	=> 'text',
                        'value' => 'It is not a valid email',
                    ),

                    array(
                        'id'	=> 'phone_error_de',
                        'title'	=> 'phone error DE',
                        'type'	=> 'text',
                        'value' => 'It is not a valid phone DE',
                    ),

                    array(
                        'id'	=> 'phone_error_en',
                        'title'	=> 'phone error EN',
                        'type'	=> 'text',
                        'value' => 'It is not a valid phone',
                    ),

                    array(
                        'id'	=> 'max_length_error_de',
                        'title'	=> 'max length error DE',
                        'type'	=> 'text',
                        'description' => 'Number of max value will be added to the end of this message',
                        'value' => 'Maximum length of this field is ',
                    ),

                    array(
                        'id'	=> 'max_length_error_en',
                        'title'	=> 'max length error EN',
                        'type'	=> 'text',
                        'description' => 'Number of max value will be added to the end of this message',
                        'value' => 'Maximum length of this field is ',
                    ),

                    array(
                        'id'	=> 'file_type_error_de',
                        'title'	=> 'file type error DE',
                        'type'	=> 'text',
                        'value' => 'It is not an available type of file DE',
                    ),

                    array(
                        'id'	=> 'file_type_error_en',
                        'title'	=> 'file type error EN',
                        'type'	=> 'text',
                        'value' => 'It is not an available type of file',
                    ),

					array(
						'id'	=> 'max_file_size_error_de',
						'title'	=> 'max file size error DE',
						'type'	=> 'text',
						'description' => 'Number of max file size will be added to the end of this message',
						'value' => 'Maximum size of the file is',
					),

					array(
						'id'	=> 'max_file_size_error_en',
						'title'	=> 'max file size error EN',
						'type'	=> 'text',
						'description' => 'Number of max file size will be added to the end of this message',
						'value' => 'Maximum size of the file is',
					),

				),
			),


		),

	)

);