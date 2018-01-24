<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 23.01.2018
 * Time: 0:31
 */

require_once( CPT_MAIN_DIR . 'CptStorage.php' ) ;

$cpt_storage = new CptStorage();

require_once( CPT_DIR . 'cpt-testimonials.php' ) ;
require_once( CPT_DIR . 'cpt-events.php' ) ;
require_once( CPT_DIR . 'cpt-products.php' ) ;

$cpt_storage->registerPostTypes();
