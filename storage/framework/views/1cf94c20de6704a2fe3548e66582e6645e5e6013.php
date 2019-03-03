<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="/assets/css/signin.css">
    <link rel="stylesheet" href="/assets/css/parsley.css">
    <style type="text/css">
        .center {display: block;margin-left: auto;margin-right: auto;width: 50%;}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="mt-lg-5">
        
        <?php echo Form::open(['url' => url('login'), 'class' => 'form-signin', 'data-parsley-validate' ] ); ?>            
            <div class="center">
                <img src="/img/candado.jpg" class="img-fluid flex-center">
            </div>
            
            
            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>           
                <label for="inputEmail" class="sr-only">Email address</label>
                <?php echo Form::email('email', null, [
                    'class'                         => 'form-control',
                    'placeholder'                   => 'Correo electronico',
                    'required',
                    'id'                            => 'inputEmail',
                    'data-parsley-required-message' => '        El correo es obligatorio',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-type'             => 'email'
                ]); ?>

            </div>
            
            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>              
                <label for="inputPassword" class="sr-only">Clave</label>
                <?php echo Form::password('password', [
                    'class'                         => 'form-control',
                    'placeholder'                   => 'Clave',
                    'required',
                    'id'                            => 'inputPassword',
                    'data-parsley-required-message' => '        La clave es obligatoria',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-minlength'        => '6',
                    'data-parsley-maxlength'        => '20'
                ]); ?>

                <p class="font-small grey-text d-flex justify-content-end">Olvidaste tu <a href="<?php echo e(url('password/reset')); ?>" class="dark-grey-text ml-1 font-bold" >contraseña?</a> </p>        
            </div>
            
            <div class="form-group">
                <fieldset class="form-group">
                    <?php echo Form::checkbox('remember', 1, null, ['id' => 'remember-me']); ?>

                    <label for="remember-me">Recuerdame</label>
                </fieldset>
            </div>
            

            <div class="row d-flex align-items-center mb-4">            
                <div class="col-md-3 col-md-6 text-center center-block">
                    <button type="submit" class="btn btn-pink btn-block btn-rounded z-depth-1 waves-effect waves-light center-block"/>Ingresar</button>
                </div>    
                <br>        
                <div class="col-md-6">
                    <p class="font-small grey-text d-flex justify-content-end">No tienes cuenta? 
                        <a href="<?php echo e(url('register')); ?>" class="blue-text ml-1"> Registrarse</a>
                    </p>
                </div>            
            </div>

        <?php echo Form::close(); ?>

        
    </section>                
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.5.0/parsley.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>