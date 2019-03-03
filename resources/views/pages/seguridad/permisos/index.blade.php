@extends('layouts.main')

@section('head')
{!! HTML::style('/assets/css/register.css') !!}
{!! HTML::style('/assets/css/parsley.css') !!}

<style>
    .inline {
        display: inline-table;
        margin-top: -10px
    }
    .sortable li div{background-color: floralwhite !important;text-align: right;}
    .sortable li div .switch {
        border: none;
        margin-top: -10px;
        margin-bottom: -10px;
        
    }
    .sortable li div .switch label {
        margin-bottom: -5px;
        text-align: right;
    }
    .sortable li div span {
        float: left;        
    }
    
</style>

@stop

<?php
    use App\Models\Lista;
    $lista = new Lista
?>

@section('content')

@section('breadcrumb')
<li class="breadcrumb-item active">Permisos</li>
@stop

<!--LUIS ALFREDO RODRIGUEZ FRANCO
   * PANTALLA PARA LA ASIGNACION DE PERMISOS
   * SEGUN LOS PERMISOS SERAN VISUALIZADO LAS OPCIONES DEL SISTEMA
-->

<div class="row">
   
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: -20px;margin-top: -20px;">
                <div class="btn-group btn-group-sm inline" style="vertical-align: -35px;">
                    <a class="btn btn-primary" href="{{ URL::to('roles/create') }}" type="button" title="Nuevo apadrinado" id="MainToolbar_DXI0_"><span class="image fa fa-plus"></span></a>                    
                    <button class="btn btn-primary" type="button" title="Imprimir" id="MainToolbar_DXI0_"><span class="image fa fa-print"></span></button>                                                                    
                </div>            
                <div class="md-form form-sm inline pull-right">                    
                    <div class="md-form form-sm">
                            {!! Form::select('roles', $lista->getRoles(), 1 , [
                                'placeholder' => 'Rol...',
                                'required',
                                'id'=>'roles',
                                'onchange'=>'getPermisoRol();',                                        
                                'data-parsley-required-message' => 'Pais es requirdo',
                                'data-parsley-trigger'          => 'change focusout',
                                "class"=>"mdb-select colorful-select dropdown-primary"]
                            ) !!}                            
                    </div>
                </div>
            </div>

            <div class="col-md-12 card">

                @include('pages.seguridad.permisos.partial.opciones')                
            </div>

        
            


        </div>  
    </div>    
</div>


@stop

@push('scripts')
    {!! HTML::script('/assets/plugins/parsley.min.js') !!}
    {!! HTML::script('/assets/js/seguridad/permisos.js') !!}
@endpush