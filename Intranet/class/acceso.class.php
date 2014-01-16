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
		   * 	IMPLEMENTACION DE LA CLASE ACCESO (clsAcceso.php)
		   *-------------------------------------------------------------------------*/
			
		  /*---------------------------------------------------------------------
		   *     INCLUDE DE LA CLASE ABSTRACTA MODEL 
		   *-------------------------------------------------------------------------*/
		   
			require_once("../nucleo/ModelBD.php");
			
		   /*---------------------------------------------------------------------
		   *     CLASE ACCESO EXTIENDE DE LA CLASE  ABSTRACTA MODEL 
		   *-------------------------------------------------------------------------*/
			
			class clsAcceso extends clsModel
			{
				
		   /*---------------------------------------------------------------------
		   *     ATRIBUTOS PRIVADOS DE LA CLASE ACCESO	(clsAcceso.php)
		   *-------------------------------------------------------------------------*/
				
				private $lcUsuario;
				private $lcFecha_Acceso;
				private $lcHora_Acceso;
				private $lcIp;
				private	$lcUltima_Fecha;
				private $lcUltima_Hora;
				private $laArreglo;
			
		   /*---------------------------------------------------------------------
		   *    METODO CONSTRUCTOR
		   *-------------------------------------------------------------------------*/
			
				public function __construct()
				{
					$this->lcUsuario		= "";
					$this->lcFecha_Acceso	= date("Y/m/d",time());
					$this->lcHora_Acceso	= date("H:i:s",time());
					$this->lcIp				= "";
					$this->laArreglo		= array();
				}
				
		   /*---------------------------------------------------------------------
		   *    METODO DESTRUCTOR
		   *-------------------------------------------------------------------------*/
					
				public function __destruct()
				{
				}
				
			/*---------------------------------------------------------------------
		   *    METODO DE PROPIEDAD SET ASIGNA VALOR AL ATRIBUTO DE LA CLASE
		   * 	(idusuario)
		   *-------------------------------------------------------------------------*/
			
				public function set_Usuario ($pcUsuario)
				{
					$this->lcUsuario= $pcUsuario;
				}
				
				public function set_Ip ($pcIp)
				{
					$this->lcIp= $pcIp;
				}
				
				public function get_Ultima_Fecha()
				{
					return $this->lcUltima_Fecha;
				}
				
				public function get_Ultima_Hora()
				{
					return $this->lcUltima_Hora;
				}
				
				public function get_Fecha_Acceso()
				{
					return $this->lcFecha_Acceso;
				}
				
				public function get_Hora_Acceso()
				{
					return $this->lcHora_Acceso;
				}
			
			/*---------------------------------------------------------------------
		   *    METODO INCLUIR ACCESO NUEVO
		   *-------------------------------------------------------------------------*/
			
				private function Incluir_Acceso()
				{
					$llHecho=false;
					$lcSql="INSERT INTO tacceso (idusuario, fechaacceso, horaacceso, ip) 	
							VALUES
							('$this->lcUsuario', '$this->lcFecha_Acceso', '$this->lcHora_Acceso', '$this->lcIp')";
					$llHecho=$this->ejecutar($lcSql);
					return $llHecho;
				}
				
			/*---------------------------------------------------------------------
		   *    METODO BUSCAR ULTIMO ACCESO
		   *-------------------------------------------------------------------------*/
		
				public function Buscar_Ultimo_Acceso()
				{
					$llEncontro=false;
					$lcSql="SELECT *,date_format(fechaacceso,'%d/%m/%Y') FROM tacceso WHERE idusuario='$this->lcUsuario' ORDER BY fechaacceso DESC";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
						if($laRow=$this->proximo($lrTb))
						{
							$this->lcUltima_Fecha	=$laRow["fechaacceso"];
							$this->lcUltima_Hora	=$laRow["horaacceso"];
							$this->Incluir_Acceso();
							$llEncontro=true;
						}
						else 
						{
								$this->Incluir_Acceso();
						}
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}
				
			/*---------------------------------------------------------------------
		   *    METODO BUSCAR PRIMER ACCESO
		   *-------------------------------------------------------------------------*/
		
				public function Buscar_Primer_Acceso()
				{
					$llEncontro=false;
					$lcSql	   =	"SELECT *,date_format(fechaacceso,'%d/%m/%Y') as fechaacceso FROM tacceso 
									WHERE idusuario='$this->lcUsuario' ORDER BY fechaacceso ASC";
					$this->conectar();
					$lrTb=$this->filtro($lcSql);
						if($laRow=$this->proximo($lrTb))
						{
							$this->lcFecha_Acceso	=$laRow["fechaacceso"];
							$this->lcHora_Acceso    =$laRow["horaacceso"];
							$llEncontro=true;
						}
					$this->cierrafiltro($lrTb);
					$this->desconectar();
					return $llEncontro;
				}
		}
?>
