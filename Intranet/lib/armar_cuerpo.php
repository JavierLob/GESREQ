<?php	
	include_once('../lib/menu.php');
	include_once('../lib/mensaje.php');
	include_once('../lib/notificacion.php');
	include_once('../lib/tarea.php');

	$Datos_Usuario	=array(	'NOMBRE'=>$_SESSION['nombreusuario'].' '.$_SESSION['nombredosusuario'],
								'USUARIO'		=>$_SESSION['idusuario'],
								'Fecha'			=>date("d/m/Y",time()-1740),
								'FOTO'			=>$lcFoto_Usuario,
								'MENU_LATERAL'			=>$MENU_LATERAL,
								'MENSAJES'			=>$MENSAJES,
								'NOTIFICACIONES'			=>$NOTIFICACIONES,
								'NRO_MENSAJES'			=>$NRO_MENSAJES,
								'NRO_NOTIFICACIONES'			=>$NRO_NOTIFICACIONES,
								'NRO_TAREAS'			=>$NRO_TAREAS,
								'TAREAS'			=>$TAREAS
								);		
	$Vista_Template = file_get_contents(VISTA.'/index.html');
	$Vista_Template = $lobjUtil->ActualizarDatosHtml($Vista_Template, $Datos_Usuario);
?>