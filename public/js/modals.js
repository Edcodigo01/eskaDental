// modal delete
$(document).on('click','.show_modal_delete', function(e){
    method = 'POST';
    action = $(this).attr('data-url');
    title = lang[n]['esta_seguro_de_borrar'];
    subtitle  = lang[n]['los_elementos_borrados_se_moveran'];
    show_modal_alert(action,method,title,subtitle);

});

$(document).on('click','.show_modal_restore', function(e){
    method = 'POST';
    action = $(this).attr('data-url');
    title = lang[n]['esta_seguro_de_restablecer'];
    subtitle  = '';
    show_modal_alert(action,method,title,subtitle);

});

function show_modal_alert(action,method,title,subtitle){
    form = $('#modal_alert').find('form');
    form.find('.title').html('');
    form.find('.subtitle').html('');
    form.find('.title').html(title);
    form.find('.subtitle').html(subtitle);
    $(form).attr('action',action);
    $(form).attr('method',method);
    $('#modal_alert').modal({backdrop: 'static', keyboard: false});
}
// -----------
$(document).on('click','.showModalAjax', function(e){
  showModalAjax($(this));
});

function showModalAjax(btn){
    showLoader();
    url = btn.attr('data-url');
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method:'POST',
        url:url,
        error:function(error){
            console.log(error);
            warning(ERROR_PETICION);
            hideLoader();
        },
        success:function(result){
            if(result.result == 'error'){
                if (result.noAuth == 'yes') {
                    window.location.href =  result.url;
                    return;
                }
                warning(result.message);
                hideLoader();
                return;
            }
            if (result.width) {
                if (result.width == 'lg') {
                    $('#modalAjax').find('.modal-dialog').addClass('modal-lg');
                    $('#modalAjax').find('.modal-dialog').removeClass('modal-xl');
                }else if (result.width == 'xl') {
                    $('#modalAjax').find('.modal-dialog').addClass('modal-xl');
                    $('#modalAjax').find('.modal-dialog').removeClass('modal-lg');
                }else if (result.width == 'sm') {
                    $('#modalAjax').find('.modal-dialog').removeClass('modal-lg');
                    $('#modalAjax').find('.modal-dialog').removeClass('modal-xl');
                    $('#modalAjax').find('.modal-dialog').addClass('modal-sm');
                }else{
                    $('#modalAjax').find('.modal-dialog').removeClass('modal-lg');
                    $('#modalAjax').find('.modal-dialog').removeClass('modal-xl');
                }
            }

            $('#viewAjaxModal').html(result.html);
            if (result.ckedit) {
                 setCkedit(result.ckedit,'#modalAjax',20000);
            }

            if (result.imgDropzone) {
                imgDropzone('#formDropzone');
            }

            $(this).find('.form-control').filter(':first').focus();

            $('#modalAjax').find('.validateN').validate({
                errorPlacement: function (error, element) {
                    if (element.parent().hasClass('input-group')) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $('#modalAjax').on('shown.bs.modal', function () {
                first_input = $('#modalAjax').find('input:visible:enabled:first');
                val = first_input.val();
                first_input.focus().val('').val(val);
            });


            $('#modalAjax').modal({backdrop: 'static', keyboard: false});
            hideLoader();
        }
    });
}

function setCkedit(name,parent,limit){
    element = $(parent).find('textarea[name="'+name+'"]');
    loaderSection(element);
    url_upload = $('#url-upload').val();
    $('.modal').on('shown.bs.modal', function () {
        CKEDITOR.replace(name,
        {
           language: 'es',
            wordcount: {
                showCharCount: true,
                maxCharCount: limit,
                filebrowserUploadUrl: url_upload,
                filebrowserUploadMethod: 'form'
            }
        });
        CKEDITOR.on('instanceReady',function () {
           hideLoaderSection(element);
        });
    });
}
