<h5 class="">Imágenes</h5>
<div class="card" style="width:100%">
    <div class="card-header bg-secondary">
        <p class="">Imágenes cargadas</p>
        <div class="row images_load">
            @include('admin.blog.includes.images_load')
        </div>
    </div>
    <div class="card-body">
        <div class="dropzone" id="formDropzone" style="position:relative;overflow:hidden" data-model="article" data-model_id="{{$article->id}}" data-url="{{url('subir-imagen')}}" data-base_path="{{asset('/')}}">
            <h6 class="dz-message m-0 text-gold">
                <i class="fas fa-upload text-red"></i>
                Arrastre las imágenes a este cuadro, o haga click aqui para seleccionar.
            </h6>
        </div>
        <br>
        <div class="card cardErrorsImages p-2 hide">
            <div class="card-body p-2">
                <button type="button" name="button" class="hideCardErrors btn btn-danger float-right btn-sm"><i class="fas fa-times"></i> </button>
                <button type="button" name="button" class="btn btn-white float-right btn-sm mr-2 hideShowContent"><i class="fas fa-plus"></i> {{ trans("short.Detalles") }}</button>

                <p class="text-danger m-0"> <i class="fas fa-exclamation-triangle"></i> {{ trans("short.Archivos no subieron") }} </p>
                <div class="errorsImage hide">
                    <hr class="bg-danger">

                </div>
            </div>
        </div>

    </div>

</div>
