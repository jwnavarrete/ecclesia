<?php 
    use App\Models\Ministerio;    
 ?>

<section id="ministerios" >
    <br>    
    <h2 class="teal-text font-up font-bold pt-5 mb-2 mt-3 wow fadeIn" data-wow-delay=".2s">Ministerios</h2>
    <hr class=" mb-5">                    
    <?php $__currentLoopData = Ministerio::getMinisterios(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ministerios): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                                                 
        <div class="row mb-3 wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
            <?php $__currentLoopData = $ministerios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ministerio): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                                         
                <div class="col-md-2 mb-5 flex-center">
                    <img src="/img/ministerios/<?php echo e($ministerio->foto); ?>" class="img-fluid z-depth-1 rounded-circle">
                </div>                
                <div class="col-md-4 text-center text-md-left mb-3">
                    <h4><?php echo e($ministerio->titulo); ?></h4>
                    <h5 class="grey-text mt-4"><?php echo e($ministerio->dia); ?>  (<?php echo e($ministerio->desde); ?> - <?php echo e($ministerio->hasta); ?>)</h5>
                    <p class="grey-text mt-4"><?php echo e($ministerio->descripcion); ?></p>
                </div>                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</section>