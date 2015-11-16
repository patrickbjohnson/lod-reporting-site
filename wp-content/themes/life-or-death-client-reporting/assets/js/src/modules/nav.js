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


    $('.nav__item[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 20
            }, 1000);
            return false;
          }
        }
      });
};

