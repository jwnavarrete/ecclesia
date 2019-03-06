@extends('layouts.main')


@section('head')
@stop

<?php
    use App\Models\Lista;
    $lista = new Lista
?>


@section('breadcrumb')
<li class="breadcrumb-item active">Administrar Menu</li>
@stop

@section('content')

    <section class="mb-5">
        <div class="row">

            <div class="col-lg-8">
                 <div class="card card-cascade narrower mb-r">
                    <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">                        
                        <a href="" class="white-text mx-3">{{ $curso->titulo}}</a>                        
                    </div>

                    <input type="hidden" name="hddCurso" id="hddCurso" value="{{ $curso->id}}">
                    <input type="hidden" name="hddCrono" id="hddCrono" value="{{ $cronograma->id }}">
                    

                    <div class="card-body pb-0">                        
                        <div class="table-responsive">                    
                            <ul class="list-group">
                                @foreach( $usuarios as $key => $usuario)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{$usuario->first_name}}
                                        {{$usuario->last_name}}

                                        <div class="switch">
                                            <label>                                                    
                                                <input class="chkAsiste" id="{{$usuario->id}}" type="checkbox">
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
                                    <a onclick="grabarAsistencia();" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Grabar</a>
                                </div>

                            </div>
                        </div>    
                    </div>
                </div>
            </div>            

            <div class="col-lg-4">
                <div class="card card-cascade narrower mb-r">
                    <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">                        
                        <a href="" class="white-text mx-3">Observaciones</a>                        
                    </div>
                          
                    <div class="card-body pb-2">                                        
                        <div class="table-responsive">                                    
                            <form>             
                                <div class="md-form form-sm">
                                    <textarea type="text" id="txtObservacion" class="md-textarea form-control" rows="3">{{ $cronograma->comentario }}</textarea>
                                    <label for="txtObservacion">Observaciones</label>
                                </div>                                    
                            </form>                                            
                        </div>                    
                    </div>                    
                </div>
            </div>

        </div>
    </section>    

    @stop

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.mdb-select').material_select();                                            
                getAsistencia();
            }); 

            function grabarAsistencia() {
                arrAsistencia = [];
                $('.chkAsiste').each(function () {                    
                    obj = {};
                    obj.asiste = (this.checked == true ? '1' : '0');
                    obj.idUsuario = this.id;
                    obj.idCrono = $("#hddCrono").val();
                    arrAsistencia.push(obj);
                });

                $.ajax({
                    url: '/saveAsistenciaCurso',
                    type: 'post',               
                    data: {
                        asistencia : arrAsistencia,
                        idCrono : $("#hddCrono").val(),
                        comentario : $("#txtObservacion").val(),
                    },              
                    dataType: 'json',
                    success: function (retorno) {
                        if (continuaSession(retorno)) {
                            toastr.success( retorno.message , "Notifications" );    
                        }                        
                    },
                    error: function (xhr, status, errorThrown) {
                        toastr.error( "error llamada ajax", "Error" );
                    }        
                });
            }

            function getAsistencia(){
                $.ajax({
                    url: '/getAsistencia',
                    type: 'get',               
                    data: {                        
                        idCrono : $("#hddCrono").val()
                    },              
                    dataType: 'json',
                    success: function (retorno) {
                        if (continuaSession(retorno)) {                                                        
                            $.each(retorno.data, function(i, item) {                                
                                $("#"+item.idUsuario).prop('checked',item.asiste);
                            })                            
                        }
                    },
                    error: function (xhr, status, errorThrown) {
                        toastr.error( "error llamada ajax", "Error" );
                    }        
                });
            }
        </script>
    @endpush

