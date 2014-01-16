<?php	

$uri 			= $_SERVER['REQUEST_URI'];
$URL			= explode("/", $uri);
//COMIENZO DE ETIQUETA PHP PARA ARMAR EL MENU 
	$MENU_LATERAL.= '<li>';
	/*if($URL[2]=='app')
	{

	}*/

	$MENU_LATERAL.= '<div class="page-sidebar nav-collapse collapse">';
	$MENU_LATERAL.= '		<ul>';
	$MENU_LATERAL.= '			<li>';
	$MENU_LATERAL.= '				<div class="sidebar-toggler hidden-phone"></div>';
	$MENU_LATERAL.= '			</li>';
	$MENU_LATERAL.= '			<li class="active start ">';
	$MENU_LATERAL.= '				<a href="../app">';
	$MENU_LATERAL.= '				<i class="icon-home"></i> ';
	$MENU_LATERAL.= '				<span class="title">Escritorio</span>';
	$MENU_LATERAL.= '				<span class="selected"></span>';
	$MENU_LATERAL.= '				</a>';
	$MENU_LATERAL.= '			</li>';
	$MENU_LATERAL.= '			<li class="has-sub ">';
	$MENU_LATERAL.= '				<a href="javascript:;">';
	$MENU_LATERAL.= '				<i class="icon-table"></i> ';
	$MENU_LATERAL.= '				<span class="title">Formularios</span>';
	$MENU_LATERAL.= '				<span class="selected"></span>';
	$MENU_LATERAL.= '				</a>';
	$MENU_LATERAL.= '				<ul class="sub">';
	$MENU_LATERAL.= '					<li><a href="../requerimiento/?q=registro_requerimiento">Rregistro de querimientos</a></li>';
	$MENU_LATERAL.= '				</ul>';
	$MENU_LATERAL.= '			</li>';
	$MENU_LATERAL.= '		</ul>';
	$MENU_LATERAL.= '	</div>';
	
?>
