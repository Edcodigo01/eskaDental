function action_ajax(btn){
    showLoader();

    url = $(btn).attr('data-url');
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:'POST',
        url:url,
        error:function(error){
            console.log(error);
            warning(lang[n]['error_petición']);
            hideLoader();
        },
        success:function(result){

            if(result.result == 'error'){
                console.log(result);
                if (result.noAuth == 'yes') {
                    window.location.href =  result.url;
                    return;
                }
                warning(result.message);
                hideLoader();
                return;
            }else if (result.result == 'redirect') {
                window.location.href = result.url;
                return;
            }else if (result.result == 'append') {

            }else if (result.result == 'remove_element') {
                $(result.remove).remove();
                success(result.message);
            }else if (result.result = 'html') {
                $(result.viewReplace).html(result.html);
                success(result.message);
            }
            hideLoader();
        }
    });
}


$(document).ready(function() {
    $(document).on('submit','.formula', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        showLoader();
        form = $(this);
        form_method = $(this).attr('method');
        form_url = $(this).attr('action');
        form_data = $(this).serialize();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method:form_method,
            url:form_url,
            data:form_data,
            error:function(error){
                console.log(error);
                show_errors_form(error,form);
                hideLoader();
            },
            success:function(result){
                $(form).find('.error').remove();
                console.log(result);
                if(result.result == 'error'){
                    if (result.noAuth == 'yes') {
                        window.location.href =  result.url;
                        return;
                    }
                    warning(result.message);
                    hideLoader();
                    return;
                }else if (result.result == 'redirect') {
                    window.location.href = result.url;
                    return;
                }else if (result.result == 'listar_ajax') {
                    if (!result.view_appen) {
                        view_append = '#list';
                    }
                    // $(view_append).prepend(result.html);
                    listar_ajax();
                    success(result.message);
                    $('.modal').modal('hide');
                }else if (result.result == 'update') {

                    $(result.view_replace).html(result.html);
                    success(result.message);
                    $('.modal').modal('hide');
                }else if (result.result == 'datatable') {
                    list_table(result.url);
                    success(result.message);
                    $('.modal').modal('hide');
                }else if (result.result == 'error_input') {
                    input = $(form).find('input[name="'+result.input+'"]');
                    if (input.parent().hasClass('input-group')) {
                       input.parent().after('<label class="error">'+result.message+'</label>');
                    }else{
                      input.after('<label class="error">'+result.message+'</label>');
                   }
                    warning('Datos inválidos, verifique los campos e intente nuevamente.');
                }else if (result.result == 'hide_modal') {
                    $('.modal').modal('hide');
                    success(result.message);
                }
                hideLoader();
            }
        });
    });
});

function listar_ajax(list,url){
    showLoader();
    if (!list) {
        list = '#list';
    }
    if (url) {
        url = url;
    }else{
        url = window.location.href;
    }

    if (url.includes('?')) {
        url = url+'&view_ajax=true';
    }else{
        url = url+'?view_ajax=true';
    }
    
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:'GET',
        url:url,
        error:function(error){
            console.log(error);
            warning(lang[n]['error_petición']);
            hideLoader();
        },
        success:function(result){
            if(result.result == 'error'){
                console.log(result);
                if (result.noAuth == 'yes') {
                    window.location.href =  result.url;
                    return;
                }
                warning(result.message);
                hideLoader();
                return;
            }else{
                $(list).html(result);
            }
            hideLoader();
        }
    });
}




function show_errors_form(error,form){
   if(error.responseJSON != undefined){
      $('label.error').remove();
        errorsInputsCount = 0;
      $.each(error.responseJSON.errors, function( index, value ) {
         errortxt = '<label class="error">'+value+'</label>';
         textarea = $(form).find("textarea[name="+index+"]");
         if (textarea.length != 0 ) {
           errorsInputsCount = errorsInputsCount + 1;
            if (textarea.parent().hasClass('input-group')) {
               textarea.parent().after(errortxt);
            }else{
              textarea.after(errortxt);
           }
         }
         input = $(form).find("input[name="+index+"]");
      if (input.length != 0 ) {
          errorsInputsCount = errorsInputsCount + 1;
           if (input.parent().hasClass('input-group')) {
              input.parent().after(errortxt);
           }else{
            input.after(errortxt);
          }
      }
      select = $(form).find("select[name="+index+"]");
      if (select.length != 0 ) {
          errorsInputsCount = errorsInputsCount + 1;
          if (select.parent().hasClass('input-group')) {
            select.parent().after(errortxt);
          }else{
            select.after(errortxt);
          }
      }
      });

      if (errorsInputsCount != 0) {
          warning('Datos inválidos, verifique los campos e intente nuevamente.');
      }else{
          warning('Error al realizar petición');
      }
  }else{
      warning('Error al realizar petición');
  }
}
