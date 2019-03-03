<?php
    use App\Models\Iglesia;
    $iglesia = Iglesia::first();
?>

<!--MIGUEL ANGEL CHAVEZ DELGADO
   * VISTA CON CONTENIO DE CONTACTENOS   
-->
<div class="hm-black-strong" style="background-image:url('/img/contactos.jpg');background-repeat:no-repeat; background-position:center;background-size:cover;">
    <div class="flex-center pattern-1">
        <div id="contactenos" class="container">
            <section class="section contact-section mb-5">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                            <h2 class="teal-text font-up font-bold pt-4 mb-5 wow fadeIn" data-wow-delay=".2s">Contactenos</h2>
                    </div>
                </div>
                <div class="row wow fadeIn" data-wow-delay=".4s">
                    <!--MIGUEL ANGEL CHAVEZ DELGADO
                       * CAMPOS PARA ENVIAR MENSAJES
                    -->                                   
                    <div class="col-md-8">
                        <?php echo Form::open(['action' => 'PagesController@enviarMensaje', 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control white-text form-control-sm validate ml-0" placeholder="" 
                                            required="" id="nombre" 
                                            data-parsley-required-message="Titulo es requerido" 
                                            data-parsley-trigger="change focusout" 
                                            data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                            data-parsley-minlength="4" 
                                            data-parsley-maxlength="40" 
                                            name="nombre" 
                                            type="text" 
                                            data-parsley-id="4">
                                            
                                        <label data-error="invalido" class="white-text" data-success="correcto" for="nombre" class="ml-0">Nombre</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input class="form-control white-text form-control-sm validate ml-0" placeholder="" 
                                            required="" id="correo" 
                                            data-parsley-required-message="Titulo es requerido" 
                                            data-parsley-trigger="change focusout"                                             
                                            data-parsley-minlength="4" 
                                            data-parsley-maxlength="40" 
                                            data-parsley-type="email"
                                            name="correo" 
                                            type="email" 
                                            data-parsley-id="4">
                                        <label data-error="invalido" class="white-text" data-success="correcto" for="correo" class="ml-0">Correo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input class="form-control white-text form-control-sm validate ml-0" placeholder="" 
                                            required="" id="asunto" 
                                            data-parsley-required-message="Asunto es requerido" 
                                            data-parsley-trigger="change focusout" 
                                            data-parsley-pattern="/^[A-Za-z\sáéíóúñ]*$/" 
                                            data-parsley-minlength="4" 
                                            data-parsley-maxlength="40" 
                                            name="asunto" 
                                            type="text" 
                                            data-parsley-id="4">
                                        <label data-error="invalido" class="white-text" data-success="correcto" for="asunto" class="ml-0">Asunto</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="md-form">
                                        <textarea type="text" 
                                            required="" id="mensaje" 
                                            data-parsley-required-message="Mensaje es requerido" 
                                            data-parsley-trigger="change focusout"                                             
                                            data-parsley-minlength="4" 
                                            data-parsley-maxlength="500" 
                                            name="mensaje" 
                                            class="md-textarea white-text">
                                            </textarea>
                                        <label data-error="invalido" for="mensaje" class="white-text" data-success="correcto">Tu mensaje</label>
                                    </div>

                                </div>
                            </div>

                            <div class="center-on-small-only mb-4">                                
                                <button type="submit" class="btn btn-teal btn-rounded">Grabar <i class="fa fa-sign-in ml-1"></i></button>
                            </div>        
                        <?php echo e(Form::close()); ?>

                    </div>     

                    <!--MIGUEL ANGEL CHAVEZ DELGADO
                       * INFORMACION DE LA IGLESIA (TABLA USADA => IGLESIA)
                    -->               
                    <div class="col-md-4">
                        <ul class="contact-icons">
                            <li><i class="fa fa-map-marker teal fa-2x"></i>
                                <div class="white-text">
                                <p><?php echo e($iglesia->direccion); ?></p>
                                </div>                                  
                            </li>

                            <li><i class="fa fa-phone teal-text fa-2x"></i>
                                <div class="white-text">
                                <p><?php echo e($iglesia->telefonos); ?></p>
                                </div>
                            </li>

                            <li><i class="fa fa-envelope teal-text fa-2x"></i>
                                <div class="white-text">
                                <p><?php echo e($iglesia->correoContacto); ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>                    
                    </div>
                </div>                
            </section>            
        </div>
    </div>
</div>