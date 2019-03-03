<?php 
    use App\Models\Convenio; 
    $convenio = Convenio::first();   
    $arrImagenes = json_decode($convenio->imagenes);
 ?>

<!--JOFRE ALENXANDER MORALES PLACENCIO
    * SECCION PARA MOSTRAR CONTENIDO DE INFORMACION GENERAL
-->                                                                                             
<style type="text/css">
	.imgStyle{width: 400px; height: 250px;}
</style>

<div class="tab-pane fade in show" id="convenio" role="tabpanel">
    <br>               
    <div class="col-md-12"> 

    	<?php echo Form::open(['action' => 'ParametroController@convenio', 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ); ?>


    		<input type="hidden" name="txtIdConvenio" id="txtIdConvenio" value="<?php echo e($convenio->id); ?>">
	        <div class="row">
	            <div class="col-md-12">        
	                <div class="row">                    
	                    <div class="col-md-4">
	                        <div class="md-form form-sm">
	                            <input type="text" id="txtTituloConvenio" value="<?php echo e($convenio->titulo); ?>" placeholder="" name="txtTituloConvenio" class="form-control">
	                            <label for="txtTituloConvenio" class="active">Titulo</label>                        
	                        </div>                       
	                    </div>
	                    <div class="col-md-8">
	                        <div class="md-form form-sm fecha">
	                            <input type="text" id="txtDescripcionConvenio" value="<?php echo e($convenio->descripcion); ?>" placeholder="" name="txtDescripcionConvenio" class="form-control">
	                            <label for="txtDescripcionConvenio" class="active">Descripcion</label>  
	                        </div>                                                                       
	                    </div>                
	                </div>
	            </div>

	            <hr>
	        	
	        	<div class="row text-center mb-4">

	        		<?php $__currentLoopData = $arrImagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $imagen): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>   
		        		<div class="col-lg-4 col-md-12 mb-5 wow fadeIn" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">        
				            <div class="view overlay hm-white-slight z-depth-1 hm-zoom">
				                <img src="<?php echo e($convenio->ruta); ?><?php echo e($imagen); ?>" class="img-fluid imgStyle">
				            </div>

				             <div class="card-block">
				                <div class="file-field">
							        <div class="btn btn-primary btn-sm float-left">
							            <span>Buscar Imagen</span>
							            <input type="file" name="image<?php echo e($key); ?>">
							        </div>
							        <div class="file-path-wrapper">
							            <input class="file-path validate" value="<?php echo e($imagen); ?>" type="text" placeholder="Cargar Imagen">
							        </div>
							    </div>
				            </div>
				        </div>
	        		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                           
			        			        
			    </div>

			    <br>
			    <div>
			    	<div class="file-field">
				        <div class="btn btn-primary btn-sm float-left">
				            <span>Buscar Archivo</span>
				            <input type="file" id="fileContrato"  name="fileContrato">
				        </div>
				        <div class="file-path-wrapper">
				            <input class="file-path validate" value="<?php echo e($convenio->contrato); ?>" type="text" placeholder="Subir Convenio">
				        </div>
				    </div>
			    </div>	            

			    <div class="col-md-12 pull-right">
	                <button type="submit" class="btn btn-cyan mt-1 btn-sm pull-right">Grabar</button>
	            </div>         
	        </div>
	        

	    <?php echo e(Form::close()); ?>

    </div>           
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            
        });

        function grabarGeneral() {
            $.alert("En mantenimiento");
        }
    </script>
<?php $__env->stopPush(); ?> 


