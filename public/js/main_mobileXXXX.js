$(document).on('click','.btn-main', function(e){

    main = $('#main-mobile');
    if (main.hasClass('show')) {
        main.removeClass('show');
        $('#bg-block').fadeOu();
    }else{
        $('#bg-block').fadeIn();
        main.addClass('show');
    }

});
