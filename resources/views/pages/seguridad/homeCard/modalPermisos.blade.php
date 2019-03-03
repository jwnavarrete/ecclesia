<!--LUIS ALFREDO RODRIGUEZ FRANCO
   * MODAL PARA ASIGNACION DE PERMISOS DE LOS ACCESOS DIRECTOS
-->
<div class="modal fade show" id="modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           
            <div class="modal-body mx-3">
            	            	
            	<form id="frmCard" name="frmCard">	            			
	            	<div class="col-md-12">
	            		<div class="row">
	            			<input type="hidden" name="hddId" id="hddId">
		            		<div class="col-md-12">
			            		 <div class="md-form form-sm">
			                            {!! Form::select('roles', $lista->getRoles(), 1 , [
			                                'placeholder' => 'Rol...',
			                                'required',
			                                'id'=>'roles',
			                                'onchange'=>'getPermisoByRol();',                                        
			                                'data-parsley-required-message' => 'Pais es requirdo',
			                                'data-parsley-trigger'          => 'change focusout',
			                                "class"=>"mdb-select colorful-select dropdown-primary"]
			                            ) !!}                            
			                    </div>	
		            		</div>
		            		<div class="col-md-12">
			            		<table class="table table-sm">
								  <thead class="black white-text">
								    <tr>
								      <th scope="col">Orden</th>
								      <th scope="col">Titulo</th>
								      <th scope="col">Permiso</th>								      
								      
								    </tr>
								  </thead>
								  <tbody id="tblPermisos">								   
								  </tbody>
								</table>
		            		</div>
		            	</div>
	            	</div>	
            	</form>			

            </div>            
            <div class="modal-footer">                
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" (click)="demoBasic.hide()" mdbwaveseffect="">Cerrar</button>                    
            </div>
        </div>
    </div>
</div>