<?php $__env->startSection('head'); ?>
    <?php echo HTML::style('/assets/css/register.css'); ?>

    <?php echo HTML::style('/assets/css/parsley.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open(['url' => url('register'), 'class' => 'form', 'data-parsley-validate' ] ); ?>


        <?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--DARLING RUBEN CHAVEZ QUINDE
            * FORMULARIO PARA REGISTRO DE UN NUEVO USUARIO WEB
        -->
        <h2 class="form">Formulario de registro</h2>
        <div class="col-md-12">
            
            <div class="row">

                <div class="col-md-4">            
                    <label for="inputEmail" class="sr-only">Correo</label>
                    <?php echo Form::email('email', null, [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'Correo',
                        'required',
                        'id'                            => 'inputEmail',
                        'data-parsley-required-message' => 'Email is required',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-type'             => 'email'
                    ]); ?>

                </div>
                <div class="col-md-4">
                    <label for="inputFirstName" class="sr-only">First name</label>
                    <?php echo Form::text('first_name', null, [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'First name',
                        'required',
                        'id'                            => 'inputFirstName',
                        'data-parsley-required-message' => 'First Name is required',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                        'data-parsley-minlength'        => '2',
                        'data-parsley-maxlength'        => '32'
                    ]); ?>

                </div>
                <div class="col-md-4">            
                    <label for="inputLastName" class="sr-only">Last name</label>
                    <?php echo Form::text('last_name', null, [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'Last name',
                        'required',
                        'id'                            => 'inputLastName',
                        'data-parsley-required-message' => 'Last Name is required',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                        'data-parsley-minlength'        => '2',
                        'data-parsley-maxlength'        => '32'
                    ]); ?>

                </div>

                <div class="col-md-4">            
                    <label for="inputPassword" class="sr-only">Password</label>
                    <?php echo Form::password('password', [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'Password',
                        'required',
                        'id'                            => 'inputPassword',
                        'data-parsley-required-message' => 'contraseña es obligatoria',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-minlength'        => '6',
                        'data-parsley-maxlength'        => '20'
                    ]); ?>

                </div>

                <div class="col-md-4">            
                    <label for="inputPasswordConfirm" class="sr-only has-warning">Confirm Password</label>
                    <?php echo Form::password('password_confirmation', [
                        'class'                         => 'form-control',
                        'placeholder'                   => 'Password confirmation',
                        'required',
                        'id'                            => 'inputPasswordConfirm',
                        'data-parsley-required-message' => 'Password confirmation is required',
                        'data-parsley-trigger'          => 'change focusout',
                        'data-parsley-equalto'          => '#inputPassword',
                        'data-parsley-equalto-message'  => 'Not same as Password',
                    ]); ?>

                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-12">
                    <div class="g-recaptcha" data-sitekey="<?php echo e(env('RE_CAP_SITE')); ?>"></div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-sm btn-primary pull-right register-btn" type="submit">Register</button>
                </div>
                
            </div>
        </div>
        
        <div style="text-align: center;">
            <p class="or-social">Or Use Social Login</p>
            <p><a class="nav-link" href="<?php echo e(url('login')); ?>">Ya estoy registrado</a></p>
            
        </div>
        
        <?php echo $__env->make('partials.socials', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::close(); ?>


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

    <?php echo HTML::script('/assets/plugins/parsley.min.js'); ?>


    <script src='https://www.google.com/recaptcha/api.js'></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>