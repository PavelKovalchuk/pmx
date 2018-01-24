<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 23.01.2018
 * Time: 23:02
 */

class CptStorage {

	protected $dataArguments = [];

	/**
	 * @return array
	 */
	public function getDataArguments() {
		return $this->dataArguments;
	}


	public function addDataArgument( $post_type_name, $dataArr ) {

		if(empty($dataArr) || !$post_type_name){
			return false;
		}

		$this->dataArguments[$post_type_name] = $dataArr;
	}

	public function registerPostTypes()
	{
		add_action( 'init', array( $this, 'runRegistration' ) );

	}

	public function runRegistration(){

		if( empty($this->getDataArguments()) ){
			return false;
		}

		foreach ( $this->getDataArguments() as $post_type_name => $data ){

			register_post_type( $post_type_name, $data);

		}

		return true;
	}



}