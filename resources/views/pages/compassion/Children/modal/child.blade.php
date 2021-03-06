@php   
    use App\Models\Lista;
    $lista = new Lista;        
    $arrNiveles = $lista->getCatalogoByData("EDU");         
    
    
@endphp

<!--YERSON ALBERTO CORTEZ CHICA
    * MODAL DONDE SE PRESENTA LA INFORMACION DEL MENOR
    * ESTA INFORMACION ES INGRESADA POR EL RESPONSABLE DE REGISTRAR EL MENOR EN EL PROYECTO DE APADRINAMIENTO
-->
<div id="childModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" id="frmChild" name="frmChild">        
            <div class="modal-content">
                <div class="modal-header">
                    <div class="chip">
                        <img id="imgTitle" src="/img/compassion/child.png" alt="Apadrinado"> 
                        <span id="lblnombre1" class="lblNombre"></span> <span id="lblnombre2" class="lblNombre"></span> <span id="lblapellido1" class="lblNombre"></span> <span id="lblapellido2" class="lblNombre"></span>                         
                    </div>
                    <p>Editar</p>                                       
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-1">
                            <ul class="nav  md-pills pills-primary" role="tablist">
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
                        <div class="col-md-11">                        

                            <!--YERSON ALBERTO CORTEZ CHICA
                               * SECCIONES DE INFORMACION QUE DEBE LLENAR EL ENCARGADO DEL REGISTRO DEL MENOR
                               * ESTA SEPARADO EN VARIAS VISTAS PARA QUE EL CODIGO SEA MUCHO MAS ENTENDIBLE Y FACIL A LA HORA DEL DESARROLLO
                            -->
                            <div class="tab-content vertical">                                                            
                                <form action="frmChild" id="frmChild">
                                    <!--YERSON ALBERTO CORTEZ CHICA
                                       * SECCION PARA EL CONTENIDO GENERAL DEL MENOR
                                    -->
                                    <div class="tab-pane fade in show active" id="general" role="tabpanel">
                                        @include('pages.compassion.Children.include.general')                
                                    </div>

                                    <!--YERSON ALBERTO CORTEZ CHICA
                                       * DENTRO DE ESTA SECCION SE REGISTRAN LAS ACTIVIDADES DEL MENOR
                                    -->                                    
                                    <div class="tab-pane fade" id="actividad" role="tabpanel">                                        
                                        @include('pages.compassion.Children.include.actividades')
                                    </div>

                                    <!--YERSON ALBERTO CORTEZ CHICA
                                       * LOS DATOS DE SALUD DEL MENOR SON INGRESADOS EN ESTA SECCION DE CODIGO
                                    -->                                    
                                    <div class="tab-pane fade" id="salud" role="tabpanel">                                        
                                        @include('pages.compassion.Children.include.salud')
                                    </div>

                                    <!--YERSON ALBERTO CORTEZ CHICA
                                       * SE REQUIERE INGRESAR LOS DATOS DE ESTUDIO DEL MENOR, Y SE INGRESAN DENTRO DE ESTA SECCION
                                    -->                                    
                                    <div class="tab-pane fade" id="estudios" role="tabpanel">                                        
                                        @include('pages.compassion.Children.include.estudios')
                                    </div>

                                    <!--YERSON ALBERTO CORTEZ CHICA
                                       * LOS DATOS NDEL GUARDIAN DEL MENOR SE INGRESAN EN ESTA SECCION
                                    -->                                    
                                    <div class="tab-pane fade" id="guardianes" role="tabpanel">                                        
                                        @include('pages.compassion.Children.include.guardianes')
                                    </div>                                                          
                                </form>
                            </div>
                        
                        </div>
                    </div>                    
                </div>

                <!--YERSON ALBERTO CORTEZ CHICA
                   * BOTONES UBICADOS EN LA PARTE INFERIOR DEL CONTENIDO, GRABAR Y CERRAR MODAL
                -->                                    
                <div class="modal-footer">
                    <button type="button" id="btnGrabar" onclick="grabarDatos();" class="btn btn-primary btn-sm waves-light">Grabar</button>
                    <button type="button" class="btn btn-secondary btn-sm waves-light" data-dismiss="modal" (click)="demoBasic.hide()" mdbWavesEffect>Cerrar</button>                    
                </div>
            </div>
        </form>                                
    </div>
</div>
    