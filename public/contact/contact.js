

$(document).on('click','#cancel-message', function(e){

    form = $(this).parents('form');
    form.find('label.error').remove();
    form[0].reset();
});

$(document).on('submit','#form_contact', function(e){
    e.preventDefault();
    showLoader();
    form = $(this)
    url = form.attr('action');
    form_data = form.serialize();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:'POST',
        url:url,
        data:form_data,
        error:function(error){

            console.log(error);
            show_errors_contact(error,form);
            hideLoader();
        },
        success:function(result){

            if(result.result == 'error'){
                console.log(result);
                warning(result.message);
                hideLoader();
                return;
            }else{
                $(form).find('.form-control').val('');
                success(result.message);
            }
            hideLoader();
        }
    });
});
// igual que formularios pero para contact
function show_errors_contact(error,form){
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
          warning('Datos inválidos');
      }else{
          warning('Error al realizar petición');
      }
  }else{
      warning('Error al realizar petición');
  }
}
