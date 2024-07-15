
function existCheckbox(este){
   checkboxes = 0;
   checkboxChecked = 0;
   $.each($(este).find(':checkbox').filter(':visible'), function( index,value ) {
      checkboxes = checkboxes + 1;
      if($(value).is(':checked')){
           checkboxChecked = checkboxChecked + 1;
      }
   });

   if (checkboxes != 0) {
     if (checkboxChecked == 0) {
       $(este).find(':checkbox').last().parent('.clickOnInput').next('label.error').remove();
       $(este).find(':checkbox').last().parent('.clickOnInput').after('<label class="error" style="width:100%">Debe seleccionar una opción.</label>');
       return false;

     }
   }
}

function existRadios(este){
   radios = 0;
   radiosChecked = 0;
   $.each($(este).find(':radio').filter(':visible'), function( index,value ) {
      radios = radios + 1;
      if($(value).is(':checked')){
           radiosChecked = radiosChecked + 1;
      }
   });
   if (radios != 0) {
     if (radiosChecked == 0) {
        $(este).find(':radio').last().parent('.clickOnInput').next('label.error').remove();
        $(este).find(':radio').last().parent('.clickOnInput').after('<label class="error" style="width:100%">Debe seleccionar una opción.</label>');
        return false;
     }
   }
}

function validateForms(element){
   $.each($(element).find('form'), function( index,form ) {
      $(form).validate({
         errorPlacement: function (error, element) {
            if (element.parent().hasClass('input-group')) {
               error.insertAfter(element.parent());
            } else {
               error.insertAfter(element);
            }
        }
      });
   });
}

function show_form_errors(error,form){
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
          warning(lang[n]['Datos_invalidos']);
      }else{
          warning(lang[n]['error_petición']);
      }
  }else{
      warning(lang[n]['error_petición']);
  }
}

