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
    

    $( "#nombres" ).keyup(function() {        
        $("#lblnombres").html($(this).val());        
    });

    $( "#apellidos" ).keyup(function() {        
        $("#lblapellidos").html($(this).val());        
    });

    $('select').addClass('mdb-select');
    $('.mdb-select').material_select();
    
    
});


function cargarTablaGrupoTutor(tutor){        
    try {
        tblGrupoTutor = $('#tblGrupoTutor').DataTable({
            processing: true,                    
            ajax: "listaGrupoTutor?tutor="+tutor,
            dom: 'rtp',
            data:{tutor:tutor},
            destroy: true,         
            lengthMenu: [[6, 12,50, -1], [6,12,50, "Todo"]],                       
            columns: [                                                                                                                        
                {data: 'nombre', name: 'nombre',title:'Nombre' },
                {data: 'descripcion', name: 'descripcion',title:'Descripcion' },                                
                {data: "codigo","render": function(data, type, row, meta){                                   
                    data = data.split('-');                                                           
                    return `<div class="btn-group btn-group-sm inline">                    
                                <button class="btn btn-gplus waves-effect waves-light" onclick="eliminaGrupoTutor('${data[0]}','${data[1]}');"  type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>                                                                    
                            </div>`;                    
                }} 
            ],                        
        });
        
    }catch(err) {
        toastr.error( err.message , "Notifications" );
    }
}

