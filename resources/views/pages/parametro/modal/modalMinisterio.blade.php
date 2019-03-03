
<div class="modal hide fade" id="modalMinisterio" tabindex="-2" role="adialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document2">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <img src="/img/ministerios/user.png" id="imgMinisterio" alt="avatar" class="rounded-circle img-responsive">
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">
                
                <h5 class="mt-1 mb-2" id="ministerioLbl"></h5>                                
                
                {!! Form::open(['action' => 'ParametroController@crudMinisterio', 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ) !!}

                    <input type="hidden" id="ministerioId" name="ministerioId" >
                    <input type="hidden" id="ministerioEstado" name="ministerioEstado" >

                    <div class="row">
                        <div class="col">
                            <div class="md-form mt-0">
                                <input class="form-control form-control-sm validate ml-0" placeholder="Titulo" 
                                    required="" id="ministerioTitulo" 
                                    data-parsley-required-message="Titulo es requerido" 
                                    data-parsley-trigger="change focusout" 
                                    data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                    data-parsley-minlength="4" 
                                    data-parsley-maxlength="40" 
                                    name="ministerioTitulo" 
                                    type="text" 
                                    data-parsley-id="4">
                                <label data-error="wrong" data-success="right" for="ministerioTitulo" class="ml-0">Título</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form mt-0">
                                    <input class="form-control form-control-sm validate ml-0" placeholder="Dia" 
                                    required="" id="ministerioDia" 
                                    data-parsley-required-message="Dia es requerido" 
                                    data-parsley-trigger="change focusout" 
                                    data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                    data-parsley-minlength="4" 
                                    data-parsley-maxlength="32" 
                                    name="ministerioDia" 
                                    type="text" 
                                    data-parsley-id="4">
                                <label data-error="wrong" data-success="right" for="ministerioDia" class="ml-0">Dia</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="md-form mt-0">
                                <input class="form-control form-control-sm validate ml-0" placeholder="Desde" 
                                    required="" id="ministerioDesde" 
                                    data-parsley-required-message="Desde es requerido" 
                                    data-parsley-trigger="change focusout"                                     
                                    data-parsley-minlength="4" 
                                    data-parsley-maxlength="10" 
                                    name="ministerioDesde" 
                                    type="text" 
                                    data-parsley-id="4">
                                <label data-error="wrong" data-success="right" for="ministerioDesde" class="ml-0">Desde</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form mt-0">
                                    <input class="form-control form-control-sm validate ml-0" placeholder="Hasta" 
                                    required="" id="ministerioHasta" 
                                    data-parsley-required-message="Hasta es requerido" 
                                    data-parsley-trigger="change focusout"                                     
                                    data-parsley-minlength="4" 
                                    data-parsley-maxlength="10" 
                                    name="ministerioHasta" 
                                    type="text" 
                                    data-parsley-id="4">
                                <label data-error="wrong" data-success="right" for="ministerioHasta" class="ml-0">Hasta</label>
                            </div>
                        </div>
                        <div class="col">
                                <div class="md-form mt-0">
                                        <input class="form-control form-control-sm validate ml-0" placeholder="Orden" 
                                        required="" id="ministerioOrden" 
                                        data-parsley-required-message="Orden es requerido" 
                                        data-parsley-trigger="change focusout"                                         
                                        data-parsley-minlength="1" 
                                        data-parsley-maxlength="10" 
                                        name="ministerioOrden" 
                                        type="text" 
                                        data-parsley-id="4">
                                    <label data-error="wrong" data-success="right" for="ministerioOrden" class="ml-0">Orden</label>
                                </div>
                            </div>
                    </div>

                    <div class="md-form ml-0 mr-0">
                        <textarea class="form-control form-control-sm validate ml-0 md-textarea" placeholder="Nombre"  
                            length="500" 
                            rows="4"
                            required
                            id="ministerioDescripcion"
                            data-parsley-required-message="Descripcion es requerido" 
                            data-parsley-trigger="change focusout"                                 
                            data-parsley-minlength="4" 
                            data-parsley-maxlength="500" 
                            name="ministerioDescripcion" 
                            ></textarea>
                            <label data-success="right" for="ministerioDescripcion" class="ml-0">Descripción</label>
                    </div>
                    
                    <div class="md-form ml-0 mr-0">
                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>Buscar archivo</span>
                                <input type="file" name="ministerioFoto" id="ministerioFoto">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="sube una imagen">
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-right mt-4">
                        <button type="submit" class="btn btn-cyan mt-1">Grabar <i class="fa fa-sign-in ml-1"></i></button>
                        <a type="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">Cerrar</a>
                    </div>
                
                {{ Form::close() }}

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

