<div class="col-12 col-sm-4 col-md-4 col-lg-3 p-1 img_element{{$image->id}}">
  <div class="container_img_load">
     <button class="delete_image btn btn-danger btn-sm box-shadow-none" type="button" name="button" data-url="{{url('eliminar-imagen/'.$image->id.'/'.$image->model.'/'.$image[$image->model.'_id'])}}"> <i class="fas fa-times"></i> </button>
     <img class="border" src="{{asset($image->path)}}" alt="">
     @if($image->principal == 'true')
         <div class="text-img-p">
             <p class="m-0 text-primary text-center font600 bg-white font-600" style="width:100%">Imagen principal</p>
         </div>
     @else
        <div class="container_set_image_p">
            <button data-url="{{url('establecer-como-principal/'.$image->id.'/'.$image->model.'/'.$image[$image->model.'_id'])}}" type="button" name="button" class="set_image_p btn btn-sm btn-secondary box-shadow-none">Convertir en principal</button>
         </div>
     @endif
  </div>
</div>
