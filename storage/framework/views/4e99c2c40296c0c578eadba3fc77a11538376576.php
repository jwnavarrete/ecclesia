<div class="modal hide fade" id="modalHorario" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mt-1 mb-2" id="lblModoHorario"></h5>
            </div>
            <div class="modal-body text-center mb-1">                
                                                                    
                
                <?php echo Form::open(['action' => 'ParametroController@crudHorario', 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ); ?>


                    <input type="hidden" id="txtIdHorario" name="txtIdHorario" >
                    
                    <div class="md-form ml-0 mr-0">                        
                        <input class="form-control form-control-sm validate ml-0" placeholder="Dia" 
                                required="" id="txtDiaHorario" 
                                data-parsley-required-message="Dia es requerido" 
                                data-parsley-trigger="change focusout" 
                                data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                data-parsley-minlength="4" 
                                data-parsley-maxlength="32" 
                                name="txtDiaHorario" 
                                type="text" 
                                data-parsley-id="4">
                        <label data-error="wrong" data-success="right" for="txtDiaHorario" class="ml-0">Dia</label>
                        
                    </div>

                    <div class="md-form ml-0 mr-0">                            
                        <input class="form-control form-control-sm validate ml-0" placeholder="Titulo" 
                                required="" id="txtTituloHorario" 
                                data-parsley-required-message="Titulo es requerido" 
                                data-parsley-trigger="change focusout" 
                                data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                data-parsley-minlength="4" 
                                data-parsley-maxlength="32" 
                                name="txtTituloHorario" 
                                type="text" 
                                data-parsley-id="4">
                        <label data-error="wrong" data-success="right" for="txtTituloHorario" class="ml-0">Titulo</label>
                    </div>

                     <div class="md-form ml-0 mr-0">
                        <textarea class="form-control form-control-sm validate ml-0 md-textarea" placeholder="Comentario"  
                        length="500" 
                        rows="4"
                        required
                        id="txtComentarioHorario"
                        data-parsley-required-message="Comentario es requerido" 
                        data-parsley-trigger="change focusout"                                 
                        data-parsley-minlength="4" 
                        data-parsley-maxlength="500" 
                        name="txtComentarioHorario" 
                        ></textarea>
                        <label data-success="right" for="txtComentarioHorario" class="ml-0">Comentario</label>
                    </div>

                    <div class="md-form ml-0 mr-0">
                        <textarea class="form-control form-control-sm validate ml-0 md-textarea" placeholder="Lugar"  
                        length="500" 
                        rows="4"
                        required
                        id="txtLugarHorario"
                        data-parsley-required-message="Lugar es requerido" 
                        data-parsley-trigger="change focusout"                                 
                        data-parsley-minlength="4" 
                        data-parsley-maxlength="500" 
                        name="txtLugarHorario" 
                        ></textarea>
                        <label data-success="right" for="txtLugarHorario" class="ml-0">Lugar</label>
                    </div>
                    
                    <div class="md-form ml-0 mr-0">      
                        <input class="form-control form-control-sm validate ml-0" placeholder="Hora" 
                                required="" id="txtHoraHorario" 
                                data-parsley-required-message="Hora es requerido" 
                                data-parsley-trigger="change focusout"
                                data-parsley-minlength="1" 
                                data-parsley-maxlength="32" 
                                name="txtHoraHorario" 
                                type="text">
                        <label data-error="wrong" data-success="right" for="txtHoraHorario" class="ml-0">Hora</label>
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
