<div class="col-lg-12">
    
    <!--Accordion wrapper-->
<div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">

        <!-- Accordion card -->
        <div class="card">

          <div class="card-header" role="tab" id="headingTwo1">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
              aria-expanded="true" aria-controls="collapseTwo1">
              <h5 class="mb-0">
                ACTIVIDADES CRISTIANAS<i class="fa fa-angle-down rotate-icon"></i>
              </h5>
            </a>
          </div>      
          <div id="collapseTwo1" class="collapse show" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordionEx1">
            <div class="card-body">
                
                    <div class="col-lg-12">     
                        {!! Form::select('actividades', $lista->getOptionsByData("ACT") , null , [                
                            'required',
                            'multiple',
                            'id'=>"actividades",  
                            'searchable' => 'Buscar aqui...',
                            //'data-parsley-required-message' => 'Actividad es requirda',
                            //'data-parsley-trigger'          => 'change focusout',
                            "class"=>"mdb-select"]
                        ) !!}                        
                    </div>
            </div>
          </div>      
        </div>
        
        <div class="card">      
          <div class="card-header" role="tab" id="headingTwo2">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21"
              aria-expanded="false" aria-controls="collapseTwo21">
              <h5 class="mb-0">
                OBLIGACIONES FAMILIARES<i class="fa fa-angle-down rotate-icon"></i>
              </h5>
            </a>
          </div>      
          <!-- Card body -->
          <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21" data-parent="#accordionEx1">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        {!! Form::select('obligaciones', $lista->getOptionsByData("OBLI") , null , [                
                            'required',
                            'multiple',
                            'id'=>"obligaciones",  
                            'searchable' => 'Buscar aqui...',
                            //'data-parsley-required-message' => 'Obligacion es requirda',
                            //'data-parsley-trigger'          => 'change focusout',
                            "class"=>"mdb-select"]
                        ) !!}                    
                    </div>
                    <div class="col-md-4">
                        <div class="md-form form-sm">
                            <input type="text" id="otrasObligaciones" placeholder="" name="otrasObligaciones" class="form-control">
                            <label for="otrasObligaciones" >Otros</label>  
                        </div>
                    </div>
                </div>
            </div>
          </div>      
        </div>
        <!-- Accordion card -->      
        <!-- Accordion card -->
        <div class="card">      
          <!-- Card header -->
          <div class="card-header" role="tab" id="headingThree31">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31"
              aria-expanded="false" aria-controls="collapseThree31">
              <h5 class="mb-0">
                PASATIEMPOS Y DEPORTES <i class="fa fa-angle-down rotate-icon"></i>
              </h5>
            </a>
          </div>
      
          <!-- Card body -->
          <div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31" data-parent="#accordionEx1">
            <div class="card-body">
                <div class="col-lg-12">     
                    {!! Form::select('pasatiempos', $lista->getOptionsByData("PASA") , null , [                
                        'required',
                        'multiple',
                        'id'=>"pasatiempos",  
                        'searchable' => 'Buscar aqui...',
                        //'data-parsley-required-message' => 'Pasatiempos es requirda',
                        //'data-parsley-trigger'          => 'change focusout',
                        "class"=>"mdb-select"]
                    ) !!}                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form form-sm">
                            <input type="text" id="instrumentosMusicales" placeholder="" name="instrumentosMusicales" class="form-control">
                            <label for="instrumentosMusicales" >Instrumentos Musicales</label>  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form form-sm">
                            <input type="text" id="otrosPasatiempos" placeholder="" name="otrosPasatiempos" class="form-control">
                            <label for="otrosPasatiempos" >Otros</label>  
                        </div>
                    </div>
                </div>
            </div>
          </div>      
        </div>
        <!-- Accordion card -->      
      </div>
      <!-- Accordion wrapper -->      
</div>