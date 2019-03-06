<?php
    use App\Models\About;    
    $about = new About;
    $arrAbout = $about->all();
?>

<!--JOFRE ALENXANDER MORALES PLACENCIO
    * VISTA DONDE SE VISUALIZARA EL ACAERCA DE NOSOTROS
-->
<div class="tab-pane fade" id="about" role="tabpanel">        
    <div class="table-responsive">
        <table id="tblAbout" class="table table-striped table-bordered dt-responsive nowrap">            
            <thead>
                <tr>
                    <th class="font-weight-bold" style="width: 50px;">
                        <strong>Orden</strong>
                    </th>                                                      
                    <th class="font-weight-bold" style="width: 100px;">
                        <strong>Nombre</strong>
                    </th>
                    <th class="font-weight-bold" style="width: 100px;">
                        <strong>Título</strong>
                    </th>                                
                    <th class="font-weight-bold" style="width: 500px;">
                        <strong>Descripción</strong>
                    </th>                        
                    <th>
                        <a type="button" onclick="nuevoAbout();" class="btn-floating btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                </tr>
            </thead>            
            <tbody>        
            <!--JOFRE ALENXANDER MORALES PLACENCIO
                * RECORREOMOS LA INFORMACION QUE ARROJA LA BASE DE DATOS Y LA MOSTRAMOS
            -->        
            @foreach($arrAbout as $key => $value)
                <tr>                                    
                    <td>{{$value->orden}}</td>                                    
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->titulo }}</td>                                                                            
                    <td style="text-align:justify">{{ $value->descripcion }}</td>
                    <td>                                    
                        <div class="btn-group btn-group-sm inline">
                            <button onclick="editAbout({{$value}})" class="btn btn-primary waves-effect waves-light btn_Editar" type="button" title="Editar">
                                <span class="image fa fa-pencil"></span>
                            </button>                    
                            <button onclick="removeAbout({{ $value->id}});" class="btn btn-gplus waves-effect waves-light btn_Eliminar" type="button" title="Eliminar">
                                <span class="image fa fa-trash"></span>
                            </button>                
                        </div>                            
                    </td>
                </tr>
            @endforeach                                
            </tbody>            
        </table>
    </div> 
</div>

<!--JOFRE ALENXANDER MORALES PLACENCIO
    * SECCION PARA CODIGO JAVASCRIPTS
-->        

@push('scripts')
    <script>
        $(document).ready(function() {
            tblAbout = $('#tblAbout').DataTable({
                info: false,
                paging:false,
                searching:false,
                iDisplayLength: -1
            });
        });

        function editAbout(data){            
            $('#aboutlbl').html('Editar About');                
            $('#aboutEstado').val("M");
            $('#aboutId').val(data.id);                                
            $('#aboutNombre').val(data.name);
            $('#aboutTitulo').val(data.titulo);
            $('#aboutDescripcion').val(data.descripcion);
            $('#aboutOrden').val(data.orden);                
            $("#imgAbout").attr("src","/img/about/"+data.foto);
            $('#modalAbout').modal()
            //$('#modalAbout').modal();                
            //$('#myModal').modal('hide');
        }   
        
        function nuevoAbout(){                
            $('#aboutlbl').html('Nuevo About');                
            $('#aboutEstado').val("C");
            $('#aboutId').val("");                                
            $('#aboutNombre').val("");
            $('#aboutTitulo').val("");
            $('#aboutDescripcion').val("");
            //$("#imgAbout").attr("src","/img/about/"+data.foto);
            $('#modalAbout').modal()
            //$('#myModal').modal('hide');
        }   
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        function removeAbout(id){
            
            $.confirm({
                title: 'Alerta!',
                content: "Seguro desea Eliminar este registro",
                autoClose: 'eliminar|10000',
                buttons: {
                    eliminar: {
                        text: 'Eliminar',
                        action: function () {                            
                            if(id){                                    
                                post_to_url('eliminarAbout', {
                                    id:id,
                                    _token:'{{ csrf_token() }}'
                                }, 'post');
                            }
                        }
                    },
                    cancel: function () {
                        $.alert('cancelado');
                    }
                
                }
            }); 
        }

        function post_to_url(path, params, method) {
            method = method || "post";
            var form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", path);

            for(var key in params) {
                if(params.hasOwnProperty(key)) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", params[key]);

                    form.appendChild(hiddenField);
                }
            }

            document.body.appendChild(form);
            form.submit();
        }       
    </script>
@endpush
