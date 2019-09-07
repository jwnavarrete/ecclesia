<?php
use App\Models\Equipo;
$arrEquipo = Equipo::all();
?>
<style>
    .teamImg{
        width: 250px; 
        height: 250px !important; 
    }
</style>


<section id="equipo" class="section mb-5">
    <br>    
    <h2 class="teal-text font-up font-bold pt-5 mb-2 mt-3 wow fadeIn" data-wow-delay=".2s">Nuestro Cuerpo de Lideres</h2>
    <hr class=" mb-5">                
    
    <div class="row">

        <div id="multi-item-example" class="carousel testimonial-carousel slide carousel-multi-item wow fadeIn" data-ride="carousel" style="visibility: visible; animation-name: fadeIn;">

            <div class="carousel-inner text-center" role="listbox">                                
                <div class="row mb-lg-4 text-center text-md-left">
                    <?php $__currentLoopData = $arrEquipo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $equipo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                                        
                        <div class="col-lg-3 col-md-12 mb-4">
                            <div class="col-md-6 float-left">
                                <div class="avatar mx-auto my-3">
                                    <img src="/img/team/<?php echo e($equipo->foto); ?>" class="rounded img-fluid z-depth-1 teamImg" alt="First sample avatar image">
                                </div>
                            </div>        
                            <div class="col-md-6 float-right">
                                <h4>
                                    <strong><?php echo e($equipo->nombre); ?></strong>
                                </h4>
                                <h6 class="font-weight-bold grey-text mb-4"><?php echo e($equipo->cargo); ?></h6>
                                <p class="grey-text"><?php echo e($equipo->descripcion); ?></p>
                                <a class="icons-sm fb-ic">
                                    <i class="fa fa-facebook"> </i>
                                </a>
                                <a class="icons-sm tw-ic">
                                    <i class="fa fa-twitter"> </i>
                                </a>
                                <a class="icons-sm dribbble-ic">
                                    <i class="fa fa-dribbble"> </i>
                                </a>
                            </div>        
                        </div>                                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>                
            </div>            
        </div>      

    </div>
    
</section>