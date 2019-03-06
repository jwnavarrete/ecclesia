@php
    use App\Models\horarios;
@endphp

<!--JOFRE ALENXANDER MORALES PLACENCIO
    * SECCION PARA INFORMACION DE LOS HORARIOS DE REUNIONES
-->                                                                                                           
<div class="tab-pane fade in show" id="horarios" role="tabpanel">    
    <div class="table-responsive">            
        <table id="tblHorarios" class="table table-striped table-bordered dt-responsive nowrap">                
            <thead>
                <tr>                    
                    <th style="width: 100px;">
                        <strong>Dia</strong>
                    </th>
                    <th style="width: 100px;">
                        <strong>Titulo</strong>
                    </th>                                
                    <th style="width: 500px;">
                        <strong>Lugar</strong>
                    </th>                        
                    <th style="width: 50px;">
                        <a type="button" onclick="nuevoHorario();" class="btn-floating btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                </tr>
            </thead>
            <tbody>      
            <!--JOFRE ALENXANDER MORALES PLACENCIO
                * RECORREMOS CONSULTA Y MOSTRAMO POR PANTALLA
            -->                                                                                                           
            @foreach(horarios::all() as $key => $value)
                    <tr>                                    
                        <td>{{ $value->dia }}</td>
                        <td>{{ $value->titulo }}</td>                                                                            
                        <td style="text-align:justify">{{ $value->lugar }}</td>                                                                            
                        <td>
                            <div class="btn-group btn-group-sm inline">
                                <button onclick="editHorario({{ $value}});" class="btn btn-primary waves-effect waves-light btn_Editar" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>                    
                                <button onclick="removeHorario({{ $value->id}});" class="btn btn-gplus waves-effect waves-light btn_Eliminar" type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>                                              
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
            tblHorarios = $('#tblHorarios').DataTable({
                info: false,
                paging:false,
                searching:false,
                iDisplayLength: -1
            });
        });

        function editHorario(data){            
            $('#lblModoHorario').html('Editar horario');            
            $('#txtIdHorario').val(data.id);                      
            $('#txtDiaHorario').val(data.dia);
            $('#txtTituloHorario').val(data.titulo);
            $('#txtComentarioHorario').val(data.comentario);            
            $('#txtLugarHorario').val(data.lugar);            
            $('#txtHoraHorario').val(data.horario);            
            
            $('#modalHorario').modal();                            
        }   
        
        function nuevoHorario(){                     
            $('#lblModoHorario').html('Nuevo Horario');            
            $('#txtIdHorario').val("");                                
            $('#txtDiaHorario').val("");
            $('#txtTituloHorario').val("");
            $('#txtLugarHorario').val("");            
            $('#txtComentarioHorario').val("");
            $('#txtHoraHorario').val("");            
            $('#modalHorario').modal();            
        }   
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        function removeHorario(id){
            
            $.confirm({
                title: 'Alerta!',
                content: "Seguro desea Eliminar este registro",
                autoClose: 'eliminar|10000',
                buttons: {
                    eliminar: {
                        text: 'Eliminar',
                        action: function () {                            
                            if(id){                                    
                                post_to_url('eliminarHorario', {
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
   

    </script>


@endpush