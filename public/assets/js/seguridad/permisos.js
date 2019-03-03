$(document).ready(function() {
    $('.mdb-select').material_select();
    
    getPermisoRol();
    
}); 


function grabarMenuRol(){
    try{

        var marcadas = [];
        $('input[type=checkbox]').each(function () {                    
            if(this.checked=="1"){
                var check = {id:this.id}; 
                marcadas.push(check);
            }                                       
        });
                            
        $.ajax({
            url: '/addRemovePermisos',
            type: 'post',
            data: {'permisos':marcadas,role:$("#roles").val()},
            dataType: 'json',
            success: function (data) {
                if (data.estado==0) {                            
                    toastr.success( data.message , "Notifications" );  
                    window.setTimeout(function(){location.reload()},3000)                              
                }else{
                    toastr.error( data.message , "Error" );
                }
            },error   : function ( jqXhr, json, errorThrown )
            {
                toastr.error( "error llamada ajax", "Error" );
            }
        });
    


        } catch(err) {
            toastr.error(err , "Error" );
        }
}


function getPermisoRol(){
    $.ajax({
            url: '/getPermisoRol',
            type: 'get',
            data: {role:$("#roles").val()},
            dataType: 'json',
            success: function (data) {
                if (data.estado==0) {                                                            
                    leerCheck(data.data);
                }else{
                    toastr.error( data.message , "Error" );
                }
            },error   : function ( jqXhr, json, errorThrown )
            {
                toastr.error( "error llamada ajax", "Error" );
            }
        });
    

}

function leerCheck(data){                
    $('input:checkbox').removeAttr('checked');
    $.each(data, function (index, value) {                
        $("#"+value.menu_id).attr('checked', true);                
    });

    //$("ul.checktree").checktree();
}
