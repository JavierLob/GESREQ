function aceptar()
{
	var f=document.form_modificar_registro;
	if(validar()){
		f.txtfechanac.disabled=false;
		f.operacion.value="m";
		return true;
	}
	else
	{
		return false;
	}
}
function solo_letras(txtpnombre){
	var checkOK = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnñÑOoPpQqRrSsTtUuVvWwXxYyZz";
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

function valida_cedula(p){
		  var checkOK = "1234567890";
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

function valida_fecha(t){
	var checkOK = "1234567890/";
		   var allValid = true; 
		    for (i = 0; i < t.value.length; i++)
		    {
			 ch = t.value.charAt(i); 
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
		var f=document.form_modificar_registro;
		var filter=/^[A-Za-z][A-Za-z0-9_.]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;
		bueno=false;
		if(f.txtcorreouno.value==""){
			alert("ERROR EN EL REGISTRO: email principal vacio, debe introducir el correo electrónico.");
			f.txtcorreouno.focus();
			return false;
		}
		else if(f.txttelefonouno.value==""){
			alert("ERROR EN EL REGISTRO: Telefono principal vacio, debe introducir el número telefónico principal .");
			f.txttelefonouno.focus();
			return false;
		}
		else if(f.txtdireccion.value==""){
			alert("ERROR EN EL REGISTRO: Direccion vacia, debe introducir una dirección.");
			f.txtdireccion.focus();
			return false;
		}
		   
		/*-------------------------------------------------------
		* VALIDA QUE SE INGRESEN SOLO NÚMEROS AL CAMPO CEDULA
		* --------------------------------------------------------*/
		   else if (!filter.test(f.txtcorreouno.value))
		   {	
				alert("ERROR EN EL REGISTRO: email principal incorrecto, por favor introduzca una dirección de correo valida.");
				f.txtcorreouno.focus();
				return false;
		   }
		    else if ((f.txtcorreodos.value.length!="")&&(!filter.test(f.txtcorreodos.value)))
		   {	
				alert("ERROR EN EL REGISTRO: email alternativo incorrecto, por favor introduzca una dirección de correo valida.");
				f.txtcorreodos.focus();
				return false;
		   }
		  else if (!valida_cedula(f.txttelefonouno)) 
		  { 
			alert("ERROR EN EL REGISTRO: Teléfono principal incorrecto, no están permitidas letras, caracteres especiales ni espacios en blanco."); 
			f.txttelefonouno.focus();
			return false; 	
		  }
		  else if ((f.txttelefonouno.value.length < 11)||(f.txttelefonouno.value.length<11))
		  {
			alert("ERROR EN EL REGISTRO: Teléfono principal debe tener 11 dígitos.");
			f.txttelefonouno.focus();
			return false;
		  }
			else if (f.txttelefonodos.value!="")
		  { 
		  	if(!valida_cedula(f.txttelefonodos))
			{
				alert("ERROR EN EL REGISTRO: Teléfono secundario incorrecto, no están permitidas letras, caracteres especiales ni espacios en blanco."); 
				f.txttelefonodos.focus();
				return false; 	
			}
			else if (f.txttelefonodos.value.length<11)
		  	{ 
				alert("ERROR EN EL REGISTRO: Teléfono secundario incorrecto, no están permitidas letras, caracteres especiales ni espacios en blanco."); 
				f.txttelefonodos.focus();
				return false; 	
		  	}
		  	else 
		   {
			   bueno=true;
		   }
		  }
		   else 
		   {
			   bueno=true;
		   }
		  
		   return bueno;
	   }
	   
function cancelar() {
	location.href="./";
}