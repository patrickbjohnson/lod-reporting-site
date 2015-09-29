<?php
/* ------------------------------------------------------------
 *
 * THEME INIT
 * 
 * Include function.php files needed for the theme.
 * 
 * ------------------------------------------------------------ */


/* ------------------------------------------------------------ */
/** Add Theme Support */
/* ------------------------------------------------------------ */

require_once(__DIR__ . '/theme-support.php');


/* ------------------------------------------------------------ */
/** Include Benchpress Lib */
/* ------------------------------------------------------------ */

require_once(__DIR__ . '/lib/benchpress/load.php');


/* ------------------------------------------------------------ */
/** Theme includes */
/* ------------------------------------------------------------ */

require_once(__DIR__ . '/admin.php');
require_once(__DIR__ . '/ajax.php');
require_once(__DIR__ . '/menus.php');
require_once(__DIR__ . '/helpers.php');
require_once(__DIR__ . '/image-sizes.php');
require_once(__DIR__ . '/scripts.php');
require_once(__DIR__ . '/styles.php');
require_once(__DIR__ . '/post-types.php');
require_once(__DIR__ . '/taxonomies.php');
require_once(__DIR__ . '/roles.php');