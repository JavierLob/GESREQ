function aceptar()
{
	var f=document.form_cambio_pass;
	if(validar()){
		f.submit();
	}
}

function validausuario(txtpnombre){
	var checkOK = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnñÑOoPpQqRrSsTtUuVvWwXxYyZz1234567890.";
		  var allValid = true; 
		  for (i = 0; i < txtpnombre.value.length; i++)
		   {
			ch = txtpnombre.value.charAt(i); 
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

function validapassword(p){
		  var checkOK = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnñÑOoPpQqRrSsTtUuVvWwXxYyZz1234567890.;:/%*";
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
	var f=document.form_cambio_pass;
	bueno=false;
	if((f.contrasena.value=="")||(f.contrasena_n.value=="")||(f.contrasena_n2.value=="")){
		alert("ERROR EN LA ACTUALIZACIÓN: Debe introducir todos los datos para realizar la operación.");
		f.contrasena.focus();
	}
	else if((f.contrasena.value.length<10)||(f.contrasena.value.length>15)){
		alert("ERROR EN LA ACTUALIZACIÓN: Debe introducir su clave valida actual.");
		f.contrasena.focus();
	}
	else if((f.contrasena_n.value.length<10)||(f.contrasena_n.value.length>15)){
		alert("ERROR EN LA ACTUALIZACIÓN: Debe introducir una nueva clave valida.");
		f.contrasena.focus();
	}
	else  if (!validapassword(f.contrasena)){
		alert("ERROR EN LA ACTUALIZACIÓN: Debe introducir su clave valida actual.")
		f.contrasena.focus();
	}
	else  if (!validapassword(f.contrasena_n)){
		alert("ERROR EN LA ACTUALIZACIÓN: Debe introducir una nueva clave valida.")
		f.contrasena_n.focus();
	}
	else  if (f.contrasena_n.value!=f.contrasena_n2.value){
		alert("ERROR EN LA ACTUALIZACIÓN: su nueva clave no coincide.")
		f.contrasena_n.focus();
	}
	else{
		bueno=true;
	}
	return bueno;
}