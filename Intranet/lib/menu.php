<?php	

$uri 			= $_SERVER['REQUEST_URI'];
$URL			= explode("/", $uri);
//COMIENZO DE ETIQUETA PHP PARA ARMAR EL MENU 
	$MENU_LATERAL.= '<li>';
	if($URL[2]=='app')
	{
		$MENU_LATERAL.= '<a href="../app/" class="actual" >';
	}
	else
	{
		$MENU_LATERAL.= '<a href="../app/" >';
	}
	$MENU_LATERAL.= '<i class="icon-home"></i>';
	$MENU_LATERAL.= '<span>Inicio</span>';
	$MENU_LATERAL.= ' </a>';
	$MENU_LATERAL.= '</li>';
	
?>
