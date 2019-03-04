<!DOCTYPE html>
<html lang="en" class="full-height">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e(config('app.name', 'ICIR - IGLESIA DE CRISTO IBEROAMERICANA EL RECREO')); ?></title>    

    <!--MIGUEL ANGEL CHAVEZ DELGADO
       *HOJAS DE ESTILOS
    -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/mdb.min.css')); ?>">    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome.css')); ?>">


    <?php echo HTML::style('/assets/css/register.css'); ?>

    <?php echo HTML::style('/assets/css/parsley.css'); ?>


<style>
    @media (max-width: 740px) {
        .full-height,
        .full-height body,
        .full-height header,
        .full-height header .view {
            height: 700px; 
        } 
    }
</style>

<?php
    use App\Models\Parametro;
    $parametro = Parametro::first();
?>

</head>

<body class="band-lp">
    
    <!--MIGUEL ANGEL CHAVEZ DELGADO
        * Pantalla principal donde se visualizara el contenido que se parametrice por el administrador
        * dentro de esta pantalla tenemos (INICIO,ACERCA DE NOSOTROS, HORARIOS, CURSOS, GALERIA, PROYECTOS, DONACIONES).        
    -->
    <header>
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg navbar-dark  scrolling-navbar scrolling-navbar double-nav">
            <div class="breadcrumb-dn mr-auto">
                <a class="navbar-brand" href="#">INICIO</a>
            </div>
                        
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--MIGUEL ANGEL CHAVEZ DELGADO
               MENU DE OPCIONES DE LA PAGINA PRINCIPAL
            -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                <ul class="navbar-nav mr-auto">                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acerca de Nosotros</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item waves-effect waves-light" href="#about">Quienes somos..?</a>
                            <a class="dropdown-item waves-effect waves-light" href="#convenio">Convenios</a>
                            <a class="dropdown-item waves-effect waves-light" href="#equipo">Equipo de Trabajo "Lideres"</a>
                            <a class="dropdown-item waves-effect waves-light" href="#ministerios">Ministerios</a>
                            <a class="dropdown-item waves-effect waves-light" href="#contactenos">Contáctenos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#horarios" data-offset="100">Horarios de Servicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cursos" data-offset="100">Cursos Recientes</a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link" href="#galeria" data-offset="100">Galeria</a>
                    </li>                                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proyectos</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item waves-effect waves-light" href="#instituto">Instituto Bíblico</a>
                            <a class="dropdown-item waves-effect waves-light" href="#casaamanecer">Casa Amanecer</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#donaciones" data-offset="100">Ofrendas y Donaciones</a>
                    </li>                
                </ul>
                <ul class="nav navbar-nav nav-flex-icons ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#contactenos"><i class="fa fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contáctenos</span></a>
                    </li>                    
                    <li class="nav-item">                        
                        <a class="nav-link" href="<?php echo e(route('home')); ?>" ><i class="fa fa-user"></i> <?php echo e(Auth::check() === true ? Auth::user()->first_name : "Iniciar Session"); ?> </a>
                    </li>
                    <?php if(Auth::check()): ?>						

                    <?php endif; ?>               
                </ul>                
            </div>            
        </nav>
        
        <!--MIGUEL ANGEL CHAVEZ DELGADO
           *IMAGEN DE FONDO COMO CONTENIDIO PRINCIPAL DE LA PAGINA.
        -->
        <div id="home" class="view hm-black-strong-1 jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('img/fondo.jpg');">
            <div class="full-bg-img">
                <div class="container flex-center">
                    <div class="row smooth-scroll">
                        <div class="col-md-12">
                            <div class="text-center text-white">
                                <div class="wow fadeInDown" data-wow-delay=".2s">
                                    <h2 class="font-bold display-2 mb-0"><?php echo e(config('app.name', 'ICIR')); ?></h2>
                                    <hr class="hr-light my-3">
                                    <h4 class="pt-2 pb-3">IGLESIA DE CRISTO IBEROAMERICANA EL RECREO.
                                </div>
                                <a class="btn btn-teal btn-rounded wow fadeInUp" data-wow-delay=".2s" href="#horarios" data-offset="100">
                                    <i class="fa fa-calendar"></i> 
                                    <span> Nuestros Horarios</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </header>

    <main>
        <hr>  
        <div class="col-md-12">
            
            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *TAB(ABOUT, CONVENIO) 
               *ESTA SECCION DE CODIGO INCLUYE OTRAS VISTAS DENTRO DE LA CARPETA LANDING
               PARA EL CONTENIDO ACERCA DE NOSOTROS Y CONVENIO
            -->
            <div class="container">
                <?php echo $__env->make('landing.about', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
                <?php echo $__env->make('landing.convenio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
            </div>
            
            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *IMAGEN DE ESTUDIANTES DEL PROYECTO UG.
            -->
            <div class="streak streak-photo streak-md hm-black-strong-1" style="background-image: url('img/universidad/estudiantes.jpg');">
                <div class="mask pattern-1 flex-center">
                    <div class="text-center white-text smooth-scroll wow fadeIn" data-wow-delay=".4s">
                        <h2 class="h2-responsive"><div class="mb-2"> Estudiantes Desarrollo</h2>                        
                    </div>
                </div>
            </div>
            
            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *SECCION PARA LA VISTA DE EQUIPO
            -->
            <div class="container">
    			<?php echo $__env->make('landing.equipo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            
            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *SECCION PARA LA VISTA DE HORARIOS
            -->
            <div class="container">
    		  <?php echo $__env->make('landing.horarios', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>    
    		
            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *SECCION PARA LA VISTA DE CURSOS
            -->
    		<div class="container py-3">
    			<?php echo $__env->make('landing.cursos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    		</div>

            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *SECCION PARA LA VISTA DE MINISTERIOS
            -->
    		<div class="container">			
    			<?php echo $__env->make('landing.ministerios', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    		</div>

            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *SECCION PARA LA VISTA DE INSTITUTO BIBLICOS
            -->
            <div class="container">
               <?php echo $__env->make('landing.institutobiblico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *SECCION PARA LA VISTA DE CASA AMANECER
            -->
            <div class="container">
               <?php echo $__env->make('landing.casaamanecer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *SECCION PARA LA VISTA DE DONACIONES
            -->
            <div class="container">
               <?php echo $__env->make('landing.donaciones', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            
            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *SECCION PARA LA VISTA DE GALERIA Y VIDEOS
            -->
            <div class="container">                
                <?php echo $__env->make('landing.galeria', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                     
                <!--<?php echo $__env->make('landing.videos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                  -->
            </div>
            
            <!--MIGUEL ANGEL CHAVEZ DELGADO
               *SECCION PARA LA VISTA DE CONTACTENOS
            -->
            <?php echo $__env->make('landing.contactenos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        </div> 
    </main>
    

    <!--MIGUEL ANGEL CHAVEZ DELGADO
       *SECCION TAB FLOTANTE A LA DERECHA EN FORMA DE PUNTOS.
    -->
	<!-- <div class="dotted-scrollspy clearfix d-none d-sm-block">
		<ul class="nav smooth-scroll flex-column">
			<li class="nav-item"><a class="nav-link" href="#home" title="Inicio"><span></span></a></li>
			<li class="nav-item"><a class="nav-link" href="#about" title="Acerca de Nosotros"><span></span></a></li>
			<li class="nav-item"><a class="nav-link" href="#equipo" title="Equipo"><span></span></a></li>
			<li class="nav-item"><a class="nav-link" href="#horarios" title="Horarios"><span></span></a></li>
			<li class="nav-item"><a class="nav-link" href="#cursos" title="Cursos"><span></span></a></li>
            <li class="nav-item"><a class="nav-link" href="#ministerios" title="Ministerios"><span></span></a></li>
            <li class="nav-item"><a class="nav-link" href="#videos" title="Videos"><span></span></a></li>
            <li class="nav-item"><a class="nav-link" href="#galeria" title="Galeria"><span></span></a></li>
			<li class="nav-item"><a class="nav-link" href="#contactenos" title="Contactenos"><span></span></a></li>
		</ul>
	</div> -->

    <!--MIGUEL ANGEL CHAVEZ DELGADO
       *SECCION PARA EL PIE DE PAGINA
    -->
    <footer class="page-footer center-on-small-only mt-4">        
        <div class="footer-copyright wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                © 2017 Copyright: <a href="#" rel="nofollow"> Iglesia de Cristo Iberoamericana el Recreo </a>
            </div>
        </div>
    </footer>
    
    <!--MIGUEL ANGEL CHAVEZ DELGADO
       *LIBRERIAS SCRIP
    -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/mdb.min.js"></script>

    <script src="<?php echo e(asset('assets/js/libGeneral.js')); ?>"></script>
    <?php echo HTML::script('/assets/plugins/parsley.min.js'); ?>


    <script>
        new WOW().init();
    
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        })                


        <?php if(Session::has('message')): ?>            
            alert('<?php echo e(Session::get("message")); ?>');                            
        <?php endif; ?>
    </script>



</body>
</html>