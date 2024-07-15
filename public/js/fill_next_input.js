// slug next input
$(document).on('change','.on_change_next_input', function(e){

    object = $(this);
    next = object.attr('data-next_input');
    next = object.parents('div').find(next);
    subcategories = object.attr('data-subcategories');
    var value = $(object).val();

    // if (value.length == 0) {
    //     return;
    // }
    if (value.length == 0) {
        next.html('');
        next.parent('div').hide();
        return;
    }else{
        id = $(object).find('option[value='+value+']').attr('data-id');
    }

    on_change_next_input(next,id,subcategories);
});

$(document).on('change','.on_change_next_input_id', function(e){

    object = $(this);
    next = object.attr('data-next_input');
    next = object.parents('div').find(next);
    subcategories = object.attr('data-subcategories');
    var value = $(object).val();
    // if (value.length == 0) {
    //     return;
    // }
    if (value.length == 0) {
        next.html('');
        next.parent('div').hide();
        return;
    }else{
        id = $(object).find('option[value='+value+']').attr('data-id');
    }
    on_change_next_input(next,id,subcategories,'id');
});


function on_change_next_input(next,id,subcategories,idOrSlug){
    subcategories = JSON.parse(subcategories);
    relateds = [];
    $.each(subcategories, function( index,sub ) {
        console.log(id);
        if (id == sub.category_id) {
            relateds.push(sub);
        }
    });

    $(next).html('');
    number = 0;
    if (idOrSlug == 'id') {
        $(next).append('<option value="">Opciones</option>');
        $.each(relateds, function(i, value) {
            $(next).append('<option data-id="'+value.id+'" value="'+value.id+'">'+value.name+'</option>');
            number = number + 1;
            console.log(value);
        });
    }else{

        $(next).append('<option value="">Todas</option>');
        $.each(relateds, function(i, value) {

            $(next).append('<option data-id="'+value.id+'" value="'+value.slug+'">'+value.name+'</option>');
            number = number + 1;
        });
    }
    $(next).append('<option value="otra">Otra</option>');

    if (number == 0) {
        $(next).parent('div').fadeOut();
    }else{
        $(next).parent('div').fadeIn();
    }
}


// $(document).on("change", ".changeFill", function(){
//     var value = $(this).val();
//     if (value.length != 0) {
//         $(this).addClass('text-danger');
//     }else {
//         $(this).removeClass('text-danger');
//     }
//     if ($(this).parent().hasClass('input-group')) {
//       $(this).parent().next('label.error').remove();
//     }else{
//       $(this).next('label.error').remove();
//     }
//     fill(this,'ocultar','yes');
// });


$(document).ready(function() {
    // ese elemento se oculta con javascript para que al mostrarlo muestre su tamaño correcto
    $('.hideJava').hide();
});
// agrega una opción extra llamada otros para filtrar los elementos si subcategorías

$(document).on("change", ".fill_next", function(){
    var value = $(this).val();
    $(this).parent().find('label.error').remove();
    fill(this,'ocultar','no','no','id');
});

$(document).on("change", ".fill_next_extra_other", function(){
    var value = $(this).val();
    $(this).parent().find('label.error').remove();
    fill(this,'ocultar','no','yes');
});

function fill(este,action,multilang,extra_other,idOrSlug){
    var url = $(este).attr('data-url');
    var subcategoriesCount = $(este).attr('data-subcategoriesCount');
    if (url.length == 0 || subcategoriesCount == 0) {
        hideLoader();
        return
    }
    showLoader();
    var slug = $(este).val();
    var field_id = $(este).attr('data-next_input');

    var fill = field_id;
    var lang2 = $('html').attr('lang');
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: "POST",
        url: url,
        data:{slug:slug},
    }).fail(function(error) {
        console.log(error);
        warning(lang[n]['error_petición']);
        $(this).val('');
        hideLoader();
    }).done(function(data) {
        console.log(data);

        $(fill).html('');
        number = 0;
        $(fill).append('<option value="">'+lang[n]['Opciones']+'</option>');
        // $(fill).addClass('text-danger');
        if(multilang == 'yes'){
            $.each(data.data, function(i, value) {
                console.log(value);
                $(fill).append('<option value="'+value.id+'">'+value['name'+lang2]+'</option>');
                number = number + 1;
            });
        }else{
            if (idOrSlug == 'id') {
                $.each(data.data, function(i, value) {
                    console.log(value);
                    $(fill).append('<option value="'+value.id+'">'+value.name+'</option>');
                    number = number + 1;
                });
            }else{
                $.each(data.data, function(i, value) {
                    console.log(value);
                    $(fill).append('<option value="'+value.slug+'">'+value.name+'</option>');
                    number = number + 1;
                });
            }

        }
        if (extra_other == 'yes') {
            $(fill).append('<option value="otra">'+lang[n]['Otra']+'</option>');
        }
        if(action == 'ocultar'){

            if (number == 0) {
                $(fill).parent('div').hide();
                $(fill).val('');
            }else{
                $(fill).addClass('text-grey');
                $(fill).parent('div').show();

            }
        }
        // if(action == 'ocultar'){
        // --------------
        // if (includeOthers == 'yes') {
        //     if(number > 1){
        //         $(fill).parent('div').show();
        //     }else{
        //         $(fill).parent('div').hide();
        //         $(fill).val('');
        //     }
        // }else{
        //     if(number > 0){
        //         $(fill).parent('div').show();
        //     }else{
        //         $(fill).parent('div').hide();
        //     }
        // }
        // ---------------------
        // }else{
        //     if(number > 0){
        //         $(fill).attr('readonly',false);
        //     }else{
        //         $(fill).attr('readonly',true);
        //         $(fill).html('');
        //         $(fill).append('<option selected value="" class="text-danger"><span class="text-danger">'+lang2[n]['No_result']+'</span></option>');
        //         if(fill.hasClass('countries')){
        //             $('.cities').val('');
        //             $('.cities').attr('readonly',true);
        //         }
        //     }
        // }
        hideLoader();
    });
}
