<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 11:09
 */

abstract class ProMXFetcherAbstract {

	const DIR_TMP_UPLOADFILES = "tmp-uploadfiles/";

	protected $source = array();

	protected $lang = CURRENT_LANG_CODE;

	/** @var string  */
	protected $formSubject = array(
		'de' => '',
		'en' => '',
		'es' => ''
	);

	protected $langTitles = array(
		'de' => 'German',
		'en' => 'English',
		'es' => 'Spanish'
	);

	protected $fieldsMap = array(
		//'subject' => 'Betreff',
		'company' => 'Firma', // required
		'salutation' => 'Anrede', // required
		'first_name' => 'Vorname',
		'last_name' => 'Nachname',
		'email' => 'E-Mail', // required
		'phone' => 'Telefon', // required
		'notes' => 'Nachricht',
		'position' => 'Position',
		'street' => 'Strasse',
		'street_2' => 'Strasse 2',
		'zipcode' => 'PLZ',
		'city' => 'Ort',
		'country' => 'Land',
		'number_of_users' => 'Anzahl potenzieller User',
		'data_usage' => 'Datennutzung', // required
		'subscription' => 'Mehr Info',
		'test_package' => 'TestPaket',
//        'gender' => 'Gender',

	);

	protected $required = array();

	protected $errors = array();

	protected $data = array();

	protected $mappedData = array();

	protected $datas = array();

	public function __construct($source)
	{
		$this->setSource($source);

	}

	public function analyze($data){



	}

	/**
	 * @return array
	 */
	protected function getSource() {
		return $this->source;
	}

	/**
	 * @param array $source
	 */
	protected function setSource( $source ) {
		$this->source = $source;
	}

	/**
	 * @return bool|string
	 */
	protected function getLang() {
		return $this->lang;
	}

	/**
	 * @param bool|string $lang
	 */
	protected function setLang( $lang ) {
		$this->lang = $lang;
	}



}