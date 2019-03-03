<?php $__env->startSection('head'); ?>
    <?php echo HTML::style('/assets/css/reset-form.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <!--DARLING RUBEN CHAVEZ QUINDE
        * FORMULARIO PARA RESETEAR LA CONTRASEÑA (INGRESAR NUEVA CONTRASEÑA)
    -->
    <?php echo Form::open(['url' => url('/password/reset/'), 'class' => 'form-signin', 'method' => 'post' ] ); ?>


        <?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo e(csrf_field()); ?>


        <input type="hidden" name="token" value="<?php echo e($token); ?>">

        <h2 class="form-signin-heading">Set New Password</h2>

        <label for="inputEmail" class="sr-only">Email address</label>
        <?php echo Form::email('email', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Email address',
            'required',
            'id'                            => 'inputEmail',
            'data-parsley-required-message' => 'Email is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-type'             => 'email',
            'autofocus'
        ]); ?>


        <label for="inputPassword" class="sr-only">Password</label>
        <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required',  'id' => 'inputPassword' ]); ?>



        <label for="inputPasswordConfirmation" class="sr-only">Password Confirmation</label>
        <?php echo Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password confirmation', 'required',  'id' => 'inputPasswordConfirmation' ]); ?>



        <button class="btn btn-lg btn-primary btn-block" type="submit">Change</button>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>