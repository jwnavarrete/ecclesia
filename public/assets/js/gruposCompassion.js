var oTable = null;
var filtro = "T";
$.ajaxSetup({        
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});   


$(document).ready(function() {    

    $('#txtBuscar').on('keyup change', function () {
        if (oTable == null){return false}
        oTable.search(this.value).draw();
    });

    cargarDatatable();  
    $('select').addClass('mdb-select');
    $('.mdb-select').material_select();
    

    $( "#nombres" ).keyup(function() {        
        $("#lblnombres").html($(this).val());        
    });

    $( "#apellidos" ).keyup(function() {        
        $("#lblapellidos").html($(this).val());        
    });

});

function cargarDatatable(){    
    flag = $(".btn-group .active").attr('tipoTabla');
    
    try {
        oTable = $('#tblTutores').DataTable({
            processing: true,                    
            ajax: "listarCursos?filtro="+filtro,
            dom: 'rtp',
            data:{demo:'Hola'},
            destroy: true,         
            lengthMenu: [[6, 12, -1], [6,12, "Todo"]],           
            columns: [                                                                                                                                        
                {data: 'nombre', name: 'Nombre',title:'Nombre' },
                {data: 'descripcion', name: 'descripcion',title:'Descripcion' },
                {data: 'edad_minima', name: 'edad_minima',title:'Edad minima' },                
                {data: 'edad_maxima', name: 'edad_maxima',title:'Edad maxima' },                                   
                {data: 'capacidad', name: 'capacidad',title:'Capacidad' },                                   
               /* {data: "fechaNacimiento",title:'Fecha Nacimiento',"render": function(data, type, row, meta){                                                                          
                    return formatoDate(data);
                }},
                {data: "sexo",title:'Sexo',"render": function(data, type, row, meta){                                                                          
                    return (data=='M'?'Masculino':'Femenino');
                }},*/
                {data: "id","render": function(data, type, row, meta){                                                                          
                    return `<div class="btn-group btn-group-sm inline">
                    <button class="btn btn-primary waves-effect waves-light" onclick="cargaGrupo('${data}');" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>                    
                    <button class="btn btn-gplus waves-effect waves-light" onclick="eliminaGrupo('${data}');"  type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>                                                                    
                </div>`;                   
                }} 
            ],
            initComplete: function(settings, json) {                        
                if(flag=="card"){                            
                    $('#new-list').insertBefore('#tblCard');
                    $('#new-list').show();        
                    $('#tblTutores').hide();                                    
                    formaEditCard();                            
                }else{
                    $('#new-list').hide();        
                    $('#tblTutores').show();        
                }                                
            },
            rowCallback: function( row, data ) {                        
                if(flag=="card"){     
                    var li = $(document.createElement('li'));                                       
                    li.append(addCard(data));
                    li.appendTo('#new-list');
                }
            },
            preDrawCallback: function( settings ) {                        
                if(flag=="card"){     
                    $('#new-list').empty();
                }                  
            }
        });

        /*$('#tblCompassion tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }else {
                oTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });*/

    }catch(err) {
        toastr.error( err.message , "Notifications" );
    }
}

function formatoDate(fecha){
    arrFecha = fecha.split('-');
    return `${arrFecha[2]}/${arrFecha[1]}/${arrFecha[0]}`;
}

/*function editChild(){                
    if ( oTable.rows( '.selected' ).any() ){        
        var data = oTable.row('.selected').data();                   
        cargaChild(data.codigo);          
    }else{
        alert("No hay registros selecciomados");
    }        
}*/

function newTutor(){
    limpiarModal();
    $('#grupoModal').modal('show');    
}

function cargaGrupo(codigo){
    limpiarModal();
    $('#grupoModal').modal('show');    

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/getGrupo",
        data: { codigo: codigo },
        success: function( response ){ 
            console.log(response.data);
            if (continuaSession(response)) {                            
                $("#hddCodigo").val(response.data.id).change();        
                $("#nombre").val(response.data.nombre).change();        
                $("#descripcion").val(response.data.descripcion).change();
                $("#edad_minima").val(response.data.edad_minima).change();
                $("#edad_maxima").val(response.data.edad_maxima).change();
                $("#capacidad").val(response.data.capacidad).change();                                
            }
        },error   : function ( jqXhr, json, errorThrown ){
            toastr.error( "error llamada ajax", "Error" );
        }
    });    
}

function limpiarModal(){
    EliminaValidaciones('frmGrupo');    
    $("#hddCodigo").val("").change();        
    $("#nombre").val("").change();        
    $("#descripcion").val("").change();
    $("#edad_minima").val("").change();
    $("#edad_maxima").val("").change();
    $("#capacidad").val("").change(); 
}

function formaEditCard(){
    $('ul.cardTable li').click(function(e){                           
        tbodyCard = $(this).find(".card").find(".card-body");                    
        if (tbodyCard.hasClass("selected") == true){
            tbodyCard.removeClass("selected");
            tbodyCard.find("a").hide();        
        }else{
            $('ul.cardTable li').find(".card").find(".card-body").removeClass("selected");
            $('ul.cardTable li').find(".card").find(".card-body").find("a").hide();        
            tbodyCard.addClass("selected");
            tbodyCard.find("a").show();        
        }            
    });
}


