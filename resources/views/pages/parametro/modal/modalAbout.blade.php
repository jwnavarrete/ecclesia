
<div class="modal hide fade" id="modalAbout" tabindex="-2" role="adialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document2">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <img src="/img/team/user.png" id="imgAbout" alt="avatar" class="rounded-circle img-responsive">
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">
                
                <h5 class="mt-1 mb-2" id="aboutlbl"></h5>
                
                
                
                {!! Form::open(['action' => 'ParametroController@crudAbout', 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ) !!}

                    <input type="hidden" id="aboutId" name="aboutId" >
                    <input type="hidden" id="aboutEstado" name="estado" >

                    <div class="md-form ml-0 mr-0">                        
                        <input class="form-control form-control-sm validate ml-0" placeholder="Nombre" 
                                required="" id="aboutNombre" 
                                data-parsley-required-message="Nombre es requerido" 
                                data-parsley-trigger="change focusout" 
                                data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                data-parsley-minlength="4" 
                                data-parsley-maxlength="32" 
                                name="aboutNombre" 
                                type="text" 
                                data-parsley-id="4">
                        <label data-error="wrong" data-success="right" for="aboutNombre" class="ml-0">Nombre</label>
                        
                    </div>

                    <div class="md-form ml-0 mr-0">                            
                        <input class="form-control form-control-sm validate ml-0" placeholder="Titulo" 
                                required="" id="aboutTitulo" 
                                data-parsley-required-message="Titulo es requerido" 
                                data-parsley-trigger="change focusout" 
                                data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                data-parsley-minlength="4" 
                                data-parsley-maxlength="32" 
                                name="aboutTitulo" 
                                type="text" 
                                data-parsley-id="4">
                        <label data-error="wrong" data-success="right" for="aboutTitulo" class="ml-0">Titulo</label>
                    </div>

                    <div class="md-form ml-0 mr-0">                            
                        <input class="form-control form-control-sm validate ml-0" placeholder="Orden" 
                                required="" id="aboutOrden" 
                                data-parsley-required-message="Orden es requerido" 
                                data-parsley-trigger="change focusout"                                     
                                data-parsley-minlength="1" 
                                data-parsley-maxlength="32" 
                                name="aboutOrden" 
                                type="text">
                        <label data-error="wrong" data-success="right" for="aboutOrden" class="ml-0">Orden</label>
                    </div>

                    <div class="md-form ml-0 mr-0">
                        <textarea class="form-control form-control-sm validate ml-0 md-textarea" placeholder="Nombre"  
                            length="500" 
                            rows="4"
                            required
                            id="aboutDescripcion"
                            data-parsley-required-message="Descripción es requerido" 
                            data-parsley-trigger="change focusout"                                 
                            data-parsley-minlength="4" 
                            data-parsley-maxlength="500" 
                            name="aboutDescripcion" 
                            ></textarea>
                            <label data-success="right" for="aboutDescripcion" class="ml-0">Descripción</label>
                    </div>
                    
                    <div class="md-form ml-0 mr-0">
                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>Buscar archivo</span>
                                <input type="file" name="aboutFoto" id="aboutFoto">
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

