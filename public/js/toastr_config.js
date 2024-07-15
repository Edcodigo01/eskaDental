//CONFIGURACION PERSONALIZADA TOASTR
function success(text){
    count_alert = $(".toast").length;
    if(count_alert == 2){
        $('.toast').remove();
    }
    toastr.success(text);
}

function toast_info(text){
    count_alert = $(".toast").length;
    if(count_alert == 2){
        $('.toast').remove();
    }
    toastr.info(text);
}

function warning(text){
    count_alert = $(".toast").length;
    if(count_alert == 2){
        $('.toast').remove();
    }
    toastr.warning(text);
}

function danger(text){
    count_alert = $(".toast").length;
    if(count_alert == 2){
        $('.toast').remove();
    }
    toastr.error(text);
}

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "2",
    // "hideDuration": "1000",
    "timeOut": "8000",
    // "extendedTimeOut": "60000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