$(document).ready(function() {
    $(document).on('submit','.formula', function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        if(existRadios(this) == false){
          return;
        }

        if(existCheckbox(this) == false){
           return;
        }

        showLoader();
        form = $(this);
        formMethod = $(this).attr('method');
        route = $(this).attr('action');
        formData = $(this).serialize();
        form_id = $(form).attr('id');
        if(form.attr('id') == 'uploadVideo' || form.hasClass('updateVideo')){
            url = $(form).find('.videoUrl').val();
            var matches = url.match(/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/);
            if (matches) {
            } else {
                warning('La url del video es invalida.');
                hideLoader();
                return false;
            }
        }
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method:formMethod,
            url:route,
            data:formData,
            error:function(error){
                console.log(error);
                show_form_errors(error,form);
                hideLoader();
            },
            success:function(result){
                $(form).find('.error').remove();
                console.log(result);

                if(result.result == 'error'){
                    if (result.noAuth == 'yes') {
                        window.location.href =  result.url;
                        return;
                    }else if(result.action == 'errorInfo'){
                        showModalWarningInfo('',result.message)
                    }
                    console.log(result);
                    warning(result.message);
                    hideLoader();

                    return;
                }else if (result.result == 'redirect') {
                    window.location.href =  result.url;
                    return;
                }else if (result.result == 'reload-login') {
                  url = $(location).attr('href');
                  country = '/'+result.country+'/';
                   if (url.includes('/us/')) {
                     url = url.replace('/us/',country)
                   }else if (url.includes('/mx/')) {
                     url = url.replace('/mx/',country)
                   }else{
                     url = url.replace('/ca/',country)
                   }

                    location.href = url;
                    return;
                }else if (result.result == 'updateCommentModal') {
                   if (window.location.href.includes('/post/') || window.location.href.includes('/company-details/')) {

                     $(result.replaceText).html(result.viewPost);
                  }else{

                     $(result.replaceText).html(result.viewMypost);
                  }

                   $('.modal').modal('hide');
                   success(result.message);
                   hideLoader();
                   return;
                }

                if (result.result == 'new answer') {

                   if (window.location.href.includes('/post-comments') || window.location.href.includes('/my-transport-company-comments')) {
                      // alert(result.askpost_id);
                      $(".ask"+result.askpost_id).html(result.view2);

                   }else{

                      $(".answers"+result.askpost_id).html(result.view);
                   }

                   success(result.message);
                   hideLoader();
                   $('.modal').modal('hide');
                   return;
                }

                if (result.action == 'viewAjax') {


                    clase = result.clase;

                    viewAjax(clase);
                    $('.modal').modal('hide');
                    success(result.message);
                    if (result.updateNotiTo == 'postsNotVerified') {
                        $('.postsNotVerified').html(result.numberNoti);
                        if (result.numberNoti == 0) {
                            $('.postsNotVerified').hide();
                            $('.postsNotVerified').addClass('bg-secondary');
                            $('.postsNotVerified').removeClass('bg-danger');
                        }else{
                            $('.postsNotVerified').show();
                            $('.postsNotVerified').addClass('bg-danger');
                            $('.postsNotVerified').removeClass('bg-secondary');
                        }
                    }else if(result.updateNotiTo = 'companiesNotVerified'){
                        $('.companiesNotVerified').html(result.numberNoti);
                        if (result.numberNoti == 0) {
                            $('.companiesNotVerified').hide();
                            $('.companiesNotVerified').addClass('bg-secondary');
                            $('.companiesNotVerified').removeClass('bg-danger');
                        }else{
                            $('.companiesNotVerified').show();
                            $('.companiesNotVerified').addClass('bg-danger');
                            $('.companiesNotVerified').removeClass('bg-secondary');
                        }
                    }

                }else if(result.action == 'viewAjaxAsks'){
                     $(form).find('input').filter(':visible').val('');

                     viewAjax('.viewAjaxAsks');
                     hideLoader();
                     success(result.message);
                     return;
                }else if(result.action == 'list-table'){
                    updateTable();
                    $('.modal').modal('hide');
                    success(result.message);
                    if (result.updateNotiTo == 'usersNotVerified') {
                        $('.usersNotVerified').html(result.numberNoti);
                        if (result.numberNoti == 0) {
                            $('.usersNotVerified').hide();
                            $('.usersNotVerified').addClass('bg-secondary');
                            $('.usersNotVerified').removeClass('bg-danger');
                        }else{
                            $('.usersNotVerified').show();
                            $('.usersNotVerified').addClass('bg-danger');
                            $('.usersNotVerified').removeClass('bg-secondary');
                        }
                    }
                }else if(result.action == 'redirect'){
                    window.location.href =  result.url;
                    return;
                 }else if(result.action == 'modalSuccessRestorePass'){
                   $('#modalSuccessRestorePass').modal({backdrop: 'static', keyboard: false});

                }else if(form.attr('data-do') == 'reloadViewAjax' || route.includes('my-transport-company-edit')){

                    $('.modal').modal('hide');
                    viewAjax('','','imgDropzone');
                    // setCkedit('descriptiones');
                    // setCkedit('descriptionen');
                    success(result.message);
                    if ($(form).hasClass('formEdit')) {
                       id = $(form).attr('id');
                       $('html, body').animate({
                       scrollTop: parseInt($('#'+id).offset().top)  - parseInt(150)
                       }, 1000);
                    }
                    // hideLoader();
                    return;
                }else if (route.includes('validate-login-email')) {

                    $('#content-login').html(result);
                    $('#formLogin').validate({
                        errorPlacement: function (error, element) {
                            if (element.parent().hasClass('input-group')) {
                                error.insertAfter(element.parent());
                            } else {
                                error.insertAfter(element);
                            }
                        }
                    });
                    hideLoader();
                    return;
                }else if (form.attr('id') == 'formModalViewAjax') {
                    viewAjax();
                    $('.modal').modal('hide');
                    var height = 0;
                    success(result.message);
                    return;
                }else if (result.action == 'reload') {
                    location.reload();
                    return;
                }else if(result.action == 'showModalInfo'){
                    $('.modal').modal('hide');
                    showModalSuccess('',result.message);
                    $(form).find('.message').val('');
                }else if(form.attr('id') == 'formCreate'){
                    $('#filtro1').val('');
                    cancelModal('#modalCreate','#formCreate');
                    success(result.message);
                    updateTable('.listar','si');
                }else if(form.attr('id') == 'formRegister'){
                    $('#modalRegister').modal('hide');
                    $('.textModal').hide();
                    $('.textSendMailConfirmRegister').show();
                    $('#modalSuccess').modal('show');
                }else if(form.hasClass('formAnswerAjax')){

                    if (result.result == 'updateComment') {
                        $(form)[0].reset();
                        $(form).find('.campoEditAnswer').val(result.comment);
                        $(form).parent('.divEdit').hide();
                        $(form).parent('.divEdit').prev('.answer').show();
                        $(form).parent('.divEdit').prev('.answer').find('.answerContent').html(result.comment);
                        // $(form).prev('.answer').find('.editAnswer').html(result.comment);
                        success(result.message);
                        hideLoader();
                        return;
                    }
                    $(form)[0].reset();
                    success(result.message);
                    // $('.newsAnswers')
                    console.log(result);
                    $(form).parent('.divQuestion').parent('.answers').find('.newsAnswers').show();
                    $(form).parent('.divQuestion').parent('.answers').find('.newsAnswers').append('<p style="padding:0;margin:0" class="ml-4 py-1 text-secondary answer">  <i class="far fa-comment-alt mr-1 fa-flip-horizontal"></i> <strong>'+result.user.nameShow+':</strong> <span class="answerContent" style="font-size:14px">'+result.answer.answer+'</span> <a class="link editAnswer" style="font-size:12px">Editar </a></p><div class="divEdit card p-1 bg-yellow-g ml-4" style="display:none"><form class="formula formAnswerAjax" action="'+result.routeUpdate+'" method="PUT"><input type="hidden" name="askpost_id" value="'+result.answer.id+'" class="form-control"><div class=" font600">'+result.user.nameShow+':</div><div class="form-inline  mt-2"><div style="width:70%"><input name="answer" type="text" maxlength="255" class="campoEditAnswer form-control form-control-sm required enableNext" placeholder="Escriba su respuesta" style="width:100%" autocomplete="off" value="'+result.answer.answer+'"></div><div style="width:30%"><div class="form-inline"><a class="cancelEdit btn btn-sm btn-light ml-1 text-danger" type="buttom" >cancelar</a><button class="enableDisable btn btn-sm btn-primary ml-1" type="submit" disabled>Actualizar</button></div></div></div></form></div>');
                    $(form).find('.enableDisable').attr('disabled',true);
                    $(form).parent('.divQuestion').hide();
                    $(form).parent('.divQuestion').parent('.answers').find('.showQuestion').show();
                    $(form).parent('.divQuestion').parent('.answers').find('.showAllAsks').find('.numberAnswer').html(result.answerCount);
                }else if(form.attr('id') == 'formAjaxNoModal'){
                    $(form)[0].reset();
                    $(form).find('.enableDisable').attr('disabled',true);
                    $(form).find('.form-control').blur();
                    viewAjax();
                    success(result.message);
                }else if(form.attr('id') == 'formDisable'){
                    $('#modalDisable').modal('hide');
                    warning(result.message);
                    updateTable('.listar','si');
                }else if(form.attr('id') == 'formEnable'){
                    $('#modalEnable').modal('hide');
                    success(result.message);
                    updateTable('.listar','si');
                }else if(form.attr('id') == 'messageContact'){
                    $('#btnFormContact').attr('disabled',true);
                    success(result.message);
                    grecaptcha.reset();
                    $(form).find('.form-control').each(function() {
                        $(this).val('');
                    });
                }else if(form.attr('id') == 'formEditAjax' || form.attr('id') == 'formCreateAjax' || form.attr('id') == 'uploadVideo' || form.attr('id') == 'updateAjax' || form.attr('id') == 'deleteAjax' ){
                    viewAjax('.viewAjax');
                    success(result.message);
                    $('.modal').modal('hide');
                }else if(form.attr('id') == 'formDelete'){
                    $('#modalDelete').modal('hide');
                    danger(result.message);
                    updateTable('.listar','si');
                }else if(form.attr('id') == 'formEdit'){
                    $(form).attr('action','');
                    $('#modalEdit').modal('hide');
                    success(result.message);
                    updateTable('.listar','si');
                }else{
                    $('.modal').modal('hide');
                }
                hideLoader();
                return 'ok';
            }
        });
    });
});