function addCard(data){
    d = new Date();                
    //$("#clickerImage").attr('src', "/img/compassion/" + response.data.foto +"?"+d.getTime() );                    
    var card = `<div class="card">          
        <div class="card-body">                                    
            <img class ="card-image" src="/img/tutores/${data.foto +"?"+d.getTime()}"  alt="photo">                                                            
            <div class="card-table">
                <p class="card-text"><strong>${data.cedula}<a href="#" onclick="cargaGrupo('${data.cedula}');" style="display:none;"> <span class="fa fa-pencil editCard"></span> </a></strong></p>
                <p class="card-text">${data.nombres} ${data.apellidos}
                <br>${data.telefono}                
                <br>${formatoDate(data.fechaNacimiento)}                
            </div>                                
        </div>
    </div>`;

    return card;
}   

function validarGrupo(){    
    EliminaValidaciones('frmGrupo');    
    mensaje = "";
    AdicionaValidacion('nombre', 'req','Nombre es requerido');    
    AdicionaValidacion('nombre', 'texto','Nombre valor ingresado es invalido');                    
    AdicionaValidacion('descripcion', 'req','Descripcion es requerido');
    AdicionaValidacion('descripcion', 'texto','Descripcion: caracteres invalidos');
    AdicionaValidacion('edad_minima', 'req','Edad minima es requerido');
    AdicionaValidacion('edad_minima', 'num','Edad minima: Caracteres invalidos');
    AdicionaValidacion('edad_maxima', 'req','Edad maxima es requerido');
    AdicionaValidacion('edad_maxima', 'num','Edad maxima: Caracteres invalidos');    
    AdicionaValidacion('capacidad', 'req','Capacidad es requerido');
    AdicionaValidacion('capacidad', 'num','Capacidad: Caracteres invalidos');

    var frmValidator = new Validator('frmGrupo');
    frmValidator.Validations();
    retorno = frmValidator.formobj.onsubmit();    

    if (!retorno){
        mensaje += "*Revisar datos Requeridos \n";         
    }
    
    
    if (mensaje){
        retorno = false;
        toastr.error(mensaje, "Error" );
    }

    return retorno;    
}

function grabarDatos(){        
    try {        
        
        if(!validarGrupo()){
            return false;
        }
        
        arrDatos = {
            codigo : $("#hddCodigo").val(),            
            nombre : $("#nombre").val(),            
            descripcion : $("#descripcion").val(),            
            edad_minima : $("#edad_minima").val(),
            edad_maxima : $("#edad_maxima").val(),
            capacidad : $("#capacidad").val(),
            
        }
        
        //var file_data = $("#fileFoto").prop("files")[0]; // Getting the properties of file from file field
        var form_data = new FormData(); // Creating object of FormData class
        //form_data.append("file", file_data); // Appending parameter named file with properties of file_field to form_data
        form_data.append("arrDatos", JSON.stringify(arrDatos)); // Adding extra parameters to form_data    
        
        $.post({
            url: '/crudGrupo',
            data: form_data,  
            contentType: false,
            processData: false,
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
    
    }catch(err) {
        $.alert(err.message);
    }
}

function continuaSession(data){
    if (data.estado==0) {                                        
        return true;                        
    }else{
        toastr.error( data.message , "Error" );
        return false;
    }
}

function eliminaGrupo(codigo){
    $.confirm({
        title: 'Alerta!',
        content: 'Seguro desea Eliminar este registro?',
        autoClose: 'eliminar|10000',
        buttons: {
            eliminar: {
                text: 'Eliminar',
                action: function () {                            
                    //ejecutar llamado ajax delete
                    $.post({
                        url: '/deleteGrupo',
                        data: {codigo:codigo},                          
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
                }
            },
            cancel: function () {
                $.alert('cancelado');
            }
        
        }
    });
}



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#clickerImage").attr('src', e.target.result);
            $("#imgTitle").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

var SEO_FILE_MAXMEGAS = 6000000;
var SEO_MSG_MAXMEGAS  = "El tama&ntilde;o del archivo supera los 6MB permitidos";

$("#fileFoto").change(function(){  
    try{ 
        var fileDocumento = $(this)[0].files[0];
        if(fileDocumento != null){
            var extension = fileDocumento.name.substring(fileDocumento.name.lastIndexOf('.') + 1);
            extension = extension.toLowerCase();
            if(extension == "pdf" || extension == "docx" || extension == "jpg" || extension == "png"
                || extension == "zip" || extension == "rar" || extension == "7z"){                        
                if(fileDocumento.size <= SEO_FILE_MAXMEGAS){                       
                    readURL(this);
                } else{
                    throw SEO_MSG_MAXMEGAS;
                }
            } else{
                throw "No se permiten este formato de documento";
            }
        }
        fileDocumento = null;
    } catch (err) {
        $(this).val("");
        $.alert(err, "Error");
    }             
});

$("#clickerImage").click(function() {        
    $("#fileFoto").click();//ID of the Upload Field
});

$(".btnTable").click(function() {        
    $(".btnTable").removeClass('active');
    $(this).addClass('active');
    cargarDatatable();
});


$('#grupoModal').on('hidden', function () {
    cargarDatatable();
})