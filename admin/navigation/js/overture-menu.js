/* (function () {
    'use strict';
    jQuery('.hamburger-menu').click(function (e) {
        e.preventDefault();
        if (jQuery(this).hasClass('active')) {
            jQuery(this).removeClass('active');
            jQuery('.menu-overlay').fadeToggle('fast', 'swing');
            jQuery('.menu .menu-list').slideToggle('slow', 'swing');
            jQuery('#mobile-menu-dd').delay(250).fadeToggle('fast', 'swing');
            //jQuery('.hamburger-menu-wrapper').toggleClass('bounce-effect');
        } else {
            jQuery(this).addClass('active');
            jQuery('.menu-overlay').fadeToggle('fast', 'swing');
            jQuery('.menu .menu-list').slideToggle('slow', 'swing');
            jQuery('#mobile-menu-dd').delay(350).fadeToggle('fast', 'swing'); 
            //jQuery('.hamburger-menu-wrapper').toggleClass('bounce-effect');
        }
    })
})(); */


jQuery('#primary-mobile-nav-menu li.menu-item-has-children').each(function(){
    jQuery(this).append('<div class="abs-mobile-icon"><i class="mobile-dd-icon fas fa-chevron-down"></i></div>');
});

jQuery('#primary-mobile-nav-menu .abs-mobile-icon').click(function (event) {
    console.log('clicked');
    jQuery(this).prev().slideToggle( 'fast', 'swing' );
    jQuery(this).find('.mobile-dd-icon').toggleClass("rot");
});