<?php $__env->startSection('head'); ?>
<?php echo HTML::style('/assets/css/register.css'); ?>

<?php echo HTML::style('/assets/css/parsley.css'); ?>

<?php $__env->stopSection(); ?>

<?php
    use App\Models\Lista;
    use App\Models\Parametro;
    $lista = new Lista;
    $parametro = Parametro::first();    
?>

<!--JOFRE ALENXANDER MORALES PLACENCIO
    * PAGINA DE PARAMETRIZACION Y CONFIGURACION DEL CONTENIDO EN GENERAL DEL SISTEMA
-->
<?php $__env->startSection('content'); ?>
    <?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Parametros Generales - Portal Web</li>
    <?php $__env->stopSection(); ?>
    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * LISTADO DE OPCIONES A CONFIGURAR
    -->
    <section class="mb-5">
        <div class="row">            
            <div class="col-lg-12">                                
                <ul class="nav nav-tabs nav-justified">                    
                    <li class="nav-item">                        
                        <a class="nav-link" id="tabgeneral" data-toggle="tab" href="#general" role="tab">General</a>
                    </li>
                    <li class="nav-item">                        
                        <a class="nav-link" id="tababout" data-toggle="tab" href="#about" role="tab">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">                        
                        <a class="nav-link" id="tabconvenio" data-toggle="tab" href="#convenio" role="tab">Convenio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabequipo" data-toggle="tab" href="#equipo" role="tab">Equipo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabhorarios" data-toggle="tab" href="#horarios" role="tab">Horarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabministerio" data-toggle="tab" href="#ministerio" role="tab">Ministerios</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" id="tabvideos" data-toggle="tab" href="#video" role="tab">Videos</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" id="tabgaleria" data-toggle="tab" href="#galeria" role="tab">Galeria</a>
                    </li>
                </ul>                
                <div class="tab-content card">                                        

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "GENERAL"
                    -->
                    <?php echo $__env->make('pages.parametro.partials.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                     

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "ACERCA DE NOSOTROS"
                    -->
                    <?php echo $__env->make('pages.parametro.partials.about', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "ACERCA DE NOSOTROS"
                    -->
                    <?php echo $__env->make('pages.parametro.partials.convenio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "NUESTROS HORRIOS"
                    -->
                    <?php echo $__env->make('pages.parametro.partials.horarios', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                     

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "EQUIPO DE LIDEREZ"
                    -->
                    <?php echo $__env->make('pages.parametro.partials.equipo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "MINISTERIOS"
                    -->
                    <?php echo $__env->make('pages.parametro.partials.ministerio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "VIDEOS"
                    -->
                    <!--<?php echo $__env->make('pages.parametro.partials.videos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
                    <br>

                    <!--JOFRE ALENXANDER MORALES PLACENCIO
                        * SECCION DE CODIGO PARA ADMINISTRAR EL CONTENIDO "GALERIA"
                    -->
                    <?php echo $__env->make('pages.parametro.partials.galeria', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
                </div>
            </div>                        
        </div>
    </section>        

    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * MODAL QUE PARA ADMINSITAR EL CONTENIDO "EQUIPO"
    -->
    <?php echo $__env->make('pages.parametro.modal.modalEquipo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * MODAL QUE PARA ADMINSITAR EL CONTENIDO "ACERCA DE NOSOTROS"
    -->
    <?php echo $__env->make('pages.parametro.modal.modalAbout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * MODAL QUE PARA ADMINSITAR EL CONTENIDO "MINISTERIOS"
    -->
    <?php echo $__env->make('pages.parametro.modal.modalMinisterio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <!--JOFRE ALENXANDER MORALES PLACENCIO
        * MODAL QUE PARA ADMINSITAR LOS HORARIOS
    -->
    <?php echo $__env->make('pages.parametro.modal.modalHorario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.mdb-select').material_select();                                      

            <?php if(Session::has('tab')): ?>                    
                var tab = '<?php echo e(Session::get("tab")); ?>';                    
                $( "#tab"+tab ).last().addClass( "active" );
                $( "#"+tab ).last().addClass( "active" );                    
            <?php else: ?>
                $( "#tabgeneral" ).last().addClass( "active" );
                $( "#general" ).last().addClass( "active" );
            <?php endif; ?>
            
            <?php if(Session::has('panel')): ?>                    
                var panel = '<?php echo e(Session::get("panel")); ?>';                                        
                $( "#panel"+panel ).last().addClass( "active" );
                $( "#"+panel ).last().addClass( "in active show" );                    
            <?php else: ?>
                $( "#panelinfo" ).last().addClass( "active" );
                $( "#info" ).last().addClass( "in active show" );
            <?php endif; ?>

        }); 
    </script>
<?php echo HTML::script('/assets/plugins/parsley.min.js'); ?>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>