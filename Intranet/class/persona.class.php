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
	//require_once("../nucleo/modelo.php");
	
	class clsPersona extends clsModel
	{
		
   /*---------------------------------------------------------------------
   *     ATRIBUTOS PRIVADOS DE LA CLASE 
   *-------------------------------------------------------------------------*/
	
		private $lcNacionalidad;	
		private $lcCedula;
		private $lcNombreuno;
		private $lcNombredos;
		private $lcApellidouno;
		private $lcApellidodos;
		private $lcCorreouno;
		private $lcCorreodos;
		private $lcNumerouno;	
		private $lcNumerodos;
		private $lcDireccion;	
		private $lcSexo;	
		private $lcFechanac;		
		private $lcAsignatura;
		private $lcCargo;

   /*---------------------------------------------------------------------
   *    METODO CONSTRUCTOR
   *-------------------------------------------------------------------------*/
	
		public function __construct()
		{
			$this->lcNacionalidad;	
			$this->lcCedula;
			$this->lcNombreuno;
			$this->lcNombredos;
			$this->lcApellidouno;
			$this->lcApellidodos;
			$this->lcCorreouno;
			$this->lcCorreodos;
			$this->lcNumerouno;	
			$this->lcNumerodos;
			$this->lcDireccion;	
			$this->lcSexo;	
			$this->lcFechanac;		
			$this->lcAsignatura;
			$this->lcCargo;

		}
		
   /*---------------------------------------------------------------------
   *    METODO DESTRUCTOR
   *-------------------------------------------------------------------------*/
			
		public function __destruct()
		{
			
		}
		
	/*---------------------------------------------------------------------
   *    METODOS DE PROPIEDAD SET 
   *-------------------------------------------------------------------------*/

		public function setaDatos($pcDatos_copy)
		{
				//Asignar Valores
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
			$this->lcTipo			=	$pcDatos_copy[12];
			$this->lcCampus			=	$pcDatos_copy[14];
		}
			
		/*---------------------------------------------------------------------
   *    METODO INCLUIR
   *-------------------------------------------------------------------------*/
   	
		public function incluir()
		{
			$llHecho=false;
			$this->conectar();
			$lcSql="INSERT INTO `tpersona`
					(`idpersona`, `nombreunoper`, `nombredosper`, `apellidounoper`, `apellidodosper`, 
					 `fecha_nac_per`, `sexoper`, `emailunoper`, `emaildosper`, `telefonounoper`, 
					 `telefonodosper`, `direccionper`, `idtipoper`, `nacionalidadper`, `idcampus`, `idprograma`) 
					VALUES 
					('$this->lcCedula',UPPER('$this->lcNombreuno'),UPPER('$this->lcNombredos'),UPPER('$this->lcApellidouno'),UPPER('$this->lcApellidodos'),
					 '$this->lcFechanac','$this->lcSexo','$this->lcCorreouno','$this->lcCorreodos','$this->lcNumerouno',
					 '$this->lcNumerodos',UPPER('$this->lcDireccion'),'$this->lcTipo','$this->lcNacionalidad','$this->lcCampus','$this->lcPrograma')";
			$llHecho=$this->ejecutar($lcSql);
			$this->desconectar();
			return $llHecho;
	    }
			
	/*---------------------------------------------------------------------
   *    METODO BUSCAR
   *-------------------------------------------------------------------------*/
   
		public function buscar()
		{
			$llEncontro=false;
			$lcSql="SELECT * FROM tpersona WHERE (idpersona='$this->lcCedula')";
			$this->conectar();
			$lrTb=$this->filtro($lcSql);
				if($laRow=$this->proximo($lrTb))
				{
					$this->lcEstatus = $laRow["estadosolicitud"];
					$llEncontro=true;
				}
			$this->cierrafiltro($lrTb);
			$this->desconectar();
			return $llEncontro;
		}
		
		public function buscar_email()
		{
			$llEncontro=false;
			$lcSql="SELECT * FROM tpersona WHERE (emailunoper='$this->lcCorreouno')";
			$this->conectar();
			$lrTb=$this->filtro($lcSql);
				if($laRow=$this->proximo($lrTb))
				{
					$this->lcEstatus = $laRow["estadosolicitud"];
					$llEncontro=true;
				}
			$this->cierrafiltro($lrTb);
			$this->desconectar();
			return $llEncontro;
		}
		
		function consultaRegistro_Usuario($pcUsuario) // seleccion de datos
		{
			$idpersona=$pcID;
			$lcSql="SELECT *,date_format(fecha_nac_per,'%d/%m/%Y') as fecha_nac FROM vusuario WHERE idusuario='$pcUsuario'";
			$this->conectar();
			$cursor   = $this->filtro($lcSql);
			if ($row = $this->proximo($cursor))
			{
				$filas [0] = $row["idpersona"];
				$filas [1] = $row["nombreunoper"];
				$filas [2] = $row["nombredosper"];
				$filas [3] = $row["apellidounoper"];
				$filas [4] = $row["apellidodosper"];
				$filas [5] = $row["fecha_nac"];
				$filas [6] = $row["sexoper"];
				$filas [7] = $row["emailunoper"];
				$filas [8] = $row["emaildosper"];
				$filas [9] = $row["telefonounoper"];
				$filas [10] = $row["telefonodosper"];
				$filas [11] = $row["direccionper"];
				$filas [12] = $row["cargoper"];
				$filas [13] = $row["asignaturaper"];
				$filas [14] = $row["idusuario"];
				$filas [15] = $row["preguntaunousu"];
				$filas [16] = $row["preguntadosusu"];
				$filas [17] = $row["nacionalidadper"];
				$filas [18] = $row["nombrecortoins"];
				$filas [19] = $row["nombrecortocam"];
				$filas [20] = $row["nombretipoper"];
				$filas [21] = $row["idprograma"];
			}
			$this->cierrafiltro($cursor);
			$this->desconectar();
			return $filas;	  
		}
	
		
	  public function fechabd($lcFecha)
	  {
	  	 $lcNow=date("Y-m-d");
	  	 if (strlen($lcFecha)==10)
	  	 {
	  	 	$lcDia=substr($lcFecha,0,2);
	  	 	$lcMes=substr($lcFecha,3,2);
	  	 	$lcAno=substr($lcFecha,6,4);
	  	 	$lcNow=$lcAno."-".$lcMes."-".$lcDia;
	  	 }
	  	 return $lcNow;
	  }
		
		public function getcEstatus (){
			return $this->lcEstatus;
		}
		
		function listadoPersonasAsi($pcAsignatura) // seleccion de un servicio para llenar arreglo con datos
		{
			$contador = 0;
			$lcSql="SELECT * FROM tpersona WHERE cargoper='E' AND asignaturaper='$pcAsignatura' ORDER BY apellidounoper,nombreunoper,asignaturaper";
			$this->conectar();
			$cursor   = $this->filtro($lcSql);
			if ($row = $this->proximo($cursor))
			{
				DO
					{
						$filas [$contador] [0] = $row["nacionalidadper"];
						$filas [$contador] [1] = $row["idpersona"];
						$filas [$contador] [2] = $row["nombreunoper"];
						$filas [$contador] [3] = $row["nombredosper"];
						$filas [$contador] [4] = $row["apellidounoper"];
						$filas [$contador] [5] = $row["apellidodosper"];
						$filas [$contador] [6] = $row["sexoper"];
						$filas [$contador] [7] = $row["emailunoper"];
						$filas [$contador] [8] = $row["telefonounoper"];
						$filas [$contador] [9] = $row["telefonodosper"];
						$filas [$contador] [10] = $row["asignaturaper"];	
						$contador++;
					}
				WHILE ($row = $this->proximo($cursor));
			}
			$this->cierrafiltro($lrTb);
			$this->desconectar();
			return $filas;	  
		}
		
		
		function consultaRegistro($pcID) // seleccion de datos
		{
			$idpersona=$pcID;
			$lcSql="SELECT *,date_format(fecha_nac_per,'%d/%m/%Y') as fecha_nac FROM vusuario WHERE idpersona='$idpersona'";
			$this->conectar();
			$cursor   = $this->filtro($lcSql);
			if ($row = $this->proximo($cursor))
			{
				$filas [0] = $row["idpersona"];
				$filas [1] = $row["nombreunoper"];
				$filas [2] = $row["nombredosper"];
				$filas [3] = $row["apellidounoper"];
				$filas [4] = $row["apellidodosper"];
				$filas [5] = $row["fecha_nac"];
				$filas [6] = $row["sexoper"];
				$filas [7] = $row["emailunoper"];
				$filas [8] = $row["emaildosper"];
				$filas [9] = $row["telefonounoper"];
				$filas [10] = $row["telefonodosper"];
				$filas [11] = $row["direccionper"];
				$filas [12] = $row["cargoper"];
				$filas [13] = $row["asignaturaper"];
				$filas [14] = $row["idusuario"];
				$filas [15] = $row["preguntaunousu"];
				$filas [16] = $row["preguntadosusu"];
				$filas [17] = $row["nacionalidadper"];
				$filas [18] = $row["nombrecortoins"];
				$filas [19] = $row["nombrecortocam"];
				$filas [20] = $row["nombretipoper"];
				$filas [21] = $row["idprograma"];
			}
			$this->cierrafiltro($cursor);
			$this->desconectar();
			return $filas;	  
		}
		
		public function modificar_registro($pcIdpersona,$pcEmail,$pcEmail2, $pcTelefono,$pcTelefono2, $lcFechanac, $pcDireccion,$pcNacionalidad,$pcSexo){
			$llHecho=false;
			$FechaNac=$this->fechabd($lcFechanac);
			$this->conectar();
			$lcSql="UPDATE tpersona
					SET emailunoper='$pcEmail' , telefonounoper='$pcTelefono', direccionper='$pcDireccion', nacionalidadper='$pcNacionalidad',
					emaildosper='$pcEmail2', telefonodosper='$pcTelefono2', fecha_nac_per='$FechaNac', sexoper='$pcSexo'
					WHERE idpersona='$pcIdpersona';
					";
			$llHecho=$this->ejecutar($lcSql);
			$this->desconectar();
			return $llHecho;
		}
		
		//JAVIER 26/01/2013
		function sugerencia_persona($psIdUsuario) // seleccion de datos
		{
		
			$liI=0;
			$lcSql="SELECT * FROM vusuario WHERE idusuario<>'$psIdUsuario' ORDER BY RAND() LIMIT 5";
			$this->conectar();
			$cursor   = $this->filtro($lcSql);
			while ($row = $this->proximo($cursor))
			{
				$filas[$liI][0]= $row["idusuario"];
				$filas[$liI][1]= $row["nombreunoper"];
				$filas[$liI][2]= $row["nombredosper"];
				$filas[$liI][3]= $row["apellidounoper"];
				$filas[$liI][4]= $row["apellidodosper"];
				$filas[$liI][5]= $row["sexoper"];
				$liI++;
				
			}
			$this->cierrafiltro($cursor);
			$this->desconectar();
			return $filas;	  
		}
}
?>
