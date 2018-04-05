<?php
/**
 * Created by PhpStorm.
 * User: pkovalchuk
 * Date: 05.04.2018
 * Time: 17:18
 */


//Allow SVG through WordPress Media Uploader
function promx_changes_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'promx_changes_mime_types');

