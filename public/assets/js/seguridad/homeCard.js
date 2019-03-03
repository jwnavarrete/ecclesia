tblHomeCard = null;

$.ajaxSetup({        
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});   

$(document).ready(function() {
 	cargarDatatable();   

 	$('#txtBuscar').on('keyup change', function () {
        if (tblHomeCard == null){return false}
        tblHomeCard.search(this.value).draw();
    });

    $('.mdb-select').material_select();
});

function newCard() {
	limpiarCard();		
	$("#divTitutlo").html("Nuevo");
	$('#modalHomeCard').modal('show');

	
}

function showCard(json) {
	limpiarCard();	
	$("#hddId").val(data.id).change();
	$("#txtTitulo").val(data.titulo).change();
	$("#txtIcono").val(data.icono).change();
	$("#txtDetalle").val(data.detalle).change();
	$("#txtTabla").val(data.tabla).change();
	
	$('.mdb-select').material_select('destroy');	
	$("#txtUrl").val(data.url).change();
	$('.mdb-select').material_select();

	$("#txtColor").val(data.color).change();
	$("#divTitutlo").html("Editar");
	$('#modalHomeCard').modal('show');					
}

function limpiarCard() {
	EliminaValidaciones('frmCard');    
	$("#divTitutlo").html("");
	$("#hddId").val("").change(),
	$("#txtTitulo").val("").change();
	$("#txtIcono").val("").change();
	$("#txtDetalle").val("").change();
	$("#txtTabla").val("").change();
	$("#txtUrl").val("").change();
	$("#txtColor").val("").change();				
}

function grabarDatos() {
	if (validarCard()) {
		var oPostData = {
            id: $("#hddId").val(),
            titulo:$("#txtTitulo").val(),
            icono:$("#txtIcono").val(),
            detalle:$("#txtDetalle").val(),
            tabla:$("#txtTabla").val(),
            url:$("#txtUrl").val(),
            color:$("#txtColor").val()
        }

        $.ajax({
            url: '/crudCard',
            type: 'post',	            
            data: oPostData,	            
            dataType: 'json',
            success: function (data) {
            	if (continuaSession(data)) {
            		$('#modalHomeCard').modal('hide');
            		toastr.success( data.message , "Notifications" );                                                  
                    cargarDatatable();            		
            	}
            },
            error: function (xhr, status, errorThrown) {
		    }        
        });
	}
}


function deleteCard(id) {
	
	deleteConfirm(function(){
		$.post({
            url: '/deleteHomeCard',
            data: {id:id},                          
            type: 'post',                     
            success: function (data) {
                if (continuaSession(data)) { 
                    toastr.success( data.message , "Notifications" );                                                  
                    cargarDatatable();
                }
            },error   : function ( jqXhr, json, errorThrown ){
                toastr.error( "error llamada ajax", "Error" );
            }
        }); 
	});
}

function validarCard() {
	EliminaValidaciones('frmCard');    
	AdicionaValidacion('txtTitulo', 'req','Titulo es requerido');    
	AdicionaValidacion('txtIcono', 'req','Icono es requerido');    
	AdicionaValidacion('txtUrl', 'req','Url es requerido');    
	AdicionaValidacion('txtDetalle', 'req','Detalle es requerido');    
	AdicionaValidacion('txtColor', 'req','Color es requerido');    

    var frmValidator = new Validator('frmCard');
    frmValidator.Validations();
    frmValidator.setAddnlValidationFunction();
    return frmValidator.formobj.onsubmit();   
}


 function cargarDatatable(){
    try {
		tblHomeCard = $('#tblHomeCard').DataTable({
	        processing: true,	        
	        dom: 'rtp',
	        ajax: "listarHomeCard",
	        destroy: true,	        
	        columns: [                                                                                                                        
	            {data: 'id', name: 'id',title:'Id' },
	            {data: 'titulo', name: 'titulo',title:'Titulo' },
	            {data: 'icono', name: 'icono',title:'Icono' },
	            {data: 'detalle', name: 'detalle',title:'Detalle' },
	            {data: 'tabla', name: 'tabla',title:'Tabla' },
	            {data: 'urlDescripcion', name: 'url',title:'Url' },
	            {data: 'color', name: 'color',title:'Color' },	            
	            {data: "id",title:"Accion", width: "60px", render: function (data,type,row) {
	                    return `<div class='btn-group btn-group-sm inline'>
	                        <button class='btn btn-primary waves-effect waves-light btnEdit' type='button' title='Editar'><span class='image fa fa-pencil'></span></button>                    
	                        <button class='btn btn-gplus waves-effect waves-light btnDelete' type='button' title='Eliminar'><span class='image fa fa-trash'></span></button>                                                                    
	                    </div>`;                                         
	                }
	            },
	        ]
	    });

		$('#tblHomeCard tbody').on( 'click', '.btnEdit', function () {
		    data = tblHomeCard.row( $(this).parents('tr') ).data();
		    showCard(data);
		});

		$('#tblHomeCard tbody').on( 'click', '.btnDelete', function () {
		    data = tblHomeCard.row( $(this).parents('tr') ).data();
		    deleteCard(data.id);
		});
	}catch(err) {
		toastr.error( err.message , "Notifications" );
	}
}

function permisosCard() {
	getPermisoByRol();
	$('#modalPermisos').modal('show');	
}

function getPermisoByRol() {
	$.ajax({
        url: '/getPermisoByRol',
        type: 'get',	            
        data: {idRol : $("#roles").val()},	            
        dataType: 'json',
        success: function (retorno) {
        	if (continuaSession(retorno)) {        		
        		$("#tblPermisos").html("");
        		$.each(retorno.data, function(i, item) {
				    //alert(data[i].PageName);				    
				    $("#tblPermisos").append(
	        			`<tr>
					      <th scope="row"><input type="text" ${item.idRol == null ? 'disabled="disabled"' : ''} onchange="changeOrderCard(this,'${item.id}')" value="${ item.orden == null ? '' : item.orden }" style="width:30px;"> </th>
					      <td>${ item.titulo }</td>
					      <td>
					      	<div class="switch">
							    <label>							      
							        <input onchange="addRemoveCard('${item.id}')" type="checkbox" ${ item.idRol != null ? 'checked' : '' } >
							        <span class="lever"></span>							        
							    </label>
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

function addRemoveCard(idCard) {
	$.ajax({
        url: '/addRemoveCard',
        type: 'post',	            
        data: {
        	idRol : $("#roles").val(),
        	idCard : idCard
        },	            
        dataType: 'json',
        success: function (retorno) {
        	if (continuaSession(retorno)) {        		
        	    getPermisoByRol();		
        	}
        },
        error: function (xhr, status, errorThrown) {
	    }        
    });
}

function changeOrderCard(obj, idCard) {
	$.ajax({
        url: '/changeOrderCard',
        type: 'post',	            
        data: {
        	idRol : $("#roles").val(),
        	idCard : idCard,
        	order :$(obj).val()
        },	            
        dataType: 'json',
        success: function (retorno) {
        	if (continuaSession(retorno)) {        		
        	    getPermisoByRol();		
        	}        	
        },
        error: function (xhr, status, errorThrown) {
	    }        
    });	
}