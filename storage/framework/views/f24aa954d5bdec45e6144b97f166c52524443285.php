<div class="modal hide" style="display: none;" id="modalCronograma" tabindex="-2" role="adialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-lg" role="document2">
        <!--Content-->
        <div class="modal-content">

            <!--Body-->
            <div class="modal-body text-center mb-1">
                
                <h5 class="mt-1 mb-2" id="aboutlbl"></h5>
                
                <div class="table-responsive">                                                
                    <form>             
                        <div class="col-md-12">
                            <div class="row">
                                <input type="hidden" name="hddCurso" id="hddCurso">
                                <input type="hidden" name="hddCronograma" id="hddCronograma">
                                
                                <div class="col-md-4">
                                    <div class="md-form form-sm">
                                        <input type="text" id="txtTitulo" name="txtTitulo" class="form-control form-control-sm">
                                        <label for="txtTitulo">Titulo:</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-sm">      
                                        <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control form-control-sm">
                                        <label for="txtDescripcion">Descripcion:</label>
                                    </div>
                                </div>                
                                <div class="col-md-4">
                                    <div class="md-form form-sm">
                                        <input type="text" id="txtUrl" name="txtUrl" class="form-control form-control-sm">
                                        <label for="txtUrl">Url:</label>
                                    </div>
                                </div>    

                                <div class="col-md-4">
                                    <div class="md-form form-sm">
                                        <input type="text" placeholder="Selected date" id="fecinicia" value="" name="fecinicia" class="form-control form-control-sm">
                                        <label for="fecinicia">Inicia:</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-sm">
                                        <input type="text" placeholder="Selected date" id="fectermina" value="" name="fectermina" class="form-control form-control-sm">
                                        <label for="fectermina">Termina:</label>
                                    </div>
                                </div>
                                <div class="col-md-4" >
                                    <button type="button" onclick="saveCronogramaCurso();" style="vertical-align: -50px !important;" class="btn btn-sm btn-cyan mt-1">Grabar</button>
                                </div>
                                 
                            </div>
                        </div>
                        
                    </form>

                    <div class="col-md-12">
                        <table class="table table-sm">
                            <thead class="black white-text">
                                <tr>                                    
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Fec. Inicio</th>
                                    <th scope="col">Fec. Fin</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="tblCronograma">
                            </tbody>
                        </table>
                    </div>
                                    

                </div>


                <div class="text-right mt-4">
                    
                    <a type="button" class="btn btn-sm btn-outline-warning waves-effect" data-dismiss="modal">Cerar</a>
                </div>
                                

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

