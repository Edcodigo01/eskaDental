<!-- Modal -->
<div class="modal fade"  id="modal_filters" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:267px;margin:auto">
      {{-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar Artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}
      <div class="modal-body p-2 filters" data-filters="#filters_modal" id="filters_modal">
          <button type="button" class="close mb-3" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        @include('front.blog.includes.card_filters')
        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal"> Cerrar </button>
      </div>

    </div>
  </div>
</div>
