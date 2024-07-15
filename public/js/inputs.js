// selects

$(document).on('change','select', function(e){
    var value = $(this).val();
    if (value == 'Published') {
        $(this).addClass('text-success');
        $(this).removeClass('text-danger');
        $(this).removeClass('text-grey');
    }else if(value == 'Not-published' || value == 'eliminados'){
        $(this).removeClass('text-success');
        $(this).addClass('text-danger');
        $(this).removeClass('text-grey');
    }else if(value.length == 0){
        $(this).removeClass('text-success');
        $(this).removeClass('text-danger');
        $(this).addClass('text-grey');
    }else{
        $(this).removeClass('text-success');
        $(this).removeClass('text-danger');
        $(this).removeClass('text-grey');
    }
});
