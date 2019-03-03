 <div class="table-responsive">                                            
    <div class="" id="">                                  
        <ol class="sortable" id="menu">
            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if($item['parent'] != 0): ?>
                    <?php break; ?>
                <?php endif; ?>                
                <?php echo $__env->make('pages.seguridad.permisos.submenu',['item' => $item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  
        </ol>                                            
    </div> 

    
          
</div>

<div class="row">
    <div class="col-md-12 text-center">
        <br>
        <div class="col-md-3 pull-right">
            <button onclick="grabarMenuRol()" type="button" class="btn btn-primary btn-rounded">Grabar</button>                                
        </div>

    </div>
</div>                                                                          