function formValidateExist2(este){
   $(este).parents('form').find('button[type="submit"]').attr('disabled',true);
    value = $(este).val();
    name = $(este).attr('name');
    url = $(este).attr('data-url');

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:'post',
        url:url,
        data:{name:value},
        error:function(error){
            console.log(error);
            if ($(este).parent().hasClass('input-group')) {
              $(este).parent().parent('div').find('.text-checking').remove();
              $(este).parent().parent('div').find('label.error').remove();

            }else{
              $(este).parent('div').find('.text-checking').remove();
              $(este).parent('div').find('label.error').remove();

            }
            if (error.responseJSON != undefined) {
                lista = "";
                $.each(error.responseJSON.errors, function( index, value ) {
                    lista+= value;
                });
                errorExist = '<label class="error error-checking">'+lista+'</label>'
                if ($(este).parent().hasClass('input-group')) {
                  $(este).parent().after(errorExist);
                }else{
                  $(este).after(errorExist);
                }

            }else{
                warning('Error al hacer petición');
            }

            // $(este).parents('form').find('button[type="submit"]').attr('disabled',false);
        },
        success:function(result){
            console.log(result);
            if ($(este).parent().hasClass('input-group')) {
              $(este).parent().parent('div').find('.text-checking').remove();
              $(este).parent().parent('div').find('label.error').remove();

            }else{
              $(este).parent('div').find('.text-checking').remove();
              $(este).parent('div').find('label.error').remove();

            }
            if(result.result == 'error'){
                if (result.noAuth == 'yes') {
                    window.location.href =  result.url;
                    return;
                }
                warning(result.message);
            }

            if(result.result == 'exist'){
               return;
            }else{

            }

            if ($(este).parent().hasClass('input-group')) {
              $(este).parent().next('.text-checking').remove();
              $(este).parent().next('.error-checking').remove();
            }else{
              $(este).next('.text-checking').remove();
              $(este).next('.error-checking').remove();
            }

            $(este).parents('form').find('button[type="submit"]').attr('disabled',false);
            return false;
        }
    });
}

