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


        ),

    )

);