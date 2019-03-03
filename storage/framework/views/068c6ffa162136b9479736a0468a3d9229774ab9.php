<!-- LUIS ALFREDO LLAQUE GAIBOR
    * RECORRE TODOS LOS ACCESOS DIRECTOS ASIGNADOS AL USUARIO Y LOS MUESTRA EN LA PANTALLA PRINCIPAL
-->
<div class="row">

    <?php $__currentLoopData = $lista->getCard(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $card): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                    
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card">
                <div class="row mt-3">
                    <div class="col-md-5 col-5 text-left pl-4">
                        <a type="button" href="<?php echo e(url($card->url)); ?>" class="btn-floating btn-lg <?php echo e($card->color); ?> ml-4 waves-effect waves-light"><i class="<?php echo e($card->icono); ?>" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-7 col-7 text-right pr-5">
                        <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo e($lista->countByTabla($card->tabla)); ?> </h5>
                        <p class="font-small grey-text"><?php echo e($card->titulo); ?></p>
                    </div>
                </div>                
                <div class="row my-3">
                    <div class="col-md-7 col-7 text-left pl-4">
                        <p class="font-small dark-grey-text font-up ml-4 font-weight-bold"><?php echo e($card->detalle); ?></p>
                    </div>
                    <div class="col-md-5 col-5 text-right pr-5">
                        <p class="font-small grey-text"></p>
                    </div>
                </div>
            </div>
        </div>            
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    
</div>