// llamado por algunos botones sin formulario
function formValidateExist(url,method,action,paramExtra){

    value = $(paramExtra).val();
    name = $(paramExtra).attr('data-name');
    if (name == 'name') {
        data = {name:value};
    }else{
        data = {nameShow:value};
    }
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:method,
        url:url,
        data:data,
        error:function(error){
            console.log(error);
            if (error.responseJSON != undefined) {
                lista = "";
                $.each(error.responseJSON.errors, function( index, value ) {
                    lista+= value;
                });
                $('.text-error-exist').show();
                $('.text-error-exist').html(lista);
                $(paramExtra).addClass('error');
            }else{
                warning('Error al hacer petición');
            }
            $(paramExtra).parent('div').find('.validateexisttext').hide();
            $(paramExtra).parents('.formula').find('.btn-confirm').attr('disabled',true);
        },
        success:function(result){
            console.log(result);
            if(result.result == 'error'){
                if (result.noAuth == 'yes') {
                    window.location.href =  result.url;
                    return;
                }
                warning(result.message);
            }

            if(result.result == 'exist'){
                $(paramExtra).parent('div').find('.validateexisttext').hide();
                $(paramExtra).parent('div').find('.text-error-exist').show();
                $(paramExtra).parent('div').find('.text-error-exist').html(result.message);
                $(paramExtra).addClass('error');
                $(paramExtra).parents('.formula').find('.btn-confirm').attr('disabled',true);
            }else{
                // $(paramExtra).parent('div').find('.text-error-exist').remove();
                // $(paramExtra).removeClass('error');
                // $(paramExtra).parents('.formula').find('.btn-confirm').attr('disabled',false);
            }
            $(paramExtra).parent('div').find('.validateexisttext').hide();
            return false;
        }
    });
}

