<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 14.01.2018
 * Time: 11:03
 */
 class OptionsStorage {

    protected $generalSubpages = array(
	    array(
		    'page_title'	=> 'proMX General Options',
		    'menu_title'	=> 'proMX General Options',
		    'capability'	=> 'manage_options',
		    'menu_slug'		=> 'promx_option_pages',
		    'icon_url'		=> 'dashicons-editor-code',
		    'position'		=> 99,
		    'sections'		=> array(
			    //			A new section
			    array(
				    'id'	=> 'general_custom_data_id',
				    'title'	=> 'ProMX 2017',
				    'fields'		=> array(
					    //					A new field

					   /* array(
						    'id'	=> 'header_facebook_link',
						    'title'	=> 'Facebook link',
						    'type'	=> 'text',
						    'description' => 'General social link',
						    'value' => 'https://uk-ua.facebook.com/',
					    ),*/


				    ),
			    ),

		    ),
		    'subpages'		=> array(),
	    )
    );

	 /**
	  * @return array
	  */
	 public function getGeneralSubpages() {
		 return $this->generalSubpages;
	 }

	 /**
	  * @param array $general_subpage_arr
	  */
	 public  function addSubpageToPromxOptionPages( $general_subpage_arr ) {
		 $this->generalSubpages[0]['subpages'][] = $general_subpage_arr;
	 }




}