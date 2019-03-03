<div class="col-lg-12">
    <br>
    <div class="row">
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
            <label>Actividades Cristianas:</label>            
        </div>
        <div class="col-lg-12">     
            {!! Form::select('obligaciones', $lista->getOptionsByData("OBLI") , null , [                
                'required',
                'multiple',
                'id'=>"obligaciones",  
                'searchable' => 'Buscar aqui...',
                //'data-parsley-required-message' => 'Obligacion es requirda',
                //'data-parsley-trigger'          => 'change focusout',
                "class"=>"mdb-select"]
            ) !!}                    
            <label>Obligaciones Familiares:</label>            
        </div>
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
            <label>Pasatiempo y Deporte:</label>            
        </div>
    </div>

</div>