<?php
/**
 * Enter your custom functions here
 *
 * @package thrive
 *
 */

 /**
  * Enqueues parent theme and child theme style to the child theme.
  */
function thrive_child_enqueue_styles() {

    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    /** Dunhakdis Com Specific **/
    wp_enqueue_style( 'thrive-webfont', get_stylesheet_directory_uri() . '/webfont.css', 'thrive-child-webfont', '1.9.2.38695766' );
    /** Dunhakdis Com Specific END ~ **/

}

add_action( 'wp_enqueue_scripts', 'thrive_child_enqueue_styles', 20);
