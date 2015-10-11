<?php
/* ------------------------------------------------------------
 *
 * JAVASCRIPT ENQUEUEING
 * 
 * Enqueue all Javascript files required by the theme below.
 * 
 * ------------------------------------------------------------ */

add_action('wp_enqueue_scripts', function() {

    /*-------------------------------------------- */
    /** Deregistration */
    /*-------------------------------------------- */



    /*-------------------------------------------- */
    /** Head Scripts */
    /*-------------------------------------------- */



    /*-------------------------------------------- */
    /** Footer Scripts */
    /*-------------------------------------------- */
    wp_enqueue_script( 'vendor', BPAssetHelper::get_js('built/vendor.bundle.js'), null, null, true );
    wp_enqueue_script( 'main', BPAssetHelper::get_js('built/main.bundle.js'), array('vendor'), null, true );
    wp_enqueue_script( 'twitter', '//platform.twitter.com/widgets.js', false, false, true );

});