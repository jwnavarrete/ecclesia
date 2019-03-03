 <div class="modal fade show" id="modalHomeCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">   
            	<h6 id="divTitutlo"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
            	
            		
            	<form id="frmCard" name="frmCard">	            			
	            	<div class="col-md-12">
	            		<div class="row">
	            			<input type="hidden" name="hddId" id="hddId">
		            		<div class="col-md-6">
			            		<div class="md-form form-sm">
								    <input type="text" id="txtTitulo" class="form-control form-control-sm">
								    <label for="txtTitulo">Titulo</label>
								</div>		
		            		</div>
		            		<div class="col-md-6">
			            		<div class="md-form form-sm">
								    <input type="text" id="txtIcono" class="form-control form-control-sm">
								    <label for="txtIcono">Icono</label>
								</div>		
		            		</div>
		        			<div class="col-md-4">
			            		<div class="md-form form-sm">
								    <input type="text" id="txtDetalle" class="form-control form-control-sm">
								    <label for="txtDetalle">Detalle</label>
								</div>		
		            		</div>
		            		<div class="col-md-4">
			            		<div class="md-form form-sm">
								    <input type="text" id="txtTabla" class="form-control form-control-sm">
								    <label for="txtTabla">Tabla</label>
								</div>		
		            		</div>
		            		<div class="col-md-4">
			            		<div class="md-form form-sm">
								    <input type="text" id="txtUrl" class="form-control form-control-sm">
								    <label for="txtUrl">Url</label>
								</div>		
		            		</div>
		            		<div class="col-md-4">
			            		<div class="md-form form-sm">
								    <input type="text" id="txtColor" class="form-control form-control-sm">
								    <label for="txtColor">Color</label>
								</div>		
		            		</div>
		            	</div>
	            	</div>	
            	</form>			

            </div>            
            <div class="modal-footer">
                <button type="button" id="btnGrabar" onclick="grabarDatos();" class="btn btn-primary btn-sm">Grabar</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" (click)="demoBasic.hide()" mdbwaveseffect="">Cerrar</button>                    
            </div>
        </div>
    </div>
</div>