<div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
    <div class="card">                                        
        <div class="card-header" role="tab" id="headingOne">
            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h5 class="mb-0">
                    Inpedimentos Físicos / Enfermedades Crónicas <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>

        <!-- Card body -->
        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx">
            <div class="card-body">
                <div class="col-md-12">                
                    {!! Form::select('enfermedades', $lista->getOptionsByData("ENFE") , null , [                
                        'required',
                        'multiple',
                        'id' => 'enfermedades',
                        'searchable' => 'Buscar aqui...',
                        'data-parsley-required-message' => 'Pasatiempos es requirda',
                        'data-parsley-trigger'          => 'change focusout',
                        "class"=>"mdb-select"]
                    ) !!}                                    
                </div>

                <div class="col-md-6">
                    <div class="md-form form-sm">
                        <input type="text" id="otraEnfermedad" placeholder="" name="otraEnfermedad" class="form-control">
                        <label for="otraEnfermedad" >Otra:</label>  
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card">                                
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h5 class="mb-0">
                    Lesion, enfermedad, congenito<i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>                                        
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
            <div class="card-body">

                <table class="table table-bordered table-sm">                                         
                    <tbody>
                        @foreach ($arrSalud as $index => $salud)
                            <tr>                                                        
                                <td>{{ $salud->nombre }}</td>                                
                                <td>
                                    <select searchable="Buscar aqui" class="mdb-select" id="{{str_replace(' ', '_', $salud->nombre)}}">
                                            <option value="" selected>Ninguna</option>
                                        @foreach(explode(',', $salud->descripcion ) as $info) 
                                            <option value="{{$info}}" >{{$info}}</option>
                                        @endforeach                                            
                                    </select>
                                </td>                                
                            </tr>                                                                                                    
                        @endforeach                                                                                   
                    </tbody>                                                                                    
                </table>
              
            </div>
        </div>
    </div>
    
    <div class="card">                                        
        <div class="card-header" role="tab" id="headingThree">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h5 class="mb-0">
                    Habla <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordionEx">
            <div class="card-body">
                
                <table class="table table-bordered table-sm">                                         
                    <tbody>                                                
                        <tr>                                                        
                            <td>Habla</td>
                            <td>
                                <select searchable="Buscar aqui" class="mdb-select" id="habla">
                                    <option value="">Ninguna</option>
                                    <option value="Tiene defecto">Tiene defecto</option>
                                    <option value="Mudo">Mudo</option>
                                </select>
                            </td>                                                                                    
                        </tr>                                                                                                                                                                            
                    </tbody>                                                                                    
                </table>
            </div>
        </div>
    </div>

    <div class="card">                                
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseOido" aria-expanded="false" aria-controls="collapseOido">
                <h5 class="mb-0">
                    Oido<i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>                                        
        <div id="collapseOido" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
            <div class="card-body">
                <table class="table table-bordered table-sm">                                         
                    <tbody>
                        @foreach ($arrOido as $index => $oido)
                            <tr>                                                        
                                <td>{{ $oido->nombre }}</td>
                                <td>
                                    <select searchable="Buscar aqui" class="mdb-select" id="{{str_replace(' ', '_', $oido->nombre)}}">
                                            <option value="" selected>Ninguna</option>
                                        @foreach(explode(',', $oido->descripcion ) as $info) 
                                            <option value="{{$info}}" >{{$info}}</option>
                                        @endforeach                                            
                                    </select>
                                </td>                                
                            </tr>                                                                                                    
                        @endforeach                                                                                   
                    </tbody>                                                                                    
                </table>
            </div>
        </div>
    </div>

    <div class="card">                                
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseVista" aria-expanded="false" aria-controls="collapseVista">
                <h5 class="mb-0">
                    Vista<i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>                                        
        <div id="collapseVista" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
            <div class="card-body">
                <table class="table table-bordered table-sm">                                         
                    <tbody>
                        @foreach ($arrOjo as $index => $vista)
                            <tr>                                                        
                                <td>{{ $vista->nombre }}</td>
                                <td>
                                    <select searchable="Buscar aqui" class="mdb-select" id="{{str_replace(' ', '_', $vista->nombre)}}">
                                            <option value="" selected>Ninguna</option>
                                        @foreach(explode(',', $vista->descripcion ) as $info) 
                                            <option value="{{$info}}" >{{$info}}</option>
                                        @endforeach                                            
                                    </select>
                                </td>
                            </tr>                                                                                                    
                        @endforeach                                                                                   
                    </tbody>                                                                                    
                </table>
            </div>
        </div>
    </div>
</div>                                        

