<?php
	#####################################################################
	#						CLASE ABSTRACTA MODEL						#
	#					Se conecta con la base de datos					#
	#####################################################################
   
   abstract class clsModel
   {
	  /******************************************************************
	   * 	Atributos de la clase 
	   * ****************************************************************/
	    
   	  private static $lcServidor="localhost";
	  private static $lcUsuario="root";
	  private static $lcContrasena="amilcar"; 
	  private $arCon;
	  
	  protected $lcSql;
	  protected $lcRows = array();
	  protected $lcBaseDatos="bd_aulafrontino";
	  
	 
	  //FUNCION PROTEGIDA CONECTAR
   	  protected function conectar()
   	  {
   	  	 $this->arCon=mysql_connect(self::$lcServidor,self::$lcUsuario,self::$lcContrasena) OR die('No pudo conectarse');
   	  	 mysql_select_db($this->lcBaseDatos,$this->arCon) OR die('Invalida Selección.');
   	  	 mysql_query("SET NAMES utf8");
      }
      
	  //FUNCION PROTEGIDA DESCONECTAR
	  protected function desconectar()
      {
      	 mysql_close($this->arCon);
	  }
	  
	  //FUNCION PROTEGIDA FILTRO DE BUSQUEDA
      protected function filtro($pcSql)
      {
      	 $lrTb=mysql_query($pcSql,$this->arCon) OR die('No pudo ejecutarse'.mysql_error());
      	 return $lrTb;
      }
	  
      //FUNCION PROTEGIDA CIERRAFILTRO DE BUSQUEDA
      protected function cierrafiltro($prTb)
      {
         mysql_free_result($prTb);
      }
      
	  //FUNCION PROTEGIDA EJECUTAR (EJECUTAR QUERYS SENCILLOS)
      protected function ejecutar($pcSql)
      {
		 $this->conectar();
      	 $lrTb=mysql_query($pcSql,$this->arCon) OR die('No pudo conectarse'.mysql_error());
		 if (mysql_affected_rows($this->arCon)==0)
		    return false;
		 return true;
      }
      
	  //FUNCION PROXIMO PARA RECORRER LA PROXIMA POSICION DEL ARRAY
      protected function proximo($prTb)
      {
      	 $laRow=mysql_fetch_array($prTb);
      	 return $laRow;
      }
      
	  //FUNCION PROTEGIDA NUMERO DE REGISTROS PARA SABER LA CANTIDAD DE REGISTROS EXISTENTES
      protected function num_registros($prTb)
      {  
 	     $lnRegistros=mysql_num_rows($prTb);
 	     return $lnRegistros;
      }
      
	  //FUNCION BEGIN
      function begin()
	  {
	     mysql_query("BEGIN",$this->arCon);
	  }
	  
	  //FUNCION COMMIT
	  function commit()
	  {
	     mysql_query("COMMIT",$this->arCon);
	  }
	  
	  //FUNCION ROLLBACK
	  protected function rollback()
	  {
	     mysql_query("ROLLBACK",$this->arCon);
	  }
      
	  //FUNCION FECHA EN FORMATO DE LA BASE DE DATOS (DIA/MES/ANO)
	  protected function fechabd($pcFecha)
	  {
	  	 $lcNow=date("Y-m-d");
	  	 if (strlen($pcFecha)==10)
	  	 {
	  	 	$lcDia=substr($pcFecha,0,2);
	  	 	$lcMes=substr($pcFecha,3,2);
	  	 	$lcAno=substr($pcFecha,6,4);
	  	 	$lcNow=$lcAno."-".$lcMes."-".$lcDia;
	  	 }
	  	 return $lcNow;
	  }
   }
?>
