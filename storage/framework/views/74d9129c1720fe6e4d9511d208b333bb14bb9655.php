<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/datepicker.css')); ?>">                
<link rel="stylesheet" href="<?php echo e(asset('assets/css/core.css')); ?>">      
<style type="text/css">
    .gj-datepicker-bootstrap [role="right-icon"] button .gj-icon, .gj-datepicker-bootstrap [role="right-icon"] button .material-icons {
            top: 2px !important;
    }
    .fc-right button {display: block !important}
    .fc-left button {display: block !important}
</style>
<?php $__env->stopSection(); ?>

<!--WILMER WALTER NAVARRETE ALVAREZ
   * PANTALLA PARA ADMINISTRAR LOS CURSOS   
-->

<?php $__env->startSection('content'); ?>
    <?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Administrar Cursos</li>
    <?php $__env->stopSection(); ?>


    <section class="mb-5">

        <div class="row">
            <div class="col-lg-12 divFilter">
                <div class="btn-group btn-group-sm inline" style="vertical-align: -35px;">
                    <a class="btn btn-primary" href="<?php echo e(URL::to('cursos/create')); ?>" type="button" title="Nuevo apadrinado">
                        <span class="image fa fa-plus"></span>
                    </a>                    
                    <button class="btn btn-primary" type="button" title="Imprimir" id="btnImprimir">
                        <span class="image fa fa-print"></span>
                    </button>                
                    <button onclick="abrirModalMaestros();" class="btn btn-primary" type="button" title="Maestros" id="btnMaestros">
                        <span class="image fa fa-users"></span>
                    </button>                
                </div>   
                <div class="md-form form-sm inline pull-right">
                    <input type="text" placeholder="Buscar" id="txtBuscar" style="width: 250px;" class="form-control form-control-sm">
                </div>             
            </div>

            <div class="col-lg-12">

                <div class="card">            
                    <div class="card-body">
                        <!--WILMER WALTER NAVARRETE ALVAREZ
                           * TABLA PARA VISUALIZAR LOS CURSOS REGISTRADOS EN EL SISTEMA
                        -->
                        <table id="tblCursos" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td>ID</td>                                    
                                    <td>Titulo</td>
                                    <td>Detalle</td>
                                    <td>Mestro</td>                                                                                
                                    <td>Capacidad</td>                                            
                                    <td>Estado</td>     
                                    <td>Accion</td>                                            
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($value->id); ?></td>                                    
                                    <td><?php echo e($value->titulo); ?></td>
                                    <td><?php echo e($value->detalle); ?></td>                                                
                                    <td><?php echo e($value->maestro); ?></td>
                                    <td><?php echo e($value->capacidad); ?></td>                                              
                                    <td><?php echo e(($value->estado==1?'Activo':'Inacivo')); ?></td>

                                    <!--WILMER WALTER NAVARRETE ALVAREZ
                                       * SECCION PARA LOS BOTONES DENTRO DE LA TABLA
                                    -->                                        
                                    <td width="120px">     
                                        <div class="btn-group btn-group-sm inline">
                                            <button  onclick="openWindows('cursos/'+<?php echo e($value->id); ?>+'/edit')" class="btn btn-primary waves-effect waves-light" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>

                                            <button class="btn btn-warning waves-effect waves-light" onclick="abrirModal('<?php echo e($value->id); ?>');"  type="button" title="Editar"><span class="image fa fa-calendar"></span></button>

                                            <button class="btn btn-gplus waves-effect waves-light" onclick="remove(<?php echo e($value->id); ?>)" type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>
                                        </div>                                                           
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>          
                    </div>                
                </div>                
            </div>  
        </div>  
    </section>

    <!--WILMER WALTER NAVARRETE ALVAREZ
        * SECCION MODAL DONDE SE ASIGNAN LAS ACTIVIDADES QUE CONTENDRA EL CURSO
    -->                                        
    <?php echo $__env->make('pages.cursos.modal.cronograma', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('pages.cursos.modal.maestros', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('assets/js/core.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/cursos/cronograma.js')); ?>"></script>

    <script>


        var tblCursos;
        $(document).ready(function() {

            tblCursos = $('#tblCursos').DataTable({
                dom: 'rtp',
            });

            $('#txtBuscar').on('keyup change', function () {
                if (tblCursos == null){return false}
                tblCursos.search(this.value).draw();
            });

            $('#fecinicia').datepicker({
                uiLibrary: 'bootstrap4',                
                locale: 'es-es',
                format: 'yyyy-mm-dd hh:mm:ss',                
            });

            $('#fectermina').datepicker({
                uiLibrary: 'bootstrap4',                
                locale: 'es-es',
                format: 'yyyy-mm-dd hh:mm:ss',                
            });
        });        

        function remove(id){
            var obj = {texto:"Seguro desea Eliminar este registro",
                            callback:eliminarCurso,
                            data:id}

            eliminar(obj);
        }

        function eliminarCurso(id){            
            try{

                $.ajax({
                    url: '/eliminarCurso',
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>