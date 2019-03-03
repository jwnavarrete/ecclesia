<?php $__env->startSection('head'); ?>
    <?php echo HTML::style('/assets/css/reset.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
	<!--DARLING RUBEN CHAVEZ QUINDE
        * FORMULARIO PARA SOLICITAR RESTABLECER LA CONTRASEÑA
    -->
    <?php echo Form::open(['url' => url('/password/email'), 'class' => 'form-signin' ] ); ?>


        <?php echo $__env->make('includes.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <h2 class="form-signin-heading">Resetear Contraseña</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus', 'id' => 'inputEmail' ]); ?>


        <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviarme enlace de reinicio</button>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>