function fillImages(result,parent){
    urlB = $('#urlNoLang').val();
    urlBase = $('#urlBase').val();
    urlImg = urlB+'/'+result.path;
    urlImageDelete = $('#urlImageDelete').val();
    urllistImgElement = $('#setImgP').val();
    urlImageDelete = urlImageDelete.replace('{id}',result.id);
    urllistImgElement = urllistImgElement.replace('{id}',result.id);

    if(result.principal == 'si'){
        btnImgP = '<p class="text-success font600 font14 m-0 p-1" style="position:absolute;bottom:0;background:rgba(255, 255, 255, 0.80);width:100%">Imagen principal</p>';
    }else {
        btnImgP = '<div class="" style="position:absolute;bottom:4px;width:100%">'+
            '<button data-url="'+urllistImgElement+'" type="button" name="button" class="setImageP btn btn-sm btn-purple mt-1 font13 m-auto">Convertir en principal</button>'+
        '</div>';
    }

    $(parent).append('<div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2 p-0">'+
      '<div class="contentImgLoad">'+
         '<button class="deleteImageCreate btn btn-danger btn-xs" title="Eliminar Imagen" style="position:absolute;right:5px;top:5px;" type="button" name="button" data-url="'+urlImageDelete+'"><i class="fas fa-times"></i> </button>'+
         '<img class="border" src="'+urlImg+'" alt="" style="width:100%;height:100%;object-fit:cover">'+
         btnImgP+
      '</div>'+
    '</div>');
}

function formAjax(url,method,action,paramExtra){
    if (action != 'searchP') {
        showLoader();
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:method,
        url:url,
        error:function(error){
            console.log(error);
            if (error.responseJSON != undefined) {
                lista = "";
                $.each(error.responseJSON.errors, function( index, value ) {
                    lista+='<li>'+value+'</li>'
                });
                warning('<ul style="padding:0;" class="ml-2">'+lista+'</ul>');
            }else{
                warning('Error al hacer petición');
            }
            hideLoader();
        },
        success:function(result){

            if(result.result == 'error'){
                if (result.noAuth == 'yes') {
                    window.location.href =  result.url;
                    return;
                }
                warning(result.message);
            }
            if(action == 'delete'){
                $(paramExtra).html('');
            }else if(action == 'imgDeleteToList'){
                // parent = paramExtra.find('.divImg')
                // $(paramExtra).remove();
                $('.contentDivImg').html('');
                $.each(result.data, function( index, value ) {
                    fillImages(value,'.contentDivImg');
                });
            }else if(action == 'addFavorite'){
                if(result.result == 'add'){
                    $(paramExtra).addClass('active');
                    success(result.message);
                }else {
                    $(paramExtra).removeClass('active');
                    warning(result.message);
                }
            }else if(action =='deleteHistoryUser'){
                idSelect = $(paramExtra).parents('a').attr('data-id');
                number = 0;
                $.each($('.slickHistoryUser').find('a'), function( index,value  ) {
                    if (idSelect == $(value).attr('data-id')) {
                        $('.slickHistoryUser').slick('slickRemove',index );
                    }
                    number = number +1;
                });
                if (number == 1) {
                    $('.slickHistoryUser').parents('.card').hide();
                }
            }else if (action == 'deleteHistoryUserDiv' || action == 'deleteHistoryDiv') {
                $(paramExtra).parents('a').remove();
                if (result.count == 0) {
                    $('.historyExist').hide();
                    $('.historyExistNo').show()

                }

            }else if (action == 'viewAjaxMessage') {
                viewAjax();
                success(result.message);
            }else if (action == 'searchP') {
                $(paramExtra).parent('form').find('.cardResultSearch').show();
            }

            hideLoader();
            return false;
        }
    });
}

function newNotifications(){
    value = $('#newNotificationsExist').val();
    value2 = $('#notificationsVerified').val();

    if (value == 'si') {
      $('#notificationsVerified').val(1);
      $('.numberNotifications').hide();
        viewAjax('.notificationsAjax');
        $('#newNotificationsExist').val('no');
    }else if(value2 != 1){
      $('#notificationsVerified').val(1);
      $('.numberNotifications').hide();
      url = $('#notificationsVerified').attr('data-url');
      formAjax(url,'get','searchP');
   }
}

