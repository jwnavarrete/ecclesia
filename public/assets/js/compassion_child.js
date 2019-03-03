var oTable = null;
var filtro = 'T';
var flag = '';

$.ajaxSetup({        
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});   

var frmChild;
$(document).ready(function() {    

    $('#fechaNacimiento').datepicker({
        uiLibrary: 'bootstrap4',                
        locale: 'es-es',
        format: 'dd/mm/yyyy',                
    });

    $('#txtBuscar').on('keyup change', function () {
        if (oTable == null){return false}
        oTable.search(this.value).draw();
    });

    cargarDatatable();  

    $('select').addClass('mdb-select');
    $('.mdb-select').material_select();
    $('.mdb-select').removeClass('form-control form-control-sm');
    $('.dataTables_filter').find('label').remove();

            
    var chip = {
        tag: 'chip content',
        image: '', //optional
        id: 1, //optional
    };

    $('.chips-placeholder').material_chip({            
        secondaryPlaceholder: '+ Hermanos',            
        //data: [{tag: 'Tag 1',}, {tag: 'Tag 2',}, {tag: 'Tag 3',}],
    });

    $('.chips-placeholder').on('chip.add', function(e, chip){
        
    // you have the added chip here
    });

    $('.chips-placeholder').on('chip.delete', function(e, chip){
        
    // you have the deleted chip here
    });

    $('.chips-placeholder').on('chip.select', function(e, chip){
        
    // you have the selected chip here
    });
    
    $( "#primerNombre" ).keyup(function() {        
        $("#lblnombre1").html($(this).val());        
    });

    $( "#segundoNombre" ).keyup(function() {        
        $("#lblnombre2").html($(this).val());        
    });

    $( "#apellidop" ).keyup(function() {        
        $("#lblapellido1").html($(this).val());        
    });

    $( "#apellidom" ).keyup(function() {        
        $("#lblapellido2").html($(this).val());        
    });

});

