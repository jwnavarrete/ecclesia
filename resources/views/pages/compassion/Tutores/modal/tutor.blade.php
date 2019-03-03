@php   
    use App\Models\Lista;
    $lista = new Lista;
@endphp


<div id="cursoTutorModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <form action="" id="" name="">        
            <div class="modal-content">
                <div class="modal-header">          
                    <p>Cursos</p>                                       
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-md-12">                                                                   
                            <form action="" id="">
                                <div class="tab-pane fade in show active" id="general" role="tabpanel">
                                    <div class="col-md-12">      
                                        <div class="row">                                                                
                                            <div class="col-md-4">
                                                <div class="md-form form-sm">                                                                             
                                                    {!! Form::select('grupo',$lista->getGrupos()  , null , [
                                                        'placeholder' => 'Grupo...',
                                                        'id' => 'grupo',
                                                        'required',
                                                        'data-parsley-required-message' => 'Ciudad es requirda',
                                                        'data-parsley-trigger'          => 'change focusout',
                                                        "class"=>"mdb-select colorful-select dropdown-primary"]
                                                    ) !!}        
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="md-form form-sm">                                                                             
                                                        <button type="button" onclick="grabarDatos();" class="btn btn-primary btn-sm waves-light waves-effect waves-light inline">Grabar</button>                                            
                                                </div>
                                            </div>    
                                        </div>     
                                        <div class="col-md-12">    
                                            <div class="row">        
                                                <table id="tblGrupoTutor" class="table-bordered display-compact table-sm"    cellspacing="0" width="100%"></table>
                                            </div>     
                                        </div>     
                                    </div>
                                </div>                                                              
                            </form>                        
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
        

    
<div id="tutorModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" id="frmTutor" name="frmTutor">        
            <div class="modal-content">
                <div class="modal-header">
                    <div class="chip">
                        <img id="imgTitle" src="/img/compassion/child.png" alt="Apadrinado"> 
                        <span id="lblnombres" class="lblNombre"></span> <span id="lblapellidos" class="lblNombre"></span>
                    </div>
                    <p>Editar</p>                                       
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-md-12">                                                                   
                            <form action="frmTutor" id="frmTutor">
                                <div class="tab-pane fade in show active" id="general" role="tabpanel">
                                    @include('pages.compassion.Tutores.include.general')                
                                </div>                                                              
                            </form>                        
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
    
