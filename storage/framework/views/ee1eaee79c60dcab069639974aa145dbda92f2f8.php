<?php $__env->startSection('head'); ?>
<?php echo HTML::style('/assets/css/register.css'); ?>

<?php echo HTML::style('/assets/css/parsley.css'); ?>

<?php $__env->stopSection(); ?>

<?php
    use App\Models\Lista;
    $lista = new Lista
?>


<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active">Asistencia Cursos</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <section class="mb-5">


        <div class="row">
            
            
            <div class="col-lg-8">
                 <div class="card card-cascade narrower mb-r">

                    <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">                        
                        <a href="" class="white-text mx-3">Grupo A - Niños desde cuatro a cinco de edad</a>                        
                    </div>

                    <!--Card content-->
                    <div class="card-body pb-0">                        
                 
                        <div class="table-responsive">                    
                                                                                        
                                <ul class="list-group">
                                    <?php $__currentLoopData = $lista->allChild(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $child): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                                                                                         
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?php echo e($child->apellidoPaterno); ?>

                                                <?php echo e($child->apellidoMaterno); ?>

                                                <?php echo e($child->primerNombre); ?>

                                                <?php echo e($child->segundoNombre); ?>                                            

                                                <div class="switch">
                                                    <label>                                                    
                                                        <input type="checkbox">
                                                        <span class="lever"></span>                                                    
                                                    </label>
                                                </div>
                                                
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    
                                </ul>

                        </div>
                        
                        <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="col-md-3 pull-right">
                                            <a onclick="GrabarOrden();" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Grabar</a>
                                    </div>
    
                                </div>
                            </div>
                            <br>                            
    
                    </div>
                    <!--/.Card content-->

                </div>

            </div>            

            <div class="col-lg-4">
                    <div class="card card-cascade narrower mb-r">
                            <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">                        
                                    <a href="" class="white-text mx-3">Observaciones</a>                        
                                </div>
            
                      
                        <!--Card content-->
                        <div class="card-body pb-2">                        
                    
                            <div class="table-responsive">                                    
                                    <form>             

                                        <div class="md-form form-sm">
                                            <textarea type="text" id="form7" class="md-textarea form-control" rows="3"></textarea>
                                            <label for="form7">Observaciones</label>
                                        </div>
                                            
                                    </form>
                                                
                            </div>
    
                            <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="col-md-6 pull-right">
                                            <a onclick="createMenu();" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Grabar</a>
                                        </div>
        
                                    </div>
                                </div>
                                <br>                            
        
                        </div>
                        <!--/.Card content-->
    
                    </div>
    
                </div>
        </div>

        <!--Card-->

        <!--/.Card-->
    </section>

   
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            $(document).ready(function() {
                $('.mdb-select').material_select();                                            
            }); 



        </script>



    <?php echo HTML::script('/assets/plugins/parsley.min.js'); ?>


    <?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>