<div class="col-lg-12">     
    <div class="col-lg-12">     
        <label>El niño esta viviendo bajo la tutela de:</label>          

        {!! Form::select('encargados', $lista->getOptionsByData("GUAR") , null , [                
            'required',
            'multiple',
            'id' => 'encargados',
            'searchable' => 'Buscar aqui...',
            'data-parsley-required-message' => 'Encargados es requirda',
            'data-parsley-trigger'          => 'change focusout',
            "class"=>"mdb-select"]
        ) !!}                    
          
    </div>
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
        <div class="col-lg-12">                                  
            <table class="table table-bordered table-sm">                                         
                <thead>
                    <tr>
                        <th>Padre Natural</th>                        
                        <th>Madre Natural</th>
                    </tr>
                </thead>
                <tbody>                                                
                    <tr>                                                        
                        <td>                    
                            <label class="form-check-label" for="defaultCheckbox1">Es o (esta) el padre natural vivo?</label>          
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkPadreNatural" class="chkCompassion" value="vivo" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                                                                                                    
                        </td>                                                        
                        <td>                    
                            <label class="form-check-label" for="defaultCheckbox1">Es o (esta) la madre natural viva?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkMadreNatural" class="chkCompassion" value="vivo" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                                        
                        </td>                                
                    </tr>                                                                                           
                    <tr>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Viviendo con este niño?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkPadreNatural" class="chkCompassion" value="viviendo" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                      
                        </td>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Viviendo con este niño?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkMadreNatural" class="chkCompassion" value="viviendo" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                                              
                        </td>
                    </tr>    
                    <tr>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Contribuyendo financieramente con este niño?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkPadreNatural" class="chkCompassion" value="contribuye" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                      
                        </td>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Contribuyendo financieramente con este niño?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkMadreNatural" class="chkCompassion" value="contribuye" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                           
                        </td>
                    </tr>                                                                                                      
                    <tr>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Con impedimento, de que clase?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkPadreNatural" class="chkCompassion" value="impedimento" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                 
                        </td>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Con impedimento, de que clase?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkMadreNatural" class="chkCompassion" value="impedimento" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>         
                        </td>
                    </tr>   
                    <tr>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Crónicamente enfermo, de que?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkPadreNatural" class="chkCompassion" value="enfermo" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                 
                        </td>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Crónicamente enfermo, de que?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkMadreNatural" class="chkCompassion" value="enfermo" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>              
                        </td>
                    </tr>                                                                                       
                    <tr>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Mentalmente enfermo?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkPadreNatural" class="chkCompassion" value="mental" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                                
                        </td>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">Mentalmente enfermo?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkMadreNatural" class="chkCompassion" value="mental" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>              
                        </td>
                    </tr>                                                                             
                    <tr>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">En la carcel?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkPadreNatural" class="chkCompassion" value="carcel" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                     
                        </td>
                        <td>
                            <label class="form-check-label" for="defaultCheckbox1">En la carcel?</label>
                            <div class="switch">                            
                                <label>
                                    No
                                    <input name="chkMadreNatural" class="chkCompassion" value="carcel" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>                                     
                        </td>
                    </tr>                                                                                                           
                </tbody>                                                                                    
            </table>
    
        </div>     
    </div>
        
    <div class="row">
        <div class="col-lg-12">                                        
            <div class="md-form form-sm">                
                <table class="table table-bordered table-sm">                                         
                    <thead>
                        <tr>
                            <th>Padre o Guardian</th>
                            <th>Madre o Guardian</th>
                        </tr>
                    </thead>
                    <tbody>                                                
                        <tr>                                                        
                            <td>
                                <input class="form-check-input rdbCompassion" id="rdbPadreGuardian-1"    type="radio" name="rdbPadreGuardian" value="0">
                                <label class="form-check-label" for="rdbPadreGuardian-1">El padre o guardian masculino se emplea regularmente</label>     
                            </td>                                
                            <td>
                                <input class="form-check-input rdbCompassion" type="radio" id="rdbMadreGuardian-1" name="rdbMadreGuardian" value="0">
                                <label class="form-check-label" for="rdbMadreGuardian-1">La madre o guardiana es epleada regularmente</label>     
                            </td>                                
                        </tr>    
                        <tr>                                                        
                            <td>
                                <input class="form-check-input rdbCompassion" id="rdbPadreGuardian-2" type="radio" name="rdbPadreGuardian"  value="1">
                                <label class="form-check-label" for="rdbPadreGuardian-2">El padre o guardian esta empleado a veces</label>  
                            </td>                                
                            <td>
                                <input class="form-check-input rdbCompassion" id="rdbMadreGuardian-2" type="radio" name="rdbMadreGuardian" value="1">
                                <label class="form-check-label" for="rdbMadreGuardian-2">La madre o guardian esta empleado a veces</label>  
                            </td>
                        </tr>    
                        <tr>                                                        
                            <td>
                                <input class="form-check-input rdbCompassion" id="rdbPadreGuardian-3" type="radio" name="rdbPadreGuardian" value="2">
                                <label class="form-check-label" for="rdbPadreGuardian-3">El padre o guardian no esta empleado</label>  
                            </td>
                            <td>
                                <input class="form-check-input" type="radio" id="rdbMadreGuardian-3" name="rdbMadreGuardian" value="2">
                                <label class="form-check-label" for="rdbMadreGuardian-3">La madre o guardian no esta empleada</label>  
                            </td>                                
                        </tr>   
                        <tr>                                                        
                            <td>
                                <input class="form-check-input rdbCompassion" id="rdbPadreGuardian-4" type="radio" name="rdbPadreGuardian" value="3">
                                <label class="form-check-label" for="rdbPadreGuardian-4">No hay padre o guardian</label>                                  
                            </td>                        
                            <td>
                                <input class="form-check-input rdbCompassion" id="rdbMadreGuardian-4" type="radio" name="rdbMadreGuardian" value="3">
                                <label class="form-check-label" for="rdbMadreGuardian-4">No hay madre o guardian</label>  
                            </td>                                
                        </tr>                                                                                                                                                                                                                                     
                    </tbody>                                                                                    
                </table>
                
            </div>
        </div>     
    </div>
    
    <div>
        <span>Numero de miembros en la familia</span>
    </div>
    
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
                <div id="hermanosCompassion" class="chips chips-placeholder"></div>
            </div>        
        </div>
        <div class="col-lg-12">                
            <div class="form-group form-sm shadow-textarea">
                <label for="detalle">Incluye cualquier informacion adicional, detalles medicos, escolares, familiares, etc.</label>                
                <textarea class="form-control rounded-0" id="detalle" rows="5" placeholder="Escribir aqui..."></textarea>
            </div>   
        </div>
    </div>     
    
                
</div>
