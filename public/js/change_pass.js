
$(document).on('click','.show_modal_user', function(e){
  $('#modal_user').find('label.error').remove();
  $('#modal_user').find('.form-control').val('');
  $('#modal_user').modal('show');
  // valido l hacer click para que se ejecute correctamente
  $('#form_change_pass').validate({
      rules : {
          password : {
              minlength : 5
          },
          password_confirm : {
              minlength : 5,
              equalTo : "#password"
          }
      },
      errorPlacement: function (error, element) {
          if (element.parent().hasClass('input-group')) {
              error.insertAfter(element.parent());
          } else {
              error.insertAfter(element);
          }
      }
  });
});




$(document).on('click','.show_pass_active', function(e){
     object = $(this);
    this_show = object.hasClass('show_pass');
  // restaura Todos
  object.parents('.inputs_paswords').find('i').removeClass('fa-eye');
  object.parents('.inputs_paswords').find('i').addClass('fa-eye-slash');
  object.parents('.inputs_paswords').find('input').attr('type','password');
  object.parents('.inputs_paswords').find('.show_pass_active').removeClass('show_pass');
  // cambia el seleccionado
  if (this_show) {
      object.find('i').removeClass('fa-eye');
      object.find('i').addClass('fa-eye-slash');
      object.removeClass('show_pass');
      object.parent('div').parent('div').find('input').attr('type','password');
  }else{
      object.find('i').addClass('fa-eye');
      object.find('i').removeClass('fa-eye-slash');
      object.addClass('show_pass');
      object.parent('div').parent('div').find('input').attr('type','text');
  }
});
