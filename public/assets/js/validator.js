var MensajeError = "";
var Campo = new Array();
var Validacion = new Array();
var Etiqueta = new Array();
var dtCh= "/";
var minYear=1900;
var maxYear=2100;
var errFormObject3 = "No existe el control: ";
//
function EliminaValidaciones(frmname){
    var formobj=document.forms[frmname];    
	for(var itr=0; itr < formobj.elements.length; itr++){
		//$("#"+formobj.elements[itr].id).removeClass("validate");
		formobj.elements[itr].classList.remove('invalid');
		formobj.elements[itr].validationset = null;
	}
    Campo = [];
    Validacion = [];
    Etiqueta = [];
}
function AdicionaValidacion(objeto,validacion,etiqueta){
   pos = Campo.length;
   Campo[pos] = objeto;
   Validacion[pos] = validacion;
   Etiqueta[pos] = etiqueta;
}
function AsignaValidacion(){
	MensajeError = "";	
	for(var i=0;i < Campo.length;i++){
		this.addValidation(Campo[i],Validacion[i],Etiqueta[i]) ;
	}
}
function Validator(frmname)
{
    this.formobj=document.forms[frmname];
	if(!this.formobj){
	  	alert(errFormObject1 +frmname);
		return;
	}
	if(this.formobj.onsubmit){
	 this.formobj.old_onsubmit = this.formobj.onsubmit;
	 this.formobj.onsubmit=null;
	}else{
	 this.formobj.old_onsubmit = null;
	}
	this.formobj.onsubmit           = form_submit_handler;
	this.addValidation              = add_validation;
	this.deleteValidation           = delete_validation;
	this.setAddnlValidationFunction = set_addnl_vfunction;
	this.clearAllValidations        = clear_all_validations;
	this.Validations                = AsignaValidacion;
	this.alertError                = alertError;

}
function set_addnl_vfunction(functionname){
  this.formobj.addnlvalidation = functionname;
}
function clear_all_validations(){
	for(var itr=0;itr < this.formobj.elements.length;itr++)
	{
		this.formobj.elements[itr].validationset = null;
	}
}
function form_submit_handler(){
    var f1 = 0;
    var isError = false;
    for(var itr=0;itr < this.elements.length;itr++){
        if(this.elements[itr].validationset){
            var classes = this.elements[itr].className;
            var i = classes.indexOf(' invalid');
            if(i >= 0){
                this.elements[itr].className = classes.substr(0, i);
            }
            if (!this.elements[itr].validationset.validate()){
                this.elements[itr].className+= ' invalid';                
				isError = true;
				
			}		
			
            if (f1 == 0) {
                this.elements[itr].focus();
                f1++;
            }
        }
    }
    if (isError) {								
		toastr.error(MensajeError, "Validacion" );
		return false;        
    }    
    return true;
}
function alertError(){	
	return MensajeError;
}

function add_validation(itemname,descriptor,errstr){
  if(!this.formobj)	{
	  alert(errFormObject2);
		return;
	}//if
	var itemobj = this.formobj[itemname];	
	
	for (i = 0; i < itemobj.length; i++) {
		console.log(itemobj[i]);
		
	}
	
  	if(!itemobj){
		alert(errFormObject3+itemname);
		return;
	}
	if(!itemobj.validationset){
	  itemobj.validationset = new ValidationSet(itemobj);
	}
    itemobj.validationset.add(descriptor,errstr);
}



function delete_validation(itemname){
  if(!this.formobj)	{
	  alert(errFormObject2);
		return;
  }//if
  var itemobj = this.formobj[itemname];
  if(!itemobj){
	  alert(errFormObject3+itemname);
		return;
  }
  if(itemobj.validationset){
     itemobj.validationset = null;
  }
}
function ValidationDesc(inputitem,desc,error){
	try {
		this.desc=desc;
		this.error=error;
		this.itemobj = inputitem;
		this.validate=vdesc_validate;
	}catch(err) {
		console.log(err.message);
	}    
}

