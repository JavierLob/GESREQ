function aceptar()
{
	var f=document.form_recupera
	if(validar()){
		return true;
	}
	else{
		return false;
	}
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

function validar()
{
	var f=document.form_recupera;
	var filter=/^[A-Za-z][A-Za-z0-9_.]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;
	bueno=false;
	if(f.cedula.value==""){
			alert("ERROR EN LA RECUPERACIÓN: Nro. de cedula vacio, debe introducir un nro. de cedula.");
			f.cedula.focus();
			return false;
		}
	else if (!valida_cedula(f.cedula)) 
		  { 
			alert("ERROR EN LA RECUPERACIÓN: Nro. de cedula incorrecto, no se permiten letras ni espacios en blanco."); 
			f.cedula.value=''; 	
			f.cedula.focus(); 	
			return false;
		  }
	else if (!filter.test(f.email.value))
		   {	
				alert("ERROR EN LA RECUPERACIÓN: correo electronico incorrecto, por favor introduzca una dirección de correo valida.");
				f.email.focus();
				return false;
		   }
	else{
		bueno=true;
	}
	return bueno;
}
