// JavaScript Document
function validar_numero(myfield, e, dec)   //nombre de la funcion.....
{
	var key;
	var keychar;
    if (window.event)
    {
    	key = window.event.keyCode;
    }
    else if (e)
    {
   	 	key = e.which;
    }
    else
    {
   	 	return true;
    }
   	keychar = String.fromCharCode(key);
   
    //esto es para permitir las teclas de control como BORRAR(8) entre otras
    if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
    {
    	return true;
    }                 //donde estan los numeros pueden colocar todos los caracteres
                           // que quieres aceptar por ejemplo: abcd...xyzABCD...XYZ
    else if ((("0123456789.").indexOf(keychar) > -1))
    {
    	return true;
    }                 //no se exactamente para que es pero bueno... xD
	
    else if (dec && (keychar == "."))// decimal point jump
    {
    	myfield.form.elements[dec].focus();
    	return false;
    }
    else
    {               //advertencia que da cuando se intenta ingresar un acracter no permitido
    	alert('Solo puede ingresar numeros, para los decimales ingrese un punto "."');
    	return false;
    }
}

/*function validar_fecha(myfield, e, dec)   //nombre de la funcion.....
{
	var key;
	var keychar;
    if (window.event)
    {
    	key = window.event.keyCode;
    }
    else if (e)
    {
   	 	key = e.which;
    }
    else
    {
   	 	return true;
    }
   	keychar = String.fromCharCode(key);
   
    //esto es para permitir las teclas de control como BORRAR(8) entre otras
    if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
    {
    	return true;
    }                 //donde estan los numeros pueden colocar todos los caracteres
                           // que quieres aceptar por ejemplo: abcd...xyzABCD...XYZ
    else if ((("0123456789/").indexOf(keychar) > -1))
    {
    	return true;
    }                 //no se exactamente para que es pero bueno... xD
	
    else if (dec && (keychar == "."))// decimal point jump
    {
    	myfield.form.elements[dec].focus();
    	return false;
    }
    else
    {               //advertencia que da cuando se intenta ingresar un acracter no permitido
    	alert('Para cambiar la fecha debe hacer click en el boton (...). ');
    	return false;
    }
}
*/
function validar_nombre(myfield, e, dec)   //nombre de la funcion.....
{
	var key;
	var keychar;
    if (window.event)
    {
    	key = window.event.keyCode;
    }
    else if (e)
    {
   	 	key = e.which;
    }
    else
    {
   	 	return true;
    }
   	keychar = String.fromCharCode(key);
   
    //esto es para permitir las teclas de control como BORRAR(8) entre otras
    if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
    {
    	return true;
    }                 //donde estan los numeros pueden colocar todos los caracteres
                           // que quieres aceptar por ejemplo: abcd...xyzABCD...XYZ
    else if ((("0123456789AaBbCcDdEeFfGgHhIiJjKkLlMmNnñÑOoPpQqRrSsTtUuVvWwXxYyZz ").indexOf(keychar) > -1))
    {
    	return true;
    }                 //no se exactamente para que es pero bueno... xD
	
    else if (dec && (keychar == "."))// decimal point jump
    {
    	myfield.form.elements[dec].focus();
    	return false;
    }
    else
    {               //advertencia que da cuando se intenta ingresar un acracter no permitido
    	alert('Solo puede ingresar letras y numeros. ');
    	return false;
    }
}

function validar_decimal(e)
{

	var tiene;
	tiene=0;
	for(i=0; i	<	e.value.length; i++)
	{
		valor = e.value.charAt(i);
		if(valor==".")
		{
			tiene++;
		}
	}
	
	if(tiene>1)
	{
		alert('Debe introducir un valor decimal valido');
		e.value=0;
		e.focus();
	}
	
	//l=totalizar();
}

function totalizar()
{
	formulario = document.form_configurar_evaluacion;
	var p	=  document.form_configurar_evaluacion.elements['peso[]'];
	valor= 0;
	if(p.length>1)
	{
		fin = p.length;
	
	}else
	{
		fin=1;	
	}
	for(i=0;  i 	<fin; i++)
	{
		if(p[i].value=="")
		{
			n=0;
		}
		else
		{
			n=parseFloat(p[i].value);
		}
		if((p[i].value>30) || (p[i].value<0))
		{
			alert('No puede ingresar una puntuación mayor a 30 y menor a 0');
			n=0;
			p[i].value=n;
		}
		valor = parseFloat(valor)+parseFloat(n);
	}
	
	formulario.total.value = valor;
	//var total	= parseFloat(formulario.total.value);
	if(valor>100)
	{
		alert('Debe configurar en base a 100 ptos');
		return false;
	}
	else if(valor<100)
	{
		alert('Debe configurar en base a 100 ptos');
		return false;
	}
	else if(valor==100)
	{
		return true;
	}
	
}

function validar_fechas()
{
	bueno=true;
	formulario = document.form_configurar_evaluacion;
	var f	=  document.form_configurar_evaluacion.elements['fecha[]'];
	for(i=0;  i 	<f.length; i++)
	{
		long=f[i].value.length;
		if(long!=10)
		{
			alert('Debe introducir fechas validas');
			f[i].focus();
			bueno=false;
			break
		}
	}
	return bueno;
}

