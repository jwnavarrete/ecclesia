    
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/compassion.css')); ?>">    

    <style>
        .ui-datepicker-title select {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            display: inline-grid!important;
        }


    </style>    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datepicker.css')); ?>">                
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/core.css')); ?>">                
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active">Administrar Tutores</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="primary-color narrower text-center">
    <div class="text-center"><h2 class="block-center white-text"> <Table>Lista de Tutores</Table> </h2></div>
</div> 

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: -20px;margin-top: -20px;">
                <div class="btn-group btn-group-sm inline" style="vertical-align: -35px;">                    
                    <button class="btn btn-primary" onclick="newTutor();" type="button" title="Nuevo Tutor" id="MainToolbar_DXI0_"><span class="image fa fa-plus"></span></button>                    
                    <button class="btn btn-primary btnTable active" tipoTabla="grid" type="button" title="Modo tabla" id="MainToolbar_DXI5_"><span class="image fa fa-table"></span></button>
                    <button class="btn btn-primary btnTable" tipoTabla="card" type="button" title="Modo carta" id="MainToolbar_DXI6_"><span class="image fa fa-th-large"></span></button>                                                            
                </div>    

                <div class="btn-group btn-group-sm inline" style="vertical-align: -35px;">
                    <!--<div class="btn-group btn-group-sm inline">
                        <button class="btn btn-primary dropdown-toggle" title="Filtrar" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="image fa fa-filter"></span></button>                                                
                        <div class="dropdown-menu">                                                                                                            
                            <a class="dropdown-item" href="#" onclick="filtro='T'; cargarDatatable();">Todos</a>                                
                            <a class="dropdown-item" href="#" onclick="filtro='M'; cargarDatatable();">Hombres</a>                                                        
                            <a class="dropdown-item" href="#" onclick="filtro='F'; cargarDatatable();">Mujeres</a>                                                        
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm inline">
                        <button class="btn btn-primary dropdown-toggle" title="Cursos" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="image fa fa-users"></span></button>                        
                        <div class="dropdown-menu">                                                                                                            
                            <a class="dropdown-item" href='<?php echo url('/gruposChild');; ?>'>Administrar Grupos</a>                                                            
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm inline">
                        <button class="btn btn-primary" title="PDF" type="button">
                            <span class="image fa fa-print"></span>
                        </button>
                        <button type="button" title="Exportar" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" onclick=""><i class="fa fa-file-pdf-o"> Pdf</i></a>                                
                            <a class="dropdown-item" href="#" onclick=""><i class="fa fa-file-excel-o"> Excel</i></a>                                     
                        </div>
                    </div>-->
                </div>            
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
        
                        <div class="table-responsive">
                            <table id="tblTutores" class="table-bordered display-compact table-sm"    cellspacing="0" width="100%">
                            </table>
                        </div>
                        
                    </div>                
                </div>        
            </div>

        </div>  

    </div>
    
</div>
        

<?php echo $__env->make('pages.compassion.Tutores.modal.tutor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    
    <script src="<?php echo e(asset('assets/js/validator.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/tutores.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker.js')); ?>"></script>

    <script>
        
        $(document).ready(function() {    

            $('select').addClass('mdb-select');
            $('.ui-datepicker-title select').addClass('mdb-select');
            
            
            $('.datepicker').datepicker({
                uiLibrary: 'bootstrap4',                
                locale: 'es-es',
                format: 'dd/mm/yyyy',                
            });
            
            
     });

    </script>
   
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>