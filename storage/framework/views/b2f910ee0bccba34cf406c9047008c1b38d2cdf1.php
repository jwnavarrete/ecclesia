<?php 
    use App\Models\User;    
 ?>

<div class="modal hide" style="display: none;" id="modalMaestros" tabindex="-2" role="adialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-lg" role="document2">
        <!--Content-->
        <div class="modal-content">

            <!--Body-->
            <div class="modal-body text-center mb-1">
                
                <h5 class="mt-1 mb-2" id="aboutlbl"></h5>
                
                <div class="table-responsive">                                                
                    <form>             
                        <div class="col-md-12">
                            <div class="row">                                
                                <input type="hidden" name="hddCodigoMaestro" id="hddCodigoMaestro">
                                
                                <div class="col-md-4">
                                    <div class="md-form form-sm">
                                        <select id="txtUsuarioMaestro" name="txtUsuarioMaestro" onchange="setNombre(this)" class="mdb-select colorful-select dropdown-primary">
                                            <option></option>
                                            <?php $__currentLoopData = User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $usuario): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>   
                                                <option 
                                                value="<?php echo e($usuario->id); ?>" 
                                                nombre="<?php echo e($usuario->first_name); ?>" 
                                                apellido="<?php echo e($usuario->last_name); ?>" 
                                                ><?php echo e($usuario->last_name); ?> <?php echo e($usuario->first_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </select>                                        
                                        <label for="txtUsuarioMaestro">Titulo:</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-sm">      
                                        <input type="text" disabled="disabled" id="txtNombreMaestro" name="txtNombreMaestro" class="form-control form-control-sm">
                                        <label for="txtNombreMaestro">Nombre:</label>
                                    </div>
                                </div>                
                                <div class="col-md-4">
                                    <div class="md-form form-sm">
                                        <input type="text" disabled="disabled" id="txtApellidoMaestro" name="txtApellidoMaestro" class="form-control form-control-sm">
                                        <label for="txtApellidoMaestro">Apellido:</label>
                                    </div>
                                </div>    

                                <div class="col-md-4">
                                    <div class="md-form form-sm">
                                        <input type="text" placeholder="Selected date" id="txtNivelEstudioMaestro" value="" name="txtNivelEstudioMaestro" class="form-control form-control-sm">
                                        <label for="txtNivelEstudioMaestro">Nivel Estudio:</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-sm">
                                        <input type="text" placeholder="Selected date" id="txtEspecialidadMaestro" value="" name="txtEspecialidadMaestro" class="form-control form-control-sm">
                                        <label for="txtEspecialidadMaestro">Especialidad:</label>
                                    </div>
                                </div>
                                <div class="col-md-4" >
                                    <div class="md-form form-sm">
                                        <input type="text" placeholder="Selected date" id="txtCargoMaestro" value="" name="txtCargoMaestro" class="form-control form-control-sm">
                                        <label for="txtCargoMaestro">Cargo:</label>
                                    </div>                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="pull-right">
                                        <button type="button"  onclick="limpiarMaestro();" style="" class="btn btn-sm btn-warning mt-1">Limpiar</button>
                                        <button type="button" onclick="saveMaestro();" style="" class="btn btn-sm btn-primary mt-1">Grabar</button>    
                                    </div>                                    
                                </div>
                                 
                            </div>
                        </div>
                        
                    </form>

                    <div class="col-md-12">
                        <table class="table table-sm">
                            <thead class="black white-text">
                                <tr>                                    
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Nivel Estudio</th>
                                    <th scope="col">Especialidad</th>
                                    <th scope="col">Cargo Actual</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="tblMaestros">
                            </tbody>
                        </table>
                    </div>
                                    

                </div>


                <div class="text-right mt-4">                       
                    <a type="button" class="btn btn-sm btn-outline-warning waves-effect" data-dismiss="modal">Cerar</a>
                </div>
                                

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>



<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">
    $(document).ready(function() {    
        $('select').addClass('mdb-select');
        $('.mdb-select').material_select();
        $('.mdb-select').removeClass('form-control form-control-sm');
        $('.dataTables_filter').find('label').remove();
    });
    function abrirModalMaestros(curso) {    
        limpiarMaestro();
        $('#modalMaestros').modal('show');        
        allMaestros();
    }

    function setNombre(obj){
        $("#txtNombreMaestro").val("").change();
        $("#txtApellidoMaestro").val("").change();

        var nombre = $('option:selected', obj).attr('nombre');
        var apellido = $('option:selected', obj).attr('apellido');

        $("#txtNombreMaestro").val(nombre).change();
        $("#txtApellidoMaestro").val(apellido).change();
    }

    function allMaestros() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/allMaestros",
            data: {},
            success: function( response ){             
                if (continuaSession(response)) {                            
                    $("#tblMaestros").html("");

                    $.each(response.data, function(i, item) {                    
                        data = item.id+'|'+item.nivel_estudio+'|'+item.especialidad+'|'+item.cargo_actual+'|'+item.codigoMaestro;

                        $("#tblMaestros").append(
                        `<tr>                         
                          <td>${ item.id }</td>
                          <td>${ item.first_name }</td>
                          <td>${ item.last_name }</td>
                          <td>${ item.nivel_estudio }</td>                         
                          <td>${ item.especialidad}</td>                         
                          <td>${ item.cargo_actual}</td>                         
                          <td>
                            <div class="btn-group btn-group-sm inline">                                
                                <button class="btn btn-primary" onclick="editMaestro('${data}');" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>
                                <button class="btn btn-gplus" onclick="deleteMaestro(${item.codigoMaestro})" type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>
                            </div>
                          </td>
                        </tr>`);
                    })
                }   
            },error   : function ( jqXhr, json, errorThrown ){
                toastr.error( "error llamada ajax", "Error" );
            }
        }); 
    }


    function editMaestro(data) {
        var arrData = data.split("|");        
        $('.mdb-select').material_select('destroy');
        $("#txtUsuarioMaestro").val(arrData[0]).change();
        $('.mdb-select').material_select();
        $("#txtNivelEstudioMaestro").val(arrData[1]).change();
        $("#txtEspecialidadMaestro").val(arrData[2]).change();
        $("#txtCargoMaestro").val(arrData[3]).change();
        $("#hddCodigoMaestro").val(arrData[4]).change();
        
    }

    function limpiarMaestro(argument) {
        $('.mdb-select').material_select('destroy');
        $("#txtUsuarioMaestro").val("").change();
        $('.mdb-select').material_select();
        $("#txtNivelEstudioMaestro").val("").change();
        $("#txtEspecialidadMaestro").val("").change();
        $("#txtCargoMaestro").val("").change();
        $("#hddCodigoMaestro").val("").change();
    }

    function saveMaestro(){
        try{
            $.ajax({
                url: '/saveMaestro',
                type: 'post',
                data: {
                    id: $("#hddCodigoMaestro").val(),
                    nivel_estudio : $("#txtNivelEstudioMaestro").val(),
                    userId : $("#txtUsuarioMaestro").val(),
                    especialidad: $("#txtEspecialidadMaestro").val(),
                    cargo_actual: $("#txtCargoMaestro").val(),                    
                },
                dataType: 'json',
                success: function (data) {
                    if (continuaSession(data)) {
                        limpiarMaestro();
                        allMaestros();
                    }               
                },error   : function ( jqXhr, json, errorThrown ){
                    toastr.error( "error llamada ajax", "Error" );
                }
            });

        } catch(err) {
            toastr.error(err , "Error" );
        }
    }

     function deleteMaestro(id){
        try{
            $.ajax({
                url: '/deleteMaestro',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (data) {
                    if (continuaSession(data)) {
                        limpiarMaestro();
                        allMaestros();
                    }               
                },error   : function ( jqXhr, json, errorThrown ){
                    toastr.error( "error llamada ajax", "Error" );
                }
            });

        } catch(err) {
            toastr.error(err , "Error" );
        }
    }
    

</script>
<?php $__env->stopPush(); ?>
