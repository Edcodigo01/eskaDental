
<!-- Modal -->
<div class="modal fade" id="modal_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="m-0">Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="formula" action="{{url('admin/change-password')}}" method="post" id="form_change_pass">
      <div class="modal-body">
              <div class="overflow">

                  <h5 class=""><span class="text-primary">Correo:</span> {{Auth::user()->email}}</h5>
                  {{-- <button type="button" name="button" class="btn btn-secondary float-right"> Cambiar contraseña </button> --}}
              </div>
              <div class="change-pass overflow inputs_paswords">
                      <div class="form-group">
                          <label for="">Contraseña actual</label>
                          <div class="input-group ">
                              <input type="password" name="password_now" value="" class="form-control required" >
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary show_pass_active" type="button"> <i class="fas fa-eye-slash"></i> </button>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                              <label for="">Contraseña nueva</label>
                              <div class="input-group ">
                                  <input type="password" name="password" value="" class="form-control required" id="password">
                                  <div class="input-group-append">
                                      <button class="btn btn-outline-secondary show_pass_active" type="button"> <i class="fas fa-eye-slash"></i> </button>
                                  </div>
                              </div>
                      </div>
                      <div class="form-group">
                          <label for="">Repita la nueva contraseña</label>
                          <div class="input-group m-0">
                              <input type="password" name="password_confirm" value="" class="form-control required" >
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary show_pass_active" type="button"> <i class="fas fa-eye-slash"></i> </button>
                              </div>
                          </div>
                      </div>


              </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" name="button" class="btn btn-primary float-right">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div>
