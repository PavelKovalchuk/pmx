<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 30.01.2018
 * Time: 0:56
 */

//https://wordpress.org/plugins/multiple-featured-images/

/**
 * If you need the ID only, use this function:

kdmfi_get_featured_image_id( $image_id, $post_id );
$post_id is optional, if you leave it out, the ID of the calling post is used.

To get the URL of the image:

kdmfi_get_featured_image_src( $image_id, $size, $post_id );
$post_id is optional (see above); $size is optional and defaults to ‘full’.

To get the featured image in HTML as a string:

kdmfi_get_the_featured_image( $image_id, $size, $post_id );
Again, $size and $post_id are optional.

To display the featured image directly:

kdmfi_the_featured_image( $image_id, $size, $post_id ) {
Again, $size and $post_id are optional.

To check if the post has a featured image:

kdmfi_has_featured_image( $image_id, $post_id ) {
$post_id is optional. The function returns the id of the attachment if there’s one and false if not.
 */


require_once(CUSTOM_THUMBNAILS_DIR . 'thumbnail-second.php');