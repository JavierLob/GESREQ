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
			
		   /*---------------------------------------------------------------------  
		   * 	IMPLEMENTACION DE LA CLASE USUARIO (clsUsuario.php)
		   *-------------------------------------------------------------------------*/
			
		  /*---------------------------------------------------------------------
		   *     INCLUDE DE LA CLASE ABSTRACTA MODEL 
		   *-------------------------------------------------------------------------*/
			
			require_once("../nucleo/ModelBD.php");
			//require_once("../nucleo/modelo.php");
			
			 
		   /*---------------------------------------------------------------------
		   *     CLASE USUARIO EXTIENDE DE LA CLASE  ABSTRACTA MODEL 
		   *-------------------------------------------------------------------------*/
			
			class clsUsuario extends clsModel
			{
				
		   /*---------------------------------------------------------------------
		   *     ATRIBUTOS PRIVADOS DE LA CLASE USUARIO (clsUsuario.php)
		   *-------------------------------------------------------------------------*/
			
				private $lcUsuario;
				private $lcCedula;
				private $lcContrasena;
				private $lcIdrol;
				private $lnIntentos;
				private $lcEstatus_Usuario;
				private $lcPassword_Moodle;
				private $lcPassword_Foro;
				private $lcModificacion_Usuario;
				private $lcFoto_Usuario;
				private $laArreglo;
				private $lcCorreo_Usuario;
		
		
		   /*---------------------------------------------------------------------
		   *    METODO CONSTRUCTOR
		   *-------------------------------------------------------------------------*/
			
				public function __construct()
				{
					$this->lcUsuario	="";
					$this->lcCedula		="";
					$this->lcContrasena	="";
					$this->lcIdrol		="";
					$this->lnIntentos	=0;
					$this->lcEstatus_Usuario	="";
					$this->lcPassword_Moodle	="";
					$this->lcModificacion_Usuario="";
					$this->lcFoto_Usuario	="";
					$this->laArreglo		=array();
					$this->lcCorreo_Usuario ="";
				}
				
		   /*---------------------------------------------------------------------
		   *    METODO DESTRUCTOR
		   *-------------------------------------------------------------------------*/
					
				public function __destruct()
				{
				}
				
			/*---------------------------------------------------------------------
		   *    METODOS DE PROPIEDAD SET DE LOS ATRIBUTOS DE LA CLASE
		   *-------------------------------------------------------------------------*/
		
				public function set_Usuario($pcUsuario)
				{
					$this->lcUsuario=$pcUsuario;
				}
				
				public function set_Contrasena($pcContrasena)
				{
					$this->lcContrasena=$pcContrasena;
				}
				
				public function set_Cedula($pcCedula)
				{
					$this->lcCedula=$pcCedula;
				}
				
				public function set_Correo($pcCorreo)
				{
					$this->lcCorreo_Usuario=$pcCorreo;
				}
				
				public function get_Arreglo()
				{
					return $this->laArreglo;
				}
				
				public function get_Intentos()
				{
					return $this->lnIntentos;
				}
				
				public function get_Usuario()
				{
					return $this->lcUsuario;
				}
				
				public function get_Password()
				{
					return $this->lcContrasena;
				}

				public function get_Password_Moodle()
				{
					return $this->lcPassword_Moodle;
				}
				
				//FUNCION PUBLICA SET PARA LOS DATOS DE REGISTRAR USUARIO
				public function set_Datos_Registro($pcDatos_copy)
				{
					$this->lcNacionalidad	= 	$pcDatos_copy[13];	
					$this->lcCedula			=	$pcDatos_copy[0];
					$this->lcNombreuno		= 	$pcDatos_copy[1];
					$this->lcNombredos		= 	$pcDatos_copy[2];
					$this->lcApellidouno	=	$pcDatos_copy[3];
					$this->lcApellidodos	=	$pcDatos_copy[4];
					$this->lcCorreouno		=	$pcDatos_copy[7];
					$this->lcCorreodos		=	$pcDatos_copy[8];
					$this->lcNumerouno		=	$pcDatos_copy[9];			
					$this->lcNumerodos		=	$pcDatos_copy[10];
					$this->lcDireccion		=	$pcDatos_copy[11];	
					$this->lcSexo			=	$pcDatos_copy[6];	
					$this->lcFechanac		=	$pcDatos_copy[5];		
					$this->lcPrograma		=	$pcDatos_copy[15];
					$this->lcTipo			=	'0'.$pcDatos_copy[12];
					$this->lcCampus			=	$pcDatos_copy[14];
				}
		   /*---------------------------------------------------------------------
		   *    METODO BUSCAR USUARIO Y CONTRASEÑA, EL USUARIO DEBE ESTAR ACTIVO DEVUELVE VERDADERO O FALSO
		   *-------------------------------------------------------------------------*/
					
				public function Buscar_Usuario()
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM vusuario WHERE ((idusuario='$this->lcUsuario') and (contrasena=md5('$this->lcContrasena') and (idestatususu='1')))";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
						if($laRow=$this->proximo($lrTb))
						{
							$this->Cambiar_Intentos();	
							$llEncontro=true;
						}
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}
			
		   /*---------------------------------------------------------------------
		   *    METODO BUSCAR SI EL USUARIO EXISTE DEVUELVE VERDADERO O FALSO
		   *-------------------------------------------------------------------------*/
					
				public function Buscar_Id_Usuario()
				{
				
					$llEncontro=false;
					$lcSql="SELECT * FROM vusuario WHERE idusuario='$this->lcUsuario'";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
						if($laRow=$this->proximo($lrTb))
						{
							$llEncontro=true;
							$this->lnIntentos = $laRow["intentosfallido"];
							if ($this->lnIntentos <=3 )
							{
								$this->Aumentar_Intentos(); 
							}
						}
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}	
			
			/*---------------------------------------------------------------------
		   *    METODO VALIDAR USUARIO DEVUELVE VERDADERO O FALSO
		   *-------------------------------------------------------------------------*/
					
				public function Validar_Usuario()
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM vusuario WHERE idusuario='$this->lcUsuario'";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
						if($laRow=$this->proximo($lrTb))
						{
							$llEncontro=true;
						}
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}	
				
				
			/*---------------------------------------------------------------------
		   *    METODO AUMENTAR INTENTOS FALLIDOS AL USUARIO 
		   *-------------------------------------------------------------------------*/
					
				public function Aumentar_Intentos()
				{
					$lnAumento	= ($this->lnIntentos+1);
					$this->conectar();
					$lcSql="UPDATE tusuario SET intentosfallido=$lnAumento WHERE idusuario='$this->lcUsuario'";
					$llHecho=$this->ejecutar($lcSql);
				}
			
			/*---------------------------------------------------------------------
		   *    METODO CAMBIAR INTENTOS FALLIDOS AL USUARIO 
		   *-------------------------------------------------------------------------*/
					
				public function Cambiar_Intentos()
				{
					$lnIntentos=0;
					$this->conectar();
					$lcSql="UPDATE tusuario SET intentosfallido='$lnIntentos' WHERE idusuario='$this->lcUsuario'";
					$llHecho=$this->ejecutar($lcSql);
				}
		
			/*---------------------------------------------------------------------
		   *    METODO  BLOQUEAR AL USUARIO 
		   *-------------------------------------------------------------------------*/
					
				public function Bloquear_Usuario()
				{
					$lcBloqueado="2";
					$llHecho=false;
					$this->conectar();
					$lcSql="UPDATE tusuario SET idestatususu=$lcBloqueado WHERE idusuario='$this->lcUsuario'";
					$llHecho=$this->ejecutar($lcSql);
					$this->desconectar();
					return $llHecho;
				}
				
			/*---------------------------------------------------------------------
		   *    METODO  BLOQUEAR AL USUARIO 
		   *-------------------------------------------------------------------------*/
					
				public function Desbloquear_Usuario()
				{
					$lcDesbloquear="1";
					$llHecho=false;
					$this->conectar();
					$lcSql="UPDATE tusuario SET idestatususu=$lcDesbloquear WHERE idusuario='$this->lcUsuario'";
					$llHecho=$this->ejecutar($lcSql);
					$this->desconectar();
					return $llHecho;
				}
				
				
			/*---------------------------------------------------------------------  
		   * 	FUNCION: buscarIntentos()
		   * 	PARAMETROS: USUARIO ($cpidusuario) , CONTRASEÑA ($cpcontrasena)
		   * 	FINALIDAD: BUSCA EL USUARIO Y RETORNA SUS DATOS.
		   *-------------------------------------------------------------------------*/
					
				public function Buscar_Intentos()
				{
					$llEncontro=false;
					$lcSql="SELECT intentosfallido FROM vusuario WHERE idusuario='$this->lcUsuario'";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
					if($laRow=$this->proximo($lrTb))
					{
						$this->lnIntentos = $laRow["intentosfallido"];
						$llEncontro=true;
					}			
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}
			
			/*---------------------------------------------------------------------  
		   * 	FUNCION: cambioClave()
		   *-------------------------------------------------------------------------*/
					
				public function Cambio_Clave()
				{
					$llHecho=false;
					$this->CambiarIntentos();
					$this->desbloquearUsuario();
					$lcSql="UPDATE tusuario SET contrasena=md5('$this->lcContrasena') WHERE (idusuario='$this->lcUsuario')";
					$this->conectar();
					$llHecho=$this->ejecutar($lcSql);
					$this->desconectar();
					return $llHecho;
				}	
					
				public function Buscar_Get()
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM vusuario WHERE ((idusuario='$this->lcUsuario') AND (contrasena=md5('$this->lcContrasena')))";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
					if($laRow=$this->proximo($lrTb))
					{
						$this->laArreglo[0] = $laRow["idusuario"];
						$this->laArreglo[1] = $laRow["contrasena"];
						$this->laArreglo[2] = $laRow["nombreunoper"];
						$this->laArreglo[3] = $laRow["apellidounoper"];
						$this->laArreglo[4] = $laRow["nombrerol"];
						$this->laArreglo[5] = $laRow["stringserviciosrol"];
						$this->laArreglo[6] = $this->desencriptar_string_modulos_rol($laRow["stringmodulosrol"]);
						$this->laArreglo[7] = $laRow["idpersona"];
						$this->laArreglo[8] = $laRow["idrol"];
						$this->laArreglo[9] = $laRow["nombrecortoins"];
						$this->laArreglo[10] = $laRow["sexoper"];
						$this->laArreglo[11] = $laRow["idprograma"];
						$this->laArreglo[12] = $laRow["idcampus"];
						$this->laArreglo[13] = $laRow["nombrecortocam"];
						$this->laArreglo[14] = $laRow["nombredosper"];
						$this->laArreglo[15] = $laRow["idinstitucion"];

						$llEncontro=true;
					}			
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}
				
				private function desencriptar_string_modulos_rol($String)
				{
					$caracteres_mayuscula = 'ABCDEFGHIJKL56789';
					$numeros='01234MNOPQRSTUVWXYZ';
					$key='';
						for($j=0;$j<strlen($String);$j++)
						{
							if (strpos($caracteres_mayuscula, substr($String,$j,1))===false){ 
								 $key=0;
							  } 
							else if (strpos($numeros, substr($String,$j,1))===false){ 
								 $key=1;
							  } 
							$Desencriptacion = $Desencriptacion . $key;
						}
					return $Desencriptacion;
				}
				
				public function Buscar_Recupera()
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM vusuario WHERE ((idpersona='$this->lcCedula') AND (emailunoper='$this->lcCorreo_Usuario'))";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
					if($laRow=$this->proximo($lrTb))
					{
						$llEncontro=true;
					}			
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}
				
				public function Buscar_Datos_Recupera_Usuario()
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM tusuario WHERE (cedulausu='$this->lcCedula')";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
					if($laRow=$this->proximo($lrTb))
					{
						$this->lcUsuario 		 = $laRow["idusuario"];
						$this->lcPassword_Moodle = $laRow["password_moodle"];
						$llEncontro=true;
					}			
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}
				
				public function Buscar_Datos_Recupera_Password()
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM tusuario WHERE (cedulausu='$this->lcCedula')";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
					if($laRow=$this->proximo($lrTb))
					{
						$this->lcUsuario 		 = $laRow["idusuario"];
						$this->Cambio_Password();
						$llEncontro=true;
					}			
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}
				
				public function Cambio_Password()
				{
					$llHecho=false;
					$lcSql="UPDATE tusuario SET contrasena=md5('$this->lcContrasena'),idestatususu='1', intentosfallido='0',modificacion='0' WHERE (idusuario='$this->lcUsuario')";
					$llHecho=$this->ejecutar($lcSql);
					return $llHecho;
				}	
					
			/*---------------------------------------------------------------------  
		   * 	FUNCION: incluir()
		   * 	PARAMETROS: IDUSUARIO ($) , CONTRASEÑA ($cpcontrasena)
		   * 	FINALIDAD: BUSCA EL USUARIO Y RETORNA SUS DATOS.
		   *-------------------------------------------------------------------------*/
				
				public function Incluir_Usuario()
				{
					$llHecho=false;
					$this->conectar();
					$lcSql="INSERT INTO tusuario(
					idusuario, contrasena, idrol, intentosfallido, 
					idestatususu, cedulausu, password_moodle, password_foro, modificacion)
						VALUES ('$this->lcUsuario', md5('$this->lcContrasena'), '$this->lcTipo', '0', 
					'1','$this->lcCedula','$this->lcContrasena','$this->lcContrasena','0' );
						";
					$llHecho=$this->ejecutar($lcSql);
					$this->desconectar();
					return $llHecho;
				}
				
				 public function Cambio_Contrasena($pcContrasena)
				{
					$llHecho=false;
					$this->conectar();
					$lcSql="update tusuario set contrasena=md5('$pcContrasena'),modificacion='1'  where (idusuario='$this->lcUsuario')";
					$llHecho=$this->ejecutar($lcSql);
					$this->desconectar();
					return $llHecho;
				}
				
				public function Lista_Usuario()
				{
					$llEncontro=false;
					$this->conectar();	  
					$lcSql="SELECT * from vusuario order by apellidounoper,nombreunoper";
					$cursor=$this->filtro($lcSql);
					$contador=0;
					if ($laRow=$this->proximo($cursor))
					{
						DO
						{
							$this->laArreglo [$contador][0] = $laRow["idusuario"];	
							$this->laArreglo [$contador][1] = $laRow["nombreunoper"];
							$this->laArreglo [$contador][2] = $laRow["apellidounoper"];
							$this->laArreglo [$contador][3] = $laRow["idpersona"];
							$this->laArreglo [$contador][4] = $laRow["idrol"];	  
							$contador++;
						}
						WHILE ($laRow =$this->proximo($cursor));
						$llEncontro=true;
					}
					return $llEncontro;	  
				}
				

				public function Buscar_Cedula() // Buscar Cedula del usuario
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM tusuario WHERE cedulausu='$this->lcCedula'";
					$this->conectar();
					$cursor   = $this->filtro($lcSql);
					if ($row = $this->proximo($cursor))
					{
							$this->lcCedula = $row["cedulausu"];
							$llEncontro=true;
					}
					$this->desconectar();
					return $llEncontro;	  
				}

				public function Buscar_Correo_Usuario() // Buscar Cedula del usuario
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM vusuario WHERE idusuario='$this->lcUsuario'";
					$this->conectar();
					$cursor   = $this->filtro($lcSql);
					if ($row = $this->proximo($cursor))
					{
							$lcEmail = $row["emailunoper"];
					}
					$this->desconectar();
					return $lcEmail;	  
				}

				public function Buscar_Correo() // Buscar Cedula del usuario
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM tpersona WHERE emailunoper='$this->lcCorreo_Usuario' OR emaildosper='$this->lcCorreo_Usuario'";
					$this->conectar();
					$cursor   = $this->filtro($lcSql);
					if ($row = $this->proximo($cursor))
					{
							$this->lcCedula = $row["cedulausu"];
							$llEncontro=true;
					}
					$this->desconectar();
					return $llEncontro;	  
				}
				
				public function Validar_Foto() // Valida si el usuario tiene activa la foto
				{
					$llEncontro=false;
					$lcSql="SELECT fotousu FROM tusuario WHERE idusuario='$this->lcUsuario' and fotousu='1'";
					$this->conectar();
					$cursor   = $this->filtro($lcSql);
					if ($row = $this->proximo($cursor))
					{
							$this->lcFoto_Usuario= $row["fotousu"];
							$llEncontro=true;
					}
					$this->desconectar();
					return $llEncontro;	  
				}
				
				public function datos_confirmacion_existe($id) // valida que los datos del usuario existen
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM vsolicitud WHERE idpersona='$id' AND modificacion='0'";
					$this->conectar();
					$cursor   = $this->filtro($lcSql);
					if ($row = $this->proximo($cursor))
					{
							$llEncontro=true;
					}
					$this->desconectar();
					return $llEncontro;	  
				}
				
				public function Buscar_Activacion() // Busca si el usuario ya esta activo
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM vusuario WHERE idusuario='$this->lcUsuario' AND modificacion='1'";
					$this->conectar();
					$cursor   = $this->filtro($lcSql);
					if ($row = $this->proximo($cursor))
					{
							$llEncontro=true;
					}
					$this->desconectar();
					return $llEncontro;	  
				}
				
				public function Password_Moodle() // Busca el Password del Moodle
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM tusuario WHERE cedulausu='$this->lcCedula'";
					$this->conectar();
					$cursor   = $this->filtro($lcSql);
					if ($row = $this->proximo($cursor))
					{
							$this->lcPassword_Moodle=$row ["password_moodle"];
							$llEncontro=true;
					}
					$this->desconectar();
					return $llEncontro;	  
				}
				
				public function Password_Foro() // Busca el Password del Foro
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM tusuario WHERE cedulausu='$this->lcCedula'";
					$this->conectar();
					$cursor   = $this->filtro($lcSql);
					if ($row = $this->proximo($cursor))
					{
							$this->lcPassword_Foro =$row ["password_foro"];
							$llEncontro=true;
					}
					$this->desconectar();
					return $llEncontro;	  
				}
				
				public function Activar_foto()	//Activa la foto para el usuario
				{
					$llHecho=false;
					$this->conectar();
					$lcSql="update tusuario set fotousu='1' where (idusuario='$this->lcUsuario')";
					$llHecho=$this->ejecutar($lcSql);
					$this->desconectar();
					return $llHecho;
				}

				public function totalSolicitudInscripcion($lcIdProfesor)
				{
					$lnCantidad		=	0;
					$lcSql			=	"SELECT idcurso as id_curso,(SELECT count(*) FROM vinscripcion WHERE idcurso=id_curso AND estatus_inscripcion='0')as cantidad FROM tcurso WHERE idprofesor='$lcIdProfesor'";
					$this->conectar();
					$lrTb			=	$this->filtro($lcSql);
						if( $laRow = $this->proximo( $lrTb ) )
						{
							DO 
							{
								$lnCantidad= $lnCantidad+$laRow["cantidad"];

							}
							WHILE ($laRow =$this->proximo($lrTb));
						}
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $lnCantidad;
				}

				public function totalCursosPrograma($lcIdPrograma)
				{
					$lnCantidad		=	0;
					$lcSql			=	"SELECT count(*)as cantidad FROM vcurso WHERE idprograma='$lcIdPrograma' AND idestatuscurso='1'";
					$this->conectar();
					$lrTb			=	$this->filtro($lcSql);
						if( $laRow = $this->proximo( $lrTb ) )
						{

								$lnCantidad= $laRow["cantidad"];

						}
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $lnCantidad;
				}
				
				
				#########################################################
				#				METODOS RECICLADOS						#
				#########################################################
		
		
				 /*	public function confirmacion_aceptada($pcCedula,$pcPrimerap,$pcPrimerar,$pcSegundap,$pcSegundar)
				{
					$llHecho=false;
					$this->conectar();
					$lcSql="update tusuario set preguntaunousu='$pcPrimerap',
					respuestaunousu=md5('$pcPrimerar'), preguntadosusu='$pcSegundap', respuestadosusu=md5('$pcSegundar'),
					modificacion='1' where (cedulausu='$pcCedula')";
					$llHecho=$this->ejecutar($lcSql);
					$this->desconectar();
					return $llHecho;
				}
				
					public function datos_confirmacion($id) // seleccion de un servicio para llenar arreglo con datos
				{
					$lcSql="SELECT * FROM vsolicitud WHERE idpersona='$id' AND modificacion='0'";
					$this->conectar();
					$cursor   = $this->filtro($lcSql);
					if ($row = $this->proximo($cursor))
					{
							$filas [0] [0] = $row["nacionalidadper"];
							$filas [0] [1] = $row["idpersona"];
							$filas [0] [2] = $row["nombreunoper"];
							$filas [0] [3] = $row["apellidounoper"];
							$filas [0] [4] = $row["emailunoper"];
							$filas [0] [5] = $row["telefonounoper"];
							$filas [0] [6] = $row["idusuario"];
							$filas [0] [7] = $row["modificacion"];
							$filas [0] [8] = $row["cargoper"];
							$filas [0] [9] = $row["asignaturaper"];
					}
					$this->desconectar();
					return $filas;	  
				}
					public function eliminar()
				{
					$llHecho=false;
					$this->conectar();
					$Sql="delete from tusuario where (idusuario='$this->acUsuario')";
					$llHecho=$this->ejecutar($lcSql);
					$this->desconectar();
					return $llHecho;
				}
					public function editar()
				{
					$llHecho=false;
					$this->conectar();
					$lcSql="update tusuario set contrasena=md5('$this->acContrasena'),idrol=$this->acRol where (idusuario='$this->acUsuario')";
					$llHecho=$this->ejecutar($lcSql);
					$this->desconectar();
					return $llHecho;
				}
			/*---------------------------------------------------------------------  
		   * 	FUNCION: buscarPreguntados()
		   *-------------------------------------------------------------------------
					
				public function buscarPreguntados()
				{
					$lcSql="SELCT * FROM vusuario WHERE idusuario='$this->idUsuario'";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
					if($laRow=$this->proximo($lrTb))
					{
						$usuario_data = $laRow["preguntadosusu"];
					}			
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $usuario_data;
				}
					
			/*---------------------------------------------------------------------  
		   * 	FUNCION: buscarGet()
		   * 	PARAMETROS: USUARIO ($cpidusuario) , CONTRASEÑA ($cpcontrasena)
		   * 	FINALIDAD: BUSCA EL USUARIO Y RETORNA SUS DATOS.
		   *  SELECT tusuario.idusuario, tusuario.nombreusu,
		   *  tusuario.apellidousu, trol.nombrerol, 
		   * tusuario.contrasena, trol.idrol, 
		   * trol.stringserviciosrol, 
		   * trol.stringmodulosrol, 
		   * tusuario.intentosfallido, 
		   * tusuario.preguntaunousu, tusuario.preguntadosusu, 
		   * tusuario.respuestaunousu, tusuario.respuestadosusu
		   *  tusuario.cedulausu, testatususuario.nombreestatususu,
		   *  testatususuario.idestatususu
		
		   *-------------------------------------------------------------------------*/
					
			
			/*---------------------------------------------------------------------  
		   * 	FUNCION: buscarPreguntauno()
		   *-------------------------------------------------------------------------
					
				public function buscarPreguntauno()
				{
					$lcSql="SELECT preguntaunousu from vusuario WHERE idusuario='$this->idUsuario'";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
					if($laRow=$this->proximo($lrTb))
					{
						$usuario_data = $laRow["preguntaunousu"];
					}			
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $usuario_data;
				}	
			
			
			/*---------------------------------------------------------------------  
		   * 	FUNCION: buscarRespuestauno()
		   *-------------------------------------------------------------------------
					
				public function buscarRespuestauno($cppregunta, $cprespuesta)
				{
					$llEnc=false;
					$lcSql="SELECT * FROM vusuario 
					WHERE idusuario='$this->idUsuario' AND preguntaunousu='$cppregunta' AND respuestaunousu=md5('$cprespuesta')";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
					if($laRow=$this->proximo($lrTb))
					{
						$llEnc=true;
					}			
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEnc;
				}	*/

				public function buscar_cedula2($cedula)
				{
					$llEncontro=false;
					$lcSql="SELECT * FROM vusuario WHERE idpersona='$cedula'";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
						if($laRow=$this->proximo($lrTb))
						{
							$this->laArreglo[0] = $laRow["idusuario"];
							$this->laArreglo[1] = $laRow["contrasena"];
							$this->laArreglo[2] = $laRow["nombreunoper"];
							$this->laArreglo[3] = $laRow["apellidounoper"];
							$this->laArreglo[4] = $laRow["nombrerol"];
							$this->laArreglo[5] = $laRow["stringserviciosrol"];
							$this->laArreglo[6] = $this->desencriptar_string_modulos_rol($laRow["stringmodulosrol"]);
							$this->laArreglo[7] = $laRow["idpersona"];
							$this->laArreglo[8] = $laRow["idrol"];
							$this->laArreglo[9] = $laRow["nombrecortoins"];
							$this->laArreglo[10] = $laRow["sexoper"];
							$this->laArreglo[11] = $laRow["idprograma"];
							$this->laArreglo[12] = $laRow["idcampus"];
							$this->laArreglo[13] = $laRow["nombrecortocam"];
							$this->laArreglo[14] = $laRow["nombredosper"];
						}
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $this->laArreglo;
				}
			
				
				
		}
?>
