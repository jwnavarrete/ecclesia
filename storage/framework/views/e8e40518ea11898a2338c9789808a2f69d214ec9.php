<?php $__env->startSection('head'); ?>
<?php echo HTML::style('/assets/css/register.css'); ?>

<?php echo HTML::style('/assets/css/parsley.css'); ?>

<?php $__env->stopSection(); ?>

<?php
    use App\Models\Lista;
    $lista = new Lista
?>


<?php $__env->startSection('content'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active">Inscripciones</li>
<?php $__env->stopSection(); ?>

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


                <!--Card-->
                <div class="card card-cascade narrower">

                    <!--Section: Chart-->
                    <section>

                      <div class="row">
                        <!--Grid row-->
                        <div class="col-xl-3 col-md-4 mb-r">
                                
                                <!--data-type="editable"-->
                                <form class="md-form">
                                    <div class="file-field" >
                                        <div class="view overlay">                                            
                                            
                                            <?php if($cursos->foto): ?>
                                                <img src="/img/cursos/<?php echo e($cursos->foto); ?>" id="companyLogo" class="img-fluid" alt="example placeholder avatar">                                            
                                            <?php else: ?>
                                                <img src="/img/cursos/curso.jpg" id="companyLogo" class="img-fluid" alt="example placeholder avatar">                                            
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <!--<div class="btn btn-mdb-color btn-rounded float-left waves-effect waves-light">
                                                <span>Add photo</span>
                                                <input type="file">
                                            </div>-->
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-xl-9 col-md-8 mb-r">

                                <!--Card image-->
                                <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                                    <a href="" class="white-text mx-3"><?php if($cursos->suscrito): ?> Cancelar Inscripcion  <?php else: ?> Inscribirse  <?php endif; ?>  <?php echo e($cursos->titulo); ?></a>
                                    <div>                                     
                                        <a href="<?php echo e(URL::to('inscripciones')); ?>" type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-undo mt-0"></i></a>
                                    </div>
                                </div>

                                <!--/Card image-->

                                <!--Card content-->
                                <div class="card-body pb-0">

                                    <!--Panel data-->
                                    <div class="card-body pt-0">

                                        <?php echo Form::open(['route' => 'addInscripcion', 'class' => '', 'data-parsley-validate','enctype' => 'multipart/form-data' ] ); ?>

                                            <!--First row-->
                                            <div class="row">
                                                <input type="hidden" id="id" name="id" value="<?php echo e($cursos->id); ?>" >
                                                <input type="hidden" id="modo" name="modo" value="<?php echo e($cursos->suscrito == 1 ? "REMOVE" : 'ADD'); ?>" >
                                                
                                                <div class="col-md-6">
                                                    <div class="md-form form-sm">

                                                        <?php echo Form::text('titulo', $cursos->titulo , [
                                                            'class'                         => 'form-control',
                                                            'required',
                                                            'id'                            => 'titulo',
                                                            'data-parsley-required-message' => 'Titulo es requerido',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-pattern'          => '/^[A-Za-z\sáéíóúñ]*$/',
                                                            'data-parsley-minlength'        => '4',
                                                            'data-parsley-maxlength'        => '32'
                                                        ]); ?>

                                                        <label for="titulo" >Titulo</label>
                                                    </div>
                                                </div>
                                                <!--First column-->
                                                <div class="col-md-3">
                                                    <div class="md-form form-sm">
                                                        <?php echo Form::text('capacidad', $cursos->capacidad , [
                                                            'class'                         => 'form-control',
                                                            'required',
                                                            'id'                            => 'capacidad',
                                                            'data-parsley-required-message' => 'capacidad es requerido',
                                                            'data-parsley-trigger'          => 'change focusout',                                                            
                                                            'data-parsley-minlength'        => '1',
                                                            'data-parsley-maxlength'        => '3'
                                                        ]); ?>

                                                        <label for="endingDate">capacidad</label>
                                                        
                                                    </div>                                                                                                    
                                                </div>

                                                <div class="col-md-3">                                                    
                                                    <div class="md-form form-sm">                                                            
                                                        <div class="switch">                                                            
                                                            <label> 
                                                                Estado                                                     
                                                                <input id="estado" name="estado" <?php echo e(($cursos->estado=='1'? 'checked="checked"':'')); ?>}   type="checkbox">
                                                                <span class="lever"></span>
                                                            </label>
                                                        </div>
                                                    
                                                    </div>
                                                
                                                </div>
                                                                                               
                                                

                                                <div class="col-md-12">
                                                    <div class="md-form form-sm">
                                                        <?php echo Form::textarea('detalle', $cursos->detalle , [
                                                            'class'                         => 'md-textarea',
                                                            //'placeholder'                   => 'Direccion',
                                                            'required',
                                                            'id'                            => 'detalle',
                                                            'data-parsley-required-message' => 'detalle requerida',
                                                            'data-parsley-trigger'          => 'change focusout',
                                                            'data-parsley-pattern'          => '',
                                                            'data-parsley-minlength'        => '4',
                                                            'data-parsley-maxlength'        => '200'
                                                        ]); ?>

                                                        <label for="detalle" >detalle</label>

                                                    </div>
                                                </div>
                                            
                                        
                                                                                    

                                        
                                                <div class="col-md-12 text-center">
                                                    <div class="col-md-3 pull-right"> 
                                                        <?php if($cursos->suscrito==1): ?>
                                                        <?php echo Form::submit("CANCELAR INSCRIPCION",["class" =>"btn btn-danger btn-sm"]
                                                            ); ?>

                                                        <?php else: ?>
                                                        <?php echo Form::submit("INSCRIBIRSE",["class" =>"btn btn-success btn-sm"]
                                                            ); ?>

                                                        <?php endif; ?>
                                                            
                                                    </div>

                                                </div>
                                          
                                        <?php echo Form::close(); ?>



                                    </div>
                                    <!--/Panel data-->

                                </div>
                                <!--/.Card content-->
                                <!--/Card image-->

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->
                      </div>




                    </section>
                    <!--Section: Chart-->

                </div>
                <!--/.Card-->

            </section>
        </div>



    </div>


    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
   <script>
    $(document).ready(function() {
        $('.mdb-select').material_select();

        $('.datepicker').pickadate({
            // Escape any “rule” characters with an exclamation mark (!).
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
            weekdaysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            //format: 'd: dddd, dd mmm, yyyy',
            format: 'yyyy-mm-dd',
            formatSubmit: 'yyyy-mm-dd',
            //hiddenPrefix: 'prefix__',
            //hiddenSuffix: '__suffix'
        });


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