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
		 
require_once("../class/servicio.class.php");
require_once("../class/modulo.class.php");
$lobjServicio 	= new clsServicio();
$lobjModulo 	= new clsModulo();

$listamodulos=$lobjModulo->selectModulo($_SESSION['modulos']);
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
	
                    
                        
                        
                   
                		
	for($i=0; $i<count($listamodulos); $i++)
	{ //PRIMER FOR QUE RECORRE LOS MODULOS QUE TIENE ACTIVO EL USUARIO
		$idmodulo  			= $listamodulos[$i][0];// IDENTIFICADOR DEL MODULO
		$nombremod 			= $listamodulos[$i][1];// NOMBRE DEL MODULO
		$urlmod	   			= $listamodulos[$i][2];
		$descripcionmod	   	= $listamodulos[$i][3];
		$iconomod	   		= $listamodulos[$i][4];
		$listaservicios=$lobjServicio->consultarServicio($idmodulo); //Busca los servicios que posee el modulo

		if($nombremod=='Aula virtual' || $nombremod=='Foro'){
			$Evento = 'onclick="window.open(this.href,'."'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,');return false;".'"'; 
			}
					   //BOTON DE PERFIL
					
			$MENU_LATERAL.= '<li>';
			$URL_MOD			= explode("/", $urlmod);
			if($URL_MOD[1]==$URL[2])
			{
				 $MENU_LATERAL.= '<a href="'.$urlmod.'" class="actual" >';
			}
			else
			{
				 $MENU_LATERAL.= '<a href="'.$urlmod.'" >';
			}
           

            $MENU_LATERAL.= '<i class="icon-'.$iconomod.'"></i>';
            $MENU_LATERAL.= '<span> '.$nombremod.' </span>';
            $MENU_LATERAL.= '</a>';
            if($listaservicios)// verifica si el modulo tiene servicios, si es así procede a crear un sub menú con ellos
            {
            	$MENU_LATERAL.= '<ul class="triangulo_borde left"> <li> <span>'.$nombremod.'</span> </li>';
            		for($j=0; $j<count($listaservicios); $j++)
					{ //PRIMER FOR QUE RECORRE LOS MODULOS QUE TIENE ACTIVO EL USUARIO
						$idservicio  			= $listaservicios[$j][0];// IDENTIFICADOR DEL MODULO
						$nombreser 			= $listaservicios[$j][1];// NOMBRE DEL MODULO
						$urlser 			= $listaservicios[$j][2];
						$iconoser	   		= $listaservicios[$j][3];
						$descripcionser	   	= $listaservicios[$j][4];
						$Evento ='';
						if($nombreser=='Aula virtual' || $nombreser=='Foro'){
							$Evento = 'onclick="window.open(this.href,'."'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,');return false;".'"'; 
							}
						$MENU_LATERAL.= '<li>';
		            	$MENU_LATERAL.= '<a href="'.$urlser.'" '.$Evento.'>';
		            	$MENU_LATERAL.= '<i class="icon-'.$iconoser.'"></i> ';
		            	$MENU_LATERAL.= '<span> '.$nombreser.' </span>';
		            	$MENU_LATERAL.= '</a>';
						$MENU_LATERAL.= '</li>';
					}
            	$MENU_LATERAL.= '</ul>';
            }

            $MENU_LATERAL.= '</li>';

            $MENU_AUXILIAR.= '<li>';
            $MENU_AUXILIAR.= '<a href="'.$urlmod.'" '.$Evento.'>';

            $MENU_AUXILIAR.= '<i class="icon-'.$iconomod.'"></i>';
            $MENU_AUXILIAR.= '<span> '.$nombremod.' </span>';
            $MENU_AUXILIAR.= '</a>';
            if($listaservicios)// verifica si el modulo tiene servicios, si es así procede a crear un sub menú con ellos
            {
            	$MENU_AUXILIAR.= '<ul>';
            		for($j=0; $j<count($listaservicios); $j++)
					{ //PRIMER FOR QUE RECORRE LOS MODULOS QUE TIENE ACTIVO EL USUARIO
						$idservicio  			= $listaservicios[$j][0];// IDENTIFICADOR DEL MODULO
						$nombreser 			= $listaservicios[$j][1];// NOMBRE DEL MODULO
						$urlser 			= $listaservicios[$j][2];
						$iconoser	   		= $listaservicios[$j][3];
						$descripcionser	   	= $listaservicios[$j][4];

						$MENU_AUXILIAR.= '<li>';
		            	$MENU_AUXILIAR.= '<a href="'.$urlser.'">';
		            	$MENU_AUXILIAR.= '<i class="icon-'.$iconoser.'"></i>';
		            	$MENU_AUXILIAR.= ' '.$nombreser.' ';
		            	$MENU_AUXILIAR.= '</a>';
						$MENU_AUXILIAR.= '</li>';
					}
            	$MENU_AUXILIAR.= '</ul>';
            }
            $MENU_AUXILIAR.= '</li>';
           
           	
                
        
	 } 
	  /*if(($_SESSION["idusuario"]=='webmaster')OR($_SESSION["idusuario"]=='kahernandez48')OR($_SESSION["idusuario"]=='ljbracho47')OR($_SESSION["idusuario"]=='akrosendo91')OR($_SESSION["idusuario"]=='jamartin68')OR($_SESSION["idusuario"]=='mjvargas72'))
				{

					$MENU_LATERAL.=	'<li>';
					$URL_MOD			= explode("/", $urlmod);
					if($URL_MOD[1]=="gestion_proyecto")
					{
						 $MENU_LATERAL.='<a href="../gestion_proyecto" class="actual" >';
					}
					else
					{
						 $MENU_LATERAL.='<a href="../gestion_proyecto" >';

					}
           
                   	$MENU_LATERAL.= '<i class="icon-exclamation-sign"></i>';
                    $MENU_LATERAL.=			'<span>Gestión de requerimientos</span>';
                    $MENU_LATERAL.=		'</a>';
                    $MENU_LATERAL.=	'</li>';

                    //AUXILIAR
                    $MENU_AUXILIAR.=	'<li>';
					$URL_MOD			= explode("/", $urlmod);
					if($URL_MOD[1]=="gestion_proyecto")
					{
						 $MENU_AUXILIAR.='<a href="../gestion_proyecto" class="actual" >';
					}
					else
					{
						 $MENU_AUXILIAR.='<a href="../gestion_proyecto" >';

					}
           
                   	$MENU_AUXILIAR.= '<i class="icon-exclamation-sign"></i>';
                    $MENU_AUXILIAR.=			'<span>Gestión de requerimientos</span>';
                    $MENU_AUXILIAR.=		'</a>';
                    $MENU_AUXILIAR.=	'</li>';
					
				}
	 //FIN DEL PRIMER FOR
//FINAL DE ARMAR EL MENU

	 if(($_SESSION["idusuario"]=='webmaster')OR($_SESSION["idusuario"]=='kahernandez48')OR($_SESSION["idusuario"]=='ljbracho47')OR($_SESSION["idusuario"]=='akrosendo91')OR($_SESSION["idusuario"]=='jamartin68')OR($_SESSION["idusuario"]=='mjvargas72'))
				{

					$BOTONES.=	'<div class="icon">';
                    $BOTONES.=	    '<a href="../gestion_proyecto" id="gestion_proyecto" class="infoicono" title="';
                    $BOTONES.= 			'<div><p>Administracion de requerimientos de aul@Frontino</p></div>">';
                    $BOTONES.=			'<span>Gestión de requerimientos</span>';
                    $BOTONES.=		'</a>';
                    $BOTONES.=	'</div>';
					
				}*/

?>
