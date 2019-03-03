@extends('layouts.main')

@section('head')
{!! HTML::style('/assets/css/register.css') !!}
{!! HTML::style('/assets/css/parsley.css') !!}

<style>

.inline{display: inline;}
.divFilter{margin-bottom: -20px;margin-top: -20px;}
</style>

@stop

<?php
    use App\Models\Lista;
    $lista = new Lista
?>

@section('content')

@section('breadcrumb')
<li class="breadcrumb-item active">Home Card</li>
@stop

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
        @include('pages.seguridad.homeCard.crud')

        <!--LUIS ALFREDO RODRIGUEZ FRANCO
           * FORMULARIO PARA ASIGNACION DE PERMISOS DE LOS ACCESOS DIRECTOS EN BASE AL ROL DEL USUARIO
        -->
        @include('pages.seguridad.homeCard.modalPermisos')

             

    </div>  
</div>  
@stop

@push('scripts')
<script src="{{ asset('assets/js/validator.js') }}"></script>
<script src="{{ asset('assets/js/seguridad/homeCard.js') }}"></script>

@endpush