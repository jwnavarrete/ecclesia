<script>
        <?php if(Session::has('message')): ?>                    
            var mensaje = '<?php echo e(Session::get("message")); ?>';
            var estado = '<?php echo e(Session::get("status")); ?>';
            //toastr.clear();
            switch (estado) {                
                case "danger":
                    toastr.error( mensaje, 'Error!');
                    break;
                case "success":
                    toastr.success( mensaje, 'Exito!');
                    break;
                case "warning":
                    toastr.warning( mensaje, 'Alerta!');
                    break;                
            }

                
        <?php endif; ?>

        var error="";
        <?php if(session()->has('errors')): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                error +="<?php echo e($error); ?>";
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            toastr.error( error, 'Error!');

        <?php endif; ?>
        
        
</script>
