<?php $__env->startSection('head'); ?>
<?php echo HTML::style('/assets/css/register.css'); ?>

<?php echo HTML::style('/assets/css/parsley.css'); ?>

<?php $__env->stopSection(); ?>

<?php
    use App\Models\Lista;
    $lista = new Lista
?>

<?php $__env->startSection('content'); ?>

<style>
    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
        /*border-bottom: 1px solid #00c851;
        box-shadow: 0 1px 0 0 #00c851;*/
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
        border-bottom: 1px solid #f44336;
        box-shadow: 0 1px 0 0 #f44336;
    }

    .parsley-errors-list {
    margin: 2px 0 3px;
    padding: 0;
    list-style-type: none;
    font-size: 0.9em;
    line-height: 0.9em;
    opacity: 0;

    transition: all .3s ease-in;
    -o-transition: all .3s ease-in;
    -moz-transition: all .3s ease-in;
    -webkit-transition: all .3s ease-in;
    color: #f44336;
    }

    .parsley-errors-list.filled {
    opacity: 1;
    }
</style>

    <div class="row">


        <div class="col-lg-12">

            <section class="mb-5">

                <div class="card card-cascade narrower">

                    <section>
                        <div class="row">
                            <div class="col-xl-3 col-md-4 mb-r">
                                <form class="md-form">
                                    <div class="file-field" >
                                        <div class="view overlay">                                            
                                            <?php if($usuario->foto): ?>
                                                <img src="<?php echo e($usuario->foto); ?>" id="companyLogo" class="img-fluid" alt="example placeholder avatar">                                            
                                            <?php else: ?>
                                                <img src="/img/usuarios/user.png" id="companyLogo" class="img-fluid" alt="example placeholder avatar">                                            
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-xl-9 col-md-8 mb-r">

                                <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                                    <a href="" class="white-text mx-3"><?php if($usuario->id): ?> Editar Usuario <?php echo e($usuario->username); ?> <?php else: ?> Nuevo Usuario <?php endif; ?> </a>
                                    <div>
                                        <?php if($usuario->id): ?>
                                        <a href="<?php echo e(URL::to('usuarios/create')); ?>" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-plus mt-0"></i></a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(URL::to('usuarios')); ?>" type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-undo mt-0"></i></a>
                                    </div>
                                </div>

                                <div class="card-body pb-0">
                                    
                                    <div class="card-body pt-0">

                                        <?php echo Form::open(['url' => url('usuarios'), 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ); ?>


                                            <!--First row-->
                                            <div class="row">
                                                <input type="hidden" id="id" name="id" value="<?php echo e($usuario->id); ?>" >
                                                <input type="hidden" id="estado" name="estado" value="<?php echo e($usuario->id != '' ? "M" : 'C'); ?>" >

                                                <div class="col-md-3">
                                                    <div class="md-form form-sm">
                                                        <?php echo Form::select('iglesia', $lista->getIglesia(), $usuario->iglesia , [
                                                            'placeholder' => 'Iglesia...',
                                                            'required',
                                                            'data-parsley-required-message' => 'Iglesia es requirda',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            "class"=>"mdb-select colorful-select dropdown-primary"]
                                                        ); ?>

                                                        <label  for="iglesia">Iglesia</label>
                                                    </div>
                                                </div>
                                                <!--First column-->
                                                <div class="col-md-3">
                                                    <div class="md-form form-sm">

                                                        <?php echo Form::text('username', $usuario->username , [
                                                            'class'                         => 'form-control',
                                                            'required',
                                                            'id'                            => 'username',
                                                            'data-parsley-required-message' => 'Usuario es requerido',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                                                            'data-parsley-minlength'        => '4',
                                                            'data-parsley-maxlength'        => '32'
                                                        ]); ?>

                                                        <label for="username" >Usuario</label>
                                                    </div>
                                                </div>
                                                <!--Second column-->
                                                <div class="col-md-3">
                                                    <div class="md-form form-sm">

                                                        <?php echo Form::text('first_name', $usuario->first_name , [
                                                            'class'                         => 'form-control',
                                                            'required',
                                                            'id'                            => 'first_name',
                                                            'data-parsley-required-message' => 'Nombre es requerido',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-pattern'          => '/^[A-Za-z\sáéíóú]*$/',
                                                            'data-parsley-minlength'        => '4',
                                                            'data-parsley-maxlength'        => '32'
                                                        ]); ?>

                                                        <label for="first_name" >Nombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="md-form form-sm">
                                                        <?php echo Form::text('last_name', $usuario->last_name , [
                                                            'class'                         => 'form-control',
                                                            'required',
                                                            'id'                            => 'last_name',
                                                            'data-parsley-required-message' => 'Apellidos son requeridos',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-pattern'          => '/^[A-Za-z\sáéíóúñ]*$/',
                                                            'data-parsley-minlength'        => '4',
                                                            'data-parsley-maxlength'        => '32'
                                                        ]); ?>

                                                        <label for="last_name" >Apellidos</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <!--First column-->
                                                <div class="col-md-3">
                                                    <div class="md-form form-sm">
                                                        <?php echo Form::email('email', $usuario->email, [
                                                            'class'                         => 'form-control',
                                                            'required',
                                                            'id'                            => 'inputEmail',
                                                            'data-parsley-required-message' => 'Email is required',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-type'             => 'email'
                                                        ]); ?>

                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                                <!--Second column-->
                                                <div class="col-md-3">
                                                    <div class="md-form form-sm">

                                                        <?php echo Form::select('ciudad',$lista->getCiudades()  , $usuario->iglesia , [
                                                            'placeholder' => 'Ciudad...',
                                                            'required',
                                                            'data-parsley-required-message' => 'Ciudad es requirda',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            "class"=>"mdb-select colorful-select dropdown-primary"]
                                                        ); ?>

                                                        <label for="ciudad">Ciudad</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                        <div class="md-form form-sm">
                                                                <?php echo Form::select('pais', $lista->getPaises(), $usuario->pais , [
                                                                    'placeholder' => 'Pais...',
                                                                    'required',
                                                                    'data-parsley-required-message' => 'Pais es requirdo',
                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                                                ); ?>

                                                                <label for="pais">Pais</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="md-form form-sm">
                                                                <?php echo Form::select('role', $lista->getRoles(), $usuario->role_id , [
                                                                    'placeholder' => 'Rol...',
                                                                    'required',
                                                                    'data-parsley-required-message' => 'Pais es requirdo',
                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                                                ); ?>

                                                                <label for="role">Rol</label>
                                                        </div>
                                                    </div>
                                            </div>
                                            <?php if(!$usuario->id): ?>
                                                <div class="row">
                                                    <!--First column-->
                                                    <div class="col-md-6">
                                                        <div class="md-form form-sm">
                                                                <?php echo Form::password('password', [
                                                                    'class'                         => 'form-control',
                                                                    'required',
                                                                    'id'                            => 'password',
                                                                    'data-parsley-required-message' => 'contraseña es obligatoria',
                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                    'data-parsley-minlength'        => '6',
                                                                    'data-parsley-maxlength'        => '20'
                                                                ]); ?>

                                                                <label for="password" >Contraseña</label>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="md-form form-sm">
                                                                <?php echo Form::password('password_confirm',  [
                                                                    'class'                         => 'form-control',
                                                                    'required',
                                                                    'id'                            => 'password_confirm',
                                                                    'data-parsley-equalto'          => '#password',
                                                                    'data-parsley-equalto-message'  => 'Las contraseñas no son iguales',
                                                                    'data-parsley-required-message' => 'contraseña de confirmacion obligatoria',
                                                                    'data-parsley-trigger'          => 'change focusout',
                                                                    'data-parsley-minlength'        => '6',
                                                                    'data-parsley-maxlength'        => '20'
                                                                ]); ?>

                                                                <label for="password_confirm" class="has-warning">Confirmar Contraseña</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <!--/.First row-->
                                            <!--Third row-->
                                            <div class="row">
                                                <!--First column-->
                                                <div class="col-md-12">
                                                    <div class="md-form form-sm">
                                                        <?php echo Form::textarea('direccion', $usuario->direccion , [
                                                            'class'                         => 'md-textarea',
                                                            //'placeholder'                   => 'Direccion',
                                                            'required',
                                                            'id'                            => 'direccion',
                                                            'data-parsley-required-message' => 'direccion requerida',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            //'data-parsley-pattern'          => '/^[A-Za-z\sáéíóúñ]*$/',
                                                            'data-parsley-minlength'        => '4',
                                                            'data-parsley-maxlength'        => '200'
                                                        ]); ?>

                                                        <label for="direccion" >Direccion</label>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <?php echo Form::file('image', array('class' => 'image')); ?>

                                            <!--/.Third row-->
                                            <!-- Fourth row -->
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="col-md-3 pull-right">

                                                            <?php echo Form::submit(($usuario->id!="" ? "Modificar" : "Crear" ),["class" =>"btn btn-xs btn primary-color btn-block register-btn"]
                                                            ); ?>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.Fourth row -->
                                        <?php echo Form::close(); ?>

                                    </div>
                                </div>

                            </div>                        
                        </div>
                    </div>
                </section>                
            </div>
            
        </section>
    </div>



    </div>



    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
   <script>
    $(document).ready(function() {
        $('.mdb-select').material_select();
       
    });



    function init() {
    $("img[data-type=editable]").each(function (i, e) {
        var _inputFile = $('<input/>')
            .attr('type', 'file')
            .attr('hidden', 'hidden')
            .attr('onchange', 'readImage()')
            .attr('data-image-placeholder', e.id);

        $(e.parentElement).append(_inputFile);

        $(e).on("click", _inputFile, triggerClick);
    });
}

function triggerClick(e) {
    e.data.click();
}

Element.prototype.readImage = function () {
    var _inputFile = this;
    if (_inputFile && _inputFile.files && _inputFile.files[0]) {
        var _fileReader = new FileReader();
        _fileReader.onload = function (e) {
            var _imagePlaceholder = _inputFile.attributes.getNamedItem("data-image-placeholder").value;
            var _img = $("#" + _imagePlaceholder);
            _img.attr("src", e.target.result);
        };
        _fileReader.readAsDataURL(_inputFile.files[0]);
    }
};

//
// IIFE - Immediately Invoked Function Expression
// https://stackoverflow.com/questions/18307078/jquery-best-practises-in-case-of-document-ready
(

function (yourcode) {
    "use strict";
    // The global jQuery object is passed as a parameter
    yourcode(window.jQuery, window, document);
}(

function ($, window, document) {
    "use strict";
    // The $ is now locally scoped
    $(function () {
        // The DOM is ready!
        init();
    });

    // The rest of your code goes here!
}));
    </script>


    <?php echo HTML::script('/assets/plugins/parsley.min.js'); ?>


    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>