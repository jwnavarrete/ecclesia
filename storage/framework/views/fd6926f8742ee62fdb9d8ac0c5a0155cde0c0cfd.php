<div id="slide-out" class="side-nav sn-bg-4 mdb-sidenav" style="transform: translateX(-100%);">
    <ul class="custom-scrollbar list-unstyled" style="max-height:100vh;">
        <li>
            <div class="logo-wrapper waves-light waves-effect waves-light">
                <a href="#"><img src="/img/logoICI.jpg" class="img-fluid flex-center" style="width: 160px;"></a>
            </div>
        </li>
                
        <li>
            <ul class="collapsible collapsible-accordion">         
                <li class="collapsible-header waves-effect arrow-r">
                    <a   href="<?php echo e(url('login')); ?>" class="collapsible-header waves-effect arrow-r admin user"><i class="fa fa-home"></i>Inicio</a>
                </li>
                <!-- LUIS ALFREDO LLAQUE GAIBOR
                    * RECCORRE ARREGLO CON REGISTROS DE OPCIOINES Y FORMA EL MENU EN BASE A LOS PERMISOS ASIGNADOS
                -->
                <?php if(Auth::check()): ?>
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($item['parent'] != 0): ?>
                            <?php break; ?>
                        <?php endif; ?>
                        
                        <?php echo $__env->make('partials.menu-item', ['item' => $item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>                              
            </ul>
        </li>               
    </ul>
    <div class="sidenav-bg mask-strong"></div>
</div>