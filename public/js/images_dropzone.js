Dropzone.autoDiscover = false;
$(document).ready(function() {
    $(document).on("click", ".hideCardErrors", function(){
        $(this).parent('div').parent('div').hide();
        $(this).parent('div').find('.errorsImage').html('');
        $(this).parent('div').find('.errorsImage').addClass('hide');
    });

    // $(document).on("click", ".deleteImageCreate", function(){
    //     url = $(this).attr('data-url');
    //     este = $(this).parent('div');
    //     formAjax(url,'post','imgDeleteToList',este);
    // });

        // imgDropzone();

    // function emptyDropzone(divDropzone){
    //     Dropzone.forElement(divDropzone).removeAllFiles(true);
    //     $('.dz-message').show();
    // }

});



function imgDropzone(formDropzone){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    url_upload = $(formDropzone).attr('data-url');
    model = $(formDropzone).attr('data-model');
    model_id = $(formDropzone).attr('data-model_id');
    base_path = $(formDropzone).attr('data-base_path');
    formDropzoneInstance = new Dropzone(formDropzone, {
        addRemoveLinks: true,
        paramName: "file",
        maxFilesize: 50,
        url: url_upload,
        headers: {'x-csrf-token': CSRF_TOKEN,},
        // uploadMultiple: true,si se activa n ahi q cambiar el controlador para q reciba varias
        parallelUploads: 1,
        // maxFiles: 2,
        sending: function(file, xhr, formData){
            $(formDropzone).find('.dz-message').hide();
            formData.append('model_id', model_id);
            formData.append('model', model);

        },
        error:function(file,response){
           console.log(response);
            complete = 'no';
            lista = "";

            if(response.errors != undefined){
                $.each(response.errors.file, function( index, value ) {
                    lista+='<li class="ml-4">'+value+'</li>'
                });

                $('.errorsImage').append('<div class="text-danger mt-2 ml-4"><i class="fas fa-exclamation"></i> <span class="font600">'+lang[n]['Error_subir']+': "'+file.name+'":</span> </div><ul class="text-danger ml-4">'+lista+'</ul>');
            }else{
                $('.errorsImage').append('<div class="text-danger mt-2 ml-4"><i class="fas fa-exclamation"></i> <span class="font600">'+lang[n]['Error_subir']+': "'+file.name+'"</span> </div>');
            }
            $('.cardErrorsImages').show();

        },
        success:function(file,response){


            if (response.result == 'error') {
               complete = 'error';
                $('.errorsImage').append('<div class="text-danger mt-2 ml-4"><i class="fas fa-exclamation"></i> <span class="font600">'+lang[n]['Error_subir']+': "'+file.name+'"</span> </div>'+
                '<ul class="text-danger ml-4">'+response.message+'</ul>');
                $('.cardErrorsImages').show();
                warning(lang[n]['Error_subir']+': '+file.name);
            }else{
               parent = $(this.element).parents('.card').find('.card-header').find('.row');
               parent.append(response.html);
               // fillImages(response.img,parent);
               complete = 'si';

            }

        },
        complete: function (file) {

            setTimeout(showmessage, 1000);
            function showmessage(){
                if(complete == 'si' || complete == 'error'){
                    file.previewElement.remove();
                }else{
                    file.previewElement.remove();
                    // $('.dz-message').show();
                    warning(lang[n]['Error_subir']+': '+file.name);
                }
            }
        },
        init: function () {
          this.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
              setTimeout(function(){
                  $(formDropzone).find('.dz-message').fadeIn();
              }, 1000);

            }
          });
        }
    });
}

$(document).on('click','.delete_image', function(e){
  action_ajax(this);
 });
 $(document).on("click", ".set_image_p", function(){

    action_ajax(this);
 });



$(document).on("click", ".hideShowContent", function(e){
    e.stopImmediatePropagation();

    var  content = $(this).parent('div').find('.errorsImage');

    var icon = $(this).find('.fas');
    if(content.hasClass('hide')){
        // content.hide();
        content.removeClass('hide')
        icon.addClass('fa-minus');
        icon.removeClass('fa-plus');

    }else{
        // content.show();
        content.addClass('hide')
        icon.addClass('fa-plus');
        icon.removeClass('fa-minus');

    }
});

// function dropzoneDestroy(){
//     formDropzone.destroy();
// }
//
