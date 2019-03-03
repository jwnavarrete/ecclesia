@php   
    use App\Models\Lista;
    $lista = new Lista;
@endphp

<!--YERSON ALBERTO CORTEZ CHICA
   * MODAL DONDE SE INGRESA LA INFORMACION DE LOS TUTORES DEL PROYECTO DE PADRINAMIENTO CASA ANACECER
-->                                    
<div id="grupoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" id="frmGrupo" name="frmGrupo">        
            <div class="modal-content">
                <div class="modal-header">                    
                    <p>Editar</p>                                       
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                        

                            @include('pages.compassion.Grupos.include.general')                
                        
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
    