$(document).on('click','.reloadViewAjax', function(e){
    var url = $(this).attr('data-url');
  viewAjax(undefined,url);
});

function addFilteres(url){
    var name1 = $('#filterReload1').attr('name');
    var val1 = $('#filterReload1').val();
    var name2 = $('#filterReload2').attr('name');
    var val2 = $('#filterReload2').val();
    var name3 = $('#filterReload3').attr('name');
    var val3 = $('#filterReload3').val();

    if (val1 == '' || val1 == undefined) {
        var value1 = '';
    }else{
        var value1 = '&'+name1+'='+val1;
    }

    var name2 = $('#filterReload2').attr('name');
    var val2 = $('#filterReload2').val();

    if (val2 == '' || val2 == undefined) {
        var value2 = '';
    }else{
        var value2 = '&'+name2+'='+val2;
    }

    var name3 = $('#filterReload3').attr('name');
    var val3 = $('#filterReload3').val();

    if (val3 == '' || val3 == undefined) {
        var value3 = '';
    }else{
        var value3 = '&'+name3+'='+val3;
    }

    if (url.includes('?')) {
        url = url.split('?');
        url = url[0];
    }

    if($('#numberPage').length != 0){
        numberPage = $('#numberPage').val();
        page ='page='+numberPage;
    }else{
        page = '';
    }

    url = url+'?'+page+value1+value2+value3;

    if (url.includes('?&')) {
        url = url.replace('?&','?');
    }

    if (url.split('?')[1].length == 0) {
        url = url.replace('?','');
    }
    return url;
}

