@extends('layouts.main')

@section('head')
{!! HTML::style('/assets/css/register.css') !!}
{!! HTML::style('/assets/css/parsley.css') !!}
@stop


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


                <!--Card-->
                <div class="card card-cascade narrower">

                    <!--Section: Chart-->
                    <section>

                      <div class="row">
                        <!--Grid row-->
                            <!--Grid column-->
                            <div class="col-xl-12 col-md-8 mb-r">
                                  <!--Card image-->
                                  <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                                        <a href="" class="white-text mx-3">@if($role->id) Editar Rol {{ $role->name }} @else Nuevo Rol @endif </a>
                                        <div>
                                            @if($role->id)
                                            <a href="{{ URL::to('roles/create') }}" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-plus mt-0"></i></a>
                                            @endif
                                            <a href="{{ URL::to('roles') }}" type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-undo mt-0"></i></a>
                                        </div>
                                    </div>
    
                                <!--Card content-->
                                <div class="card-body pb-0">

                                    <!--Panel data-->
                                    <div class="card-body pt-0">

                                        {!! Form::open(['url' => url('roles'), 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ) !!}
                                            <div class="col-md-12">

                                                <!--First row-->
                                                <div class="row">
                                                    <input type="hidden" id="id" name="id" value="{{ $role->id }}" >
                                                    <input type="hidden" id="estado" name="estado" value="{{{ $role->id != '' ? "M" : 'C' }}}" >

                                                
                                                    
                                                    <!--First column-->
                                                    <div class="col-md-3">
                                                        <div class="md-form form-sm">

                                                            {!! Form::text('name', $role->name , [
                                                                'class'                         => 'form-control',
                                                                'required',
                                                                'id'                            => 'name',
                                                                'data-parsley-required-message' => 'Nombre es requerido',
                                                                'data-parsley-minlength'        => '4',
                                                                'data-parsley-maxlength'        => '32'
                                                            ]) !!}
                                                            <label for="username" >Nombre</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <!--First column-->
                                                    <div class="col-md-3">
                                                        <div class="md-form form-sm">

                                                            {!! Form::text('descripcion', $role->descripcion , [
                                                                'class'                         => 'form-control',
                                                                'required',
                                                                'id'                            => 'descripcion',
                                                                'data-parsley-required-message' => 'descripcion es requerido',
                                                                'data-parsley-trigger'          => 'change focusout',
                                                                'data-parsley-minlength'        => '4',
                                                                'data-parsley-maxlength'        => '50'
                                                            ]) !!}
                                                            <label for="descripcion" >Descripcion</label>
                                                        </div>
                                                    <!--Second column-->                                                
                                                </div>
                                            </div>
                                            <!--/.Third row-->
                                            <div class="col-md-12">

                                                <!-- Fourth row -->
                                                <div class="row">                                                    
                                                    <div class="col-md-3 pull-right">

                                                            {!! Form::submit(($role->id!="" ? "Modificar" : "Crear" ),["class" =>"btn btn-sm btn primary-color btn-block register-btn"]
                                                            ) !!}
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.Fourth row -->
                                        {!! Form::close() !!}


                                    </div>
                                    <!--/Panel data-->

                                </div>
                                <!--/.Card content-->
                                <!--/Card image-->

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->
                      </div>




                    </section>
                    <!--Section: Chart-->

                </div>
                <!--/.Card-->

            </section>
        </div>



    </div>



    @stop

    @push('scripts')
   <script>
    $(document).ready(function() {
        $('.mdb-select').material_select();        
    });



    // function init() {
    // $("img[data-type=editable]").each(function (i, e) {
    //     var _inputFile = $('<input/>')
    //         .attr('type', 'file')
    //         .attr('hidden', 'hidden')
    //         .attr('onchange', 'readImage()')
    //         .attr('data-image-placeholder', e.id);

    //     $(e.parentElement).append(_inputFile);

    //     $(e).on("click", _inputFile, triggerClick);
    // });
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
