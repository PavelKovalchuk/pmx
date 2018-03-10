<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.03.2018
 * Time: 14:25
 */

trait ProMXCommonTrait {

	protected $isAdmin;

	public function checkIsArray($input)
	{
		if(!is_array($input) || empty($input)){
			return false;
		}

		return true;
	}

	public function getAdminMessage($message)
	{
		if(!$message){
			return;
		}

		if($this->isAdmin()){
			echo $message;
		}
	}

	public function showAdminMessage($message)
	{
		echo $this->getAdminMessage($message);

	}

	/**
	 * @return mixed
	 */
	public function isAdmin() {
		return $this->isAdmin;
	}

	/**
	 * @param mixed $isAdmin
	 */
	protected function setIsAdmin( $isAdmin ) {
		$this->isAdmin = $isAdmin;
	}



}