function cargarDatatable(){        
    flag = $(".btn-group .active").attr('tipoTabla');

    try {
        oTable = $('#tblCompassion').DataTable({
            processing: true,                    
            ajax: "listaChildren?filtro="+filtro,
            dom: 'Brtp',
            data:{demo:'Hola'},
            destroy: true,         
            lengthMenu: [[6, 12,50, -1], [6,12,50, "Todo"]],           
            
            columns: [                                                                                                                        
                {data: 'codigo', name: 'codigo',title:'Codigo' },
                {data: 'nombreComun', name: 'nombreComun',title:'Nombre Comun' },
                {data: 'primerNombre', name: 'primerNombre',title:'Nombre' },
                {data: 'apellidoPaterno', name: 'apellidoPaterno',title:'Apellido' },                                   
                {data: "fechaNacimiento",title:'Fec. Nacimiento',"render": function(data, type, row, meta){                                                                          
                    return formatoDate(data)}
                },
                {data: "sexo",title:'Sexo',"render": function(data, type, row, meta){                                                                          
                    return (data=='M'?'Masculino':'Femenino');}
                },
                {data: "codigo","render": function(data, type, row, meta){                                                                          
                    return `<div class="btn-group btn-group-sm inline">
                    <button class="btn btn-primary waves-effect waves-light" onclick="cargaChild('${data}');" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>                    
                    <button class="btn btn-gplus waves-effect waves-light" onclick="eliminaChild('${data}');"  type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>                                                                    
                </div>`;
                    // `<a type="button" onclick="cargaChild('${data}');" style="margin:0px;" class="btn-floating btn-sm btn-tw waves-effect waves-light"><i class="fa fa-pencil"></i></a>
                    //<a type="button" style="margin:0px;" class="btn-floating btn-sm btn-gplus waves-effect waves-light"><i class="fa fa-trash"></i></a>`;
                }} 
            ],
            initComplete: function(settings, json) {                        
                if(flag=="card"){                            
                    $('#new-list').insertBefore('#tblCard');
                    $('#new-list').show();        
                    $('#tblCompassion').hide();                                    
                    formaEditCard();                            
                }else{
                    $('#new-list').hide();        
                    $('#tblCompassion').show();        
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
            buttons: [ 
                //'copy', 'excel', 'pdf', 'colvis' ,
                'pageLength',
                {extend:'copyHtml5',className : 'noDisplay'},
                {extend:'excelHtml5',className : 'noDisplay'},
                {extend:'csvHtml5',className : 'noDisplay'},
                {extend:'pdf',className : 'noDisplay'},
                {extend:'colvis',className : ''}
            ]
        });


        $("#btnFilterExport").html(btnFilterExport());
        
        oTable.buttons().container().appendTo( '#btnCollection' );
        
    }catch(err) {
        toastr.error( err.message , "Notifications" );
    }
}

function btnFilterExport(){
    
    return `<div class="btn-group btn-group-sm inline">                    
                <div class="btn-group btn-group-sm inline">
                    <button class="btn btn-primary dropdown-toggle" title="Filtrar" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="image fa fa-filter"></span></button>                                                
                    <div class="dropdown-menu">                                                                                                            
                        <a class="dropdown-item" href="#" onclick="filtro='T'; cargarDatatable();">Todos</a>                                
                        <a class="dropdown-item" href="#" onclick="filtro='M'; cargarDatatable();">Hombres</a>                                                        
                        <a class="dropdown-item" href="#" onclick="filtro='F'; cargarDatatable();">Mujeres</a>                                                        
                    </div>
                </div>

                <div class="btn-group btn-group-sm inline">
                    <button class="btn btn-primary" onclick="exportData('pdf')" title="PDF" type="button">
                        <span class="image fa fa-print"></span>
                    </button>
                    <button type="button" title="Exportar" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" onclick="exportData('copy')" href="#" onclick=""><i class="fa fa-files-o"> Copiar</i></a>                                                            
                        <a class="dropdown-item" onclick="exportData('excel')" href="#" onclick=""><i class="fa fa-file-excel-o"> Excel</i></a>                                     
                        <a class="dropdown-item" onclick="exportData('csv')" href="#" onclick=""><i class="fa fa-file-text-o"> Texto</i></a>                                                            
                        <a class="dropdown-item" onclick="exportData('pdf')" href="#" onclick=""><i class="fa fa-file-pdf-o"> Pdf</i></a>                                                            
                    </div>
                </div>
            </div> `;
}
function exportData(data){    
    $(".buttons-"+data).click();
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

function newChild(){
    limpiarModal();
    $('#childModal').modal('show');
    $("#codigo").attr('disabled', false);
}

function cargaChild(codigo){    
    limpiarModal();
    $('#childModal').modal('show');
    $("#codigo").attr('disabled', true);

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/getChild",
        data: { codigo: codigo },
        success: function( response ){             
            if (continuaSession(response)) {                            
                $("#codigo").val(response.data.codigo).change();        
                $("#fechaNacimiento").val(response.data.fechaNacimiento).change();
                $("#primerNombre").val(response.data.primerNombre).change();
                $("#segundoNombre").val(response.data.segundoNombre).change();
                $("#apellidop").val(response.data.apellidoPaterno).change();
                $("#apellidom").val(response.data.apellidoMaterno).change();
                $("#nombrecomun").val(response.data.nombreComun).change();
                $("#domicilio").val(response.data.domicilio).change();                    
                $("#razonNoAsiste").val(response.data.razonnonsiste).change();                    
                $("#mejorMateria").val(response.data.mejormateria).change();                    
                $("#numeroHijos").val(response.data.numerohijos).change();
                $("#numeroHijas").val(response.data.numerohijas).change();
                $("#detalle").val(response.data.detalle).change();                    
                $("#grupo").val(response.data.grupo).change();                    
                $("#slSexo").val(response.data.sexo).change();                    
                                                                
                $("input[name='rdbNiveles'][value='"+response.data.niveleducacion+"']").prop('checked', true);                                
                $("input[name='rdbPromedios'][value='"+response.data.promedioescolar+"']").prop('checked', true);
                $("input[name='rdbEstadoCivil'][value='"+response.data.estadocivil+"']").prop('checked', true);
                

                $("input[name='rdbPadreGuardian'][value='"+response.data.padreguardian+"']").prop('checked', true);
                $("input[name='rdbMadreGuardian'][value='"+response.data.madreguardian+"']").prop('checked', true);
                

                //Tab - General
                var arrActividades = JSON.parse(response.data.actividades);
                var arrPasatiempos = JSON.parse(response.data.pasatiempos);
                var arrObligaciones = JSON.parse(response.data.obligaciones);
                //Tab - Salud
                var arrEnfermedades = JSON.parse(response.data.enfermedades);
                var arrLesion = JSON.parse(response.data.lesiones);
                var arrOido = JSON.parse(response.data.defectooido);
                var arrVista = JSON.parse(response.data.defectovista);
                
                //Tab - Guardianes
                var arrEncargados = JSON.parse(response.data.encargados);                    
                var arrPadreNatural = JSON.parse(response.data.padrenatural);
                var arrMadreNatural = JSON.parse(response.data.madrenatural);
                var arrHermanos = JSON.parse(response.data.hermanoscompassion);                                                       

                $('.mdb-select').material_select('destroy');
                //Tab - General
                $("#actividades").val(arrActividades);
                $("#pasatiempos").val(arrPasatiempos);
                $("#obligaciones").val(arrObligaciones);
                //Tab - Salud
                $("#enfermedades").val(arrEnfermedades);
                //Tab - Guardianes
                $("#encargados").val(arrEncargados);                
                
                $.each(arrLesion, function( index, value ) {
                    $("input[type=checkbox][name='chkLesion'][value="+value+"]").prop("checked",true);
                });

                $.each(arrOido, function( index, value ) {
                    $("input[type=checkbox][name='chkOido'][value="+value+"]").prop("checked",true);
                });
                
                $.each(arrVista, function( index, value ) {
                    $("input[type=checkbox][name='chkVista'][value="+value+"]").prop("checked",true);
                });

                $.each(arrPadreNatural, function( index, value ) {
                    $("input[type=checkbox][name='chkPadreNatural'][value="+value+"]").prop("checked",true);
                });
                
                $.each(arrMadreNatural, function( index, value ) {
                    $("input[type=checkbox][name='chkMadreNatural'][value="+value+"]").prop("checked",true);
                });

                
                var dataTag = {
                    tag:'john'
                }                

                $('.chips-placeholder').material_chip({            
                    secondaryPlaceholder: '+ Hermanos',            
                    data: dataTag //[{tag: 'Tag 1',}, {tag: 'Tag 2',}, {tag: 'Tag 3',}],
                });
                
                $('.chips').material_chip();
                
                
                if (response.data.defectohabla == "S"){
                    $('#chkHabla').prop('checked',true);
                }else{
                    $('#chkHabla').prop('checked',false);
                }

                if (response.data.padresjuntos == "S"){
                    $('#padresJuntos').prop('checked',true);
                }else{
                    $('#padresJuntos').prop('checked',false);
                }

                

                if (response.data.asisteescuela == "S"){
                    $('#asisteescuela').prop('checked',true);
                }else{
                    $('#asisteescuela').prop('checked',false);
                }

                $('.mdb-select').material_select();

                d = new Date();                
                $("#clickerImage").attr('src', "/img/compassion/" + response.data.foto +"?"+d.getTime() );                    
                $("#imgTitle").attr('src', "/img/compassion/" + response.data.foto +"?"+d.getTime());                    

                $("#lblnombre1").html(response.data.primerNombre);
                $("#lblnombre2").html(response.data.segundoNombre);
                $("#lblapellido1").html(response.data.apellidoPaterno);
                $("#lblapellido2").html(response.data.apellidoMaterno);                 
                
            }
        },error   : function ( jqXhr, json, errorThrown ){
            toastr.error( "error llamada ajax", "Error" );
        }
    });    
}

function limpiarModal(){
    EliminaValidaciones('frmChild');    
    $('.mdb-select').material_select('destroy');                
    $("#codigo").val('');        
    $("#fechaNacimiento").val('');
    $("#primerNombre").val('');
    $("#segundoNombre").val('');
    $("#apellidop").val('');
    $("#apellidom").val('');
    $("#nombrecomun").val('');
    $("#domicilio").val('');
    $("#actividades").val('');
    $("#obligaciones").val('');
    $("#pasatiempos").val('');
    $("#enfermedades").val('');        
    $("#razonNoAsiste").val('');        
    $('.rdbCompassion').each(function () { $(this).prop('checked', false); });        
    $('.chkCompassion').each(function () { $(this).prop('checked', false); });        
    $("#mejorMateria").val('');
    $("#encargados").val('');        
    $("#numeroHijos").val('');
    $("#numeroHijas").val('');        
    $("#detalle").val('');
    $("#fileFoto").val('');
    $("#grupo").val('');
    $("#tab-General").click();
    
    $('#asisteescuela').prop('checked',false);
    d = new Date();                    
    $("#clickerImage").attr('src', "/img/compassion/child.png?"+d.getTime());              
    $("#imgTitle").attr('src', "/img/compassion/child.png?"+d.getTime());                  
    $('.lblNombre').html('')
    
    $('.mdb-select').material_select();
        
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
            <img class ="card-image" src="/img/compassion/${data.foto +"?"+d.getTime()}"  alt="photo">                                                            
            <div class="card-table">
                <p class="card-text"><strong>${data.nombreComun}<a href="#" onclick="cargaChild('${data.codigo}');" style="display:none;"> <span class="fa fa-pencil editCard"></span> </a></strong></p>
                <p class="card-text">${data.primerNombre} ${data.segundoNombre}
                <br>${data.apellidoPaterno} ${data.apellidoMaterno}                
                <br>${formatoDate(data.fechaNacimiento)}
                <br>${data.codigo}</p>                
            </div>                                
        </div>
    </div>`;

    return card;
}   

function validarChild(){    
    EliminaValidaciones('frmChild');    
    mensaje = "";
    AdicionaValidacion('codigo', 'req','Codigo es requerido');    
    AdicionaValidacion('codigo', 'alnumhyphen','Codigo valor ingresado es invalido');            
    AdicionaValidacion('fechaNacimiento', 'req','Fecha de Nacimiento requerida');
    AdicionaValidacion('fechaNacimiento', 'dd/mm/yyyy','Fecha de Nacimiento invalida');    
    AdicionaValidacion('primerNombre', 'req','Primer Nombre es requerido');
    AdicionaValidacion('primerNombre', 'texto','Primer Nombre: caracteres invalidos');
    AdicionaValidacion('segundoNombre', 'req','Segundo Nombre es requerido');
    AdicionaValidacion('segundoNombre', 'texto','Segundo Nombre: Caracteres invalidos');    
    AdicionaValidacion('apellidop', 'req','Apellido Paterno es requerido');
    AdicionaValidacion('apellidop', 'texto','Apellido Paterno: Caracteres invalidos');
    AdicionaValidacion('apellidom', 'req','Apellido Materno es requerido');
    AdicionaValidacion('apellidom', 'texto','Apellido Materno: Caracteres invalidos');    
    AdicionaValidacion('nombrecomun', 'req','Nombre Comun es requerido');
    AdicionaValidacion('nombrecomun', 'texto','Nombre Comun: Caracteres invalidos');    
    AdicionaValidacion('domicilio', 'req','Domicilio es requerido');
    AdicionaValidacion('domicilio', 'alnumhyphen');
    
    AdicionaValidacion('actividades', 'req','Actividades son requerido');
    AdicionaValidacion('obligaciones', 'req','Obligaciones son requerido');
    AdicionaValidacion('pasatiempos', 'req','Pasatiempos son requeridos');
    AdicionaValidacion('grupo', 'req','Grupo es requerido');    
    AdicionaValidacion('slSexo', 'req','Sexo es requerido');
    
    
    var frmValidator = new Validator('frmChild');
    frmValidator.Validations();
    frmValidator.setAddnlValidationFunction();
    retorno = frmValidator.formobj.onsubmit();        
    MensajeError = "";
    if (!retorno){
        MensajeError = frmValidator.alertError();        
        console.log(MensajeError);  
    }    
    
    if (MensajeError){
        retorno = false;
        toastr.error(MensajeError, "Error" );    
    }

    return retorno;    
}

function grabarDatos(){        
    try {        
        
        if(!validarChild()){
            return false;
        }
        
        var arrLesion = [];
        var arrOido = [];
        var arrVista = [];        
        var arrPadreNatural = [];        
        var arrMadreNatural = [];                

        $("[name='chkLesion']:checked").each(function () {
            arrLesion.push($(this).val());
        });
        
        $("[name='chkOido']:checked").each(function () {
            arrOido.push($(this).val());
        });

        $("[name='chkVista']:checked").each(function () {
            arrVista.push($(this).val());
        });

        $("[name='chkPadreNatural']:checked").each(function () {
            arrPadreNatural.push($(this).val());
        });
        
        $("[name='chkMadreNatural']:checked").each(function () {
            arrMadreNatural.push($(this).val());
        });        

        arrDatos = {
            codigo : $("#codigo").val(),            
            sexo : $("#slSexo").val(),
            fechaNacimiento : $("#fechaNacimiento").val(),
            primerNombre : $("#primerNombre").val(),
            segundoNombre : $("#segundoNombre").val(),
            apellidoPaterno : $("#apellidop").val(),
            apellidoMaterno : $("#apellidom").val(),            
            nombreComun : $("#nombrecomun").val(),
            domicilio : $("#domicilio").val(),
            actividades : $("#actividades").val() || [],
            obligaciones : $("#obligaciones").val() || [],
            pasatiempos : $("#pasatiempos").val() || [],
            enfermedades : $("#enfermedades").val() || [],
            lesiones: arrLesion,
            defectohabla : ($('#chkHabla').is(':checked') == true ? "S" : "N" ),
            defectooido: arrOido,
            defectovista: arrVista,
            asisteescuela : ($('#asisteescuela').is(':checked') == true ? "S" : "N" ),
            razonnonsiste : $("#razonNoAsiste").val(),
            niveleducacion : $("input[name='rdbNiveles']:checked").val(),            
            promedioescolar : $("input[name='rdbPromedios']:checked").val(),
            mejormateria : $("#mejorMateria").val(),
            encargados : $("#encargados").val() || [],
            padresjuntos : ($('#padresJuntos').is(':checked') == true ? "S" : "N" ),
            estadocivil : $("input[name='rdbEstadoCivil']:checked").val(),
            padrenatural : arrPadreNatural,
            madrenatural : arrMadreNatural,
            padreguardian : $("input[name='rdbPadreGuardian']:checked").val(),
            madreguardian : $("input[name='rdbMadreGuardian']:checked").val(),
            numerohijos : $("#numeroHijos").val(),
            numerohijas : $("#numeroHijas").val(),
            hermanoscompassion : $('#hermanosCompassion').material_chip('data'),
            detalle : $("#detalle").val(),  
            grupo : $("#grupo").val(),  
            file : file_data,           
            
        }
        
        var file_data = $("#fileFoto").prop("files")[0]; // Getting the properties of file from file field
        var form_data = new FormData(); // Creating object of FormData class
        form_data.append("file", file_data); // Appending parameter named file with properties of file_field to form_data
        form_data.append("arrDatos", JSON.stringify(arrDatos)); // Adding extra parameters to form_data
        

        
        $.post({
            url: '/crudChild',
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

function eliminaChild(id){
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
                        url: '/deleteChild',
                        data: {codigo:id},                          
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


$('#childModal').on('hidden', function () {
    cargarDatatable();
})
