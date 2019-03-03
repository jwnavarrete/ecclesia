@php
    use App\Models\Galeria;    
@endphp

<div class="tab-pane fade in show" id="galeria" role="tabpanel">
    
    <!--YERSON ALBERTO CORTEZ CHICA
        * TABLA DONDE SE VISUALIZARA EL LISTADO DE LOS MENORES INSCRITOS
    -->
	 
	<div class="mb-2 mr-sm-2 col-sm-5 wrap-input-container">
		<button class="custom-file-upload btn btn-primary btn-sm">
		  	<i class="fa fa-cloud-upload"></i> Agregar nueva Imagen
	    </button>
	    <input class="file-upload" onchange="cargarimagen(this)" name="file_name" type="file">
	 </div>

    <div class="table-responsive">
    	<table id="tblGaleria" class="table table-bordered table-sm" data-wow-delay=".4s">
            <thead class="thead-inverse">
            <tr>
                <th><b>IMAGEN</b></th>                
                <th><b>NOMBRE</b></th>                
                <th><div class="pl-4"></th></div>
            </tr>
            </thead>
            <tbody>
            @foreach(Galeria::all() as $key => $galeria)   
                <tr>
                	<td>
                		<img width="80" height="60" src="{{$galeria->ruta}}{{$galeria->archivo}}">
                	</td>                    
                    <td>
                    	<div class="mb-2 mr-sm-2 col-sm-5 wrap-input-container">
	                    	<button class="custom-file-upload btn btn-primary btn-sm">
							  	<i class="fa fa-cloud-upload"></i> Cambiar
		    				</button>
		    				<input class="file-upload" onchange="cargarimagen(this)" codigo="{{$galeria->id}}" class="fileGaleria" name="file_name" type="file">
		    			</div>
                    </td>                     
                    <td>
		                <button onclick="eliminarImagen({{$galeria->id}})" class="btn btn-danger btn-sm delete" data-type="DELETE"">
		                    <i class="fa fa-trash"></i>
		                    <span>Delete</span>
		                </button>
                    	
                    </td>
                </tr>  
            @endforeach           
            </tbody>
        </table>
        

    </div>
        
</div>


@push('scripts')
	<script type="text/javascript">
	
	 	$(document).ready(function() {
            tblGaleria = $('#tblGaleria').DataTable({
                info: false,
                paging:true,
                searching:false,
                iDisplayLength: 4
            });            
            
        });

        function cargarimagen(obj) {
        	var codigo = $(obj).attr('codigo');   
        	var file_data = $(obj).prop('files')[0];   
	        
	        var form_data = new FormData();                  
	        form_data.append('file', file_data);
	        form_data.append('codigo', codigo);

	        $.ajax({
	            url: "uploadFileGaleria",
	            type: "POST",
	            data: form_data,
	            contentType: false,
	            cache: false,
	            processData:false,
	            success: function(data){
	            	if (continuaSession(data)) {
	            		location.reload();	
	            	}	                
	            }
	        });	    
        }

        function eliminarImagen(id) {        	
	        $.ajax({
	            url: "eliminarImagen",
	            type: "POST",
	            data: {'id':id},
	            dataType: 'json',	            	           	            
	            success: function(data){
	            	if (continuaSession(data)) {
	            		location.reload();	
	            	}	                
	            }
	        });	 
        }
        

	</script>
@endpush