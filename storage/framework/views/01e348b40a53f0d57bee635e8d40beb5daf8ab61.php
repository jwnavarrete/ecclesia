<?php    
    use App\Models\Lista;
    $lista = new Lista;
    $arrSalud = $lista->getCatalogoByData("S"); 
    $arrOido = $lista->getCatalogoByData("OIDO"); 
    $arrOjo = $lista->getCatalogoByData("OJO");     
    $arrNiveles = $lista->getCatalogoByData("EDU");         
    
 ?>

<!--YERSON ALBERTO CORTEZ CHICA
   * MODAL DONDE SE INGRESAN LOS DATOS MEDICOS DEL MENOR
-->                                    
<div id="childModalConsulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" id="frmConsulta" name="frmConsulta">        
            <div class="modal-content">
                <div class="modal-header">
                    <div class="chip">
                        <img id="imgTitleNino" src="/img/compassion/child.png" alt="Apadrinado"> 
                        <span id="lblnombreNino" class="lblNombre"></span>
                    </div>
                    <p>Editar</p>                                       
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="nav  md-pills pills-primary flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-General"   data-toggle="tab" href="#general" role="tab">
                                    <i class="fa fa-address-card ml-2"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#actividad" role="tab">
                                    <i class="fa fa-futbol-o ml-2"></i>
                                    </a>
                                </li>      
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#salud" role="tab">
                                    <i class="fa fa-user-md ml-2"></i>
                                    </a>
                                </li>                                   
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#estudios" role="tab">
                                    <i class="fa fa-graduation-cap ml-2"></i>
                                    </a>
                                </li>                
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#guardianes" role="tab">
                                    <i class="fa fa-users ml-2"></i>
                                    </a>
                                </li>                                   
                            </ul>
                        </div>
                        <div class="col-md-10">                        

                            <div class="tab-content vertical">                                                            
                                <form action="frmConsulta" id="frmConsulta">
                                    <div class="tab-pane fade in show active" id="general" role="tabpanel">
                                        <?php echo $__env->make('pages.compassion.ControlMedico.include.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                
                                    </div>
                                    
                                    <div class="tab-pane fade" id="actividad" role="tabpanel">                                        
                                        <?php echo $__env->make('pages.compassion.ControlMedico.include.actividades', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>

                                    <div class="tab-pane fade" id="salud" role="tabpanel">                                        
                                        <?php echo $__env->make('pages.compassion.ControlMedico.include.salud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>

                                    <div class="tab-pane fade" id="estudios" role="tabpanel">                                        
                                        <?php echo $__env->make('pages.compassion.ControlMedico.include.estudios', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>

                                    <div class="tab-pane fade" id="guardianes" role="tabpanel">                                        
                                        <?php echo $__env->make('pages.compassion.ControlMedico.include.guardianes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>                                                          
                                </form>
                            </div>
                        
                        </div>
                    </div>                    
                </div>

                <div class="modal-footer">
                    <button type="button" onclick="grabarDatos();" class="btn btn-primary btn-sm waves-light">Grabar</button>
                    <button type="button" class="btn btn-secondary btn-sm waves-light" data-dismiss="modal" (click)="demoBasic.hide()" mdbWavesEffect>Cerrar</button>                    
                </div>
            </div>
        </form>                                
    </div>
</div>
    