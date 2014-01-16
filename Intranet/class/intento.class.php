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
		 
	require_once("../nucleo/ModelBD.php");
	class clsIntento extends clsModel{
		
		private $lcIp;
		private $lcEstatus_Ip;
		private $lcIntentos_Ip;
		private $lcCampo_Usuario;
		private $lcCampo_Password;
		private $lcFecha_Intento;
		private $lcHora_Intento;
		private $laArreglo;
		
		public function __construct()
		{
			$this->lcIp				= $this->Get_Real_Ip();
			$this->lcEstatus_Ip		= "";
			$this->lnIntentos_Ip	= 0;
			$this->lcCampo_Usuario	= "";
			$this->lcCampo_Password = '';
			$this->lcFecha_Intento	= date("Y/m/d",time()-1740);
			$this->lcHora_Intento 	= date("H:i:s",time()-1740);
			$this->laArreglo		= array();
			$this->lcBase_Datos="aulafr03_bd_acceso";
			
		}
		
		public function __destruct()
		{
		}
		
		public function set_Campo_Usuario($pcCampo_Usuario)
		{
			$this->lcCampo_Usuario	= $pcCampo_Usuario;
		}
		
		public function set_Campo_Password($pcCampo_Password)
		{
			$this->lcCampo_Password	= $pcCampo_Password;
		}
		
		public function get_Estatus_Ip()
		{
			return $this->lcEstatus_Ip;
		}
		
		public function get_Intentos_Ip()
		{
			return $this->lnIntentos_Ip;
		}
		
		public function get_Ip()
		{
			return $this->lcIp;
		}
		
		public function Get_Real_Ip() 
		{
       	 	if (!empty($_SERVER['HTTP_CLIENT_IP']))
           	 	return $_SERVER['HTTP_CLIENT_IP'];
           
        	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            	return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
       		return $_SERVER['REMOTE_ADDR'];
    	}
	
		public function Incluir_Intento()
		{
			$llHecho			=	false;
			$this->conectar();
			$lcSql				=	"INSERT INTO tintentos ( ip, campousuario, campopassword, fechaintento, horaintento)
									VALUES ('$this->lcIp', '$this->lcCampo_Usuario', '$this->lcCampo_Password',
									'$this->lcFecha_Intento', '$this->lcHora_Intento')";
			$llHecho			= 	$this->ejecutar($lcSql);
			$this->desconectar();
			return $llHecho;
		}
	
		public function Incluir_Intento_Ip()
		{
			$llHecho			=	false;
			$this->conectar();
			$lcSql				=	"INSERT INTO testatusip(
									ip, estatus, intentos)
									VALUES ('$this->lcIp', '0', '1');
									";
			$llHecho=$this->ejecutar($lcSql);
			$this->desconectar();
			return $llHecho;
		}
	
		public function Aumentar_Intento_Ip()
		{
			$lnAumento		=	($this->lnIntentos_Ip + 1);
			$llHecho		=false;
			$this->conectar();
			$lcSql			=	"UPDATE testatusip
								SET intentos='$lnAumento'
								WHERE ip='$this->lcIp';
								";
			$llHecho=$this->ejecutar($lcSql);
			$this->desconectar();
			return $llHecho;
		}

		public function Restaurar_Intento_Ip()
		{
			$llHecho		=false;
			$this->conectar();
			$lcSql			=	"UPDATE testatusip
								SET intentos='0', estatus='0'
								WHERE ip='$this->lcIp';
								";
			$llHecho=$this->ejecutar($lcSql);
			$this->desconectar();
			return $llHecho;
		}
	
		public function Bloquear_Ip()
		{
			$llHecho		=	false;
			$this->conectar();
			$lcSql			=	"UPDATE testatusip
								SET estatus='1'
								WHERE ip='$this->lcIp';
								";
			$llHecho		=	$this->ejecutar($lcSql);
			$this->desconectar();
			return $llHecho;
		}
	
		public function Buscar_Intentos_Ip()
		{
			$lnCantidad		=	0;
			$lcSql			=	"SELECT intentos FROM testatusip WHERE ip='$this->lcIp'";
			$this->conectar();
			$lrTb			=	$this->filtro($lcSql);
				if( $laRow = $this->proximo( $lrTb ) )
				{
					$lnCantidad	=	$laRow["intentos"];
				}
			$this->cierrafiltro($lrTb);
			$this->desconectar();
			return $lnCantidad;
		}
	
		public function Incluir_Falso()
		{
			$llHecho	=	false;
			$this->conectar();
			$lcSql		=	"INSERT INTO tpermitido(ip, fecha, hora, password, usuario)
							VALUES ('$this->lcIp', '$this->lcFecha_Intento', '$this->lcHora_Intento', '$this->lcCampo_Password', '$this->lcCampo_Usuario');
							";
			$llHecho=$this->ejecutar($lcSql);
			$this->desconectar();
			return $llHecho;
	    }
		
		public function Buscar_Datos_Cliente()
		{
			$llHecho	=	false;
			$lcSql="SELECT * FROM testatusip where ip='$this->lcIp'";
			$this->conectar();
			$lrTb=$this->filtro($lcSql);
				if($laRow=$this->proximo($lrTb))
				{
					$this->lcEstatus_Ip		=	$laRow["estatus"];
					$this->lnIntentos_Ip	=	$laRow["intentos"];
					if($this->lnIntentos_Ip	==	"")
					{
						$this->lnIntentos_Ip 	= 0;
					}
					$llHecho=true;
				}
			$this->cierrafiltro($lrTb);
			$this->desconectar();
			return $llHecho;
		}
	}
	
?>
