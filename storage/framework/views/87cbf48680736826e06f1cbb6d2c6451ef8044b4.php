<?php
    use App\Models\Cursos;
    $cursoModel = new Cursos
?>

<section id="cursos" class="section extra-margins">
    <br>    
    <h2 class="teal-text font-up font-bold pt-5 mb-2 mt-3 wow fadeIn" data-wow-delay=".2s">Cursos Recientes</h2>
    <hr class=" mb-5">                
    
    <div class="col-md-12">

        <div id="multi-item-predica" class="carousel testimonial-carousel slide carousel-multi-item wow fadeIn" data-ride="carousel" style="visibility: visible; animation-name: fadeIn;">

            <div class="controls-top">
                <a class="btn-floating teal darken-4 waves-effect waves-light" href="#multi-item-predica" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn-floating teal darken-4 waves-effect waves-light" href="#multi-item-predica" data-slide="next"><i class="fa fa-chevron-right"></i></a>
            </div>

            <ol class="carousel-indicators">
                <?php $__currentLoopData = $arrCursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cursos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                                                 
                    <li data-target="#multi-item-predica" data-slide-to="<?php echo e($key); ?>" class="teal darken-4 <?php echo e($key==0? 'active' :''); ?>"></li>                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ol>
            
            <div class="carousel-inner text-center" role="listbox">                    
                    
                <?php $__currentLoopData = $arrCursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cursos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                                                 
                    <div class="carousel-item <?php echo e($key==0 ? 'active': ''); ?>" >                                
                        <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $curso): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                            
                            <div class="col-md-4">
                                <div class="" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                                    
                                    <div class="card card-image mb-6" style="background-image: url('img/cursos/<?php echo e($curso->foto); ?>');">
                                        
                                        <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                                            <div class="col-md-12 mb-4">
                                                
                                                <h5 class="card-title pt-2">
                                                    <strong><?php echo e($curso->titulo); ?></strong>
                                                </h5>
                                                <p>
                                                    <i class="fa fa-calendar"></i> Inicia:
                                                    <?php echo e(Carbon\Carbon::parse($curso->fec_inicio)->format('d-m-Y')); ?>

                                                </p>
                                                
                                                <p>
                                                    Hora: <?php echo e(Carbon\Carbon::parse($curso->fec_inicio)->format('h')); ?>

                                                        : <?php echo e(Carbon\Carbon::parse($curso->fec_inicio)->format('i')); ?>

                                                </p>
                                                
                                                <p>
                                                    <i class="fa fa-calendar"></i> Termina:
                                                    <?php echo e(Carbon\Carbon::parse($curso->fec_fin)->format('d-m-Y')); ?>

                                                </p>
                                                
                                                <p>
                                                    Hora: <?php echo e(Carbon\Carbon::parse($curso->fec_fin)->format('h')); ?>

                                                        : <?php echo e(Carbon\Carbon::parse($curso->fec_fin)->format('i')); ?>

                                                </p>                                            

                                                <p>Capacidad: <?php echo e($curso->capacidad); ?></p>

                                                <?php                                             
                                                    $inscritos =  $cursoModel->getLimiteCurso($curso->id);                                                  
                                                 ?>  

                                                <p>Inscritos: <?php echo e($inscritos); ?></p>

                                                
                                                <?php if($inscritos < $curso->capacidad): ?>                                            
                                                    <a href="<?php echo e(route('inscripcion', ['id'=>$curso->id])); ?>" class="btn btn-teal waves-effect waves-light">Inscribirse</a>                                        
                                                <?php else: ?>
                                                    <a onclick="alert('Curso llego a su capacidad maxima', 'Error');" class="btn btn-teal waves-effect waves-light">Inscribirse</a>                                        
                                                <?php endif; ?>
                                            
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>             
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    
            </div>            
        </div>
        
    </div>    
</section>
