<?php
/*----------------------------------------------
    * 	INICIO DE SESION
	* ---------------------------------------------*/
		session_start(); 
   /*----------------------------------------------
    * 	INCLUDES 
	* ---------------------------------------------*/	
		require_once('../class/usuario.class.php');
		require_once('../class/acceso.class.php');
		require_once('../lib/utilidades.php');
		require_once('../class/intento.class.php');
		require_once('../lib/constantes.php');
		
		/*----------------------------------------------
		* 	INSTANCIA DE LOS OBJETOS NECESARIOS 
		* ---------------------------------------------*/	
		function setObjUsuario(){		
			$lobjUsuario	= new clsUsuario();
			return $lobjUsuario;
		}
		function setObjAcceso(){
			$lobjAcceso		= new clsAcceso();
			return $lobjAcceso;
		}
		function setObjUtil(){
			$lobjUtil		= new clsUtilidades();
			return $lobjUtil;
		}
		function setObjIntento(){
			$lobjIntento	= new clsIntento();
			return $lobjIntento;
		}
		
		
		
				
		function handler(){			
				
				$lobjUsuario = setObjUsuario();
				$lobjAcceso  = setObjAcceso();
				$lobjUtil    = setObjUtil();
				$lobjIntento = setObjIntento();

				
				$lcUsuario			= $_POST["username"];
				$lcContrasena		= $_POST["password"];
				$lcOperacion		= $_POST["tipo"];	
				$lcEvento			= DEFECTO;
				$llParametro_Valido 	= Validar_Parametros($lcUsuario,$lcContrasena);
				
				if(!$llParametro_Valido)
				{
					Usuario_Invalido('invalido','invalido');
				}
				
				$laPeticiones 		= array (LOGIN_WEB, LOGIN_MOVIL);
				
				foreach ($laPeticiones as $lcPeticion)
				{
             		if($lcOperacion==$lcPeticion)
			 		{	
                		$lcEvento = $lcPeticion;
             		}
        		}
				
				
				switch($lcEvento)
				{
			
					case LOGIN_WEB:
					/*----------------------------------------------
					* 	METODOS SET PARA ASIGNAR VALORES 
					* ---------------------------------------------*/
						$lobjUsuario->set_Usuario($lcUsuario);
						$lobjUsuario->set_Contrasena($lcContrasena);
						$lobjAcceso->set_Usuario($lcUsuario);
						
					/*----------------------------------------------
					* 	METODO BUSCAR USUARIO (RETORNA SI ENCONTRO O NO ENCONTRO) 
					* ---------------------------------------------*/
			
						$llEncontro=$lobjUsuario->Buscar_Usuario();
						$llActivo=$lobjUsuario->Buscar_Activacion();
						$lcIP=$lobjIntento->get_Ip();
					/*----------------------------------------------
					* 	VALIDA SI ENCONTRO 
					* ---------------------------------------------*/
						
						if ($llEncontro)
						{
							//if(($llActivo)OR($lcUsuario=="webmaster")){
							/*----------------------------------------------
							* 	ENCONTRO VERDADERO INSTANCIA VARIABLES
							* 	PARA EL INICIO DE LA SESION.
							* ---------------------------------------------*/
								$llEncontro_Datos	=$lobjUsuario->Buscar_Get();
								if($llEncontro_Datos)
									$laDatos_Usuario = $lobjUsuario->get_Arreglo();
								$lobjAcceso->set_Ip($lcIP);
								$lobjAcceso->Buscar_Ultimo_Acceso();
								$lobjIntento->Restaurar_Intento_Ip();
								$lcUltima_Fecha=$lobjAcceso->get_Ultima_Fecha();
								$lcUltima_Hora=$lobjAcceso->get_Ultima_Hora();
								
												$_SESSION["session"]			='on';
												$_SESSION["idusuario"]			=$lcUsuario;
												$_SESSION["contrasena"]	        =$lcContrasena;
												$_SESSION["nombreusuario"]		=$laDatos_Usuario[2];
												$_SESSION["nombredosusuario"]	=$laDatos_Usuario[14];
												$_SESSION["apellidousuario"]	=$laDatos_Usuario[3];
												$_SESSION["nombrerol"]			=$laDatos_Usuario[4];
												$_SESSION["servicios"]			=$laDatos_Usuario[5];
												$_SESSION["modulos"]			=$laDatos_Usuario[6];
												$_SESSION["cedulausu"]			=$laDatos_Usuario[7];
												$_SESSION["rol"]				=$laDatos_Usuario[8];
												$_SESSION["institucion"]		=$laDatos_Usuario[9];
												$_SESSION["sexo"]				=$laDatos_Usuario[10];
												$_SESSION["idcampus"]			=$laDatos_Usuario[12];
												$_SESSION["nombrecortocam"]		=$laDatos_Usuario[13];
												$_SESSION["idprograma"]			=$laDatos_Usuario[11];
												$_SESSION["idinstitucion"]		=$laDatos_Usuario[15];

												$_SESSION["ultimafecha"]		=$lcUltima_Fecha;
												$_SESSION["ultimahora"]			=substr($lcUltima_Hora,0,8);
												$_SESSION["timeup"]				=date('i');	
												$_SESSION["nombrelapso"]		=$lcLapso_Activo[2];
												$_SESSION["idlapso"]			=$lcLapso_Activo[0];
												$_SESSION["semana"]				='8';
												if($lcUltima_Fecha=="")
												{
													$_SESSION["ultimafecha"]		=date("d/m/Y",time()-1740);
													$_SESSION["ultimahora"]			=date("H:i:s",time()-1740);
												}	
									if($llActivo)
									{
										if($laDatos_Usuario[8]==00)
										{		//SI ES UN ADMINISTRADOR DEL SITIO ENTRA AL MODULO DE ADMINISTRACION
												header("location: ../app/");	
										}
										else 							//SI NO ES UN ADMINISTRADOR ENTRA A LA APLICACION
										{	
											if($lcUltima_Fecha!="")
											{
												header("location: ../app/");
											}
											else 						//SI NO TIENE ACCESOS LE SOLICITA EL CAMBIO DE CLAVE
											{
												//SI TIENE YA UN ACCESO AL SISTEMA ENTRA AL MENU PRINCIPAL
												header("location: ../app/");
											}
										}
									}
									else
									{
										header("location: ../perfil/?q=cambio_contrasena");
									}
							/*}else{		//En caso de que el usuario no este activo
								$cedulausu=$lobjUsuario->buscarCedula($lcUsuario);
								$array=$lobjUtil->serializarID($cedulausu);
								header("location: ../confirmacion/?id=$array");	
							}*/
						}	//Fin de buscar usuario y password
						
						// BUSCAR USUARIO
							if(!$llEncontro) 						//SI NO ENCONTRO NINGUN USUARIO REGISTRADO
							{
							/*----------------------------------------------
							* 	METODO BUSCAR SOLO EL NOMBRE DE USUARIO
							* 			(ENCONTRO O NO ENCONTRO) 
							* ---------------------------------------------*/	
				
								$llEncontro_Usuario=$lobjUsuario->Buscar_Id_Usuario();
						
							/*----------------------------------------------
							* 	VALIDA SI ENCONTRO 
							* ---------------------------------------------*/	
						
								if ($llEncontro_Usuario)		
								{
									/*----------------------------------------------
									* 	ENCONTRO VERDADERO BUSCA NRO. DE INTENTOS 
									* ---------------------------------------------*/	
									$llEncontro_Intentos	=$lobjUsuario->Buscar_Intentos();
									if($llEncontro_Intentos)
									{
										$llEncontro		=$lobjIntento->Buscar_Datos_Cliente();
										$lnIntentos		=$lobjIntento->get_Intentos_Ip();
										if($llEncontro)
										{
											$lobjIntento->Aumentar_Intento_Ip();
											if($lnIntentos>=3)
											{
												$lobjIntento->Bloquear_Ip();
											}
										}
										else
										{
											$llHecho=$lobjIntento->Incluir_Intento_Ip();
											$llHecho=$lobjIntento->Incluir_Intento();
										}
										$lcIntentos	=	$lobjUsuario->get_Intentos();
										if($lcIntentos >= 3 ) 	//Si los intentos son mayores a 3 bloquea el usuario
										{
											$llHecho	=	$lobjUsuario->Bloquear_Usuario();		//FUNCION BLOQUEAR USUARIO
											$_SESSION['mensaje']=4;
											header("location: ../login/");	
										}
										else 		//Si los intentos no son mayores a 3 advierte al usuario de que puede ser bloqueado
										{
											$_SESSION['mensaje']=2;
											header("location: ../login/");
										}
									}
								}
							
								/*----------------------------------------------
								* 	NO ENCONTRO EL NOMBRE DE USUARIO REGISTRADO
								* ---------------------------------------------*/	
								else
								{
									/*----------------------------------------------
									* 	ENVIA MENSAJE DE USUARIO Y CONTRASEÑA INVALIDO 
									* ---------------------------------------------*/	
									Usuario_Invalido('invalido','invalido');
								}
						}
										
					break;
				default:
					 Retornar();
			}
			
		
		
	} //fin funcion handler
	
	

		//FUNCION VALIDAR PARAMETROS
		
		function Validar_Parametros($pcUsuario, $pcPassword)
		{
				$lobjUtil    = setObjUtil();

				$llValido = false;
				$llMalo['usuario']		=$lobjUtil->validaUsuario($pcUsuario);
				$llMalo['password']		=$lobjUtil->validaPassword($pcPassword);
				
				if(!$llMalo['usuario']){
					return $llValido;
				}else if(!$llMalo['password']){
					return $llValido;
				}else {
					$llValido = true;
				}
				return $llValido;
		}
		
		//FUNCION DIRECCIONAR A APLICACION
		
		function Direccionar_Aplicacion(){
			$vista_app = file_get_contents('../app/visMenu.php');
			return $vista_app;
		}
		 
		//FUNCION RETORNAR 
		
		function Retornar(){
			$lobjIntento = setObjIntento();
			$lcCampousuario="invalido";
			$lcCampopassword="invalido";
			$lobjIntento->set_Campo_Usuario($lcCampousuario);
			$lobjIntento->set_Campo_Password($lcCampopassword);
			$_SESSION['mensaje']=1;
			header("location: ../login/");
		}
		
		//FUNCION USUARIO INVALIDO
		
		function Usuario_Invalido($lcUsuario,$lcContrasena){
			$lobjIntento  = setObjIntento();
			$lobjIntento->set_Campo_Usuario($lcUsuario);
			$lobjIntento->set_Campo_Password($lcContrasena);
			$llEncontro		=$lobjIntento->Buscar_Datos_Cliente();
			$lcIp	=	$lobjIntento->get_Ip();
			$lcEstatus	=$lobjIntento->get_Estatus_Ip();
			$lnIntentos	=$lobjIntento->get_Intentos_Ip();
			if($llEncontro)
			{
				if($lcEstatus==1)
				{
					$lobjIntento->Aumentar_Intento_Ip();
					$_SESSION['mensaje']=4;
					header("location: ../login/");
				}
				else if($lnIntentos<=1)
				{
					$lobjIntento->Aumentar_Intento_Ip();
					$_SESSION['mensaje']=1;
					header("location: ../login/");
				}
				else if($lnIntentos==2)
				{
					$lobjIntento->Aumentar_Intento_Ip();
					$_SESSION['mensaje']=3;
					header("location: ../login/");
				}
				else if($lnIntentos>=3)
				{
					$lobjIntento->Bloquear_Ip();
					$_SESSION['mensaje']=4;
					header("location: ../login/");
				}
				else if($lnIntentos==1)
				{
					$lobjIntento->Aumentar_Intento_Ip();
					$_SESSION['mensaje']=4;
					header("location: ../login/");
				}
			}
			else{
				$llHecho=$lobjIntento->Incluir_Intento_Ip();
				$llHecho=$lobjIntento->Incluir_Intento();
				$_SESSION['mensaje']=1;
				header("location: ../login/");
			}
		}
	
	handler();
		/*----------------------------------------------------------
		 * 		TIPO: controlador
		 * 		Hecho por: Amilcar Morales
		 * 		Fecha Creacion: 12/03/2012
		 * 		Ultima modificacion:22/05/2012
		 * 		Modificado por: Amilcar Morales
		 * ---------------------------------------------------------*/
	
?>

