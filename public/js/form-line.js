$(document).ready(function() {
//     setTimeout(function(){
//         validateInputsEmpty()
//     },1000);
//
// });

// function validateInputsEmpty(){
//     $('.form-line').find('.form-control').each(function() {
//         object = $(this);
//         // alert(object.val());
//
//         if (object.val().length != 0) {
//             object.parents('div').find('label').css('margin-top','-21px');
//         }
//     });
// }


$(document).on('click mouseover','.form-line label', function(e){
    $(this).css('margin-top','-21px');
    $(this).parent('.form-group').find('.form-control').focus();
});

$(document).on('focus','.form-line .form-control', function(e){
    if ($(this).val().length == 0) {
        $(this).parents('.form-group').find('label').css('margin-top','-21px');
    }
});

$(document).on('blur','.form-line .form-control', function(e){
    if ($(this).val().length == 0) {
        $(this).parents('.form-group').find('label').css('margin-top','0px');
    }
});

if($('#PLACA').val() ==="" || $('#CEDULA').val() ===""){
  alert("No se ha detectado el campo PLACA Ni Cédula ");
  document.write("Redireccionando...");

}
