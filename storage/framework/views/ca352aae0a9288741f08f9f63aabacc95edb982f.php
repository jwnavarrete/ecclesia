
<?php if($item['submenu'] == []): ?>
<!--class="mjs-nestedSortable-branch mjs-nestedSortable-collapsed"-->
    <li id="list_<?php echo e($item['id']); ?>" ><div><span class="disclose"><span></span></span>
        <a data-toggle="collapse" data-parent="#accordionMenu" href="#menu<?php echo e($item['id']); ?>">
        <?php echo e($item['name']); ?></a></div>

    <div id="menu<?php echo e($item['id']); ?>" class="panel-collapse collapse">      
        <label  for="nombre">Nombre:</label>                                            
        <input type="text" class="form-control" id="nameMenu<?php echo e($item['id']); ?>" value="<?php echo e($item['name']); ?>">          
        <label  for="nombre">Icono:</label>          
        <input class="form-control" type="text" id="iconoMenu<?php echo e($item['id']); ?>" value="<?php echo e($item['icon']); ?>">
        <label  for="nombre">Url:</label>        
        <input class="form-control" type="text" id="slugMenu<?php echo e($item['id']); ?>" value="<?php echo e($item['slug']); ?>">
        <br>
        <button type="button" onclick="editMenu(<?php echo e($item['id']); ?>);" class="btn btn-success">Actualizar</button>          
        <button type="button" onclick="remove(<?php echo e($item['id']); ?>);" class="btn btn-danger">Eliminar</button>          
    </div>
  
<?php else: ?>
    
    <li id="list_<?php echo e($item['id']); ?>" ><div><span class="disclose"><span></span></span>
    <a data-toggle="collapse" data-parent="#accordionMenu" href="#menu<?php echo e($item['id']); ?>">
    <?php echo e($item['name']); ?></a></div>

    <div id="menu<?php echo e($item['id']); ?>" class="panel-collapse collapse">      
            Nombre:
            <input class="form-control form-control-sm" type="text" id="nameMenu<?php echo e($item['id']); ?>" value="<?php echo e($item['name']); ?>">          
            Icono:
            <input class="form-control form-control-sm" type="text" id="iconoMenu<?php echo e($item['id']); ?>" value="<?php echo e($item['icon']); ?>">
            Url:
            <input class="form-control form-control-sm" type="text" id="slugMenu<?php echo e($item['id']); ?>" value="<?php echo e($item['slug']); ?>">                        
            <br>                        
            <button type="button" onclick="editMenu(<?php echo e($item['id']); ?>);" class="btn btn-success">Actualizar</button>      
            <button type="button" onclick="remove(<?php echo e($item['id']); ?>);" class="btn btn-danger">Eliminar</button>                             
    </div>

    <ol>
           <?php $__currentLoopData = $item['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if($submenu['submenu'] == []): ?>                                                            
                    
                    <li id="list_<?php echo e($submenu['id']); ?>" ><div><span class="disclose"><span></span></span>
                    <a data-toggle="collapse" data-parent="#accordionMenu" href="#menu<?php echo e($submenu['id']); ?>">
                    <?php echo e($submenu['name']); ?></a></div>

                    <div id="menu<?php echo e($submenu['id']); ?>" class="panel-collapse collapse">                                 
                        Nombre:
                        <input class="form-control form-control-sm" type="text" id="nameMenu<?php echo e($submenu['id']); ?>" value="<?php echo e($submenu['name']); ?>">          
                        Icono:
                        <input class="form-control form-control-sm" type="text" id="iconoMenu<?php echo e($submenu['id']); ?>" value="<?php echo e($submenu['icon']); ?>">
                        Url:
                        <input class="form-control form-control-sm" type="text" id="slugMenu<?php echo e($submenu['id']); ?>" value="<?php echo e($submenu['slug']); ?>">                        
                        <br>                        
                        <button type="button" onclick="editMenu(<?php echo e($submenu['id']); ?>);" class="btn btn-success">Actualizar</button>      
                        <button type="button" onclick="remove(<?php echo e($submenu['id']); ?>);" class="btn btn-danger">Eliminar</button>                    
                    </div>
                <?php else: ?>
                    <?php echo $__env->make('pages.seguridad.menu.submenu',['item' => $item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ol>
<?php endif; ?>
