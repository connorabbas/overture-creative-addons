(function () {
    'use strict';
    jQuery('.ham-1').click(function (e) {
        e.preventDefault();
        jQuery('#push-menu-outer').delay(350).css('margin-right', '0');
        jQuery('#push-menu-outer').toggleClass('shadow');
        jQuery(this).fadeToggle('fast', 'swing');
        jQuery('#push-overlay').fadeToggle('slow', 'swing');
        jQuery('#push-overlay').addClass('open');
        jQuery('#push-overlay').removeClass('closed');
        //jQuery('#push-overlay').toggleClass('zoomed-in');
    });
    jQuery('.ham-2').click(function (e) {
        e.preventDefault();
        collpasePushMenu();
    });
    jQuery('#push-overlay').click(function (e) {
        e.preventDefault();
        collpasePushMenu();
    });
})();

function collpasePushMenu(){
    jQuery('#push-menu-outer').delay(250).css('margin-right', '-300px');
    jQuery('#push-menu-outer').toggleClass('shadow');
    jQuery('.ham-1').fadeToggle('slow', 'swing');
    jQuery('#push-overlay').fadeToggle('slow', 'swing');
    jQuery('#push-overlay').removeClass('open');
    jQuery('#push-overlay').addClass('closed');
    //jQuery('#push-overlay').toggleClass('zoomed-in');
}


jQuery('#primary-mobile-nav-menu li.menu-item-has-children').each(function(){
    jQuery(this).append('<div class="abs-mobile-icon"><i class="mobile-dd-icon fas fa-chevron-down"></i></div>');
});

jQuery('#primary-mobile-nav-menu .abs-mobile-icon').click(function (event) {
    console.log('clicked');
    jQuery(this).prev().slideToggle( 'fast', 'swing' );
    jQuery(this).find('.mobile-dd-icon').toggleClass("rot");
});

jQuery(window).resize(function() {
    updateContainer();
});
function updateContainer() {
    var width = jQuery(window).width();
    if (width > 991 && jQuery('#push-overlay').hasClass('open')) {
        collpasePushMenu();
    }
}
