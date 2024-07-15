$(document).ready(function() {
    $("body .validateN").each(function(){
        // $(this).hide();
        $(this).validate({
            errorPlacement: function (error, element) {
                if (element.parent().hasClass('input-group')) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });

    langJqueryV = {
      "es" : {
         required: "Este campo es obligatorio.",
         remote: "Por favor, rellena este campo.",
         email: "Por favor, escribe una dirección de correo válida",
         url: "Por favor, escribe una URL válida.",
         date: "Por favor, escribe una fecha válida.",
         dateISO: "Por favor, escribe una fecha (ISO) válida.",
         number: "Por favor, escribe un número entero válido.",
         digits: "Por favor, escribe sólo dígitos.",
         creditcard: "Por favor, escribe un número de tarjeta válido.",
         equalTo: "Los campos de las contraseñas no coinciden.",
         accept: "Por favor, escribe un valor con una extensión aceptada.",
         maxlength: "Por favor, no escribas más de {0} caracteres.",
         minlength: "Por favor, no escribas menos de {0} caracteres.",
         rangelength: "Por favor, escribe un valor entre {0} y {1} caracteres.",
         range: "Por favor, escribe un valor entre {0} y {1}.",
         max: "Por favor, escribe un valor menor o igual a {0}.",
         min: "Por favor, escribe un valor mayor o igual a {0}."

      },
       "en" : {

          required: "Required.",
          remote: "Please fix this field.",
          email: "Wrong email.",
          url: "Please enter a valid URL.",
          date: "Please enter a valid date.",
          dateISO: "Please enter a valid date (ISO).",
          number: "Please enter a valid number.",
          digits: "Please enter only digits.",
          creditcard: "Please enter a valid credit card number.",
          equalTo: "Please enter the same value again.",
          accept: "Please enter a value with an accepted extension.",
          maxlength: "Please enter no more than {0} characters.",
          minlength: "Please enter at least {0} characters.",
          rangelength: "Please enter a value between {0} and {1} characters long.",
          range: "Please enter a value between {0} and {1}.",
          max: "Please enter a value less than or equal to {0}.",
          min: "Please enter a value greater than or equal to {0}."
       },

    }

langJqueryV[n]['date'],


  jQuery.extend(jQuery.validator.messages, {
    required: langJqueryV[n]['required'],
    remote: langJqueryV[n]['remote'],
    email: langJqueryV[n]['email'],
    url: langJqueryV[n]['url'],
    date: langJqueryV[n]['date'],
    dateISO: langJqueryV[n]['dateISO'],
    number: langJqueryV[n]['number'],
    digits: langJqueryV[n]['digits'],
    creditcard: langJqueryV[n]['creditcard'],
    equalTo: langJqueryV[n]['equalTo'],
    accept: langJqueryV[n]['accept'],
    maxlength: jQuery.validator.format(langJqueryV[n]['maxlength']),
    minlength: jQuery.validator.format(langJqueryV[n]['minlength']),
    rangelength: jQuery.validator.format(langJqueryV[n]['rangelength']),
    range: jQuery.validator.format(langJqueryV[n]['range']),
    max: jQuery.validator.format(langJqueryV[n]['max']),
    min: jQuery.validator.format(langJqueryV[n]['min'])
  });

});
