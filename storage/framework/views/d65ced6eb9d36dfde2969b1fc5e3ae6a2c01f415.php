    
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/compassion.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datepicker.css')); ?>">                
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/core.css')); ?>">      
    
    <style>
        .tab-pane {
            display: block;
            /*width: 350px;*/
            height: 400px;
            overflow: auto;
            scroll-behavior: smooth;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active">Gestionar menores</li>
<?php $__env->stopSection(); ?>

<div class="primary-color narrower text-center">
    <div class="text-center"><h2 class="block-center white-text"> Lista de niños </h2></div>
</div> 


<div class="row">
    
    <!--YERSON ALBERTO CORTEZ CHICA
        * PAGINA PARA ADMINISTRAR A LOS MENORES DEL PROYECTO DE APADRINAMIENTO CASA AMANECER
    -->


    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: -20px;margin-top: -20px;">
                <!--YERSON ALBERTO CORTEZ CHICA
                    * BOTONES DEL MODULO DE APADINAMIENTO A MENORES
                -->
                <div class="btn-group btn-group-sm inline verticalButtons" >
                    <button class="btn btn-primary" onclick="newChild();" type="button" title="Nuevo apadrinado" id="MainToolbar_DXI0_"><span class="image fa fa-plus"></span></button>                                        
                    <button class="btn btn-primary btnTable active" tipoTabla="grid" type="button" title="Modo tabla" id="MainToolbar_DXI5_"><span class="image fa fa-table"></span></button>
                    <button class="btn btn-primary btnTable" tipoTabla="card" type="button" title="Modo carta" id="MainToolbar_DXI6_"><span class="image fa fa-th-large"></span></button>                                                            
                </div>            
                <div id="btnFilterExport" class="inline verticalButtons"></div>         
                <div id="btnCollection" class="inline verticalButtons"></div>         
                <div class="md-form form-sm inline pull-right">
                    <input type="text" placeholder="Buscar" id="txtBuscar" style="width: 250px;" class="form-control form-control-sm">                    
                </div>
            </div>

            <div class="col-lg-12">                    
                <div class="card">            
                    <div class="card-body  ">
                        <div class="main-toolbar-container">        
                            
                        </div>  
                                                
                        <div id="tblCard">
                            <ul class="cardTable" id="new-list" style="display: none;" />    
                        </div>
                        
                        <!--YERSON ALBERTO CORTEZ CHICA
                            * TABLA DONDE SE VISUALIZARA EL LISTADO DE LOS MENORES INSCRITOS
                        -->
                        <div class="table-responsive">
                            <table id="tblCompassion" class="table-bordered display-compact table-sm"    cellspacing="0" width="100%">
                            </table>
                        </div>
        
                    </div>                
                </div>        
            </div>

        </div>  

    </div>
    
</div>
        
<!--YERSON ALBERTO CORTEZ CHICA
    * SECCION PARA VISUALIZAR LA INFORMACION DEL MENOR, CONSULTA, CREACION Y EDICION DEL MENOR.
-->
<?php echo $__env->make('pages.compassion.Children.modal.child', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/validator.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/compassion_child.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>