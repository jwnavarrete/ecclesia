@extends('layouts.main')

@section('head')

@stop

@section('content')

@section('breadcrumb')
<li class="breadcrumb-item active">Administrar Usuarios</li>
@stop


<div class="row">
    <!--LUIS ALFREDO RODRIGUEZ FRANCO
        * PANTALLA PARA ADMINISTRAR LOS USUARIOS DEL SISTEMA
    -->
        
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: -20px;margin-top: -20px;">
                <!--LUIS ALFREDO RODRIGUEZ FRANCO
                    * BOTONES DE LA PANTALLA (CREAR, IMPRIMIR)
                -->
                <div class="btn-group btn-group-sm inline" style="vertical-align: -35px;">
                    <a class="btn btn-primary" href="{{ URL::to('usuarios/create') }}" type="button" title="Nuevo apadrinado" id="MainToolbar_DXI0_"><span class="image fa fa-plus"></span></a>                    
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
                            * SECCION DONDE SE MUESTRA EL LISTADO DE LOS USUARIOS
                        -->
                        <div class="table-responsive">
                            <table id="tblUsuario" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
                            </table>
                        </div>
                    </div>                
                </div>        
            </div>

        </div>  

    </div>    
</div>
        
@stop

 
  
<!--LUIS ALFREDO RODRIGUEZ FRANCO
    * SCRIPTS PARA EL MANTENIMIENTO DE USUARIOS
    * LISTADO DE USUARIOS
    * CREAR UN NUEVO USAURIO
    * MODIFICAR UN USUARIOS
    * ELIMINAR UN USUARIO
-->
@push('scripts')
    
<script>


    var tblUsuario;
    $(document).ready(function() {

        cargarDatatable();
        
        $('#txtBuscar').on('keyup change', function () {
            if (tblUsuario == null){return false}
            tblUsuario.search(this.value).draw();
        });

        $('#txtBuscar').keyup(function(e){
            e.preventDefault();
            if(e.which==13)buscar($(this).val());
        })

        $('#btnEdit').on('click', function () {
            if(seleccionado()){
                var data = tblUsuario.row('tr.selected' ).data();                
                $(location).attr('href', 'usuarios/'+data.id);
            }
        });

        $('#tblUsuario tbody').on( 'click', '.btn_Editar', function () {
            var data = tblUsuario.row( $(this).parents('tr') ).data();
            $(location).attr('href', 'usuarios/'+data.id);            
        });

        $('#tblUsuario tbody').on( 'click', '.btn_Eliminar', function () {
            var data = tblUsuario.row( $(this).parents('tr') ).data(); 
            
            var obj = {texto:"Seguro desea Eliminar este registro",
                        callback:eliminarUsuario,
                        data:data}

            eliminar(obj);
        });



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
    function eliminarUsuario(data){            
        try{
            $.ajax({
                url: '/eliminarUsuario',
                type: 'post',
                data: {'id':data.id},
                dataType: 'json',
                success: function (data) {
                    if (data.estado==0) {
                        cargarDatatable();
                        toastr.success( data.message , "Notifications" );
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


    function cargarDatatable(){
                try {
                tblUsuario = $('#tblUsuario').DataTable({
                        "processing": true,
                        //"serverSide": true,                        
                        dom: 'rtp',
                        "ajax": "{{ route('datatable.listaUsuario') }}",
                        //dom: 'frtip',
                        destroy: true,
                        createdRow: function( row, data, dataIndex ) {
                            if ( data["estado"] == "0" ) {
                                $( row ).css( "background-color", "orange" );
                                $( row ).addClass( "danger" );
                            }
                        },
                        "columns": [                                                                                                                        
                            {data: 'id', name: 'id',title:'Id' },
                            {data: 'nomRol', name: 'rol',title:'Rol' },
                            {data: 'username', name: 'username',title:'Usuario' },
                            {data: 'first_name', name: 'nombres',title:'Nombres' },
                            {data: 'last_name', name: 'apellidos',title:'Apellidos' },
                            {data: 'email', name: 'email',title:'Email' },
                            {data: 'nomIglesia', name: 'iglesia',title:'Iglesia' },
                            {data: 'nomPais', name: 'pais',title:'Pais' },                            
                            {data: 'nomSocial', name: 'sosial',title:'Social Login' },                                                        
                            {
                                data: "MachineNumber",title:"Accion", width: "60px", render: function (data) {

                                    return `<div class="btn-group btn-group-sm inline">
                                        <button class="btn btn-primary waves-effect waves-light btn_Editar" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>                    
                                        <button class="btn btn-gplus waves-effect waves-light btn_Eliminar" type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>                                                                    
                                    </div>`;                                         
                                }
                            },
                            //{data: 'created_at', name: 'created_at',title:'F. Creacion' },
                            //{data: 'updated_at', name: 'updated_at',title:'F. Modificacion' },

                        ]
                    });


                }
            catch(err) {
                toastr.error( err.message , "Notifications" );
            }
    }



    function seleccionado(){
        if (tblUsuario.rows('.selected').data().length==0){
            toastr.warning( "No ha seleccionado Usuario", 'Hey!');
            return false;
        }
        return true;
    }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });        

</script>
@endpush
