// JavaScript Document

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


function agregar()
{
	if(validar_agregar())
	{
		var valornombre 	= document.getElementById("nombre").value;
		var valortipo 		= document.getElementById("tipo").value;
		var valormodalidad 	= document.getElementById("modalidad").value;
		var valorfecha	    = document.getElementById("f_dat_agregar").value;
		var valorpeso	 	= document.getElementById("peso").value;
		var selectortipo 	= document.getElementById("tipo");
		var indicetipo	 	= selectortipo.selectedIndex;
		var posiciontipo 	= selectortipo.options[indicetipo].id;
		var selectormodalidad 	= document.getElementById("modalidad");
		var indicemodalidad 	= selectormodalidad.selectedIndex;
		var posicionmodalidad	= selectormodalidad.options[indicemodalidad].id;
		
		miTabla = document.getElementById('table'); 
		fila   = document.createElement('tr'); 
		celda1 = document.createElement('td');
		celda2 = document.createElement('td');
		celda3 = document.createElement('td');
		celda4 = document.createElement('td');
		celda5 = document.createElement('td');
		celda1.innerHTML = '<input name="nombreeva[]" class="text22" value="'+valornombre+'" type="text" size="9">';
		celda2.innerHTML = '<select class="text22" name="tipoeva[]"><option value="'+valortipo+'">'+posiciontipo+'</option></select>';
		celda3.innerHTML = '<select class="text22" name="modalidad[]"><option value="'+valormodalidad+'">'+posicionmodalidad+'</option></select>';
		celda4.innerHTML = '<input class="text22" type="text" name="fecha[]" value="'+valorfecha+'" size="7" onkeypress="return validar_fecha(this, event)">';
		celda5.innerHTML = '<input class="text22" type="text" name="peso[]" size="2" value="'+valorpeso+'" onblur="validar_decimal(this); " onkeypress="return validar_numero(this, event)"><a class="myButton_rojo"  name="btnaceptaar" id="btnaceptara"   onclick="remover(this)" >Quitar</a>';
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
	 if(totalizar())
	 { 
		 formulario.submit();
	 }
 }
 
 

 