<?php	
 		/*----------------------------------------------------------
		 * 		PROYECTO: 	AUL@FRONTINO
		 * 		AUTORES:
		 * 			-Amilcar Morales
		 * 			-Angelica Rosendo
		 * 			-Karelys Hernandez
		 * 			-Maria Vargas
		 * 			-Javier Martin
		 * 		INSTITUCION: UPTP-JJ MONTILLA
		 * --------------------------------------------------------*/
		 
	$lcUltima_Fecha	=	$lobjUtil->format_fecha($_SESSION["ultimafecha"]);
	$lcUltima_Hora	=	$lobjUtil->format_hora($_SESSION["ultimahora"]);
	$lobjUsuario->set_Usuario($_SESSION['idusuario']);
	$lobjUsuario->set_Cedula($_SESSION['cedulausu']);
	$lobjUsuario->Password_Moodle();
	$PASSWORD	= $lobjUsuario->get_Password_Moodle();
	$llFotousu=$lobjUsuario->Validar_Foto();
	require_once("../class/notificacion.class.php");
	$lobjNotificacion		= new clsNotificacion();
	$cantidad=$lobjNotificacion->totalNotificaciones($_SESSION['cedulausu']);
	$listadoNotificaciones=$lobjNotificacion->listadoNotificacion($_SESSION['cedulausu']);

	for($i=0;$i<count($listadoNotificaciones);$i++)
	{
		$NOTIFICACION.='<li>';
	    $NOTIFICACION.='<a href="../notificacion/?q=consultar_notificacion&idnotificacion='.$lobjUtil->serializarIDsia($listadoNotificaciones[$i][0]).'">';
	    $NOTIFICACION.='<i class="icon-plus"></i>';
	    $NOTIFICACION.=$listadoNotificaciones[$i][2].' , '.$listadoNotificaciones[$i][1];
	    $NOTIFICACION.='<span class="time"> '.$listadoNotificaciones[$i][3].'</span>';
	    $NOTIFICACION.='</a>';
	    $NOTIFICACION.='</li>';
    }

    if($i==0)
    {    	
    	$btn='btn_gris';
    	$nav='nav-link';
    	$caret='caret';
    	$NOTIFICACION.='<li  style="text-align: center;"><a href="#">No tiene notificaciones nuevas.</a><a href="../notificacion/" class="link">Ver notificaciones anteriores</a></li>';
    }
    else
    {
    	$btn='btn_gris2';
    	$nav='nav-link2';
    	$caret='caret2';
    	$NOTIFICACION.='<li  style="text-align: center;"><a href="../notificacion/">Ver todas las notificaciones <i class="icon-double-angle-right"></i></a></li>';
    }

	include_once('../lib/menu.php');
	
	if($llFotousu)
	{
       $lcFoto_Usuario= '<img src="../media/img/foto/'.$_SESSION["idusuario"].'.jpg">';
    }
	else if($_SESSION["sexo"]=="M") 
	{
		$lcFoto_Usuario= '<img src="../media/img/foto/default-m.png">';
    }
	else if($_SESSION["sexo"]=="F") 
	{
		$lcFoto_Usuario='<img src="../media/img/foto/default-f.png">';
    }

    $url_actual = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

	/*if(!$_SERVER['HTTPS'])
	{
	    header('location:'.$url_actual);
	}*/

	if($url_actual=="https://aulafrontino.org.ve/intranet/app/")
		$caso_uso='CU-M1.1 - INICIO INTRANET';

	$laDatos_Usuario	=array(	'NombreApellido'=>$_SESSION['nombreusuario'].' '.$_SESSION['nombredosusuario'].' '.$_SESSION['apellidousuario'],
								'UltimaFecha'	=>$lcUltima_Fecha,
								'UltimaHora'	=>$lcUltima_Hora,
								'Password'		=>$PASSWORD,
								'Username'		=>$_SESSION['idusuario'],
								'Institucion'	=>$_SESSION["institucion"],
								'Campus'		=>$_SESSION['nombrecortocam'],
								'Nombre_rol'	=>$_SESSION["nombrerol"],
								'Fecha'			=>date("d/m/Y",time()-1740),
								'FOTO'			=>$lcFoto_Usuario,
								'MENU'			=>$MENU,
								'Lapso'			=>$_SESSION["nombrelapso"],
								'idlapso'		=>$_SESSION["idlapso"],
								'URL'			=>$caso_uso
								);
								
	$Vista_Template = file_get_contents(VISTA.'/cuerpo_base.html');
	$Vista_Template = $lobjUtil->ActualizarDatosHtml($Vista_Template, $laDatos_Usuario);
	$Vista_Template			= str_replace('{MENU_LATERAL}',$MENU_LATERAL,$Vista_Template);
	$Vista_Template			= str_replace('{MENU_AUXILIAR}',$MENU_AUXILIAR,$Vista_Template);
	$Vista_Template			= str_replace('{BTN}',$btn,$Vista_Template);
	$Vista_Template			= str_replace('{CARET}',$caret,$Vista_Template);
	$Vista_Template			= str_replace('{NAV}',$nav,$Vista_Template);
	$Vista_Template			= str_replace('{CANTIDAD}',$cantidad,$Vista_Template);
	$Vista_Template			= str_replace('{NOTIFICACION}',$NOTIFICACION,$Vista_Template);



?>