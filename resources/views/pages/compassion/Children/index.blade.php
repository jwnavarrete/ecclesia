@extends('layouts.main')
    
@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/compassion.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}">                
    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">      
    
    <style>
        .tab-pane {
            display: block;
            /*width: 350px;*/
            height: 400px;
            overflow: auto;
            scroll-behavior: smooth;
        }
    </style>
@stop

@section('content')

@section('breadcrumb')
<li class="breadcrumb-item active">Gestionar menores</li>
@stop

<div class="row">
    
    <!--YERSON ALBERTO CORTEZ CHICA
        * PAGINA PARA ADMINISTRAR A LOS MENORES DEL PROYECTO DE APADRINAMIENTO CASA AMANECER
    -->    

    
    <!--<ul class="nav navbar-nav nav-flex-icons ml-auto">                        
        <li id="navbar-static-tools" class="nav-item dropdown">
            <div class="btn-group btn-group-sm">            
                <button class="btn btn-primary dropdown-toggle" title="Filtrar" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="image fa fa-cogs"></span></button>        
                <div class="dropdown-menu" aria-labelledby="navbar-tools" style="position: absolute;">
                    <a class="dropdown-item waves-effect waves-light" href="#">
                        <div class="text-small text-uppercase">Entries Per Page</div>
                            <div id="pageSize" allowed-sizes="emailAccounts.meta.pageSizes" total-items="emailAccounts.meta.totalItems" ng-model="emailAccounts.meta.pageSize" show-all="false" ng-show="true" ng-change="emailAccounts.selectPageSize()" name="" class="ng-valid">
                            <div class="btn-group pageSizeButtons">                                
                                <label id="pageSize_20" ng-repeat="size in options" class="btn btn-default btn-sm ng-pristine ng-untouched ng-valid active" ng-class="{active: $parent.pageSize == '20'}" ng-model="$parent.pageSize" uib-btn-radio="20" name="" style="">20</label>
                                <label id="pageSize_50" ng-repeat="size in options" class="btn btn-default btn-sm ng-pristine ng-untouched ng-valid" ng-class="{active: $parent.pageSize == '50'}" ng-model="$parent.pageSize" uib-btn-radio="50" name="" style="">50</label>
                                <label id="pageSize_100" ng-repeat="size in options" class="btn btn-default btn-sm ng-pristine ng-untouched ng-valid" ng-class="{active: $parent.pageSize == '100'}" ng-model="$parent.pageSize" uib-btn-radio="100" name="" style="">100</label>
                                <label id="pageSize_500" ng-repeat="size in options" class="btn btn-default btn-sm ng-pristine ng-untouched ng-valid" ng-class="{active: $parent.pageSize == '500'}" ng-model="$parent.pageSize" uib-btn-radio="500" name="" style="">500</label>
                            </div>
                        </div>
                    </a>                    
                </div>
            </div>
        </li>                       
    </ul>-->
    
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
                            <table id="tblCompassion" class="table table-striped table-bordered dt-responsive nowrap"    cellspacing="0" width="100%">
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
@include('pages.compassion.Children.modal.child')

@stop

@push('scripts')
    <script src="{{ asset('assets/js/validator.js') }}"></script>
    <script src="{{ asset('assets/js/compassion_child.js') }}"></script>
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>  

@endpush