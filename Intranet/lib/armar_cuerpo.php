<?php	
	include_once('../lib/menu.php');				
	$Vista_Template = file_get_contents(VISTA.'/index.html');
	$Vista_Template		=	str_replace('{MENU_LATERAL}', $MENU_LATERAL, $Vista_Template);
?>