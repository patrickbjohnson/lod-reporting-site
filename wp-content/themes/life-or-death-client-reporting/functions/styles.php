<?php
/* ------------------------------------------------------------
 *
 * STYLESHEET ENQUEUEING
 * 
 * Enqueue all stylesheets required by the theme below.
 *  
 * ------------------------------------------------------------ */

add_action('wp_enqueue_scripts', function() {
    if(defined('BENCHPRESS') && BENCHPRESS) {
        wp_enqueue_style('main', BPAssetHelper::get_css('main.css'));
    } else {
        wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
    }
});