function cargarDatatable(){    
    flag = $(".btn-group .active").attr('tipoTabla');
    
    try {
        oTable = $('#tblTutores').DataTable({
            processing: true,                    
            ajax: "listarTutores?filtro="+filtro,
            dom: 'rtp',
            data:{demo:'Hola'},
            destroy: true,         
            lengthMenu: [[6, 12, -1], [6,12, "Todo"]],           
            columns: [                                                                                                                                        
                {data: 'cedula', name: 'Cedula',title:'Cedula' },
                {data: 'nombres', name: 'Nombres',title:'Nombres' },
                {data: 'apellidos', name: 'Apellidos',title:'Apellidos' },                
                {data: 'telefono', name: 'Telefono',title:'Telefono' },                                   
                {data: "fechaNacimiento",title:'Fecha Nacimiento',"render": function(data, type, row, meta){                                                                          
                    return formatoDate(data);
                }},
                {data: "sexo",title:'Sexo',"render": function(data, type, row, meta){                                                                          
                    return (data=='M'?'Masculino':'Femenino');
                }},
                {data: "cedula","render": function(data, type, row, meta){                                                                          
                    return `<div class="btn-group btn-group-sm inline">
                    <button class="btn btn-primary waves-effect waves-light" onclick="cargaTutor('${data}');" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>                    
                    <button class="btn btn-warning waves-effect waves-light" onclick="cursosTutor('${data}');" type="button" title="Grupos"><span class="image fa fa-users"></span></button>                    
                    <button class="btn btn-gplus waves-effect waves-light" onclick="eliminaTutor('${data}');"  type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>                                                                    
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
            },
            
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
    $('#tutorModal').modal('show');
    $("#codigo").attr('disabled', false);
}

function cursosTutor(tutor){
    cargarTablaGrupoTutor(tutor);
    $('#cursoTutorModal').modal('show');
}

function cargaTutor(codigo){
    limpiarModal();
    $('#tutorModal').modal('show');
    $("#codigo").attr('disabled', true);

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/getTutor",
        data: { codigo: codigo },
        success: function( response ){            
            if (continuaSession(response)) {                            
                $("#cedula").val(response.data.cedula).change();        
                $("#fechaNacimiento").val(response.data.fechaNacimiento).change();
                $("#nombres").val(response.data.nombres).change();
                $("#apellidos").val(response.data.apellidos).change();
                $("#telefono").val(response.data.telefono).change();                
                $("input[name='rdbSexo'][value='"+response.data.sexo+"']").prop('checked', true);
                                
                d = new Date();                
                $("#clickerImage").attr('src', "/img/tutores/" + response.data.foto +"?"+d.getTime() );                    
                $("#imgTitle").attr('src', "/img/tutores/" + response.data.foto +"?"+d.getTime());                    

                $("#lblnombres").html(response.data.nombres);                
                $("#lblapellidos").html(response.data.apellidos);                
                
            }
        },error   : function ( jqXhr, json, errorThrown ){
            toastr.error( "error llamada ajax", "Error" );
        }
    });    
}

function limpiarModal(){
    EliminaValidaciones('frmTutor');    
    $('.mdb-select').material_select('destroy');                
    $("#cedula").val('');        
    $("#fechaNacimiento").val('');
    $("#nombres").val('');
    $("#apellidos").val('');
    $("#telefono").val('');    
    $('.rdbCompassion').each(function () { $(this).prop('checked', false); });            
    d = new Date();                    
    $("#clickerImage").attr('src', "/img/tutores/tutor.png?"+d.getTime());              
    $("#imgTitle").attr('src', "/img/tutores/tutor.png?"+d.getTime());                  
    $('.lblNombre').html('')    
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
                <p class="card-text"><strong>${data.cedula}<a href="#" onclick="cargaTutor('${data.cedula}');" style="display:none;"> <span class="fa fa-pencil editCard"></span> </a></strong></p>
                <p class="card-text">${data.nombres} ${data.apellidos}
                <br>${data.telefono}                
                <br>${formatoDate(data.fechaNacimiento)}                
            </div>                                
        </div>
    </div>`;

    return card;
}   

function validarTutor(){    
    EliminaValidaciones('frmTutor');    
    mensaje = "";
    AdicionaValidacion('cedula', 'req','Cedula es requerido');    
    AdicionaValidacion('cedula', 'num','Cedula valor ingresado es invalido');            
    AdicionaValidacion('cedula', 'I','Cedula invalida');            
    AdicionaValidacion('fechaNacimiento', 'req','Fecha de Nacimiento requerida');
    AdicionaValidacion('fechaNacimiento', 'dd/mm/yyyy','Fecha de Nacimiento invalida');    
    AdicionaValidacion('nombres', 'req','Nombres es requerido');
    AdicionaValidacion('nombres', 'texto','Nombres: caracteres invalidos');
    AdicionaValidacion('apellidos', 'req','Apellidos es requerido');
    AdicionaValidacion('apellidos', 'texto','Apellidos: Caracteres invalidos');    
    
    var frmValidator = new Validator('frmTutor');
    frmValidator.Validations();
    retorno = frmValidator.formobj.onsubmit();    

    if (!retorno){
        mensaje += "*Revisar datos Requeridos \n";         
    }
    
    if(!$("input:radio[name='rdbSexo']").is(":checked")) {
        mensaje += "*Seleccione el sexo por favor";         
    }
    
    if (mensaje){
        retorno = false;
        toastr.error(mensaje, "Error" );
    }

    return retorno;    
}

function grabarDatos(){        
    try {        
        
        if(!validarTutor()){
            return false;
        }
        
        arrDatos = {
            cedula : $("#cedula").val(),            
            sexo : $("input[name='rdbSexo']:checked").val(),
            fechaNacimiento : $("#fechaNacimiento").val(),
            nombres : $("#nombres").val(),
            apellidos : $("#apellidos").val(),
            telefono : $("#telefono").val(),                        
        }
        
        var file_data = $("#fileFoto").prop("files")[0]; // Getting the properties of file from file field
        var form_data = new FormData(); // Creating object of FormData class
        form_data.append("file", file_data); // Appending parameter named file with properties of file_field to form_data
        form_data.append("arrDatos", JSON.stringify(arrDatos)); // Adding extra parameters to form_data    
        
        $.post({
            url: '/crudTutor',
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



function eliminaTutor(cedula){
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
                        url: '/deleteTutor',
                        data: {codigo:cedula},                          
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

function eliminaGrupoTutor(cedula,grupo){
    $.confirm({
        title: 'Alerta!',
        content: 'Seguro desea Eliminar este registro?',
        autoClose: 'eliminar|10000',
        buttons: {
            eliminar: {
                text: 'Eliminar',
                action: function () {                                                
                    $.post({
                        url: '/deleteGrupoTutor',
                        data: {tutor:cedula,grupo:grupo},                          
                        type: 'post',                     
                        success: function (data) {
                            if (continuaSession(data)) { 
                                toastr.success( data.message , "Notifications" );                                                                                  
                                cargarTablaGrupoTutor(cedula);
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


$('#tutorModal').on('hidden', function () {
    cargarDatatable();
})
