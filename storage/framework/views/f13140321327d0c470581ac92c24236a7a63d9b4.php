
<?php if($item['submenu'] == []): ?>
<!--class="mjs-nestedSortable-branch mjs-nestedSortable-collapsed"-->
    <li id="list_<?php echo e($item['id']); ?>" >
        <div><span class="disclose"></span>
            <span><?php echo e($item['name']); ?></span>
            <div class="switch inline">
                <label>                                                    
                    <input id="<?php echo e($item['id']); ?>"  checked="checked" type="checkbox">
                    <span class="lever"></span>
                </label>
            </div>
        </div>  
<?php else: ?>
    
    <li id="list_<?php echo e($item['id']); ?>" >
        <div><span class="disclose"></span>    
        <span><?php echo e($item['name']); ?></span>
        <div class="switch inline">
            <label>                                                    
                <input id="<?php echo e($item['id']); ?>"  checked="checked" type="checkbox">
                <span class="lever"></span>
            </label>
        </div>
    </div>

    <ol>
           <?php $__currentLoopData = $item['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if($submenu['submenu'] == []): ?>                                                            
                    
                    <li id="list_<?php echo e($submenu['id']); ?>" >
                    <div><span class="disclose"></span>                                            
                        <span><?php echo e($submenu['name']); ?></span>
                        <div class="switch inline">
                            <label>                                                    
                                <input id="<?php echo e($submenu['id']); ?>"  checked="checked" type="checkbox">
                                <span class="lever"></span>
                            </label>
                        </div>
                    </div>

                <?php else: ?>
                    <?php echo $__env->make('pages.seguridad.menu.submenu',['item' => $item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ol>
<?php endif; ?>
