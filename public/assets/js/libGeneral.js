function continuaSession(data){
    if (data.estado==0) {                                        
        return true;                        
    }else{
        toastr.error( data.message , "Error" );
        return false;
    }
}


function deleteConfirm(callback){
    $.confirm({
        title: 'Alerta!',
        content: 'Seguro desea Eliminar este registro?',
        autoClose: 'eliminar|10000',
        buttons: {
            eliminar: {
                text: 'Eliminar',
                action: function () {               
					if (typeof callback === "function") {
					    callback();
					}                    
                }
            },
            cancel: function () {
                $.alert('cancelado');
            }
        
        }
    });
}

function openWindows(url){
    window.location.href = url; 
}