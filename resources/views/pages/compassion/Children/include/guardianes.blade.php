<div class="col-lg-12">     


    <!--Accordion wrapper-->
    <div class="accordion md-accordion" id="accordionEx2" role="tablist" aria-multiselectable="true">

        <!-- Accordion card -->
        <div class="card">
      
          <!-- Card header -->
          <div class="card-header" role="tab" id="headingTwo11">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapseTwo11"
              aria-expanded="true" aria-controls="collapseTwo11">
              <h5 class="mb-0">
                GUARDIANES <i class="fa fa-angle-down rotate-icon"></i>
              </h5>
            </a>
          </div>
      
          <!-- Card body -->
          <div id="collapseTwo11" class="collapse show" role="tabpanel" aria-labelledby="headingTwo11" data-parent="#accordionEx2">
            <div class="card-body">
                <div class="col-lg-12">     
                    <label>El niño esta viviendo bajo la tutela de:</label>          
                    
                    @include('partials.elements.checkList', [ 
                        'data' => 'GR',
                        'name' => 'chkEncargados',
                        'column' => '4',
                    ])
                        
                </div>
            </div>
          </div>
      
        </div>
        <!-- Accordion card -->
      
        <!-- Accordion card -->
        <div class="card">
        
            <!-- Card header -->
            <div class="card-header" role="tab" id="headingTwo22">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapseTwo22"
                aria-expanded="false" aria-controls="collapseTwo22">
                <h5 class="mb-0">
                    PADRES NATURALES <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
                </a>
            </div>
        
            <!-- Card body -->
            <div id="collapseTwo22" class="collapse" role="tabpanel" aria-labelledby="headingTwo22" data-parent="#accordionEx2">
                <div class="card-body">

                    <div class="row">         
                            <div class="col-lg-8">
                                <div class="md-form form-sm">                
                                    <span>Ahora estan Juntos los padres Naturales?</span>            
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="md-form form-sm">                
                                    <div class="switch">
                                        <label>
                                            No
                                            <input class="chkCompassion" name="chkPadresJuntos" id="padresJuntos" type="checkbox">
                                            <span class="lever"></span>
                                            Si
                                        </label>
                                    </div>                
                                </div>
                            </div>         
                    </div>    
                    
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <span>Escoja el caso de matrimonio permanente</span>            
                            <div class="md-form form-sm">                
                                <table class="table table-bordered table-sm">                                         
                                    <tbody>                                                
                                        <tr>                                                        
                                            <td>
                                                <input class="form-check-input rdbCompassion" type="radio" name="rdbEstadoCivil" id="rdbCasado" value="0">
                                                <label class="form-check-label" for="rdbCasado">Ahora Casados</label>     
                                            </td>                                
                                        </tr>    
                                        <tr>                                                        
                                            <td>
                                                <input class="form-check-input rdbCompassion" type="radio" name="rdbEstadoCivil" id="rdbSeparado" value="1">
                                                <label class="form-check-label" for="rdbSeparado">Eran Casados ahora separados por muerte</label>  
                                            </td>                                
                                        </tr>    
                                        <tr>                                                        
                                            <td>
                                                <input class="form-check-input rdbCompassion" type="radio" name="rdbEstadoCivil" id="rdbDivorciado" value="2">
                                                <label class="form-check-label" for="rdbDivorciado">Eran Casados ahora divorciados o separados permanentemente</label>  
                                            </td>                                
                                        </tr>   
                                        <tr>                                                        
                                            <td>
                                                <input class="form-check-input rdbCompassion" type="radio" name="rdbEstadoCivil" id="rdbNuncaCasado" value="3">
                                                <label class="form-check-label" for="rdbNuncaCasado">Nunca eran casados</label>                                  </td>                                
                                        </tr>    
                                        <tr>                                                        
                                            <td>
                                                <input class="form-check-input rdbCompassion" type="radio" name="rdbEstadoCivil" id="rdbDesconocido" value="4">
                                                <label class="form-check-label" for="rdbDesconocido">Desconocido</label>  
                                            </td>                                
                                        </tr>                                                                                                                                                                                                                                     
                                    </tbody>                                                                                    
                                </table>
                                
                            </div>
                        </div>     
                    </div>
                                
                    <div class="row">

                        @include('partials.elements.tableCheckList', [ 
                            'data' => 'PNM',
                            'titulo' => 'PADRE NATURAL',
                            'name' => 'chkPadreNatural',
                            'column' => '6',
                        ])
                        
                        @include('partials.elements.tableCheckList', [ 
                            'data' => 'PNF',
                            'titulo' => 'MADRE NATURAL',
                            'name' => 'chkMadreNatural',
                            'column' => '6',
                        ])
                        
                    </div>
                        
                    <div class="row">                        

                        @include('partials.elements.tableRadioList', [ 
                            'data' => 'OGRM',
                            'titulo' => 'PADRE O GUARDIAN',
                            'name' => 'rdbPadreGuardian',
                            'column' => '6',
                        ])

                        @include('partials.elements.tableRadioList', [ 
                            'data' => 'OGRF',
                            'titulo' => 'MADRE O GUARDIAN',
                            'name' => 'rdbMadreGuardian',
                            'column' => '6',
                        ])
                        
                         

                        <div class="col-md-12">
                            <table class="table table-bordered table-sm">                                         
                                <thead>
                                    <tr>
                                        <th>Escoja en todas las que describa al padre o guardian</th>
                                        <th>Escoja en todas las que describa a la madre o guardiana</th>
                                    </tr>
                                </thead>
                                <tbody>                                                
                                    <tr>                                                        
                                        <td>
                                            @include('partials.elements.checkList', [ 
                                                'data' => 'AGRM',
                                                'name' => 'chkActividaGuardian',
                                                'column' => '6',
                                            ])
                                        </td>                                
                                        <td>
                                            @include('partials.elements.checkList', [ 
                                                'data' => 'AGRF',
                                                'name' => 'chkActividaGuardiana',
                                                'column' => '6',
                                            ])
                                        </td>                                
                                    </tr>    
                                </tbody>
                            </table>
                        </div>
                    </div>
        
                </div>
            </div>
        
        </div>
        <!-- Accordion card -->
      
        <!-- Accordion card -->
        <div class="card">
        
            <!-- Card header -->
            <div class="card-header" role="tab" id="headingThree32">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapseThree32"
                aria-expanded="false" aria-controls="collapseThree32">
                <h5 class="mb-0">
                    NUMERO DE MIEMBROS EN LA FAMILIA <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
                </a>
            </div>
        
            <!-- Card body -->
            <div id="collapseThree32" class="collapse" role="tabpanel" aria-labelledby="headingThree32" data-parent="#accordionEx2">
                <div class="card-body">

                    <div class="row">    
                        <div class="col-lg-6">                                        
                            <div class="md-form form-sm">                
                                <label for="numeroHijos">Hijos</label>
                                <input id="numeroHijos" class="form-control form-control-sm" type="text">
                            </div>        
                        </div>
                        <div class="col-lg-6">                                        
                            <div class="md-form form-sm">                
                                <label for="numeroHijas">Hijas</label>
                                <input id="numeroHijas" class="form-control form-control-sm" type="text">
                            </div>        
                        </div>
                        <div class="col-lg-12">        
                            <span>Hermanos y hermanas registrados en Compassion</span>                                
                            <div class="md-form form-sm">                       
                                <div id="hermanosCompassion" class=""></div>
                            </div>        
                        </div>                   
                    </div>                    
                    
                </div>
            </div>
        
        </div>
        <!-- Accordion card -->
        
        <div class="card">
    
            <!-- Card header -->
            <div class="card-header" role="tab" id="headingThree42">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx2" href="#collapseThree42"
                aria-expanded="false" aria-controls="collapseThree42">
                <h5 class="mb-0">
                    COMENTARIOS GENERALES <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
                </a>
            </div>
        
            <!-- Card body -->
            <div id="collapseThree42" class="collapse" role="tabpanel" aria-labelledby="headingThree42" data-parent="#accordionEx2">
                <div class="card-body">
    
                    <div class="row">                        
                        <div class="col-lg-12">                
                            <div class="form-group form-sm shadow-textarea">
                                <label for="detalle">Incluye cualquier informacion adicional, detalles medicos, escolares, familiares, etc.</label>                
                                <textarea class="form-control rounded-0" id="detalle" cols="5" rows="20" placeholder="Escribir aqui..."></textarea>
                                
                            </div>                               
                        </div>
                    </div>                    
                    
                </div>
            </div>
        
        </div>
            <!-- Accordion card -->
        
    </div>

</div>    
    <!-- Accordion wrapper -->

    
    
      