function viewAjax(classView,route,paramExtra){

    if(classView == '' || classView == undefined){
        classView = '.viewAjax';
    }

    if(route == '' || route == undefined){
        route = $(classView).attr('data-route');
    }

    // parameters reloadViewAjax
    if (route != '' & route != undefined ) {
        if (!route.includes('view-ask-modal') & !route.includes('modal-cities-search-posts')) {
            route = addFilteres(route);
        }
    }

    if ($(classView).hasClass('loaderZone')) {
        hideLoader();
        loaderZone(classView);
    }

    if (classView != '.notificationsAjax') {
        showLoader();
    }

    if (route == '' || route == undefined) {
        hideLoader();
        return;
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:'POST',
        url:route,
        error:function(error){
            hideLoader();
            console.log(error);
            warning('Error al cargar vista');
        },
        success:function(result){
           $('.cke_notification').remove();
            if (result.result == 'error') {
                if (result.noAuth == 'yes') {
                    window.location.href =  result.url;
                    return;

                }
                warning(result.message);
                console.log(result);
                hideLoader();
                return;
            }


            $(classView).html(result);

            if (paramExtra == 'imgDropzone') {
               if ($('#imgDropzone').length != 0) {
                  dropzoneDestroy();
                  imgDropzone();

                  hideLoader();
                  return;
               }else if($('#formDropzone').length != 0){

                  dropzoneDestroy();
                  imgDropzone();

                  hideLoader();
                  return;

               }else{
                  hideLoader();
                  return;
               }

            }else if (classView == '.viewAjaxAsks') {
               // $('html, body').animate({
               // scrollTop: parseInt($('.viewAjaxAsks').offset().top)  - parseInt(200)
               // }, 1000);
               lastItem = $('#lastItemAjax').val();
               totalItem = $('#totalItemAjax').val();
               pageNow = $('#pageNow').val();

               if (pageNow != 1) {
                   $('.hideAllComments').show();
               }else{
                   $('.hideAllComments').hide();
               }
               if (lastItem == totalItem) {
                   $('.showMore').hide();
               }else{
                   $('.showMore').show();
               }
               $('#lastItem').html(lastItem);
               $('#totalItem').html(totalItem);
               hideLoader();
               return

            }

            if (classView == '#contentModalViewAjax') {

                if (route.includes('view-answer-modal') || route.includes('view-ask-modal') || route.includes('modal-internal-question-purchase/')) {
                    $('#modalViewAjax').on('shown.bs.modal', function () {
                        var height = 0;
                        $('.fatherScroll .contentScroll').each(function(i, value){
                            height += parseInt($(this).height());
                        });
                        height += '';
                        $('.fatherScroll').animate({scrollTop: height});
                    })
                }

                $('.formModalViewAjax').validate({
                    ignore: [],
                    errorPlacement: function (error, element) {
                        if (element.parent().hasClass('input-group')) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });

                if (paramExtra == 'lg') {
                    $('#modalViewAjax').find('.modal-dialog').addClass('modal-lg');
                    $('#modalViewAjax').find('.modal-dialog').removeClass('modal-xl');
                }else if (paramExtra == 'xl') {
                    $('#modalViewAjax').find('.modal-dialog').addClass('modal-xl');
                    $('#modalViewAjax').find('.modal-dialog').removeClass('modal-lg');
                }else{
                    $('#modalViewAjax').find('.modal-dialog').removeClass('modal-lg');
                    $('#modalViewAjax').find('.modal-dialog').removeClass('modal-xl');
                }

                $('#modalViewAjax').modal({backdrop: 'static', keyboard: false});
                $('#modalViewAjax').on('shown.bs.modal', function () {
                    $('#modalViewAjax').find('.form-control').first().focus();
                })

                newNumberNotifications = $('#newNumberNotifications').val();
                $('.numberNotifications').html(newNumberNotifications);
                if (newNumberNotifications == 0) {
                    $('.numberNotifications').hide();
                }
                hideLoader();
                return false;

            }else if(route.includes('edit-post-ajax') || route.includes('my-transport-company-edit-ajax')) {
                // setCkedit('descriptiones');
                // setCkedit('descriptionen');

                // activeValidationForms();
                validateForms('.validateForms');
                hideLoader();
                return
            }else if(route.includes('ask-post-list')){
                lastItem = $('#lastItemAjax').val();
                totalItem = $('#totalItemAjax').val();
                pageNow = $('#pageNow').val();

                if (pageNow != 1) {
                    $('.hideAllComments').show();
                }else{
                    $('.hideAllComments').hide();
                }
                if (lastItem == totalItem) {
                    $('.showMore').hide();
                }else{
                    $('.showMore').show();
                }
                $('#lastItem').html(lastItem);
                $('#totalItem').html(totalItem);
                hideLoader();
                return
            }else if(classView == '.loginEmailAjax'){
                $('#formLogin').validate({
                    errorPlacement: function (error, element) {
                        if (element.parent().hasClass('input-group')) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });
                hideLoader();
                return
            }else if (classView == '.viewAjaxProfile') {

                hideLoader();
                return
                // esto ahi cambiarlo por activeValidationForms
            }
            activeValidationForms();

            hideLoader();
        }
    });
}

function activeValidationForms(){
    showLoader();
    $('body').find('form').each(function() {
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
    hideLoader();
}

var enviando = false;
function checkSubmit() {
    if (!enviando) {
        enviando= true;
        return true;
    } else {
        //Si llega hasta aca significa que pulsaron 2 veces el boton submit
        return false;
    }
}

$(document).on('submit','.form-file', function(e){
    e.preventDefault();
    showLoader();
    form_data = new FormData();
    form_data.append('file', $('.inputFile')[0].files[0]);
    url = $(this).attr('action');
    method = $(this).attr('method');

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:method,
        url:url,
        data:form_data,
        processData: false,
        contentType: false,
        error:function(error){
            console.log(error);
            hideLoader();
            lista = "";
            $.each(error.responseJSON.errors, function( index, value ) {
                lista+='</li>'+value+'</li>'
            });
            warning('</ul>'+lista+'</ul>');
        },
        success:function(result){
            if (result.result == 'error') {
                if (result.noAuth == 'yes') {
                    window.location.href =  result.url;
                    return;

                }
                warning(result.message);
                return;
            }
            location.reload();
        }
    });
});
