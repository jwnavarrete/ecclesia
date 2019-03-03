 <div class="row">
    <div class="col-md-12">        
        <div class="col-md-12">    
            <div class="row">
                <div class="col-md-12">        
                    <div class="row">                    
                        <div class="col-md-4">
                            <div class="md-form form-sm">
                                <input type="text" id="codigo" value="<?php echo e($parametro->inicial); ?>" placeholder="" name="codigo" class="form-control">
                                <label for="codigo" class="active">Inicial</label>                        
                            </div>                       
                        </div>
                        <div class="col-md-8">
                            <div class="md-form form-sm fecha">
                                <input type="text" id="primerNombre" value="<?php echo e($parametro->nombre); ?>" placeholder="" name="primerNombre" class="form-control">
                                <label for="primerNombre" class="active">Nombre</label>  
                            </div>                                                                                                             
                        </div>
            
                        <div class="col-md-6">
                            <div class="md-form form-sm">
                                <input type="text" id="primerNombre" value="<?php echo e($parametro->telefono); ?>" placeholder="" name="primerNombre" class="form-control">
                                <label for="primerNombre" class="active">Telefono</label>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form form-sm">
                                <input type="text" value="<?php echo e($parametro->correo); ?>" id="segundoNombre" placeholder="" name="segundoNombre" class="form-control">
                                <label for="segundoNombre" class="active">Correo Electronico</label>
                            </div>
                        </div>
            
                    </div>
                </div>
            
                <div class="col-md-12">
                    <div class="md-form form-sm">
                        <input type="text" placeholder="" value="<?php echo e($parametro->direccion); ?>" id="domicilio" name="domicilio" class="form-control">
                        <label for="domicilio" data-success="" class="active">Direccion</label>                                                            
                    </div>
                </div> 
                <div class="col-md-12">
                    <a onclick="grabarInfo();" class="btn btn-sm btn-primary waves-effect waves-light pull-right"><i class="glyphicon glyphicon-floppy-disk"></i> Grabar</a>
                </div> 
        
            </div>
        </div>           
    </div>                        
</div>




<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            
        });
    </script>
<?php $__env->stopPush(); ?>