function vdesc_validate(){
 if(!V2validateData(this.desc,this.itemobj,this.error)){
    return false;
 }
 return true;
}
function ValidationSet(inputitem){
    this.vSet= new Array();
	this.add= add_validationdesc;
	this.validate= vset_validate;
	this.itemobj = inputitem;	
	//console.log(inputitem);
}
function add_validationdesc(desc,error){
  this.vSet[this.vSet.length]=
	  new ValidationDesc(this.itemobj,desc,error);
}
function vset_validate(){
   for(var itr=0;itr<this.vSet.length;itr++)
	 {
	   if(!this.vSet[itr].validate())
		 {
		   return false;
		 }
	 }
	 return true;
}
function validateEmailv2(email){
// a very simple email validation checking.
// you can add more complex email checking if it helps
    if(email.length <= 0){
	  return true;
	}
    var splitted = email.match("^(.+)@(.+)$");
    if(splitted == null) return false;
    if(splitted[1] != null ){
      var regexp_user=/^\"?[\w-_\.]*\"?$/;
      if(splitted[1].match(regexp_user) == null) return false;
    }
    if(splitted[2] != null)
    {
      var regexp_domain=/^[\w-\.]*\.[A-Za-z]{2,4}$/;
      if(splitted[2].match(regexp_domain) == null)
      {
	    var regexp_ip =/^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
	    if(splitted[2].match(regexp_ip) == null) return false;
      }// if
      return true;
    }
return false;
}

function miTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}
function miNumeric(x){
	return x.replace(/,/g,"");
}

