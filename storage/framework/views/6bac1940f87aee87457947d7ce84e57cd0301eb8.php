<?php 
    use App\Models\horarios;
 ?>

<div id="horarios">
    <br>    
    <h2 class="teal-text font-up font-bold pt-5 mb-2 mt-3 wow fadeIn" data-wow-delay=".2s"><?php echo e($parametro->titulo_hoarios); ?></h2>
    <p><?php echo e($parametro->descripcion_horarios); ?></p>

    <hr class=" mb-5">                    
    <div class="table-responsive">
        <table class="table wow fadeIn" data-wow-delay=".4s">
            <thead class="thead-inverse">
            <tr>
                <th><b>DIA</b></th>
                <th><b>TITULO</b></th>                
                <th><b>LUGAR</b></th>
                <th><b>HORARIO</b></th>
                <th><div class="pl-4"></th></div>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = horarios::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $horario): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>   
                <tr>
                    <th scope="row"><?php echo e($horario->dia); ?></th>
                    <td><?php echo e($horario->titulo); ?></td>                    
                    <td><?php echo e($horario->lugar); ?></td>
                    <td><?php echo e($horario->horario); ?></td>
                    <td><a onclick="conocemas('<?php echo e($horario->comentario); ?>')" class="btn btn-info btn-rounded btn-sm">Conocer mas</a></td>
                </tr>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>           
            </tbody>
        </table>
    </div>
</div>

<div class="modal hide fade" id="modalConoceMas" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <h5>Conoce mas</h5>                
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">
                <p id="txtConoceMas"></p>

                 <div class="text-right mt-4">                    
                    <a type="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">Cerrar</a>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>



<script>
    function conocemas(mensaje){
        if (mensaje) {
            $('#txtConoceMas').html(mensaje);    
        }else{
            $('#txtConoceMas').html("No se ha definido contenido!");
        }    
        $('#modalConoceMas').modal();                            
    }   
</script>