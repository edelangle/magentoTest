 // utilisation de jquery
 define([
    'jquery'
], function ($) {
    'use strict';

    $.widget('mage.testCustomer', {
        //se lance au moment de l'appel
        _create:function () {
            //mes propriétés css pour l'element mon-menu
            $('.mon-menu').css('background-color', 'grey');
            $('.mon-menu').css('border-radius', '25px');
            $('.mon-menu').css('padding', '2%');
            $('.mon-menu').css('margin-bottom', '10px');
        }
    });

    return $.mage.testCustomer;
});
