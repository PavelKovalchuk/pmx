<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 08.03.2018
 * Time: 11:28
 */

require_once(SHORTCODES_ITEMS_DIR . 'shortcode-form.php');

// Insert Form
add_shortcode('form', 'formShortcodeHandler');