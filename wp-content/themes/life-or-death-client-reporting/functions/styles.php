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

function google_fonts() {

    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Work+Sans:400,500,700' );
}
    
add_action('wp_enqueue_scripts', 'google_fonts');

// function mytheme_enqueue_style() {
//     wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() ); 
// }
// add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_style' );