<div class="col-md-12">
    
    <div class="row">
        <div class="col-md-8">        
            <div class="row">                    
                <div class="col-md-6">
                    <div class="md-form form-sm">
                        <input type="text" id="codigo" placeholder="" name="codigo" class="form-control">
                        <label for="codigo" >Codigo</label>                        
                    </div>                       
                </div>
                <div class="col-md-6">
                    <div class="md-form form-sm fecha">
                        <input placeholder="Selected date" type="text" placeholder="" name="fechaNacimiento" id="fechaNacimiento" value="" class="form-control datepicker">
                        <label for="fechaNacimiento" >Fecha de Nacimiento</label>                                                                                                                        
                    </div>                                                                                                             
                </div>
    
                <div class="col-md-6">
                    <div class="md-form form-sm">
                        <input type="text" id="primerNombre" placeholder="" name="primerNombre" class="form-control">
                        <label for="primerNombre" >Primer Nombre</label>  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form form-sm">
                        <input type="text" id="segundoNombre" placeholder="" name="segundoNombre" class="form-control">
                        <label for="segundoNombre" >Segundo Nombre</label>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="md-form form-sm">
                        <input type="text" id="apellidop" placeholder="" name="apellidop" class="form-control">
                        <label for="apellidop" >Apellido Paterno</label>                                                                                                                        
                    </div>                       
                </div>
                <div class="col-md-6">
                    <div class="md-form form-sm">
                        <input type="text" id="apellidom" placeholder="" name="apellidom" class="form-control">
                        <label for="apellidom" >Apellido Materno</label>                                                            
                    </div>                       
                </div>
                
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="file-field">
                <div class="mb-4">
                    <img src="/img/compassion/child.png" class="rounded-circle z-depth-1-half avatar-pic" id="clickerImage">
                </div>
                <div class="">
                    <input type="file" id="fileFoto" style="display:none">
                    <div class="md-form form-sm">
                        <select name="slSexo" id="slSexo" class="mdb-select colorful-select dropdown-primary">
                            <option value=""></option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                        <label for="slSexo" >Genero</label>                                                                                                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">      
            <div class="row">                
                <div class="col-md-6">
                    <div class="md-form form-sm">
                        <input type="text" id="nombrecomun" placeholder="" name="nombrecomun" class="form-control">
                        <label for="nombrecomun" >Nombre Comun</label>                                                                                
                    </div>
                </div>    
                <div class="col-md-6">
                    <div class="md-form form-sm">                                                                             
                        <?php echo Form::select('grupo',$lista->getGrupos()  , null , [
                            'placeholder' => 'Grupo...',
                            'id' => 'grupo',
                            'required',
                            'data-parsley-required-message' => 'Ciudad es requirda',
                            'data-parsley-trigger'          => 'change focusout',
                            "class"=>"mdb-select colorful-select dropdown-primary"]
                        ); ?>

                        <label for="grupo">Grupo</label>

                    </div>
                </div>
            </div>     
        </div>

        <div class="col-md-12">
            <div class="md-form form-sm">
                <input type="text" placeholder="" id="domicilio" name="domicilio" class="form-control">
                <label for="domicilio" data-success="">Direccion</label>                                                            
            </div>
        </div> 

    </div>
</div>    

  
