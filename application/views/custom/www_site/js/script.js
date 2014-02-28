$(document).ready(function ($) {




    $('.main_menu').on ('click', function () {
       $('#drop_menu').slideToggle(500);
       return false;
    });


    $(document).click(function (e) {
        if ($(e.target).parents().filter('#drop_menu').length != 1) {

        }
    });



    $(window).resize(function () {
        console.log('window ' + $(window).width() + ' X ' + $(window).height());

    });


});