function aceptar()
{
	var f=document.form_acceso;
	if(validar()){
		return true;
	}
	else{
		return false;
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
		  var checkOK = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnñÑOoPpQqRrSsTtUuVvWwXxYyZz1234567890.;:/%#*";
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
	var f=document.form_acceso;
	bueno=false;
	if((f.username.value=="")||(f.password.value=="")){
		alert("ERROR EN EL ACCESO: Debe introducir usuario y contraseña para acceder.");
		f.username.focus();
		return false;
	}
	else if((f.username.value.length<3)||(f.username.value.length>30)){
		alert("ERROR EN EL ACCESO: Debe introducir un usuario valido.");
		f.username.focus();
		return false;
	}
	else if((f.password.value.length<8)||(f.password.value.length>15)){
		alert("ERROR EN EL ACCESO: Debe introducir una contraseña valida.");
		f.password.focus();
		return false;
	}
	else  if (!validausuario(f.username)){
		alert("ERROR EN EL ACCESO: Debe introducir un usuario valido.")
		f.username.focus();
		return false;
	}
	else  if (!validapassword(f.password)){
		alert("ERROR EN EL ACCESO: Debe introducir una contraseña valido.")
		f.password.focus();
		return false;
	}
	else{
		bueno=true;
	}
	return bueno;
}