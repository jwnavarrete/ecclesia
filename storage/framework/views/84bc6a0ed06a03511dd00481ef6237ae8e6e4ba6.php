<?php $__env->startSection('head'); ?>
<?php echo HTML::style('/assets/css/register.css'); ?>

<?php echo HTML::style('/assets/css/parsley.css'); ?>

<?php $__env->stopSection(); ?>

<?php
    use App\Models\Lista;
    use App\Models\Cursos;
    $lista = new Lista;
    $cursos = new Cursos;
    $curso = '';
    
    if(isset($_REQUEST['curso']))
        $curso = $_REQUEST['curso'];
?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item active">Asistencia</li>
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
   
<form method="GET" id="frmAsistencia" action="" onSubmit="window.location.reload()">

    <section class="mb-5">


        <div class="row">
            <div class="col-lg-12">
                 <div class="card card-cascade narrower mb-r">

                    <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <a type="button" href="<?php echo e(URL::to('login')); ?>" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-th-large mt-0"></i></a>
                                                        
                        </div>
                        <a href="" class="white-text mx-3">Asistencia</a>
                        <div>
                        </div>
                    </div>

                    <!--Card content-->
                    <div class="card-body pb-0">                        

                            <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                        
                                                <?php echo Form::select('curso', $lista->getCursos(), '' , [
                                                    'placeholder' => 'Sellecione...',
                                                    'required',
                                                    'id'=>'curso',
                                                    'onchange'=>'buscar();',                                        
                                                    'data-parsley-required-message' => 'Pais es requirdo',
                                                    'data-parsley-trigger'          => 'change focusout',
                                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                                ); ?>

                                                <label for="pais">Cursos</label>                                    
                                        
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <!--<a onclick="buscar();" type="button" class="btn btn-success btn-sm">Buscar</a>-->
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>

                           
                        <div class="table-responsive">                                            
                            <ul class="list-group">
                                <?php  $arrCursos = $cursos->getAlumnosCurso($curso);  ?>
                                
                                    <?php $__currentLoopData = $arrCursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>                                    
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?>                                                                                                                                          
                                            <div class="switch">
                                                <label>                                                                              
                                                    <input id="<?php echo e($item->id); ?>" <?php echo e($item->asistencia=="1" ? 'checked="checked"':''); ?>  type="checkbox">
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </li>    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>          
                                
                            </ul>
                                            
                        </div>

                        <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="col-md-3 pull-right">                                            
                                        <a onclick="grabarAsistencia()" type="button" class="btn btn-primary btn-xs">Grabar</a>                                                                                                                                                          
                                    </div>
    
                                </div>
                            </div>
                            <br>                            
    
                    </div>
                    <!--/.Card content-->

                </div>

            </div>            
        </div>

        <!--Card-->

        <!--/.Card-->
    </section>

</form>


    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            $(document).ready(function() {
                $('.mdb-select').material_select();                              
            });

            function buscar(){
                $( "#frmAsistencia" ).submit();
            }

            function grabarAsistencia(){
                try{

                    var marcadas = [];
                    $('input[type=checkbox]').each(function () {                    
                        if(this.checked=="1"){
                            var check = {id:this.id}; 
                            marcadas.push(check);
                        }                                       
                    });
                                        
                    $.ajax({
                        url: '/addRemoveAsistencia',
                        type: 'post',
                        data: {'marcadas':marcadas,curso:$("#curso").val()},
                        dataType: 'json',
                        success: function (data) {
                            if (data.estado==0) {                            
                                toastr.success( data.message , "Notifications" );  
                                window.setTimeout(function(){location.reload()},3000)                              
                            }else{
                                toastr.error( data.message , "Error" );
                            }
                        },error   : function ( jqXhr, json, errorThrown )
                        {
                            toastr.error( "error llamada ajax", "Error" );
                        }
                    });
                


                    } catch(err) {
                        toastr.error(err , "Error" );
                    }
            }


        </script>



    <?php echo HTML::script('/assets/plugins/parsley.min.js'); ?>


    <?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>