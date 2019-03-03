<?php $__env->startSection('head'); ?>
<?php echo HTML::style('/assets/css/register.css'); ?>

<?php echo HTML::style('/assets/css/parsley.css'); ?>


<style>

.inline{display: inline;}
.divFilter{margin-bottom: -20px;margin-top: -20px;}
</style>

<?php $__env->stopSection(); ?>

<?php
    use App\Models\Lista;
    $lista = new Lista
?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active">Home Card</li>
<?php $__env->stopSection(); ?>


<div class="primary-color narrower text-center">
    <div class="text-center"><h2 class="block-center white-text"> Inicio rapido </h2></div>
</div>      


<div class="row">
    <!--LUIS ALFREDO RODRIGUEZ FRANCO
       * PANTALLA PARA ADMINISTRAR LOS ACCEDOS DIRECTOS
    -->
	<div class="col-lg-12 divFilter">
        <!--LUIS ALFREDO RODRIGUEZ FRANCO
           * BOTONES DE LA PANTALLA
        -->
        <div class="btn-group btn-group-sm inline" style="vertical-align: -35px;">
            <button class="btn btn-primary" onclick="newCard();" type="button" title="Nuevo apadrinado">
            	<span class="image fa fa-plus"></span>
            </button>                    
            <button class="btn btn-primary" type="button" title="Imprimir" id="btnImprimir">
            	<span class="image fa fa-print"></span>
            </button>
            <button class="btn btn-primary" onclick="permisosCard();" type="button" title="Permisos">
            	<span class="image fa fa-key"></span>
            </button>    
        </div>   
        <div class="md-form form-sm inline pull-right">
           	<input type="text" placeholder="Buscar" id="txtBuscar" style="width: 250px;" class="form-control form-control-sm">
        </div>             
    </div>

    <div class="col-lg-12">
        <!--LUIS ALFREDO RODRIGUEZ FRANCO
           * LISTADO DE ACCESOS DIRECTOS CREADOS EN EL SISTEMA
        -->
    	<div class="card">            
            <div class="card-body  ">
    			<table id="tblHomeCard" class="table table-striped table-bordered table-sm">					
				</table>            
            </div>                
        </div>

        <!--LUIS ALFREDO RODRIGUEZ FRANCO
           * FORMULARIO PARA CREAR Y EDITAR UN ACCESO DIRECTO
        -->
        <?php echo $__env->make('pages.seguridad.homeCard.crud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!--LUIS ALFREDO RODRIGUEZ FRANCO
           * FORMULARIO PARA ASIGNACION DE PERMISOS DE LOS ACCESOS DIRECTOS EN BASE AL ROL DEL USUARIO
        -->
        <?php echo $__env->make('pages.seguridad.homeCard.modalPermisos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

             

    </div>  
</div>  
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/validator.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/seguridad/homeCard.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>