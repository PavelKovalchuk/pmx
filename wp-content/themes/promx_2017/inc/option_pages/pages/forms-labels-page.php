<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 18.03.2018
 * Time: 11:27
 */


$options_storage->addSubpageToPromxOptionPages(
	array(

		'page_title'	=> 'Forms general labels',
		'menu_title'	=> 'Forms general labels',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'promx_forms_general_labels',
		'sections'		=> array(
			//			A new section
			array(
				'id'	=> 'general_forms_labels_id',
				'title'	=> 'General forms labels text',
				'fields'		=> array(
					//					A new field

					//New field
					array(
						'id'	=> 'city-de',
						'title'	=> 'city label DE',
						'type'	=> 'text',
						/*'description' => 'General social link',*/
						'value' => 'City',
					),

					array(
						'id'	=> 'city-en',
						'title'	=> 'city label EN',
						'type'	=> 'text',
						'value' => 'City',
					),

					//New field
					array(
						'id'	=> 'company-de',
						'title'	=> 'company label DE',
						'type'	=> 'text',
						'value' => 'Company',
					),

					array(
						'id'	=> 'company-en',
						'title'	=> 'company label EN',
						'type'	=> 'text',
						'value' => 'Company',
					),

					//New field
					array(
						'id'	=> 'country-de',
						'title'	=> 'country label DE',
						'type'	=> 'text',
						'value' => 'Country',
					),

					array(
						'id'	=> 'country-en',
						'title'	=> 'country label EN',
						'type'	=> 'text',
						'value' => 'Country',
					),

					//New field
					array(
						'id'	=> 'email-de',
						'title'	=> 'email label DE',
						'type'	=> 'text',
						'value' => 'Email',
					),

					array(
						'id'	=> 'email-en',
						'title'	=> 'email label EN',
						'type'	=> 'text',
						'value' => 'Email',
					),

					//New field
					array(
						'id'	=> 'event_description-de',
						'title'	=> 'event_description label DE',
						'type'	=> 'text',
						'value' => 'Event description',
					),

					array(
						'id'	=> 'event_descriptionl-en',
						'title'	=> 'event_description label EN',
						'type'	=> 'text',
						'value' => 'Event description',
					),

					//New field
					array(
						'id'	=> 'first_name-de',
						'title'	=> 'first_name label DE',
						'type'	=> 'text',
						'value' => 'First name',
					),

					array(
						'id'	=> 'first_name-en',
						'title'	=> 'first_name label EN',
						'type'	=> 'text',
						'value' => 'First name',
					),

					//New field
					array(
						'id'	=> 'last_name-de',
						'title'	=> 'last_name label DE',
						'type'	=> 'text',
						'value' => 'Last name',
					),

					array(
						'id'	=> 'last_name-en',
						'title'	=> 'last_name label EN',
						'type'	=> 'text',
						'value' => 'Last name',
					),

					//New field
					array(
						'id'	=> 'message-de',
						'title'	=> 'message label DE',
						'type'	=> 'text',
						'value' => 'Message',
					),

					array(
						'id'	=> 'message-en',
						'title'	=> 'message label EN',
						'type'	=> 'text',
						'value' => 'Message',
					),

					//New field
					array(
						'id'	=> 'no_potential_customers-de',
						'title'	=> 'no_potential_customers label DE',
						'type'	=> 'text',
						'value' => 'no_potential_customers',
					),

					array(
						'id'	=> 'no_potential_customers-en',
						'title'	=> 'no_potential_customers label EN',
						'type'	=> 'text',
						'value' => 'no_potential_customers',
					),

					//New field
					array(
						'id'	=> 'position-de',
						'title'	=> 'position label DE',
						'type'	=> 'text',
						'value' => 'Position',
					),

					array(
						'id'	=> 'position-en',
						'title'	=> 'position label EN',
						'type'	=> 'text',
						'value' => 'Position',
					),

					//New field
					array(
						'id'	=> 'postal_code-de',
						'title'	=> 'postal_code label DE',
						'type'	=> 'text',
						'value' => 'Postal Code',
					),

					array(
						'id'	=> 'postal_code-en',
						'title'	=> 'postal_code label EN',
						'type'	=> 'text',
						'value' => 'Postal Code',
					),

					//New field
					array(
						'id'	=> 'salutation-de',
						'title'	=> 'salutation label DE',
						'type'	=> 'text',
						'value' => 'salutation',
					),

					array(
						'id'	=> 'salutation-en',
						'title'	=> 'salutation label EN',
						'type'	=> 'text',
						'value' => 'salutation',
					),

					//New field
					array(
						'id'	=> 'salutation_option_he-de',
						'title'	=> 'salutation HE label DE',
						'type'	=> 'text',
						'value' => 'Mr',
					),

					array(
						'id'	=> 'salutation_option_he-en',
						'title'	=> 'salutation HE label EN',
						'type'	=> 'text',
						'value' => 'Herr',
					),

					//New field
					array(
						'id'	=> 'salutation_option_she-de',
						'title'	=> 'salutation SHE label DE',
						'type'	=> 'text',
						'value' => 'Frau',
					),

					array(
						'id'	=> 'salutation_option_she-en',
						'title'	=> 'salutation SHE label EN',
						'type'	=> 'text',
						'value' => 'Ms',
					),

					//New field
					array(
						'id'	=> 'street-de',
						'title'	=> 'street label DE',
						'type'	=> 'text',
						'value' => 'Street',
					),

					array(
						'id'	=> 'street-en',
						'title'	=> 'street label EN',
						'type'	=> 'text',
						'value' => 'Street',
					),

					//New field
					array(
						'id'	=> 'street_2-de',
						'title'	=> 'street_2 label DE',
						'type'	=> 'text',
						'value' => 'Street',
					),

					array(
						'id'	=> 'street_2-en',
						'title'	=> 'street_2 label EN',
						'type'	=> 'text',
						'value' => 'Street',
					),

					//New field
					array(
						'id'	=> 'phone-de',
						'title'	=> 'phone label DE',
						'type'	=> 'text',
						'value' => 'Telephone',
					),

					array(
						'id'	=> 'phone-en',
						'title'	=> 'phone label EN',
						'type'	=> 'text',
						'value' => 'Phone',
					),

					//New field
					array(
						'id'	=> 'event-de',
						'title'	=> 'event label DE',
						'type'	=> 'text',
						'value' => 'Choose event',
					),

					array(
						'id'	=> 'event-en',
						'title'	=> 'event label EN',
						'type'	=> 'text',
						'value' => 'Choose event',
					),

					//New field
					array(
						'id'	=> 'product-de',
						'title'	=> 'product label DE',
						'type'	=> 'text',
						'value' => 'Choose product',
					),

					array(
						'id'	=> 'product-en',
						'title'	=> 'product label EN',
						'type'	=> 'text',
						'value' => 'Choose product',
					),

					//New field
					array(
						'id'	=> 'career_position-de',
						'title'	=> 'career_position label DE',
						'type'	=> 'text',
						'value' => 'Choose position',
					),

					array(
						'id'	=> 'career_position-en',
						'title'	=> 'career_position label EN',
						'type'	=> 'text',
						'value' => 'Choose position',
					),

					//New field
					array(
						'id'	=> 'file_url-de',
						'title'	=> 'file_url label DE',
						'type'	=> 'text',
						'value' => 'Attach file',
					),

					array(
						'id'	=> 'file_url-en',
						'title'	=> 'file_url label EN',
						'type'	=> 'text',
						'value' => 'Attach file',
					),


				),
			),


		),

	)
);