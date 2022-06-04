/*  Theme Name: Blogezy - Responsive Blog Template
    Author: Zoyothemes
    Version: 1.0.0
    File Description:Main JS file of the template
*/
(function($) {

    'use strict';
    function initLeftMenuCollapse() {
        $('.button-menu-mobile').on('click', function (event) {
            event.preventDefault();
            $("body").toggleClass("enlarged");
        });
    }

    function init() {
        initLeftMenuCollapse();
    }
    init();

})(jQuery)


