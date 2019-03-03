@extends('layouts.main')


@section('head')
{!! HTML::style('/assets/css/register.css') !!}
{!! HTML::style('/assets/css/parsley.css') !!}
@stop

<?php
    use App\Models\Lista;
    $lista = new Lista
?>


@section('breadcrumb')
<li class="breadcrumb-item active">Asistencia Cursos</li>
@stop

@section('content')


    <section class="mb-5">


        <div class="row">
            
            
            <div class="col-lg-8">
                 <div class="card card-cascade narrower mb-r">

                    <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">                        
                        <a href="" class="white-text mx-3">Grupo A - Niños desde cuatro a cinco de edad</a>                        
                    </div>

                    <!--Card content-->
                    <div class="card-body pb-0">                        
                 
                        <div class="table-responsive">                    
                                                                                        
                                <ul class="list-group">
                                    @foreach( $lista->allChild() as $key => $child)                                                                                         
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{$child->apellidoPaterno}}
                                                {{$child->apellidoMaterno}}
                                                {{$child->primerNombre}}
                                                {{$child->segundoNombre}}                                            

                                                <div class="switch">
                                                    <label>                                                    
                                                        <input type="checkbox">
                                                        <span class="lever"></span>                                                    
                                                    </label>
                                                </div>
                                                
                                        </li>
                                    @endforeach
                                    
                                </ul>

                        </div>
                        
                        <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="col-md-3 pull-right">
                                            <a onclick="GrabarOrden();" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Grabar</a>
                                    </div>
    
                                </div>
                            </div>
                            <br>                            
    
                    </div>
                    <!--/.Card content-->

                </div>

            </div>            

            <div class="col-lg-4">
                    <div class="card card-cascade narrower mb-r">
                            <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">                        
                                    <a href="" class="white-text mx-3">Observaciones</a>                        
                                </div>
            
                      
                        <!--Card content-->
                        <div class="card-body pb-2">                        
                    
                            <div class="table-responsive">                                    
                                    <form>             

                                        <div class="md-form form-sm">
                                            <textarea type="text" id="form7" class="md-textarea form-control" rows="3"></textarea>
                                            <label for="form7">Observaciones</label>
                                        </div>
                                            
                                    </form>
                                                
                            </div>
    
                            <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="col-md-6 pull-right">
                                            <a onclick="createMenu();" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Grabar</a>
                                        </div>
        
                                    </div>
                                </div>
                                <br>                            
        
                        </div>
                        <!--/.Card content-->
    
                    </div>
    
                </div>
        </div>

        <!--Card-->

        <!--/.Card-->
    </section>

   
    @stop

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.mdb-select').material_select();                                            
            }); 



        </script>



    {!! HTML::script('/assets/plugins/parsley.min.js') !!}

    @endpush

