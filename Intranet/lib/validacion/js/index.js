//Plugin Creado Por Leonardo J Melendez S. (lemez) 2012.
//Validación lemez version 1.0
//Nota: les recuerdo que validen del lado del servidor.
//Ejemplo de Uso: $("id_del_campo").lemez_aceptar("tipo_de_validacion","campo_obligatorio");
$(function(){
$("#campo1").lemez_aceptar("texto","no"); //Solo Acepta Texto y No es un Campo Obligatorio.
$("#campo2").lemez_aceptar("numero","si"); //Solo Acepta Numeros y Si es un Campo Obligatorio.
$("#campo3").lemez_aceptar("correo","si"); //Solo Acepta un correo electronico valido y Si es un Campo Obligatorio.
$("#campo4").lemez_aceptar("todo","no"); //Solo Acepta de todo  No es un Campo Obligatorio.
$("#campo5").lemez_aceptar(/^(0[1-9]|1\d|2[0-3]):([0-5]\d):([0-5]\d)$/,"no"); //Aqui se usa directamente una expresion regular (se valida una hora en este formato 10:05:10) y No es un Campo Obligatorio.
$("#campo6").lemez_aceptar("texto_especial","no"); //Solo Acepta Texto comas(,) y puntos (.) y No es un Campo Obligatorio.
$("#campo7").lemez_aceptar("texto_numero","no"); //Solo se acepta Texto y Numeros y No es un Campo Obligatorio.
$("#campo8").lemez_aceptar("numero_especial","no"); //Solo se aceptay Numeros con puntos(.) y comas(,) y No es un Campo Obligatorio.
});


