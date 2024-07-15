$(document).on('click','.acordeon .open_content', function(e){

    var object = $(this);

    heightContent = object[0].offsetHeight;
    number = 0;
    $(object).parent('div').find('.content').find('a').each(function() {
        number = number + 1;
    });
    heightContent = heightContent * number;
    activo = object.hasClass('active');
    // cierra todos
    object.parents('.acordeon').find('.content').css('height',0);
    object.parents('.acordeon').find('.content').removeClass('show');
    object.parents('.acordeon').find('.open_content').removeClass('active');
    // --------------

    if (activo) {

        object.removeClass('active');
        object.parent('div').find('.content').removeClass('show');
        object.parent('div').find('.content').css('height',0);

    }else{
        object.addClass('active');
        object.parent('div').find('.content').addClass('show');
        object.parent('div').find('.content').css('height',heightContent);
    }


});
