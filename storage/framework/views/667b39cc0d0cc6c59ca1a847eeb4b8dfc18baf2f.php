<?php
    use App\Models\Donaciones;
    $arrDonaciones = Donaciones::all();
?>

<style type="text/css">
  .img-fluid{height: 250px !important;}  
</style>

<section id="donaciones" class="text-center my-5">
    <br>    
    <div class="row mt-5">
        <div class="col-md-12 ">
            <h2 class="teal-text font-up font-bold pt-4 mb-5 wow fadeIn" data-wow-delay=".2s">Donaciones</h2>                
        </div>
    </div>        
    <div class="row">
    
    <?php $__currentLoopData = $arrDonaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donacion): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>      
      <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">    
        <div class="card collection-card z-depth-1-half">        
          <div class="view zoom">
            <img src="<?php echo e($donacion->imagen); ?>" class="img-fluid" alt="">
            <div class="stripe dark">
              <a href="#contactenos">
                <p>Cta. #<?php echo e($donacion->numeroCuenta); ?> > <?php echo e($donacion->cuenta); ?>

                  <i class="fa fa-angle-right"></i>
                </p>
              </a>
            </div>
          </div>        
        </div>      
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      
  </div>
</section>