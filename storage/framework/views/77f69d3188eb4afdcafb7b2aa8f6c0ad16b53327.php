<div class="modal hide fade" id="modalEquipo" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <img src="/img/team/user.png" id="imgEquipo" alt="avatar" class="rounded-circle img-responsive">
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">
                
                <h5 class="mt-1 mb-2" id="lblModo"></h5>                    
                
                
                <?php echo Form::open(['action' => 'ParametroController@crudEquipo', 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ); ?>


                    <input type="hidden" id="txtId" name="txtId" >
                    <input type="hidden" id="txtEstado" name="estado" >

                    <div class="md-form ml-0 mr-0">                        
                        <input class="form-control form-control-sm validate ml-0" placeholder="Nombre" 
                                required="" id="txtNombre" 
                                data-parsley-required-message="Nombre es requerido" 
                                data-parsley-trigger="change focusout" 
                                data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                data-parsley-minlength="4" 
                                data-parsley-maxlength="32" 
                                name="txtNombre" 
                                type="text" 
                                data-parsley-id="4">
                        <label data-error="wrong" data-success="right" for="txtNombre" class="ml-0">Nombre</label>
                        
                    </div>

                    <div class="md-form ml-0 mr-0">                            
                        <input class="form-control form-control-sm validate ml-0" placeholder="Nombre" 
                                required="" id="txtCargo" 
                                data-parsley-required-message="Cargo es requerido" 
                                data-parsley-trigger="change focusout" 
                                data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                data-parsley-minlength="4" 
                                data-parsley-maxlength="32" 
                                name="txtCargo" 
                                type="text" 
                                data-parsley-id="4">
                        <label data-error="wrong" data-success="right" for="txtCargo" class="ml-0">Cargo</label>
                    </div>

                    <div class="md-form ml-0 mr-0">
                            <textarea class="form-control form-control-sm validate ml-0 md-textarea" placeholder="Nombre"  
                            length="500" 
                            rows="4"
                            required
                            id="txtDescripcion"
                            data-parsley-required-message="Descripcion es requerido" 
                            data-parsley-trigger="change focusout"                                 
                            data-parsley-minlength="4" 
                            data-parsley-maxlength="500" 
                            name="txtDescripcion" 
                            ></textarea>
                            <label data-success="right" for="txtDescripcion" class="ml-0">Descripción</label>
                    </div>
                    
                    <div class="md-form ml-0 mr-0">
                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>Buscar archivo</span>
                                <input type="file" name="txtFoto" id="txtFoto">
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
                
                <?php echo e(Form::close()); ?>


            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
