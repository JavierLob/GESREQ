// JavaScript Document
function aceptar()
{
	var f=document.form_registro;
	if(validar()){
		f.txtfechanac.disabled=false;
		return true;
	}
	else{
		return false;
	}
}
function solo_letras(txtpnombre){
	var checkOK = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnñÑOoPpQqRrSsTtUuVvWwXxYyZzáéíóúÁÉÍÓÚ";
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
		var f=document.form_registro;
		var filter=/^[A-Za-z][A-Za-z0-9_.-]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;
		bueno=false;
		if(f.txtcedula.value==""){
			alert("ERROR EN EL REGISTRO: Nro. de cédula vacio, debe introducir un nro. de cedula.");
			f.txtcedula.focus();
			return false;
		}
		else if(f.txtpnombre.value==""){
			alert("ERROR EN EL REGISTRO: Primer nombre vacio, debe introducir el primer nombre.");
			f.txtpnombre.focus();
			return false
		}
		else if(f.txtpapellido.value=="") {
			alert("ERROR EN EL REGISTRO: Primer apellido vacio, debe introducir el primer apellido.");
			f.txtpapellido.focus();
			return false;
		}
		else if(f.txtfechanac.value=="") {
			alert("ERROR EN EL REGISTRO: Fecha de Nacimiento vacia, debe introducir la fecha de nacimiento.");
			f.txtfechanac.focus();
			return false;
		}
		else if(f.txtcorreouno.value==""){
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
		  else if (!valida_cedula(f.txtcedula)) 
		  { 
			alert("ERROR EN EL REGISTRO: Nro. de cédula incorrecto, no se permiten letras ni espacios en blanco."); 
			f.txtcedula.value=''; 	
			f.txtcedula.focus();
			return false; 	
		  }
		  /*------------------------------------------------
		* 	VALIDA QUE SE INGRESEN SOLO LETRAS AL NOMBRE
		* ------------------------------------------------*/
		
		 else  if (!solo_letras(f.txtpnombre)) 
		  { 
			alert("ERROR EN EL REGISTRO: Primer nombre incorrecto, no están permitidos números, caracteres especiales ni espacios en blanco."); 
			f.txtpnombre.focus();
			return false; 	
		  }
		  
		  /*------------------------------------------------
		* 	VALIDA QUE SE INGRESEN SOLO LETRAS AL NOMBRE
		* ------------------------------------------------*/
		
		  else if (!solo_letras(f.txtsnombre)) 
		  { 
			alert("ERROR EN EL REGISTRO: Segundo nombre incorrecto, no están permitidos números, caracteres especiales ni espacios en blanco."); 
			f.txtsnombre.focus();
			return false; 	
		  }
		  
	   /*---------------------------------------------------
		* 	VALIDA QUE SE INGRESEN SOLO LETRAS AL APELLIDO
		* --------------------------------------------------*/
		
		 else  if (!solo_letras(f.txtpapellido)) 
		  { 
			alert("ERROR EN EL REGISTRO: Primer apellido incorrecto, no están permitidos números, caracteres especiales ni espacios en blanco."); 
			f.txtpapellido.focus();
			return false; 	
		  }
		  
		 /*---------------------------------------------------
		* 	VALIDA QUE SE INGRESEN SOLO LETRAS AL APELLIDO
		* --------------------------------------------------*/
		
		  else if (!solo_letras(f.txtsapellido)) 
		  { 
			alert("ERROR EN EL REGISTRO: Segundo apellido incorrecto, no están permitidos números, caracteres especiales ni espacios en blanco."); 
			f.txtsapellido.focus();
			return false; 	
		  }
		   else if (!filter.test(f.txtcorreouno.value))
		   {	
				alert("ERROR EN EL REGISTRO: email principal incorrecto, por favor introduzca una dirección de correo valida.");
				f.txtcorreouno.focus();
				return false;
		   }
		   else if ((f.txtcorreodos.value.length>1)&&(!filter.test(f.txtcorreodos.value)))
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
		  else if (!valida_cedula(f.txttelefonodos)) 
		  { 
			alert("ERROR EN EL REGISTRO: Teléfono secundario incorrecto, no están permitidas letras, caracteres especiales ni espacios en blanco."); 
			f.txttelefonodos.focus(); 	
			return false;
		  }
		  else if ((f.txttelefonouno.value.length < 7)&&(f.txttelefonouno.value.length>1))
		  {
			alert("ERROR EN EL REGISTRO: Teléfono principal debe tener 11 dígitos.");
			f.txttelefonouno.focus();
			return false;
		  }
	
		/*---------------------------------------------------
		* 	VALIDA EL USUARIO INGRESE EL NÚMERO DE CELULAR
		* --------------------------------------------------*/
		
			else if ((f.txttelefonodos.value.length < 7)&&(f.txttelefonodos.value.length >=1))
			{
				alert("ERROR EN EL REGISTRO: Teléfono alternativo debe tener 11 dígitos.");
				f.txttelefonodos.focus();
				return false;
			}
			
			else if (f.txtinstitucion.value=="")
			{
				alert("ERROR EN EL REGISTRO: Debe seleccionar una institución.");
				f.txtinstitucion.focus();
				return false;
			}
			else if (f.txtcampus.value=="")
			{
				alert("ERROR EN EL REGISTRO: Debe seleccionar un campus para la institución.");
				f.txtcampus.focus();
				return false;
			}
			else if (f.txtprograma.value=="")
			{
				alert("ERROR EN EL REGISTRO: Debe seleccionar un programa.");
				f.txtprograma.focus();
				return false;
			}
			
		
		/*---------------------------------------------------
		* 			VENTANA DE CONFIRMACIÓN
		* --------------------------------------------------*/
		
		   else 
		   {
			   bueno=true;
		   }
		  
		   return bueno;
	   }