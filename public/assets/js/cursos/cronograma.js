function abrirModal(curso) {	
	$("#hddCurso").val("");	
	$("#hddCurso").val(curso);	
    $('#modalCronograma').modal('show');
    getCronogramasByCurso();
}

function saveCronogramaCurso() {	
    try{
        $.ajax({
            url: '/saveCronogramaCurso',
            type: 'post',
            data: {
            	id: $("#hddCronograma").val(),
                curso : $("#hddCurso").val(),
            	title: $("#txtTitulo").val(),
            	description: $("#txtDescripcion").val(),
            	start_date: $("#fecinicia").val(),
            	end_date: $("#fectermina").val(),
            	url: $("#txtUrl").val()
            },
            dataType: 'json',
            success: function (data) {
            	if (continuaSession(data)) {
            		limpiarCronograma();
            		getCronogramasByCurso();
            	}               
            },error   : function ( jqXhr, json, errorThrown ){
                toastr.error( "error llamada ajax", "Error" );
            }
        });

    } catch(err) {
        toastr.error(err , "Error" );
    }
}


function getCronogramasByCurso() {
	$.ajax({
        url: '/getCronogramasByCurso',
        type: 'get',	            
        data: {curso : $("#hddCurso").val()},	            
        dataType: 'json',
        success: function (retorno) {
        	if (continuaSession(retorno)) {        		
        		$("#tblCronograma").html("");
        		$.each(retorno.data, function(i, item) {				    
        			data = item.id+'|'+item.title+'|'+item.description+'|'+item.start_date+'|'+item.end_date+'|'+item.url;

				    $("#tblCronograma").append(
	        			`<tr>					      
					      <td>${ item.title }</td>
					      <td>${ item.description }</td>
					      <td>${ item.start_date }</td>
					      <td>${ item.end_date }</td>					      
					      <td>
					      	<div class="btn-group btn-group-sm inline">                                
                                <button class="btn btn-primary" onclick="editCronograma('${data}');" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>
                                <button class="btn btn-gplus" onclick="removeCronograma(${item.id})" type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>
                            </div>
					      </td>
					    </tr>`);
				})
        		
        	}
        },
        error: function (xhr, status, errorThrown) {
	    }        
    });
}

function editCronograma(data) {
	limpiarCronograma();
	var arrData = data.split("|");
	$("#hddCronograma").val(arrData[0]).change();
	$("#txtTitulo").val(arrData[1]).change();
	$("#txtDescripcion").val(arrData[2]).change();
	$("#fecinicia").val(arrData[3]).change();
	$("#fectermina").val(arrData[4]).change();
	$("#txtUrl").val(arrData[5]).change();	
}

function limpiarCronograma() {
	$("#hddCronograma").val("").change();
	$("#txtTitulo").val("").change();
	$("#txtDescripcion").val("").change();
	$("#fecinicia").val("").change();
	$("#fectermina").val("").change();
	$("#txtUrl").val("").change();	
}

function removeCronograma(id) {
	deleteConfirm(function(){
		$.post({
            url: '/deleteCursoCronograma',
            data: {id:id},                          
            type: 'post',                     
            success: function (data) {
                if (continuaSession(data)) { 
                  	getCronogramasByCurso();
                }
            },error   : function ( jqXhr, json, errorThrown ){
                toastr.error( "error llamada ajax", "Error" );
            }
        }); 
	});
}

