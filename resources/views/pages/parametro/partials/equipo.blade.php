@php
use App\Models\Equipo;
@endphp
       
<!--JOFRE ALENXANDER MORALES PLACENCIO
    * SECCION PARA PARAMETRIZAR EL CUERPO DE LIDERES
-->                          
<div class="tab-pane fade in show" id="equipo" role="tabpanel">    
    <div class="table-responsive">            
        <table id="tblEquipo" class="table table-striped table-bordered dt-responsive nowrap">                
            <thead>
                <tr>                    
                    <th style="width: 100px;">
                        <strong>Nombre</strong>
                    </th>
                    <th style="width: 100px;">
                        <strong>Cargo</strong>
                    </th>                                
                    <th style="width: 400px;">
                        <strong>Descripción</strong>
                    </th>                        
                    <th style="text-align: center; width: 50px;">
                         <a type="button" onclick="nuevoEquipo();" class="btn-floating btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                </tr>
            </thead>
            <tbody>           
            <!--JOFRE ALENXANDER MORALES PLACENCIO
                * CONSULTAMOS LOS EQUIPOS Y LO MOSTRAMOS POR PANTALLA
            -->                                                                                             
            @foreach(Equipo::all() as $key => $value)
                    <tr>                                    
                        <td>{{ $value->nombre }}</td>
                        <td>{{ $value->cargo }}</td>                                                                            
                        <td style="text-align:justify">{{ $value->descripcion }}</td>
                        <!--JOFRE ALENXANDER MORALES PLACENCIO
                            * BOTONES DE ADMINISTRACION
                        -->                                                                                    
                        <td style="text-align: center;">
                            <div class="btn-group btn-group-sm inline">
                                <button onclick="editEquipo({{ $value}});" class="btn btn-primary waves-effect waves-light btn_Editar" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>                    
                                <button onclick="removeEquipo({{ $value->id}});" class="btn btn-gplus waves-effect waves-light btn_Eliminar" type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>                                                                    
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
                tblEquipo = $('#tblEquipo').DataTable({
                    info: false,
                    paging:false,
                    searching:false,
                    iDisplayLength: -1
                });
            });

            function editEquipo(data){                
                $('#lblModo').html('Editar Equipo');                
                $('#txtEstado').val("M");
                $('#txtId').val(data.id);                                
                $('#txtNombre').val(data.nombre);
                $('#txtCargo').val(data.cargo);
                $('#txtDescripcion').val(data.descripcion);
                $("#imgEquipo").attr("src","/img/team/"+data.foto);
                $('#modalEquipo').modal();                
                //$('#myModal').modal('hide');
            }   
            
            function nuevoEquipo(){                     
                $('#lblModo').html('Nuevo Equipo');                
                $('#txtEstado').val("C");
                $('#txtId').val("");                                
                $('#txtNombre').val("");
                $('#txtCargo').val("");
                $('#txtDescripcion').val("");
                $("#imgEquipo").attr("src","/img/team/user.png");
                $('#modalEquipo').modal();                
                //$('#myModal').modal('hide');
            }   
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
        
            function removeEquipo(id){
                
                $.confirm({
                    title: 'Alerta!',
                    content: "Seguro desea Eliminar este registro",
                    autoClose: 'eliminar|10000',
                    buttons: {
                        eliminar: {
                            text: 'Eliminar',
                            action: function () {                            
                                if(id){                                    
                                    post_to_url('eliminarEquipo', {
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
