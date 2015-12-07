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
        wp_enqueue_style('main', BPAssetHelper::get_css('main.min.css'));
        wp_enqueue_style('print', BPAssetHelper::get_css('print.css'), array(), false, 'print');
    } else {
        wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.min.css');
    }
});

function google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Source+Serif+Pro' );
}

add_action('wp_enqueue_scripts', 'google_fonts');