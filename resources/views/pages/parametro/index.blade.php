@extends('layouts.main')

@section('head')
{!! HTML::style('/assets/css/register.css') !!}
{!! HTML::style('/assets/css/parsley.css') !!}
@stop

<?php
    use App\Models\Lista;
    use App\Models\Parametro;
    $lista = new Lista;
    $parametro = Parametro::first();    
?>

<!--JOFRE ALENXANDER MORALES PLACENCIO
    * PAGINA DE PARAMETRIZACION Y CONFIGURACION DEL CONTENIDO EN GENERAL DEL SISTEMA
-->
@section('content')
    @section('breadcrumb')
    <li class="breadcrumb-item active">Parametros Generales - Portal Web</li>
    @stop
    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * LISTADO DE OPCIONES A CONFIGURAR
    -->
    <section class="mb-5">
        <div class="row">            
            <div class="col-lg-12">                                
                <ul class="nav nav-tabs nav-justified">                    
                    <li class="nav-item">                        
                        <a class="nav-link" id="tabgeneral" data-toggle="tab" href="#general" role="tab">General</a>
                    </li>
                    <li class="nav-item">                        
                        <a class="nav-link" id="tababout" data-toggle="tab" href="#about" role="tab">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">                        
                        <a class="nav-link" id="tabconvenio" data-toggle="tab" href="#convenio" role="tab">Convenio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabequipo" data-toggle="tab" href="#equipo" role="tab">Equipo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabhorarios" data-toggle="tab" href="#horarios" role="tab">Horarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabministerio" data-toggle="tab" href="#ministerio" role="tab">Ministerios</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" id="tabvideos" data-toggle="tab" href="#video" role="tab">Videos</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" id="tabgaleria" data-toggle="tab" href="#galeria" role="tab">Galeria</a>
                    </li>
                </ul>                
                <div class="tab-content card">                                        

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "GENERAL"
                    -->
                    @include('pages.parametro.partials.general')                     

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "ACERCA DE NOSOTROS"
                    -->
                    @include('pages.parametro.partials.about') 

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "ACERCA DE NOSOTROS"
                    -->
                    @include('pages.parametro.partials.convenio') 

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "NUESTROS HORRIOS"
                    -->
                    @include('pages.parametro.partials.horarios')                     

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "EQUIPO DE LIDEREZ"
                    -->
                    @include('pages.parametro.partials.equipo') 

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "MINISTERIOS"
                    -->
                    @include('pages.parametro.partials.ministerio') 

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "VIDEOS"
                    -->
                    <!--@include('pages.parametro.partials.videos') -->
                    <br>

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "GALERIA"
                    -->
                    @include('pages.parametro.partials.galeria') 
                </div>
            </div>                        
        </div>
    </section>        

    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * MODAL QUE PARA ADMINSITAR EL CONTENIDO "EQUIPO"
    -->
    @include('pages.parametro.modal.modalEquipo') 
    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * MODAL QUE PARA ADMINSITAR EL CONTENIDO "ACERCA DE NOSOTROS"
    -->
    @include('pages.parametro.modal.modalAbout') 
    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * MODAL QUE PARA ADMINSITAR EL CONTENIDO "MINISTERIOS"
    -->
    @include('pages.parametro.modal.modalMinisterio') 
    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * MODAL QUE PARA ADMINSITAR LOS HORARIOS
    -->
    @include('pages.parametro.modal.modalHorario') 

@stop

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.mdb-select').material_select();                                      

            @if(Session::has('tab'))                    
                var tab = '{{Session::get("tab")}}';                    
                $( "#tab"+tab ).last().addClass( "active" );
                $( "#"+tab ).last().addClass( "active" );                    
            @else
                $( "#tabgeneral" ).last().addClass( "active" );
                $( "#general" ).last().addClass( "active" );
            @endif
            
            @if(Session::has('panel'))                    
                var panel = '{{Session::get("panel")}}';                                        
                $( "#panel"+panel ).last().addClass( "active" );
                $( "#"+panel ).last().addClass( "in active show" );                    
            @else
                $( "#panelinfo" ).last().addClass( "active" );
                $( "#info" ).last().addClass( "in active show" );
            @endif

        }); 
    </script>
{!! HTML::script('/assets/plugins/parsley.min.js') !!}
@endpush

