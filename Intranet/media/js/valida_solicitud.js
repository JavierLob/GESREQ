function aceptar()
{
	var f=document.form_solicitud;
	if(validar()){
		f.operacion.value="aceptar";
		f.submit();
	}
}

function rechazar()
{
	var f=document.form_solicitud;
	f.operacion.value="rechazar";
	f.submit();
}

function validar()
{
	var f=document.form_solicitud;
	bueno=false;
	if((f.username.value=="")||(f.password.value=="")){
		alert("ERROR EN EL REGISTRO: (Debe introducir usuario y contraseña para aceptar).");
		f.username.focus();
	}
	else{
		bueno=true;
	}
	return bueno;
}

function cancelar() {
	location.href="./";
}
