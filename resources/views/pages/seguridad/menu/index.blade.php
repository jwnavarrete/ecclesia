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
<li class="breadcrumb-item active">Administrar Menu</li>
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


    <section class="mb-5">

        <!--LUIS ALFREDO RODRIGUEZ FRANCO
           * PANTALLA PARA LA ADMINISTRACION DE NUEVAS OPCIONES DEL SISTEMA
           * SE PUEDE CREAR, EDITAR Y ELIMINAR UN MENU
           * SE PUEDE REORDENAR EL MENU A GUSTO
        -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">    
                    <div class="card-body">  
                        <h5 class="card-title">Nuevo Menu</h5>                
                        <div class="table-responsive">                                     
                                <form>             

                                        <div class="md-form form-sm">
                                            <input type="text" id="txtname" class="form-control form-control-sm">
                                            <label for="name">Nombre:</label>
                                        </div>
                                        <div class="md-form form-sm">
                                            <input type="text" id="txturl" class="form-control form-control-sm">
                                            <label for="url">Url:</label>
                                        </div>
                                        <div class="md-form form-sm">
                                            <input type="text" id="txticono" class="form-control form-control-sm">
                                            <label for="url">Icono:</label>
                                        </div>

                                    
                                </form>
                                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">                                
                                <button type="button" onclick="createMenu();" class="btn btn-primary btn-sm waves-light waves-effect pull-right">Grabar</button>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
                
            <div class="col-lg-8">
                 <div class="card">                    
                    <div class="card-body pb-0">                        
                        <h5 class="card-title">Listado de Menu</h5>
                        <div class="table-responsive">                                                         
                            <div class="panel-group" id="accordionMenu">                                  
                                <ol class="sortable" id="menu">
                                    @foreach ($menu as $key => $item)
                                        @if ($item['parent'] != 0)
                                            @break
                                        @endif                
                                        @include('pages.seguridad.menu.submenu',['item' => $item])
                                    @endforeach  
                                </ol>                                            
                            </div> 
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" onclick="GrabarOrden();" class="btn btn-primary btn-sm waves-light waves-effect pull-right">Grabar</button>                                
                            </div>
                        </div>

                    </div>
                    <!--/.Card content-->

                </div>
            </div>            
        </div>

    </section>

   
    @stop

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.mdb-select').material_select();                                                    
            }); 



        $('ol.sortable').nestedSortable({
            forcePlaceholderSize: true,
            handle: 'div',
            helper: 'clone',
            items: 'li',
            opacity: .6,
            placeholder: 'placeholder',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div',
            maxLevels: 3,

            isTree: true,
            expandOnHover: 700,
            startCollapsed: true
        });

        $('.disclose').on('click', function() {
            $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
        })

        $('#serialize').click(function(){
            serialized = $('ol.sortable').nestedSortable('serialize');
            $('#serializeOutput').text(serialized+'\n\n');
        })

        $('#toHierarchy').click(function(e){
            hiered = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
            hiered = dump(hiered);            
            //(typeof($('#toHierarchyOutput')[0].textContent) != 'undefined') ?
            //$('#toHierarchyOutput')[0].textContent = hiered : $('#toHierarchyOutput')[0].innerText = hiered;
        })

        $('#toArray').click(function(e){
            arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
            //arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
            //arraied = dump(arraied);            
            menuOrden(arraied);            
        })


        function GrabarOrden(){
            arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});    
            menuOrden(arraied);            
        }

            
        function menuOrden(array){
            try{
                        
                $.ajax({
                    url: ('/menuOrden'),
                    type: 'post',
                    data: {'list': array},
                    dataType: 'json',
                    success: function (data,json) {
                        toastr.success('Realizado con exito!', "Notifications" );               
                        window.setTimeout(function(){location.reload()},2000);
                    },error   : function ( jqXhr, json, errorThrown ) 
                    {                    
                        toastr.error( "error", "Error " + jqXhr.status +': '+ errorThrown);
                    }
                });    

            } catch(err) {         
            toastr.error( err.message , "Notifications" );       
            }
        }

        
        function editMenu(id){    
            try{              
                var bandera = false;
                $.ajax({
                    url: ('/updateMenu'),
                    type: 'post',
                    data: {
                            id : id,
                            name : $("#nameMenu"+id).val(),
                            icono : $("#iconoMenu"+id).val(),
                            slug : $("#slugMenu"+id).val(),
                        },
                    dataType: 'json',
                    async: false,
                    success: function (data,json) {                   
                        toastr.success('Actualizado con exito!', "Notifications" );                                            
                        window.setTimeout(function(){location.reload()},2000)                              
                    },error   : function ( jqXhr, json, errorThrown ) 
                    {                                                         
                        toastr.error("Error llamada ajax","Error");                            
                        bandera = false;
                    }
                });    
                return bandera;
            } catch(err) {         
                toastr.error( err.message , "Notifications" );                  
            }
        }

        
        function createMenu(){    
            try{              
                var bandera = false;
                $.ajax({
                    url: ('/createMenu'),
                    type: 'post',
                    data: {                            
                            name : $("#txtname").val(),
                            icono : $("#txticono").val(),
                            slug : $("#txturl").val(),
                        },
                    dataType: 'json',
                    async: false,
                    success: function (data,json) {                   
                        toastr.success('creado con exito!', "Notifications" );                                            
                        window.setTimeout(function(){location.reload()},2000)                              
                    },error   : function ( jqXhr, json, errorThrown ) 
                    {                                                         
                        toastr.error("Error llamada ajax","Error");                            
                        bandera = false;
                    }
                });    
                return bandera;
            } catch(err) {         
                toastr.error( err.message , "Notifications" );                  
            }
        }

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


        function remove(id){
            var obj = {texto:"Seguro desea Eliminar este registro",
                            callback:deleteMenu,
                            data:id}

            eliminar(obj);
        }

        function deleteMenu(id){    

            try{              
                var bandera = false;
                $.ajax({
                    url: ('/deleteMenu'),
                    type: 'post',
                    data: {                            
                            id :id,                            
                        },
                    dataType: 'json',
                    async: false,
                    success: function (data,json) {                   
                        toastr.success('Eliminado con exito!', "Notifications" );                                            
                        window.setTimeout(function(){location.reload()},2000)                              
                    },error   : function ( jqXhr, json, errorThrown ) 
                    {                                                         
                        toastr.error("Error llamada ajax","Error");                            
                        bandera = false;
                    }
                });    
                return bandera;
            } catch(err) {         
                toastr.error( err.message , "Notifications" );                  
            }
        }


        </script>



    {!! HTML::script('/assets/plugins/parsley.min.js') !!}

    @endpush

