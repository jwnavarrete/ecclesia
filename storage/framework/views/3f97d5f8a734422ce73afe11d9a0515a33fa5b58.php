<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php
    use App\Models\Cursos;
    $Cursos = new Cursos
?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active">Inscripciones</li>
<?php $__env->stopSection(); ?>

    <section class="mb-5">

        <!--WILMER WALTER NAVARRETE ALVAREZ
            * SECCION PARA MOSTRAR LOS CURSOS Y PERMITR INSCRIBIRSE EN LOS MISMOS
            * SI ESTAS INSCRITO TE PERMITIRA CANCELAR LA SUSCRIPCION EN CASO DE NECESITARLO
        -->                                        
        <div class="row">
            <div class="col-lg-12">
                 <div class="card card-cascade narrower mb-r">

                    <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <a type="button" href="<?php echo e(URL::to('login')); ?>" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-th-large mt-0"></i></a>
                                                        
                        </div>
                        <a href="" class="white-text mx-3">Listado de Cursos</a>
                        <div>
                            
                        </div>
                    </div>

                    <div class="card-body pb-0">                        
                        <div class="table-responsive">
                            <!--WILMER WALTER NAVARRETE ALVAREZ
                                * RECORREMOS EL ARREGLO DE LOS CURSOS Y LOS DIBUJAMOS POR PANTALLA
                            -->                                        
                            <table id="tblCursos" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Foto</td>
                                        <td>Titulo</td>
                                        <td>Detalle</td>
                                        <td>Maestro</td>                                            
                                        <td>Capacidad</td>    
                                        <td># Inscritos</td>                                            
                                        <td>Estado</td>     
                                        <td>Accion</td>                                            
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <td><?php echo e($value->id); ?></td>
                                        <td>
                                            <?php if($value->foto): ?>
                                                <img src="/img/cursos/<?php echo e($value->foto); ?>" id="companyLogo" width="100px" class="img-fluid" alt="example placeholder avatar">                                            
                                            <?php else: ?>
                                                <img src="/img/cursos/curso.jpg" id="companyLogo" class="img-fluid" alt="example placeholder avatar">                                            
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($value->titulo); ?></td>
                                        <td><?php echo e($value->detalle); ?></td>   
                                        <td><?php echo e($value->maestro); ?></td>   
                                        <td><?php echo e($value->capacidad); ?></td>  
                                        <?php                                             
                                        $limite =  $Cursos->getLimiteCurso($value->id);
                                         ?>                                                                          
                                        <td><?php echo e($limite); ?></td>                                                                            

                                        <td><?php echo e(($value->estado==1?'Activo':'Inacivo')); ?></td>                                                                            
                                        <!-- we will also add show, edit, and delete buttons -->
                                        <td width="120px">                        
                                            <?php if($value->usuarioId == Auth::user()->id): ?>                                                                                     
                                                <a href="<?php echo e(route('inscripcion', ['id'=>$value->id])); ?>" type="button" class="btn btn-danger btn-sm">Cancelar</a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('inscripcion', ['id'=>$value->id])); ?>" type="button" class="btn btn-success btn-sm">Inscribirse</a>                                                                                                 
                                            <?php endif; ?>
                                            
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>                                
                        </div>
                    </div>                    
                </div>

            </div>            
        </div>

    </section>

    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
    <script>


        var tblCursos;
        $(document).ready(function() {

                tblCursos = $('#tblCursos').DataTable();
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