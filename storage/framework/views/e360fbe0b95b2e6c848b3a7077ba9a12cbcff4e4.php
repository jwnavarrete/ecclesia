<div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
    <div class="card">                                        
        <div class="card-header" role="tab" id="headingOne">
            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h5 class="mb-0">
                    Inpedimentos Físicos / Enfermedades Crónicas <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>

        <!-- Card body -->
        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx">
            <div class="card-body">
                <?php echo Form::select('enfermedades', $lista->getOptionsByData("ENFE") , null , [                
                    'required',
                    'multiple',
                    'id' => 'enfermedades',
                    'searchable' => 'Buscar aqui...',
                    'data-parsley-required-message' => 'Pasatiempos es requirda',
                    'data-parsley-trigger'          => 'change focusout',
                    "class"=>"mdb-select"]
                ); ?>                                    
            </div>
        </div>
    </div>

    <div class="card">                                
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h5 class="mb-0">
                    Lesion, enfermedad, congenito<i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>                                        
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
            <div class="card-body">
                <table class="table table-bordered table-sm">                                         
                    <tbody>
                        <?php $__currentLoopData = $arrSalud; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $salud): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>                                                        
                                <td><?php echo e($salud->nombre); ?></td>
                                <td><?php echo e($salud->descripcion); ?></td>                                                    
                                <td scope="row">
                                    <div class="switch">
                                        <label>
                                            No
                                            <input class="chkCompassion" name="chkLesion" id="<?php echo e($salud->id); ?>" value="<?php echo e($salud->id); ?>" type="checkbox">
                                            <span class="lever"></span>
                                            Si
                                        </label>
                                    </div>                                                                
                                </td>
                            </tr>                                                                                                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                                                                                   
                    </tbody>                                                                                    
                </table>
            </div>
        </div>
    </div>
    
    <div class="card">                                        
        <div class="card-header" role="tab" id="headingThree">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h5 class="mb-0">
                    Habla <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordionEx">
            <div class="card-body">
                <table class="table table-bordered table-sm">                                         
                    <tbody>                                                
                            <tr>                                                        
                                <td>Habla</td>
                                <td>Tiene defecto, Mudo</td>                                                    
                                <th scope="row">
                                    <div class="switch">
                                        <label>
                                            No
                                            <input class="chkCompassion" name="chkHabla" id="chkHabla" type="checkbox">
                                            <span class="lever"></span>
                                            Si
                                        </label>
                                    </div>                                                                
                                </th>
                            </tr>                                                                                                                                                                                                                                    
                    </tbody>                                                                                    
                </table>
            </div>
        </div>
    </div>

    <div class="card">                                
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseOido" aria-expanded="false" aria-controls="collapseOido">
                <h5 class="mb-0">
                    Oido<i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>                                        
        <div id="collapseOido" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
            <div class="card-body">
                <table class="table table-bordered table-sm">                                         
                    <tbody>
                        <?php $__currentLoopData = $arrOido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $oido): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>                                                        
                                <td><?php echo e($oido->nombre); ?></td>
                                <td><?php echo e($oido->descripcion); ?></td>                                                    
                                <th scope="row">
                                    <div class="switch">
                                        <label>
                                            No
                                            <input class="chkCompassion" name="chkOido" value="<?php echo e($oido->id); ?>" id="<?php echo e($oido->id); ?>" type="checkbox">
                                            <span class="lever"></span>
                                            Si
                                        </label>
                                    </div>                                                                
                                </th>
                            </tr>                                                                                                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                                                                                   
                    </tbody>                                                                                    
                </table>
            </div>
        </div>
    </div>

    <div class="card">                                
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseVista" aria-expanded="false" aria-controls="collapseVista">
                <h5 class="mb-0">
                    Vista<i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>                                        
        <div id="collapseVista" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
            <div class="card-body">
                <table class="table table-bordered table-sm">                                         
                    <tbody>
                        <?php $__currentLoopData = $arrOjo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $vista): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>                                                        
                                <td><?php echo e($vista->nombre); ?></td>
                                <td><?php echo e($vista->descripcion); ?></td>                                                    
                                <th scope="row">
                                    <div class="switch">
                                        <label>
                                            No
                                            <input class="chkCompassion" name="chkVista" id="<?php echo e($vista->id); ?>" value="<?php echo e($vista->id); ?>"  type="checkbox">
                                            <span class="lever"></span>
                                            Si
                                        </label>
                                    </div>                                                                
                                </th>
                            </tr>                                                                                                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                                                                                   
                    </tbody>                                                                                    
                </table>
            </div>
        </div>
    </div>
</div>                                        