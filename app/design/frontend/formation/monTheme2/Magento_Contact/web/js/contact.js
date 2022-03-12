 // utilisation de jquery
 
 define([
    'jquery'
], function ($) {
    'use strict';

    $.widget('mage.contact', {
        //se lance au moment de l'appel
        _create:function () {
            //mes propriétés css pour l'element
            $('.pagebuilder-button-primary').css('margin', '10px');
            $('.objet').css('margin-bottom', '50px');
            $('.objet').css('margin-left', '200px');
            $('.objet').css('width', '250px');

            $('.bord').css("border", "3px solid violet");
            $('.bord').css("width", "400px");

            //lien "mon compte"
           // $('.header li').first().remove();

            $('.rouge').css('color', 'red');

            $('.pagebuilder-button-primary').on('click', function() {
                $('.mon-toggle').toggle();
              });
        }
    });

    return $.mage.contact;
});
