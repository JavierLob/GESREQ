<?php

		ini_set('display_errors', 0); //Desactiva los mensajes de error.
			
			session_start();		//Inicia Sesion
		if(array_key_exists(session,$_SESSION))	//Validaciones para saber si tiene una sesion abierta
		   {
			   header("location: ../app");
		   }

	header("location: login/");		//Envia al Menu principal de la sesion de la administracion
?>
