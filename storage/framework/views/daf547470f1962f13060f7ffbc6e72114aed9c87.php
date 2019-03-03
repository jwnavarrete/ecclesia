<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php
    use App\Models\Lista;
    $lista = new Lista
?>


<?php $__env->startSection('content'); ?>





<section>


    <!--<p class='demo'><a href='demoReport' target='_blank' class='demo'>[Demo]</a></p>-->
</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>