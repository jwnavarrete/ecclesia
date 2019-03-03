<?php
use App\Models\About;
$arrAbout = About::all();
?>

<section id="about" class="section"> 
    <br>    
    <h2 class="teal-text font-up font-bold mt-5 mb-2 wow fadeIn" data-wow-delay=".2s"><?php echo e($parametro->titulo_about); ?></h2>
    <p><?php echo e($parametro->descripcion_about); ?></p>    
          
    <div class="row wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
        
        <div class="row">						
            <div class="mb-2">						
                <!--MIGUEL ANGEL CHAVEZ DELGADO
                   * RECORREMOS ARREGLO CON LOS REGISTROS PARA CREAR EL TAB                   
                -->
                <ul class="nav md-pills  nav-justified   d-flex justify-content-center" role="tablist">
                    <?php $__currentLoopData = $arrAbout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                    
                        <li class="nav-item">                            
                            <a class="nav-link <?php echo e($value->orden ==1 ? 'active': ''); ?>" data-toggle="tab" href="<?php echo e($value->enlace); ?>" role="tab" aria-expanded="true"> <?php echo e($value->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    
                </ul>						
            </div>

            <div class="tab-content">
                <!--MIGUEL ANGEL CHAVEZ DELGADO
                   * RECORREMOS ARREGLO CON LOS REGISTROS (ACERCA DE NOSOTROS) Y MOSTRAMOS POR PANTALLA
                   * FOTO
                   * TITULO 
                   * DESCRIPCION
                -->
                <?php $__currentLoopData = $arrAbout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                    
                    <div class="tab-pane fade in <?php echo e($value->orden ==1 ? 'active': ''); ?> show" id="<?php echo e($value->panel); ?>" role="tabpanel" aria-expanded="true">
                        <br>
                        <div class="row">							                            
                            <div class="col-lg-5 col-md-12">
                                <div class="view overlay hm-white-slight z-depth-1 z-depth-2 mb-2">
                                    <img src="img/about/<?php echo e($value->foto); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">                                                            
                                <h4 class="mb-5"><?php echo e($value->titulo); ?></h4>                                    
                                <p class="text-muted"><?php echo e($value->descripcion); ?></p>

                                <?php  echo $value->extra  ?>
                                
                            </div>
                        </div>
                     
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </div>            
        </div>        
    </div>
</section>