function validar_sesion()
{
	bueno=true;
	formulario = document.form_configurar_evaluacion;
	var s	=  document.form_configurar_evaluacion.elements['sesion[]'];
	for(i=0; i<s.length; i++)
	{		
		for(j=0; j<s.length; j++)
		{
			if((s[i].value==s[j].value)&&(i!=j))
			{
				//alert(s[i].value);
				alert('Debe elegir sesiones diferentes para cada evaluacion.');
				s[i].focus();
				bueno=false;
				break;
			}

		}
		if(!bueno)
			break;
	}
	return bueno;
}

function solo_letras(txtpnombre){
	var checkOK = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnñÑOoPpQqRrSsTtUuVvWwXxYyZz1234567890";
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

function validar_nombres()
{
	bueno=true;
	formulario = document.form_configurar_evaluacion;
	var n	=  document.form_configurar_evaluacion.elements['nombreeva[]'];
	for(i=0;  i <n.length; i++)
	{
		name = n[i].value;
		if((name=="") || (!solo_letras(n[i])))
		{
			alert('Debe introducir un nombre valido');
			n[i].focus();
			bueno=false;
			break;
		}
	}
	return bueno;
}

function agregar()
{
	if(validar_agregar())
	{

		var valornombre 	= document.getElementById("nombre").value;
		var valortipo 		= document.getElementById("tipo").value;
		var valormodalidad 	= document.getElementById("modalidad").value;
		var valorsesion 	= document.getElementById("sesion").value;
		var valorpeso	 	= document.getElementById("peso").value;
		var selectortipo 	= document.getElementById("tipo");
		var indicetipo	 	= selectortipo.selectedIndex;
		var posiciontipo 	= selectortipo.options[indicetipo].id;
		var selectormodalidad 	= document.getElementById("modalidad");
		var indicemodalidad 	= selectormodalidad.selectedIndex;
		var posicionmodalidad	= selectormodalidad.options[indicemodalidad].id;
		var selectorsesion 	= document.getElementById("sesion");
		var indicesesion 	= selectorsesion.selectedIndex;
		var posicionsesion	= selectorsesion.options[indicesesion].id;


		miTabla = document.getElementById('table'); 
		fila   = document.createElement('tr'); 
		celda1 = document.createElement('td');
		celda2 = document.createElement('td');
		celda3 = document.createElement('td');
		celda4 = document.createElement('td');
		celda5 = document.createElement('td');
		celda1.innerHTML = '<input name="nombreeva[]" class="text22" value="'+valornombre+'" type="text" size="9">';
		celda2.innerHTML = '<select class="text22" style="width:220px;" name="tipoeva[]"><option value="'+valortipo+'">'+posiciontipo+'</option></select>';
		celda3.innerHTML = '<select class="text22" style="width:210px;" name="modalidad[]"><option value="'+valormodalidad+'">'+posicionmodalidad+'</option></select>';
		celda4.innerHTML = '<select class="text22" style="width:55px;" name="sesion[]"><option value="'+valorsesion+'">'+posicionsesion+'</option></select>';
		celda5.innerHTML = '<select class="text22" style="width:55px;" name="peso[]"><option value="'+valorpeso+'">'+valorpeso+'</option></select><a class="myButton_rojo"  name="btnaceptaar" id="btnaceptara" style="padding:4px 6px"   onclick="remover(this)" ><i class="icon-remove icon-white"></i></a>';

	
		fila.appendChild(celda1);
		fila.appendChild(celda2);
		fila.appendChild(celda3);
		fila.appendChild(celda4);
		fila.appendChild(celda5);
		miTabla.appendChild(fila);
		
		totalizar();
	}
}

function remover(t)
 {
	 var p	=  document.form_configurar_evaluacion.elements['peso[]'];
	 if(p.length>4)
	 {
		var td = t.parentNode;
        var tr = td.parentNode;
        var table = tr.parentNode;
        table.removeChild(tr);
		totalizar();
	
	 }
	 else
	 {
		 alert('No se puede tener menos de 4 evaluaciones');
     }
 }
 
 function aceptar()
 {
	 formulario = document.form_configurar_evaluacion;
	 if((totalizar())&&(validar_sesion()))
	 { 
	 	return true;
		 //formulario.submit();
	 }
	 else
	 {
	 	return false;
	 }
 }
 
 function validar_agregar()
 {
	 bueno = false;
	 formulario = document.form_configurar_evaluacion;
	 
	 if(document.getElementById("nombre").value=="")
	 {
		 alert('Debe ingresar un nombre de evaluación valido');
		 formulario.nombre.focus();
	 }
	 /*else if(document.getElementById("f_dat_agregar").value=="")
	 {
		 alert('Debe ingresar una fecha valida para la evaluación');
		 formulario.agregar_fecha.focus();
	 }*/
	 else
	 {
		 bueno = true;
	 }
	 return bueno;
 }
 
 function validar_nota(nota, puntaje)
 {
	 if(nota.value>puntaje)
	 {
		 alert('Debe ingresar solo notas dentro del puntaje permitido');
		 nota.value=0;
		 nota.focus();
	 }
	 else if(nota.value<0)
	 {
		 alert('Debe ingresar solo notas dentro del puntaje permitido');
		 nota.value=0;
		 nota.focus();
	 }
 }
 
 function validar_minimo(nota)
 {
	 if(nota.value=="")
	 {
		 nota.value=0;
	 }
 }