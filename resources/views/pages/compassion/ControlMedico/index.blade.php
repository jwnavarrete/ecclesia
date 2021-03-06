@extends('layouts.main')
        
    @section('head')
        <link rel="stylesheet" href="{{ asset('assets/css/compassion.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}">                
        <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">      
        
        <style>
            .tab-pane {
                display: block;            
                height: 400px;
                overflow: auto;
                scroll-behavior: smooth;
            }
        </style>
    @stop

    @section('content')

    @section('breadcrumb')
        <li class="breadcrumb-item active">Control Medico</li>
    @stop

    <!--YERSON ALBERTO CORTEZ CHICA
       * PANTALLA DONDE SE VISUALIZARA EL LISTADO DE LOS MENORES DEL PROYECTO DE APADRINAMIENTO
       * SE GESTIONAN MENORES Y SE ACTUALIZA FICHA MEDICA
    -->      
    
    <div class="row">

        <div class="col-lg-12">
            <div class="row">

                <div class="col-lg-12" style="margin-bottom: -20px;margin-top: -20px;">
                    <div class="btn-group btn-group-sm inline verticalButtons" >
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
                        <div class="card-body">                        
                            <div id="tblCard">
                                <ul class="cardTable" id="new-list" style="display: none;" />    
                            </div>

                            <div class="table-responsive">
                                <table id="tblCompassion" class="table table-striped table-bordered dt-responsive nowrap"    cellspacing="0" width="100%">
                                </table>
                            </div>
                        </div>                
                    </div>        
                </div>

            </div>  
        </div>    
    </div>
        
    @include('pages.compassion.Children.modal.child')
    @include('pages.compassion.ControlMedico.modal.consulta')

@stop

@push('scripts')

    <script src="{{ asset('assets/js/validator.js') }}"></script>
    <script src="{{ asset('assets/js/compassion_child_medico.js') }}"></script>
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>

    <script>            
    </script>
@endpush