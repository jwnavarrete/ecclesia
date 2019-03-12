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

        

    test = [{tag: 'Tag 1',}, {tag: 'Tag 2',}, {tag: 'Tag 3',}];

    $('.chips').material_chip({            
        secondaryPlaceholder: '+ Hermanos',            
        //data: test,
    });

    $('.chips').on('chip.add', function(e, chip){
        
    // you have the added chip here
    });

    $('.chips').on('chip.delete', function(e, chip){
        
    // you have the deleted chip here
    });

    $('.chips').on('chip.select', function(e, chip){
        
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

    $('#hermanosCompassion').tagsinput({
        tagClass: 'badge badge-info',                    
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
                {data: 'nombre_comun', name: 'nombre_comun',title:'Nombre Comun' },
                {data: 'nombrecompleto', name: 'nombrecompleto',title:'Nombre Completo' },                
                {data: "fecha_nacimiento",title:'Fec. Nacimiento',"render": function(data, type, row, meta){                                                                          
                    return formatoDate(data)}
                },
                {data: "sexo",title:'Sexo',"render": function(data, type, row, meta){                                                                          
                    return (data=='M'?'Masculino':'Femenino');}
                },
                {data: "codigo","render": function(data, type, row, meta){                                                                          
                    return `<div class="btn-group btn-group-sm">
                    <button class="btn btn-primary waves-effect waves-light" onclick="cargaChild('${data}');" type="button" title="Editar"><span class="image fa fa-pencil"></span></button>
                    <button class="btn btn-gplus waves-effect waves-light" onclick="eliminaChild('${data}');"  type="button" title="Eliminar"><span class="image fa fa-trash"></span></button>                                                                    
                </div>`;
                }},
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
                fecNacimiento = formatoDate(response.data.fecha_nacimiento);
                $("#fechaNacimiento").val(fecNacimiento).change();
                $("#primerNombre").val(response.data.primer_nombre).change();
                $("#segundoNombre").val(response.data.segundo_nombre).change();
                $("#apellidop").val(response.data.apellido_paterno).change();
                $("#apellidom").val(response.data.apellido_materno).change();
                $("#nombrecomun").val(response.data.nombre_comun).change();
                $("#domicilio").val(response.data.domicilio).change();                    
                $("#razonNoAsiste").val(response.data.razon_no_asiste).change();                    
                $("#mejorMateria").val(response.data.mejor_materia).change();                    
                $("#numeroHijos").val(response.data.numero_hijos).change();
                $("#numeroHijas").val(response.data.numero_hijas).change();
                $("#detalle").val(response.data.detalle).change();                    
                $("#grupo").val(response.data.grupo).change();
                $("#slSexo").val(response.data.sexo).change();                    
                $("#otrasActividades").val(response.data.otras_actividades).change();                    
                $("#otrasObligaciones").val(response.data.otras_obligaciones).change();                    
                $("#instrumentosMusicales").val(response.data.instrumentos_musicales).change();                    
                $("#otrosPasatiempos").val(response.data.otros_pasatiempos).change();                    
                $("#otraEnfermedad").val(response.data.otra_enfermedad).change();
                $("#slColumna").val(response.data.columna).change();
                $("#slPieIzquierdo").val(response.data.pie_izquierdo).change();
                $("#slPieDerecho").val(response.data.pie_derecho).change();
                $("#slManoIzquierda").val(response.data.mano_izquierda).change();
                $("#slManoDerecha").val(response.data.mano_derecha).change();
                $("#slPiernaIzquierda").val(response.data.pierna_izquierda).change();
                $("#slPiernaDerecha").val(response.data.pierna_derecha).change();
                $("#slBrazoIzquierdo").val(response.data.brazo_izquierdo).change();
                $("#slBrazoDerecho").val(response.data.brazo_derecho).change();
                $("#slHabla").val(response.data.habla).change();
                $("#slOidoIzquierdo").val(response.data.oido_izquierdo).change();
                $("#slOidoDerecho").val(response.data.oido_derecho).change();
                $("#slOjoIzquierdo").val(response.data.ojo_izquierdo).change();
                $("#slOjoDerecho").val(response.data.ojo_derecho).change();                
                
                setValueByName('chkActividades', jsonParse(response.data.arrActividades));
                setValueByName('chkObligaciones', jsonParse(response.data.arrObligaciones));
                setValueByName('chkPasatiempos', jsonParse(response.data.arrPasatiempos));
                setValueByName('chkSalud', jsonParse(response.data.arrSalud));
                setValueByName('chkEncargados', jsonParse(response.data.arrGuardianes));
                setValueByName('chkActividaGuardian', jsonParse(response.data.arrActGuarMas));
                setValueByName('chkActividaGuardiana', jsonParse(response.data.arrActGuarFem));                
                setValueByName('chkPadreNatural', jsonParse(response.data.arrPadreNatural));
                setValueByName('chkMadreNatural', jsonParse(response.data.arrMadreNatural));

                if (response.data.asiste_escuela == "S"){
                    $('#asisteescuela').prop('checked',true);
                }else{
                    $('#asisteescuela').prop('checked',false);
                }                                
                
                $("input[name='rdbNiveles'][value='"+response.data.nivel_educacion+"']").prop('checked', true);                                
                $("input[name='rdbPromedios'][value='"+response.data.promedio_escolar+"']").prop('checked', true);
                $("input[name='rdbEstadoCivil'][value='"+response.data.estado_civil+"']").prop('checked', true);                
                $("input[name='rdbPadreGuardian'][value='"+response.data.padre_guardian+"']").prop('checked', true);
                $("input[name='rdbMadreGuardian'][value='"+response.data.madre_guardian+"']").prop('checked', true);
                
                $('.mdb-select').material_select('destroy');
                
                setValueByName('chkPadreNatural', jsonParse(response.data.padre_natural));
                setValueByName('chkMadreNatural', jsonParse(response.data.madre_natural));
                
                var arrHermanos = jsonParse(response.data.hermanos_compassion);
                $.each(arrHermanos, function(index, item){
                    $('#hermanosCompassion').tagsinput('add', item);
                });
                
                if (response.data.habla == "S"){
                    $('#chkHabla').prop('checked',true);
                }else{
                    $('#chkHabla').prop('checked',false);
                }

                if (response.data.padres_juntos == "S"){
                    $('#padresJuntos').prop('checked',true);
                }else{
                    $('#padresJuntos').prop('checked',false);
                }

                $('.mdb-select').material_select();

                d = new Date();                
                $("#clickerImage").attr('src', "/img/compassion/" + response.data.foto +"?"+d.getTime() );                    
                $("#imgTitle").attr('src', "/img/compassion/" + response.data.foto +"?"+d.getTime());                    

                $("#lblnombre1").html(response.data.primer_nombre);
                $("#lblnombre2").html(response.data.segundo_nombre);
                $("#lblapellido1").html(response.data.apellido_paterno);
                $("#lblapellido2").html(response.data.apellido_materno);                 
                
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
    $("#otrasActividades").val('');
    $("#otrasObligaciones").val('');
    $("#instrumentosMusicales").val('');
    $("#otrosPasatiempos").val('');
    $("#otraEnfermedad").val('');
    $('select').val('');    
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
    
    $('#hermanosCompassion').tagsinput('removeAll');

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
                <p class="card-text"><strong>${data.nombre_comun}<a href="#" onclick="cargaChild('${data.codigo}');" style="display:none;"> <span class="fa fa-pencil editCard"></span> </a></strong></p>
                <p class="card-text">${data.primer_nombre} ${data.segundo_nombre}
                <br>${data.apellido_paterno} ${data.apellido_materno}                
                <br>${data.fecha_nacimiento}
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
    
    //AdicionaValidacion('actividades', 'req','Actividades son requerido');
    //AdicionaValidacion('obligaciones', 'req','Obligaciones son requerido');
    //AdicionaValidacion('pasatiempos', 'req','Pasatiempos son requeridos');
    AdicionaValidacion('grupo', 'req','Grupo es requerido');    
    AdicionaValidacion('slSexo', 'req','Sexo es requerido');
    
    
    var frmValidator = new Validator('frmChild');
    frmValidator.Validations();
    frmValidator.setAddnlValidationFunction();
    retorno = frmValidator.formobj.onsubmit();        
    MensajeError = "";
    if (!retorno){
        MensajeError = frmValidator.alertError();                
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
        
        arrDatos = {
            //DATOS GENERALES
            codigo : $("#codigo").val(),            
            sexo : $("#slSexo").val(),
            fecha_nacimiento : $("#fechaNacimiento").val(),
            primer_nombre : $("#primerNombre").val(),
            segundo_nombre : $("#segundoNombre").val(),
            apellido_paterno : $("#apellidop").val(),
            apellido_materno : $("#apellidom").val(),            
            nombre_comun : $("#nombrecomun").val(),
            domicilio : $("#domicilio").val(),
            grupo : $("#grupo").val(),  
            //file : file_data,            
            otras_actividades : $("#otrasActividades").val(),            
            otras_obligaciones : $("#otrasObligaciones").val(),            
            instrumentos_musicales : $("#instrumentosMusicales").val(),
            otros_pasatiempos : $("#otrosPasatiempos").val(),            
            otra_enfermedad : $("#otraEnfermedad").val(),            
            //Lesion, enfermedad, congenito
            columna : $("#slColumna").val(),
            pie_izquierdo : $("#slPieIzquierdo").val(),
            pie_derecho : $("#slPieDerecho").val(),
            mano_izquierda : $("#slManoIzquierda").val(),
            mano_derecha : $("#slManoDerecha").val(),
            pierna_izquierda : $("#slPiernaIzquierda").val(),
            pierna_derecha : $("#slPiernaDerecha").val(),
            brazo_izquierdo : $("#slBrazoIzquierdo").val(),
            brazo_derecho : $("#slBrazoDerecho").val(),
            //HABLA
            habla : $("#slHabla").val(),
            //OIDO
            oido_izquierdo : $("#slOidoIzquierdo").val(),
            oido_derecho : $("#slOidoDerecho").val(),
            //OJO
            ojo_izquierdo : $("#slOjoIzquierdo").val(),
            ojo_derecho : $("#slOjoDerecho").val(),             
            //ESTUDIOS
            asiste_escuela : ($('#asisteescuela').is(':checked') == true ? "S" : "N" ),
            razon_no_asiste : $("#razonNoAsiste").val(),
            nivel_educacion : $("input[name='rdbNiveles']:checked").val(),            
            promedio_escolar : $("input[name='rdbPromedios']:checked").val(),
            mejor_materia : $("#mejorMateria").val(),                        
            //PADRES NATURALES
            padres_juntos : ($('#padresJuntos').is(':checked') == true ? "S" : "N" ),
            estado_civil : $("input[name='rdbEstadoCivil']:checked").val(),
            //                        
            padre_guardian : $("input[name='rdbPadreGuardian']:checked").val(),
            madre_guardian : $("input[name='rdbMadreGuardian']:checked").val(),            
            numero_hijos : $("#numeroHijos").val(),
            numero_hijas : $("#numeroHijas").val(),
            hermanos_compassion : $('#hermanosCompassion').val() || [],            
            detalle : $("#detalle").val(),                                  
        }    
        
        $arrListas = {
            //ACTIVIDADES
            'ACT' : getValueSelectedByName('chkActividades'),                    
            //OBLIGACIONES
            'OBL' : getValueSelectedByName('chkObligaciones'),
            //PASATIEMPOS
            'PAS' : getValueSelectedByName('chkPasatiempos'),
            //IMPEDIMENTOS FISICOS / ENFERMEDADES
            'S' : getValueSelectedByName('chkSalud'),
            'GR' : getValueSelectedByName('chkEncargados'),
            //GUARDIANES
            'AGRM' : getValueSelectedByName('chkActividaGuardian'),
            'AGRF' : getValueSelectedByName('chkActividaGuardiana'),
            //PADRES NATURALES
            'PNM' : getValueSelectedByName('chkPadreNatural'),
            'PNF' : getValueSelectedByName('chkMadreNatural'),
        }
      
        var file_data = $("#fileFoto").prop("files")[0]; // Getting the properties of file from file field
        var form_data = new FormData(); // Creating object of FormData class
        form_data.append("file", file_data); // Appending parameter named file with properties of file_field to form_data
        form_data.append("arrDatos", JSON.stringify(arrDatos));
        form_data.append("arrListas", JSON.stringify($arrListas)); 
        

        
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
