@extends('layouts.main')

@section('head')

@stop

@section('content')

@section('breadcrumb')
<li class="breadcrumb-item active">Administrar Roles</li>
@stop


<div class="row">
    <!--LUIS ALFREDO RODRIGUEZ FRANCO
       * PAGINA PARA ADIMINISTAR ROLES
       * CREACION DE UN ROL
       * EDICION DE UN ROL
       * ELIMINACION DE UN ROL
    -->


    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: -20px;margin-top: -20px;">
                <div class="btn-group btn-group-sm inline" style="vertical-align: -35px;">
                    <a class="btn btn-primary" href="{{ URL::to('roles/create') }}" type="button" title="Nuevo apadrinado" id="MainToolbar_DXI0_"><span class="image fa fa-plus"></span></a>                    
                    <button class="btn btn-primary" type="button" title="Imprimir" id="MainToolbar_DXI0_"><span class="image fa fa-print"></span></button>                                                
                    <button class="btn btn-primary btnTable active" tipoTabla="grid" type="button" title="Modo tabla" id="MainToolbar_DXI5_"><span class="image fa fa-table"></span></button>       
                </div>      
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
                        
                        <!--LUIS ALFREDO RODRIGUEZ FRANCO
                           RECORREMOS ROLES Y PINTAMOS LA TABLA
                        -->
                        <div class="table-responsive">
                            <table id="tblRoles" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Descripcion</td>
                                        <td>Fecha Creacion</td>
                                        <td>Fecha Modificacion</td>                                            
                                        <td>Accion</td>                                            
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->descripcion }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->updated_at }}</td>                                                                                                    
                                        <td width="120px">                        
                                            <div class="btn-group btn-group-sm inline">
                                                <a href="{{ URL::to('roles/' . $value->id . '/edit') }}" class="btn btn-primary waves-effect waves-light" onclick="cargaChild('ECU-1234');" type="button" title="Editar"><span class="image fa fa-pencil"></span></a>                    
                                                <a onclick="remove({{$value->id}})" class="btn btn-gplus waves-effect waves-light" onclick="eliminaChild('ECU-1234');" type="button" title="Eliminar"><span class="image fa fa-trash"></span></a>                     
                                            </div>                                                                                    
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>                
                </div>        
            </div>

        </div>  

    </div>
    
</div>

@stop

@push('scripts')

<script>
    var tblRoles;
    $(document).ready(function() {

            tblRoles = $('#tblRoles').DataTable({
                dom: 'rtp',                
            });

            $('#txtBuscar').on('keyup change', function () {
                if (tblRoles == null){return false}
                tblRoles.search(this.value).draw();
            });
    });

    function remove(id){
        var obj = {texto:"Seguro desea Eliminar este registro",
                        callback:eliminarPerfil,
                        data:id}

        eliminar(obj);
    }

    function eliminarPerfil(id){            
        try{

            $.ajax({
                url: '/eliminarRol',
                type: 'post',
                data: {'id':id},
                dataType: 'json',
                success: function (data) {
                    if (data.estado==0) {                            
                        toastr.success( data.message , "Notifications" );
                        window.setTimeout(function(){location.reload()},3000);
                    }else{
                        toastr.error( data.message , "Error" );
                    }
                },error   : function ( jqXhr, json, errorThrown )
                {
                    toastr.error( "error llamada ajax", "Error" );
                }
            });
            } catch(err) {
                toastr.error(err , "Error" );
            }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });        


    function eliminar(obj){
        $.confirm({
            title: 'Alerta!',
                content: obj.texto,
                autoClose: 'eliminar|10000',
                buttons: {
                    eliminar: {
                        text: 'Eliminar',
                        action: function () {                            
                            if(typeof obj.callback == 'function'){
                                obj.callback(obj.data);
                            }
                        }
                    },
                    cancel: function () {
                        $.alert('cancelado');
                    }
                
                }
            });
    }

</script>

@endpush
