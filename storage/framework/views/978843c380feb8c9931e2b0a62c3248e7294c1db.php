<div class="col-lg-12" >
    <div class="row">
        <div class="col-lg-6">
            <div class="md-form form-sm">
                <input type="checkbox" name="chkAsisteEscuela" class="form-check-input" id="asisteescuela">
                <label class="form-check-label" for="asisteescuela">Esta asistiendo a la escuela?</label>
            </div>                                                              
        </div>
        <div class="col-lg-6">
            <div class="md-form form-sm">
                <input type="text" id="razonNoAsiste" class="form-control form-control-sm">
                <label for="razonNoAsiste">Si no asiste, de la razon:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <span>Si asiste llene uno de los niveles siguientes de instrucion educativa</span>
        <table class="table table-bordered table-sm">                                         
            <tbody>
                <?php $__currentLoopData = $arrNiveles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $nivel): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>                                                                                
                        <td><?php echo e($nivel->nombre); ?></td>                                                    
                        <th scope="row">
                            <input class="form-check-input rdbCompassion" type="radio" name="rdbNiveles" id="rdbNivel<?php echo e($nivel->id); ?>" value="<?php echo e($nivel->id); ?>" >
                            <label class="form-check-label" for="rdbNivel<?php echo e($nivel->id); ?>"></label>                                                           
                        </th>
                    </tr>                                                                                                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                                                                                   
            </tbody>                                                                                    
        </table>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <span>Promedio Escolar (escoja uno)</span>
            <div class="md-form form-sm">
                <input class="form-check-input rdbCompassion" type="radio" name="rdbPromedios" id="rdbPromPromedio" value="P">
                <label class="form-check-label" for="rdbPromPromedio">Promedio</label>                                             
                <input class="form-check-input rdbCompassion" type="radio" name="rdbPromedios" id="rdbPromAlto" value="A">
                <label class="form-check-label" for="rdbPromAlto">Alto</label>                                                         
                <input class="form-check-input rdbCompassion" type="radio" name="rdbPromedios" id="rdbPromBajo" value="B">
                <label class="form-check-label" for="rdbPromBajo">Bajo</label>                                             
            </div>                                                              
        </div>
        <div class="col-lg-6">
            <div class="md-form form-sm">
                <input type="text" id="mejorMateria" class="form-control form-control-sm">
                <label for="mejorMateria">Mejor materia del Niño:</label>
            </div>
        </div>
    </div>
    
    
</div>




    