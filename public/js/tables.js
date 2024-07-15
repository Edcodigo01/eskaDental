// datatable('#table_category');

function list_table(url){
    showLoader();
    // if (!list) {
    //     list = '#list';
    // }
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
                console.log(result.data);
                 table(result.table,'true',result.data);
            }
            hideLoader();
        }
    });
}

table('.datatable');
function table(table,update,data){

    route_edit = $(table).attr('data-route_edit');
    route_remove = $(table).attr('data-route_remove');
    route_restore = $(table).attr('data-route_restore');
    route_edit_sub = $(table).attr('data-route_edit_sub');
    route_remove_sub = $(table).attr('data-route_remove_sub');
    urlexpand = $(table).attr('data-urlexpand');
    urlnew = $(table).attr('data-urlnew');

    table_id = $('.datatable').attr('id');

    if(update == 'true'){
        // datatable.search('');
        datatable.clear(true);
        datatable.rows.add(data);
        datatable.draw(false);
    }else{

        data = $(table).attr('data-elements');
        data = JSON.parse(data);
        if (table_id == 'table_subcategory') {

            datatable = $(table).DataTable({
                responsive: true,

                "dom": "<'row'<'col-sm-6 mb-1'l><'col-sm-6 mb-1 hide'f>>"+"<'row'<'col-sm-12'tr>>"+"<'row'<'col-sm-6 text-'i><'col-sm-6'p>>",
                "order": [[ 0, "asc" ]],
                "aLengthMenu": [[,12,25,50,100, -1], [5,10,25,50,100, "Todos"]],
                "iDisplayLength": 12,
                "language": {
                    "lengthMenu": "<div class='border bg-white p-1 form-inline'><i class='fas fa-eye mr-2 text-primary-light'></i> _MENU_ </div>",
                    "zeroRecords": "No se han encontrado resultados",
                    "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                    "infoEmpty": "",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": '<i class="fas fa-search"></i>',
                    'paginate': {
                       'previous': '<i class="fas fa-caret-left"></i>',
                       'next': '<i class="fas fa-caret-right"></i>'
                     }
                },
                data:data,
                "columns": [
                    {render: function (data, type, dataRow) {
                        if (dataRow.removed == 'true'){
                            route_restore1 = route_restore.replace('{id}',dataRow.id);

                            return dataRow.name+'<button type="button" name="button" class="btn btn-sm btn-success float-right showModalAjax" data-url="'+route_restore1+'"> <i class="fas fa-check"></i> </button>';
                        }else{
                            route_remove1 = route_remove.replace('{id}',dataRow.id);
                            route_edit1 = route_edit.replace('{id}',dataRow.id);

                            return dataRow.name+'<button type="button" name="button" class="btn btn-sm btn-secondary float-right showModalAjax" data-url="'+route_edit1+'"> <i class="fas fa-pencil-alt"></i> </button>'+
                            '<button type="button" name="button" class="btn btn-sm btn-danger float-right show_modal_delete mb-1 mr-2" data-url="'+route_remove1+'"> <i class="fas fa-trash"></i> </button>';
                        }
                    }},

                ],
            });
        }else{
            datatable = $(table).DataTable({
                responsive: true,

                "dom": "<'row'<'col-sm-6 mb-1'l><'col-sm-6 mb-1 hide'f>>"+"<'row'<'col-sm-12'tr>>"+"<'row'<'col-sm-6 text-'i><'col-sm-6'p>>",
                "order": [[ 0, "asc" ]],
                "aLengthMenu": [[,12,25,50,100, -1], [5,10,25,50,100, "Todos"]],
                "iDisplayLength": 12,
                "language": {
                    "lengthMenu": "<div class='border bg-white p-1 form-inline'><i class='fas fa-eye mr-2 text-primary-light'></i> _MENU_ </div>",
                    "zeroRecords": "No se han encontrado resultados",
                    "info": "<span class='text-primary-light'>Pagina _PAGE_ de _PAGES_</span>",
                    "infoEmpty": "",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": '<i class="fas fa-search"></i>',
                    'paginate': {
                       'previous': '<i class="fas fa-caret-left"></i>',
                       'next': '<i class="fas fa-caret-right"></i>'
                     }
                },
                data:data,
                "columns": [
                    {render: function (data, type, dataRow) {
                        if (dataRow.removed == 'true'){
                            route_restore1 = route_restore.replace('{id}',dataRow.id);

                            return dataRow.name+'<button type="button" name="button" class="btn btn-sm btn-success float-right showModalAjax" data-url="'+route_restore1+'"> <i class="fas fa-check"></i> </button>';
                        }else{
                            route_remove1 = route_remove.replace('{id}',dataRow.id);
                            route_edit1 = route_edit.replace('{id}',dataRow.id);

                            return dataRow.name+'<button type="button" name="button" class="btn btn-sm btn-secondary float-right showModalAjax" data-url="'+route_edit1+'"> <i class="fas fa-pencil-alt"></i> </button>'+
                            '<button type="button" name="button" class="btn btn-sm btn-danger float-right show_modal_delete mb-1 mr-2" data-url="'+route_remove1+'"> <i class="fas fa-trash"></i> </button>';
                        }
                    }},
                    {render: function (data, type, dataRow) {
                        if (dataRow.removed == 'true'){
                            return '';
                        }else {
                            count = 0;
                            array = '';

                            $.each(dataRow.subcategories, function( index,value  ) {
                                route_edit_sub1 = route_edit_sub.replace('{id}',value.id);
                                route_remove_sub1 = route_remove_sub.replace('{id}',value.id);
                                array += '<div class="p-1 bg-white mb-1" style="border:solid 1px var(--grey-x-l);border-radius:4px;overflow:hidden">'+
                                    '<p class="m-0 mt-2" style="display:inline-block"> <i class="fas fa-genderless"></i> '+
                                        value.name+
                                     '</p>'+
                                     '<div style="overflow:hidden" class="float-right">'+
                                    '<button type="button" name="button" class="btn btn-sm btn-danger show_modal_delete mb-1" data-url="'+route_remove_sub1+'"> <i class="fas fa-trash"></i> </button>'+
                                    '<button type="button" name="button" class="btn btn-sm btn-secondary  ml-2 showModalAjax" data-url="'+route_edit_sub1+'"><i class="fas fa-pencil-alt"></i>'+
                                    '</button></div></div>';
                                count = count + 1;
                            });

                            urlnew1 = urlnew.replace('{id}',dataRow.id);

                            btnnew = '<button type="button" name="button" class="btn btn-sm btn-white float-right showModalAjax ml-2" data-url="'+urlnew1+'"> <i class="fas fa-plus"></i>Nueva</button>';

                            urlexpand1 = urlexpand.replace('{id}',dataRow.slug);
                            btn_xpand = '<a href="'+urlexpand1+'" class="btn btn-sm btn-white float-right"> <i class="fas fa-expand"></i> </a>'

                            if (count == 0) {
                                return '<div class="float-right" style="overflow:hidden">'+btnnew+btn_xpand+'</div>';
                            }else{
                                return array+'<div>'+btnnew+btn_xpand+'</div>';
                            }
                        }
                    }},
                ],
            });
        }

    }

}

// "dom": "<'row'<'col-sm-6 mb-1'l><'col-sm-6 mb-1'f>>"+"<'row'<'col-sm-12'tr>>"+"<'row'<'col-sm-6  text-'i><'col-sm-6'p>>",
// "order": [[ 5, "asc" ]],
