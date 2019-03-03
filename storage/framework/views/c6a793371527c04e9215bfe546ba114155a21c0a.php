<!-- LUIS ALFREDO LLAQUE GAIBOR
    * RECORRE MENU Y FORMA EN BASE AL ORDEN ESTABLECIDO EN LA PARAMETRIZACION
-->
<?php if($item['submenu'] == []): ?>        
    <li class="collapsible-header waves-effect arrow-r ">
        <a href="<?php echo e(url($item['slug'])); ?>" class="collapsible-header waves-effect arrow-r <?php echo e($item['slug']); ?>"><i class="<?php echo e($item['icon']); ?>"></i><?php echo e($item['name']); ?> 
        </a>
    </li>
<?php else: ?>    
    <li>
    <a class="collapsible-header waves-effect arrow-r <?php echo e($item['slug']); ?>"><i class="<?php echo e($item['icon']); ?>"></i> <?php echo e($item['name']); ?><i class="fa fa-angle-down rotate-icon"></i></a>
        <div class="collapsible-body">
            <ul>
            <?php $__currentLoopData = $item['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if($submenu['submenu'] == []): ?>
                    <li><a href="<?php echo e(url($submenu['slug'])); ?>" class="<?php echo e($submenu['slug']); ?>" padre="<?php echo e($item['slug']); ?>"><i class="<?php echo e($submenu['icon']); ?>"></i> <?php echo e($submenu['name']); ?> </a></li>
                <?php else: ?>
                    <?php echo $__env->make('partials.menu-item', [ 'item' => $submenu ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>                
            </ul>
        </div>
    </li>    
<?php endif; ?>
