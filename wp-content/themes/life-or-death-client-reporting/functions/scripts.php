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
    //
    wp_enqueue_script( 'twitter', '//platform.twitter.com/widgets.js', false, false, true );

});