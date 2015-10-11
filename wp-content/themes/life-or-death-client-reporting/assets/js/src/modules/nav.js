// 'use strict';

// /*-------------------------------------------- */
// /** Requires */
// /*-------------------------------------------- */

var $ = require('jQuery');


// -------------------------------------------- 
// /** Exports */
// /*-------------------------------------------- */

module.exports = function (el) {
    var isActive = false, 
    	$nav = $('.nav'),
    	$menu = $('.menu');

    $menu.on('click', toggleNav);

    function toggleNav() {
    	if (isActive) {
    		closeNav();
    	} else {
    		openNav();
    	}
    }

    function openNav() {
    	isActive = true;
    	$nav.addClass('nav--is-open');
    }

    function closeNav() {
    	isActive = false;
    	$nav.removeClass('nav--is-open');
    }


};

