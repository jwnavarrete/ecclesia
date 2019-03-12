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
                    @include('partials.elements.checkList', [ 
                        'data' => 'ENF',
                        'name' => 'chkSalud',
                        'column' => '4',
                    ])
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
                        <tr>                                                        
                            <td>Columna debido a</td>
                            <td>
                                {!! Form::select('slColumna', $lista->pluckCatalogoByData('LES'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slColumna',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Pie izquierdo debido a</td>
                            <td>
                                {!! Form::select('slPieIzquierdo', $lista->pluckCatalogoByData('LES'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slPieIzquierdo',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Pie derecho debido a</td>
                            <td>
                                {!! Form::select('slPieDerecho', $lista->pluckCatalogoByData('LES'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slPieDerecho',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Mano izquierda debido a</td>
                            <td>
                                {!! Form::select('slManoIzquierda', $lista->pluckCatalogoByData('LES'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slManoIzquierda',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Mano derecha debido a</td>
                            <td>
                                {!! Form::select('slManoDerecha', $lista->pluckCatalogoByData('LES'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slManoDerecha',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Pierna izquierda debido a</td>
                            <td>
                                {!! Form::select('slPiernaIzquierda', $lista->pluckCatalogoByData('LES'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slPiernaIzquierda',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Pierna derecha debido a</td>
                            <td>
                                {!! Form::select('slPiernaDerecha', $lista->pluckCatalogoByData('LES'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slPiernaDerecha',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Brazo izquierdo debido a</td>
                            <td>
                                {!! Form::select('slBrazoIzquierdo', $lista->pluckCatalogoByData('LES'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slBrazoIzquierdo',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Brazo derecho debido a</td>
                            <td>
                                {!! Form::select('slBrazoDerecho', $lista->pluckCatalogoByData('LES'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slBrazoDerecho',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
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
                                {!! Form::select('slHabla', $lista->pluckCatalogoByData('DFM'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slHabla',
                                    'onchange'=>'',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
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
                        <tr>                                                        
                            <td>Oido Izquierdo</td>
                            <td>
                                {!! Form::select('slOidoIzquierdo', $lista->pluckCatalogoByData('DFS'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slOidoIzquierdo',
                                    'onchange'=>'',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Oido Derecho</td>
                            <td>
                                {!! Form::select('slOidoDerecho', $lista->pluckCatalogoByData('DFS'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slOidoDerecho',
                                    'onchange'=>'',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>                        
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
                        <tr>                                                        
                            <td>Ojo Izquierdo</td>
                            <td>
                                {!! Form::select('slOjoIzquierdo', $lista->pluckCatalogoByData('DFC'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slOjoIzquierdo',
                                    'onchange'=>'',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>
                        <tr>    
                            <td>Ojo Derecho</td>
                            <td>
                                {!! Form::select('slOjoDerecho', $lista->pluckCatalogoByData('DFC'), '' , [
                                    'placeholder' => 'Seleccione...',                                    
                                    'id'=>'slOjoDerecho',
                                    'onchange'=>'',                                    
                                    "class"=>"mdb-select colorful-select dropdown-primary"]
                                ) !!}
                            </td>
                        </tr>                        
                    </tbody>                                                                                    
                </table>
            </div>
        </div>
    </div>
</div>                                        

