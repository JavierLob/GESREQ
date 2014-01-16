function aceptar()
{
	var f=document.form_confirmacion;
	if(validar()){
		f.txtcedula.disabled=false;
		f.submit();
	}
}

function validarespuesta(p){
		  var checkOK = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnñÑOoPpQqRrSsTtUuVvWwXxYyZz1234567890.;:/%#*?¿() ";
		  var allValid = true; 
		  for (i = 0; i < p.value.length; i++)
		   {
			ch = p.value.charAt(i); 
			for (j = 0; j < checkOK.length; j++)
			  if (ch == checkOK.charAt(j))
				break;
			if (j == checkOK.length) { 
			  allValid = false;
			  return allValid;			  
			  break; 
			}
		  }
	return allValid;
}

function validar()
{
	var f=document.form_confirmacion;
	bueno=false;
	if(f.txtppregunta.value==""){
		alert("ERROR EN LA ACTIVACIÓN: Primera pregunta de seguridad vacia, debe introducir pregunta de seguridad.");
		f.txtppregunta.focus();
	}
	else if(f.txtprespuesta.value==""){
		alert("ERROR EN LA ACTIVACIÓN: Primera respuesta de seguridad vacia, debe introducir respuesta de seguridad.");
		f.txtprespuesta.focus();
	}
	else if(f.txtspregunta.value==""){
		alert("ERROR EN LA ACTIVACIÓN: Segunda pregunta de seguridad vacia, debe introducir pregunta de seguridad.");
		f.txtspregunta.focus();
	}
	else if(f.txtsrespuesta.value==""){
		alert("ERROR EN LA ACTIVACIÓN: Segunda respuesta de seguridad vacia, debe introducir respuesta de seguridad.");
		f.txtsrespuesta.focus();
	}
	else if(f.txtppregunta.value.length<12){
		alert("ERROR EN LA ACTIVACIÓN: Primera pregunta de seguridad incorrecta, debe introducir pregunta de seguridad mayor a 12 caracteres.");
		f.txtppregunta.focus();
	}
	else if(f.txtprespuesta.value.length<12){
		alert("ERROR EN LA ACTIVACIÓN: Primera respuesta de seguridad incorrecta, debe introducir respuesta de seguridad mayor a 12 caracteres.");
		f.txtprespuesta.focus();
	}
	else if(f.txtspregunta.value.length<12){
		alert("ERROR EN LA ACTIVACIÓN: Segunda pregunta de seguridad incorrecta, debe introducir pregunta de seguridad mayor a 12 caracteres.");
		f.txtspregunta.focus();
	}
	else if(f.txtsrespuesta.value.length<12){
		alert("ERROR EN LA ACTIVACIÓN: Segunda respuesta de seguridad incorrecta, debe introducir respuesta de seguridad mayor a 12 caracteres.");
		f.txtsrespuesta.focus();
	}
	else if(f.txtprespuesta.value != f.txtcprespuesta.value){
		alert("ERROR EN LA ACTIVACIÓN: Primera respuesta no coincide con la confirmación de la primera respuesta, por favor verifique e intente nuevamente.");
		f.txtcprespuesta.focus();
	}
	else if(f.txtsrespuesta.value != f.txtcsrespuesta.value){
		alert("ERROR EN LA ACTIVACIÓN: Segunda respuesta no coincide con la confirmación de la segunda respuesta, por favor verifique e intente nuevamente.");
		f.txtcsrespuesta.focus();
	}
	else  if (!validarespuesta(f.txtprespuesta)){
		alert("ERROR EN LA ACTIVACIÓN: Primera respuesta incorrecta, debe ingresar una respuesta valida.")
		f.txtprespuesta.focus();
	}
	else  if (!validarespuesta(f.txtsrespuesta)){
		alert("ERROR EN LA ACTIVACIÓN: Segunda respuesta incorrecta, debe ingresar una respuesta valida.")
		f.txtprespuesta.focus();
	}
	else  if (!validarespuesta(f.txtppregunta)){
		alert("ERROR EN LA ACTIVACIÓN: Primera pregunta incorrecta, debe ingresar una pregunta valida.")
		f.txtppregunta.focus();
	}
	else  if (!validarespuesta(f.txtspregunta)){
		alert("ERROR EN LA ACTIVACIÓN: Segunda pregunta incorrecta, debe ingresar una pregunta valida.")
		f.txtspregunta.focus();
	}
	else if(f.txtppregunta.value == f.txtspregunta.value){
		alert("ERROR EN LA ACTIVACIÓN: Debe ingresar preguntas distintas.");
		f.txtppregunta.focus();
	}
	else if(f.txtprespuesta.value == f.txtsrespuesta.value){
		alert("ERROR EN LA ACTIVACIÓN: Debe ingresar respuestas  distintas.");
		f.txtppregunta.focus();
	}
	else{
		bueno=true;
	}
	return bueno;
}