@php
use App\Models\Ministerio;
@endphp

<!--JOFRE ALENXANDER MORALES PLACENCIO
    * SECCION PARA ADMINISTRAR CONTENIDO DE LOS MINISTERIOS
-->                                                                                             
<div class="tab-pane fade in show" id="ministerio" role="tabpanel">
    <div class="table-responsive">
        <table id="tblMinisterios" class="table table-striped table-bordered dt-responsive nowrap">                
            <thead>
                <tr>                    
                    <th class="font-weight-bold" style="width: 100px;">
                        <strong>Título</strong>
                    </th>
                    <th class="font-weight-bold" style="width: 500px;">
                        <strong>Descripción</strong>
                    </th>                                
                    <th class="font-weight-bold" style="width: 100px;">
                        <strong>Dia</strong>
                    </th>                        
                    <th class="font-weight-bold" style="width: 100px;">
                        <strong>Desde</strong>
                    </th>                        
                    <th class="font-weight-bold" style="width: 50px;">
                        <strong>Hasta</strong>
                    </th>                        
                    <th>
                        <a type="button" onclick="nuevoMinisterio();" class="btn-floating btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                </tr>
            </thead>
            <tbody> 

            <!--JOFRE ALENXANDER MORALES PLACENCIO
                * RECORREMOS CONSULTA Y MOSTRAMOS POR PANTALLA
            -->                                                                                                                
            @foreach(Ministerio::all() as $key => $value)
                    <tr>                                                      
                        <td>{{ $value->titulo }}</td>
                        <td style="text-align:justify">{{ $value->descripcion }}</td>
                        <td>{{ $value->dia }}</td>                                                                            
                        <td>{{ $value->desde }}</td>                                                                            
                        <td>{{ $value->hasta }}</td>                                                                            
                        <td>                            
                            <div class="btn-group btn-group-sm inline">
                                <button onclick="editMinisterio({{ $value}});" class="btn btn-primary waves-effect waves-light btn_Editar" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>                    
                                <button onclick="removeMinisterio({{ $value->id}});" class="btn btn-gplus waves-effect waves-light btn_Eliminar" type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>             
                            </div>
                        </td>
                    </tr>
                @endforeach                                     
            </tbody>               
        </table>
    </div>     
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            tblMinisterios = $('#tblMinisterios').DataTable({
                info: false,
                paging:false,
                searching:false,
                iDisplayLength: -1
            });
        });
        

        function editMinisterio(data){            
            $('#ministerioLbl').html('Editar Ministerio');                
            $('#ministerioEstado').val("M");
            $('#ministerioId').val(data.id);                                
            $('#ministerioTitulo').val(data.titulo);
            $('#ministerioDescripcion').val(data.descripcion);
            $('#ministerioOrden').val(data.orden);
            $('#ministerioDia').val(data.dia);
            $('#ministerioDesde').val(data.desde);
            $('#ministerioHasta').val(data.hasta);
            $("#imgMinisterio").attr("src","/img/ministerios/"+data.foto);
            $('#modalMinisterio').modal();                
            //$('#myModal').modal('hide');
        }   
        
        function nuevoMinisterio(){                     
            $('#ministerioLbl').html('Nuevo Ministerio');                
            $('#ministerioEstado').val("C");
            $('#ministerioId').val("");                                
            $('#ministerioTitulo').val("");
            $('#ministerioDescripcion').val("");
            $('#ministerioOrden').val("");
            $('#ministerioDia').val("");
            $('#ministerioDesde').val("");
            $('#ministerioHasta').val("");
            $("#imgMinisterio").attr("src","/img/ministerios/user.png");
            $('#modalMinisterio').modal();                
            //$('#myModal').modal('hide');
        }   
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        function removeMinisterio(id){
            
            $.confirm({
                title: 'Alerta!',
                content: "Seguro desea Eliminar este registro",
                autoClose: 'eliminar|10000',
                buttons: {
                    eliminar: {
                        text: 'Eliminar',
                        action: function () {                            
                            if(id){                                    
                                post_to_url('eliminarMinisterio', {
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
