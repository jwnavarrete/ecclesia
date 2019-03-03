<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
    <!-- LUIS ALFREDO LLAQUE GAIBOR
        * DESPLIEGA BOTON PARA ABRIR EL MENU LATERAL
    -->
    <div class="float-left">
        <?php if(Auth::check()): ?>
            <a data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>        
        <?php endif; ?>    
    </div>

    <div class="breadcrumb-dn mr-auto">            
        <ol class="breadcrumb d-inline-flex pl-0 pt-0">
            <!-- LUIS ALFREDO LLAQUE GAIBOR
                * DESPLIEGA EL NOMBRE DE LA VISTA QUE SE ESTA MOSTRANDO
            -->
            <?php if(Auth::check()): ?>
                <li class="breadcrumb-item"><i class="fa fa-home"></i> <a class="white-text" href="<?php echo e(route('home')); ?>"> Inicio</a></li>
                <?php echo $__env->yieldContent('breadcrumb'); ?>
            <?php endif; ?>
        </ol>
    </div>
    
    <div id="js-scrollspy">
        <!-- LUIS ALFREDO LLAQUE GAIBOR
            * DESPLIEGA MENU SUPERIOR AL LADO DERECHO (VOLVER A LA WEB, CERRAR SESSION)
        -->
        <ul  class="nav navbar-nav nav-flex-icons ml-auto">                        
            <li class="nav-item">                        
                <a class="nav-link waves-effect waves-light" onclick="openWindows('/')"><i class="fa fa-globe"></i> <span class="clearfix d-none d-sm-inline-block">Volver a la Web</span></a>
            </li>
            <?php if(Auth::check()): ?>                    
                <li class="nav-item">                        
                    <a class="nav-link waves-effect waves-light" href="<?php echo e(url('logout')); ?>">
                        <img src="<?php echo e(URL::asset(Auth::user()->foto)); ?>" class="img-circle" height="25" width="25" alt="User Image"/> Salir
                    </a>
                </li>                            
            <?php endif; ?>
        </ul>      
    </div>                  
</nav>





