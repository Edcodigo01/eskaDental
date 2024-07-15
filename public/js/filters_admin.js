// $(document).on('click','.orderBy', function(e){
//     showLoader();
//     value = $(this).attr('data-orderBy');
//     $('#filter_orderby').val(value);
//     filters();
// });

$(document).on('click','.search', function(e){
    // div_filters = $(this).parents('.filters').attr('data-filters');
    showLoader();

    filters();
});

function filters(div_filters){
    filters = '';
    $('.filters').find('.form-control').each(function(){
        object = $(this);
        value = object.val();
        if (value != undefined && value.length != 0) {
            name = object.attr('name');
            filter = '&'+name+'='+value;
            filters+=filter;
        }
    });

    url = window.location.href.split('?')[0];
    if (filters.length == 0) {
        window.location.href = url;
        return;
    }
    url = url+'?'+filters;
    url = url.replace('?&','?');
    window.location.href = url;
}


// Muestra boton vaciar y marca por colores segun seleccion a los selects
$(document).ready(function() {

    filtersCount = 0;
    $(".filters").find('.form-control').each(function(){
        object = $(this);
        if (object.val().length != 0) {
            console.log(object.val());
            if (object.val() == 'eliminados') {
                $(this).addClass('text-danger');
            }
            filtersCount = filtersCount + 1;
        }else{
            object.addClass('text-grey');
        }
    });

    if (filtersCount != 0) {
        $('.btn_empty_filters').show();
    }
});
