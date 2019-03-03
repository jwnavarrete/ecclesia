@extends('layouts.main')

@section('head')
{!! HTML::style('/assets/css/register.css') !!}
{!! HTML::style('/assets/css/parsley.css') !!}
@stop

<?php
    use App\Models\Lista;
    $lista = new Lista
?>

<!--WILMER WALTER NAVARRETE ALVAREZ
    * PAGINA PARA CRER Y EDITAR UN CURSO
-->                                        

@section('content')

    <style>
        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {
            /*border-bottom: 1px solid #00c851;
            box-shadow: 0 1px 0 0 #00c851;*/
        }

        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            border-bottom: 1px solid #f44336;
            box-shadow: 0 1px 0 0 #f44336;
        }

        .parsley-errors-list {
        margin: 2px 0 3px;
        padding: 0;
        list-style-type: none;
        font-size: 0.9em;
        line-height: 0.9em;
        opacity: 0;

        transition: all .3s ease-in;
        -o-transition: all .3s ease-in;
        -moz-transition: all .3s ease-in;
        -webkit-transition: all .3s ease-in;
        color: #f44336;
        }

        .parsley-errors-list.filled {
        opacity: 1;
        }
    </style>

    <div class="row">

        <div class="col-lg-12">

            <section class="mb-5">

                <div class="card card-cascade narrower">

                    <section>

                        <div class="row">                        
                            <div class="col-xl-3 col-md-4 mb-r">
                                <form class="md-form">
                                    <div class="file-field" >
                                        <div class="view overlay">                                            
                                            @if($cursos->foto)
                                                <img src="/img/cursos/{{$cursos->foto}}" id="companyLogo" class="img-fluid" alt="example placeholder avatar">                                            
                                            @else
                                                <img src="/img/cursos/curso.jpg" id="companyLogo" class="img-fluid" alt="example placeholder avatar">                                            
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-center">                                            
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-xl-9 col-md-8 mb-r">

                                <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                                    <a href="" class="white-text mx-3">@if($cursos->id) Editar Curso {{ $cursos->titulo }} @else Nuevo Curso @endif </a>
                                    <div>
                                        @if($cursos->id)
                                        <a href="{{ URL::to('cursos/create') }}" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-plus mt-0"></i></a>
                                        @endif
                                        <a href="{{ URL::to('cursos') }}" type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-undo mt-0"></i></a>
                                    </div>
                                </div>

                                <div class="card-body pb-0">

                                    <div class="card-body pt-0">

                                        {!! Form::open(['url' => url('cursos'), 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ) !!}

                                            <div class="row">
                                                <input type="hidden" id="id" name="id" value="{{ $cursos->id }}" >
                                                <input type="hidden" id="modo" name="modo" value="{{{ $cursos->id != '' ? "M" : 'C' }}}" >
                                                
                                                <div class="col-md-6">
                                                    <div class="md-form form-sm">

                                                        {!! Form::text('titulo', $cursos->titulo , [
                                                            'class'                         => 'form-control',
                                                            'required',
                                                            'id'                            => 'titulo',
                                                            'data-parsley-required-message' => 'Titulo es requerido',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-pattern'          => '/^[A-Za-z\sáéíóúñ]*$/',
                                                            'data-parsley-minlength'        => '4',
                                                            'data-parsley-maxlength'        => '32'
                                                        ]) !!}
                                                        <label for="titulo" >Titulo</label>
                                                    </div>
                                                </div>
                                                <!--First column-->
                                                <div class="col-md-3">
                                                    <div class="md-form form-sm">
                                                        {!! Form::select('maestro', $lista->getMaestros(), $cursos->maestro  , [
                                                            'placeholder' => 'Maestros...',
                                                            'required',
                                                            'id'=>'maestro',
                                                            'onchange'=>'',                                        
                                                            'data-parsley-required-message' => 'Pais es requirdo',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            "class"=>"mdb-select colorful-select dropdown-primary"]
                                                        ) !!}      
                                                        <label for="maestro" >Mestro</label>
                                                    </div>                                                                                                    
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <div class="md-form form-sm">   
                                                        <!--The "to" Date Picker -->
                                                        {!! Form::text('capacidad', $cursos->capacidad , [
                                                            'class'                         => 'form-control',
                                                            'required',
                                                            'id'                            => 'capacidad',
                                                            'data-parsley-required-message' => 'capacidad es requerido',
                                                            'data-parsley-trigger'          => 'change focusout',                                                            
                                                            'data-parsley-minlength'        => '1',
                                                            'data-parsley-maxlength'        => '3'
                                                        ]) !!}
                                                    <label for="endingDate">capacidad</label>
                                                    </div>
                                                   
                                                
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="md-form form-sm">
                                                        {!! Form::textarea('detalle', $cursos->detalle , [
                                                            'class'                         => 'md-textarea',
                                                            //'placeholder'                   => 'Direccion',
                                                            'required',
                                                            'id'                            => 'detalle',
                                                            'data-parsley-required-message' => 'detalle requerida',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-pattern'          => '',
                                                            'data-parsley-minlength'        => '4',
                                                            'data-parsley-maxlength'        => '200'
                                                        ]) !!}
                                                        <label for="detalle" >detalle</label>

                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="row">                                                                    

                                                        <div class="col-md-6">
                                                             <div class="md-form form-sm">
                                                                <div class="file-field">
                                                                    <div class="btn btn-primary btn-sm float-left">
                                                                        <span>Choose files</span>
                                                                        
                                                                        {!! Form::file('image', array('class' => 'image','multiple')) !!}
                                                                    </div>

                                                                    <div class="file-path-wrapper">
                                                                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="md-form form-sm">                                                            
                                                                <div class="switch">                                                            
                                                                    <label> 
                                                                        Estado                                                     
                                                                        <input id="estado" name="estado" {{($cursos->estado=='1'? 'checked="checked"':'')}}}   type="checkbox">
                                                                        <span class="lever"></span>
                                                                    </label>
                                                                </div>
                                                            
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                           

                                        
                                                <div class="col-md-12 text-center">
                                                    <div class="col-md-3 pull-right">
                                                            {!! Form::submit(($cursos->id!="" ? "Modificar" : "Crear" ),["class" =>"btn btn-sm btn primary-color btn-block register-btn"]
                                                            ) !!}
                                                    </div>

                                                </div>
                                          
                                        {!! Form::close() !!}


                                    </div>

                                </div>
                                
                            </div>
                            
                            </div>
                        </div>

                    </section>                    

                </div>
                
            </section>
        </div>



    </div>


    @stop

    @push('scripts')
   <script>
    $(document).ready(function() {
        $('.mdb-select').material_select();

        $('.datepicker').pickadate({
            // Escape any “rule” characters with an exclamation mark (!).
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
            weekdaysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            //format: 'd: dddd, dd mmm, yyyy',
            format: 'yyyy-mm-dd',
            formatSubmit: 'yyyy-mm-dd',
            //hiddenPrefix: 'prefix__',
            //hiddenSuffix: '__suffix'
        });


    });



    function init() {
    $("img[data-type=editable]").each(function (i, e) {
        var _inputFile = $('<input/>')
            .attr('type', 'file')
            .attr('hidden', 'hidden')
            .attr('onchange', 'readImage()')
            .attr('data-image-placeholder', e.id);

        $(e.parentElement).append(_inputFile);

        $(e).on("click", _inputFile, triggerClick);
    });
}

function triggerClick(e) {
    e.data.click();
}

Element.prototype.readImage = function () {
    var _inputFile = this;
    if (_inputFile && _inputFile.files && _inputFile.files[0]) {
        var _fileReader = new FileReader();
        _fileReader.onload = function (e) {
            var _imagePlaceholder = _inputFile.attributes.getNamedItem("data-image-placeholder").value;
            var _img = $("#" + _imagePlaceholder);
            _img.attr("src", e.target.result);
        };
        _fileReader.readAsDataURL(_inputFile.files[0]);
    }
};

//
// IIFE - Immediately Invoked Function Expression
// https://stackoverflow.com/questions/18307078/jquery-best-practises-in-case-of-document-ready
(

function (yourcode) {
    "use strict";
    // The global jQuery object is passed as a parameter
    yourcode(window.jQuery, window, document);
}(

function ($, window, document) {
    "use strict";
    // The $ is now locally scoped
    $(function () {
        // The DOM is ready!
        init();
    });

    // The rest of your code goes here!
}));
    </script>


    {!! HTML::script('/assets/plugins/parsley.min.js') !!}

    @endpush