function V2validateData(strValidateStr, objValue, strError){	
    if(!strError){
        strError = "";
	}	
	strError = "*" +strError; 
    var epos = strValidateStr.search("=");
    var vc   = strValidateStr.search("-");
    var command  = "";
    var cmdvalue = "";
    var msjError = "";
    var strTexto = this.miTrim(objValue.value);
    if(epos >= 0){
     command  = strValidateStr.substring(0,epos);
	 cmdvalue = strValidateStr.substr(epos+1);	 
    }else{		
     command = strValidateStr;
    }
    if (vc >= 0){
	  command  = strValidateStr.substring(0,vc);
	  cmdvalue = strValidateStr.substr(vc+1);
	  
	  objeto = document.getElementById(cmdvalue);
	}	
	//
	objeto = document.getElementById(cmdvalue);
	var largo = strTexto.length;			
    switch(command) {
    	case "usuario":
    	case "user":{
		    var expreg = new RegExp("^[a-zA-Z]{1}[a-zA-Z0-9]{4,14}$");
		    if(!expreg.test(strTexto)){
		        msjError = strError ;
		    }
    	}
        case "req":
        case "required":{
            if(largo == 0){
                msjError = strError ;
            }
            break;
        }//case required
        case "dd/mm/yyyy":{
            if(largo > 0){
                if (isDate(objValue,'dd/mm/yyyy')){
  		        } else {
                    msjError = strError ;
                }
            }
            break;
        }//dd/mm/yyyy
        case "maxlength":
        case "maxlen":{
            if(largo > eval(cmdvalue)){
                msjError = strError ;
            }//if
            break;
        }//case maxlen
        case "minlength":
        case "minlen":{
             if(largo <  eval(cmdvalue)){
                 msjError = strError ;
             }//if
             break;
            }//case minlen
        case "alnum":
        case "alphanumeric":
        case "alfanumerico":{
              var charpos = strTexto.search("[^A-Za-z0-9]");
              if(largo > 0 &&  charpos >= 0){
                  msjError = strError ;
              }//if
              break;
           }//alfanumerico
		case "alnumhyphen":{
              var charpos = strTexto.search("[^A-Za-z0-9\-_]");
              if(largo > 0 &&  charpos >= 0)
              {
                  msjError = strError ;
                return false;
              }//if
			break;
			}
        case "num":
        case "numeric":
        case "numero":{
        	strTexto = miNumeric(strTexto);
              if(largo > 0 && !((/^([0-9])*$/).test(strTexto))) {
                  msjError = strError ;
              }//if
              break;
           }//num
        case "telefono":{
           	  if(largo > 0) {
	          	  if(largo < 7 || largo > 10){
		            msjError = strError ;
	          	  } else{
					if(!/^([0-9])*$/.test(strTexto)) {
					  	msjError = strError ;
					}
	          	  }
          	  }
              break;
           }//telefono
        case "creditcard":{
           	  if(largo > 0 && !((/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/).test(strTexto) || (/^\d{4}\s\d{6}\s\d{4}$/).test(strTexto))) {
           	  	msjError = strError ;
          	  }
              break;
           }//creditcard
        case "dec":
        case "decimal":{
        	strTexto = miNumeric(strTexto);
			if(largo > 0 && !((/^[\+\-]?\d*\.?\d*$/).test(strTexto))) {
			  msjError = strError ;
			}//if
			break;
           }//dec
        case "alphabetic":
        case "alpha":
        case "alfabeto":{
              var charpos = strTexto.search("[^A-Za-z]");
              if(largo > 0 && charpos >= 0){
                  msjError = strError ;
              }//if
              break;
           }//alpha
        case "texto":{
              if(largo > 0 && ((/[0-9\'\"]/).test(strTexto))){
                  msjError = strError ;
              }//if
              break;
           }//texto
        case "placa":{
              if(largo > 0 && (!((/^[A-Za-z]{3}[0-9]{4}$/).test(strTexto)) && strTexto.toUpperCase()!='S/P')){
                  msjError = strError ;
              }//if
              break;
           }//placa
        case "email":{
               if(!validateEmailv2(strTexto))
               {
                    msjError = strError ;
                 //return false;
               }//if
               break;
          }//case email
        case "lt":
        case "lessthan":{
        	strTexto = miNumeric(strTexto);
            if(isNaN(strTexto)){
              msjError = strError ;
            }//if
            if(eval(strTexto) >=  eval(cmdvalue)){
              msjError = strError ;
            }//if
            break;
         }//case lessthan
        case "gt":
        case "greaterthan":{
        	strTexto = miNumeric(strTexto);
            if(isNaN(strTexto)){
            	msjError = strError ;
            }//if
			if(eval(strTexto) <=  eval(cmdvalue)) {
				msjError = strError ;
			}//if
            break;
         }//case greaterthan

        case "regexp":{			
		 	if(largo > 0){
	            if(!strTexto.match(cmdvalue)){
	                msjError = strError ;
	            }//if
			}
           break;
		 }//case regexp
        case "dontselect":{
            if(objValue.selectedIndex == null){
              msjError = strError ;
            }
            if(objValue.selectedIndex == eval(cmdvalue)){
              msjError = strError ;
            }
             break;
         }//case dontselect
        case "ID":{
		 	if(!validaIdentificacion(cmdvalue, strTexto)){
		 	   msjError = strError ;
			}
		 }//case Cedula o RUC
         break;
        case "I":{  
        	if (largo == 10){
			    command = 'C';
		    } else {
			    command = 'R';
			}
		 	if(!validaIdentificacion(command, strTexto)){
		 	   msjError = strError ;
			}
		 }//case Cedula o RUC
		 break;
		
	   	break;
		case "O":{
			if (largo > 0){
			   if (largo == 10){
			      command = 'C';
		       } else {
			      command = 'R';
			   }
		 	   if(!validaIdentificacion(command, strTexto)){
		 	      msjError = strError ;
			   }
			}
			break;
		 }//case O validad identificacion que no es campo requerido
         break;
		 case "fechamayorque":{
		 	if (Date.parse(strTexto) > Date.parse(strTexto)){
				msjError = strError ;
			}
		    break;
		 }
         break;
		 case "fechamenorque":{ 
		 	if (Date.parse(strTexto) < Date.parse(strTexto)){
				msjError = strError ;
			}
		    break;
		 }		 
		break;
		 
    }//switch
    if (msjError){
		MensajeError += msjError + '<br>';		
        return false;
	} else {
        return true;
	}
}
//INICIO***************************************VALIDACIONES SRI 31/05/2007 LFREIRE ***********************
function validaIdentificacion(tipoDocumento, identificacion) {
	/* Tipos de Documentos:
		R --> RUC
		C --> Cedula
		P --> Pasaporte
	*/
    //alert(tipoDocumento);
	if (tipoDocumento == 'R' || tipoDocumento == 'C') {
	   if (tipoDocumento == 'C') {
          if (identificacion.length != 10 )
              return false;
       }
	   if (tipoDocumento == 'R') {
          if (identificacion.length != 13 )
              return false;
        }
		var lv_cedula;
		var lv_vec3;
		var lv_numidentificacion;
		var ll_rc;
		var ll_fin;
		ll_rc = false;
		;
		lv_numidentificacion = identificacion;
		// Control de los 3 últimos dígitos
		ll_fin = identificacion.substring(10);
		if (ll_fin != '001' && tipoDocumento == 'R')
			return false;
		if (isNaN(Number(identificacion)))
			return false;
		lv_cedula = identificacion.substring(0, 10);
		if (isNaN(Number(lv_cedula))
			|| (lv_numidentificacion.length != 13 && tipoDocumento == 'R'))
			return false;
		if (isNaN(Number(lv_cedula))
			|| (lv_numidentificacion.length != 10 && tipoDocumento == 'C'))
			return false;
		lv_vec3 = Number(lv_numidentificacion.substring(2, 3));
		//alert(lv_vec3);
		if ((lv_vec3 >= 0 && lv_vec3 <= 5) || tipoDocumento == 'C')
			ll_rc = validaCedula(lv_cedula);
		else if (lv_vec3 == 6)
			ll_rc = validaTercero6(lv_cedula);
		else if (lv_vec3 == 9)
			ll_rc = validaTercero9(lv_cedula);
		return ll_rc;
	} else if (tipoDocumento == 'F' && identificacion != '9999999999999'){
                return false;
    } else{
		return true;
	}
}
function validaCedula(cedula) {
	//alert(cedula);
	// Control de provincia entre 1 y 24 - 30 Extranjeros nacionalizados
	lv_prov = Number(cedula.substring(0, 2));
	if (lv_prov >= 1 && lv_prov <= 30) {
		lv_numced = cedula;
		ll_TenDig = Number(cedula.substring(9));
		ll_sum = 0;
		ll_Cnt = 0;
		ll_CntPos = 0;
		while (ll_CntPos < 9) {
			ll_CntPos = 2 * ll_Cnt + 1;
			lv_StrNum = lv_numced.substring(ll_CntPos - 1, ll_CntPos);
			ll_multi = Number(lv_StrNum) * 2;
			if (ll_multi >= 10)
				ll_multi = 1 + (ll_multi % 10);
			ll_sum += ll_multi;
			ll_Cnt += 1;
		}
		ll_Cnt = 1;
		ll_CntPos = 1;
		while (ll_CntPos < 8) {
			ll_CntPos = 2 * ll_Cnt;
			lv_StrNum = lv_numced.substring(ll_CntPos - 1, ll_CntPos);
			ll_sum += Number(lv_StrNum);
			ll_Cnt += 1;
		}
		ll_cociente = Math.floor(ll_sum / 10);
		ll_decena = (ll_cociente + 1) * 10;
		ll_verificador = ll_decena - ll_sum;
		if (ll_verificador == 10)
			ll_verificador = 0;
		if (ll_verificador == ll_TenDig){
			return true;
		}
		else
			return false;
	} else {
		return false;
	}
}
function validaTercero9(identificacionNueve) {
	//alert("Tercero 9");
	lv_identificacion_nueve = identificacionNueve;
	ll_Uno = Number(lv_identificacion_nueve.substring(0, 1));
	ll_Dos = Number(lv_identificacion_nueve.substring(1, 2));
	ll_Tre = Number(lv_identificacion_nueve.substring(2, 3));
	ll_Cua = Number(lv_identificacion_nueve.substring(3, 4));
	ll_Cin = Number(lv_identificacion_nueve.substring(4, 5));
	ll_Sei = Number(lv_identificacion_nueve.substring(5, 6));
	ll_Sie = Number(lv_identificacion_nueve.substring(6, 7));
	ll_Och = Number(lv_identificacion_nueve.substring(7, 8));
	ll_Nue = Number(lv_identificacion_nueve.substring(8, 9));
	ll_Die = Number(lv_identificacion_nueve.substring(9));
	ll_sum =
		ll_Uno * 4
			+ ll_Dos * 3
			+ ll_Tre * 2
			+ ll_Cua * 7
			+ ll_Cin * 6
			+ ll_Sei * 5
			+ ll_Sie * 4
			+ ll_Och * 3
			+ ll_Nue * 2;
	while (ll_sum > 11) {
		ll_sum -= 11;
	}
	ll_dverr2 = 11 - ll_sum;
	if (ll_dverr2 == 10) {
		ll_dverr2 = 0;
		return false;
	} else {
		if (ll_dverr2 != ll_Die)
			return false;
		else
			return true;
	}
}
function validaTercero6(identificacionSeis) {
	lv_identificacion_seis = identificacionSeis;
	ll_Uno = Number(lv_identificacion_seis.substring(0, 1));
	ll_Dos = Number(lv_identificacion_seis.substring(1, 2));
	ll_Tre = Number(lv_identificacion_seis.substring(2, 3));
	ll_Cua = Number(lv_identificacion_seis.substring(3, 4));
	ll_Cin = Number(lv_identificacion_seis.substring(4, 5));
	ll_Sei = Number(lv_identificacion_seis.substring(5, 6));
	ll_Sie = Number(lv_identificacion_seis.substring(6, 7));
	ll_Och = Number(lv_identificacion_seis.substring(7, 8));
	ll_Nue = Number(lv_identificacion_seis.substring(8, 9));
	ll_sum =
		ll_Uno * 3
			+ ll_Dos * 2
			+ ll_Tre * 7
			+ ll_Cua * 6
			+ ll_Cin * 5
			+ ll_Sei * 4
			+ ll_Sie * 3
			+ ll_Och * 2;
	while (ll_sum > 11) {
		ll_sum -= 11;
	}
	ll_dverr2 = 11 - ll_sum;
	if (ll_dverr2 == 10) {
		ll_dverr2 = 0;
		return false;
	} else {
		if (ll_dverr2 != ll_Nue)
			return false;
		else
			return true;
	}
}
//FIN***************************************VALIDACIONES SRI 31/05/2007 LFREIRE ***********************
function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}
function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}
function daysInFebruary (year){
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysMonth(month, year) {
    var days = '';
    switch (month.toString()){
        case '2':
            days = daysInFebruary(year);
            break;
        case '4':
        case '6':
        case '9':
        case '11':
            days = 30;
            break;
        default :
            days = 31;
    }
    return days;
}
function isDate(Fecha, Formato){
    if(Formato == 'dd/mm/yyyy'){
	   var pos1=2
	   var pos2=5
	}
    var dtStr=Fecha.value
	var dtChr1=dtStr.charAt(pos1)
	var dtChr2=dtStr.charAt(pos2)
    var strDay=dtStr.substring(0,pos1)
    var strMonth=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
    if  ( (dtChr1 != '-' && dtChr1 != '/' ) || (dtChr2 != '-' && dtChr2 != '/' ) ){
	    return false
	}
    if  ( dtChr1 != dtChr2  ){
 	   return false
	}
	//
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		return false
	}
 	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || day>DaysMonth(month, year)){
		return false
	}
	// no entiendo
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		return false
	}
    return true
}
/*
	Copyright 2003 JavaScript-coder.com. All rights reserved.
*/