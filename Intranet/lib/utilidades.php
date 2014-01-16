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
		 
		 
class clsUtilidades {
	
	function generarUsuario($pcCedula,$pcNombrep,$pcNombres,$pcApellidop,$pcApellidos){
		$dato[0]=$this->generarNombre($pcCedula,$pcNombrep,$pcNombres,$pcApellidop,$pcApellidos);
		$dato[1]=$this->generarPassword($pcCedula,$pcNombrep,$pcNombres,$pcApellidop,$pcApellidos);
		return $dato;
	}
	
	function generarNombre($pcCedula,$pcNombrep,$pcNombres,$pcApellidop,$pcApellidos){
		$inicial=substr($pcNombrep,0,1);
		$segundo=substr($pcNombres,0,1);
		$longitud=strlen($pcCedula);
		if($longitud>7){
			$q=6;
		}
		else if($longitud<=7){
			$q=5;
		}
		$final  =substr($pcCedula,$q,2);
		$medio = $pcApellidop;
		$username=strtolower($inicial.$segundo.$medio.$final);
		return $username;
	}
	
	function generarPassword(){
		$longitud_caracteres = 7;
		$longitud_especiales = 1;
		$longitud_numeros	 = 1;
		$longitud_mayusculas = 1;
		$caracteres_mayuscula = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$caracteres_minuscula = 'abcdefghijklmnopqrstuvwxyz';
		$numeros='0123456789';
		$especiales='.';
		mt_srand(microtime() * 10000000000);     
		for($i = 0; $i < $longitud_mayusculas; $i++)    
		{     
			$key = mt_rand(0,strlen($caracteres_mayuscula)-1);    
			$passmay = $passmay . $caracteres_mayuscula{$key};    
		}
		for($i = 0; $i < $longitud_caracteres; $i++)    
		{     
			$key = mt_rand(0,strlen($caracteres_minuscula)-1);    
			$passstring = $passstring . $caracteres_minuscula{$key};    
		}
		for($i = 0; $i < $longitud_especiales; $i++)    
		{     
			$key = mt_rand(0,strlen($especiales)-1);    
			$passespecial = $passespecial . $especiales{$key};    
		}
		for($i = 0; $i < $longitud_numeros; $i++)    
		{     
			$key = mt_rand(0,strlen($numeros)-1);    
			$passnum = $passnum . $numeros{$key};    
		}
		$password=$passmay . $passstring . $passespecial . $passnum;
		return $password; 
	}
	
	function enviarEmail($pcUsername,$pcPassword,$pcEmail,$pcCedula,$pcNombre,$pcApellido){
		$serial=$this->serializarID($pcCedula);
		$destinatario = $pcEmail;
		$asunto = "Bienvenido a aul@FRONTINO".' '.$pcApellido.', '.$pcNombre;
		$cuerpo = '<html>';
		$cuerpo.= '<head>';
		$cuerpo.= '<title>Bienvenido a aul@FRONTINO '.' '.$pcApellido.', '.$pcNombre.'!</title>';
		$cuerpo.= '</head>';
		$cuerpo.= '<body>';
		$cuerpo.= '<h1>Bienvenido a aul@FRONTINO '.' '.$pcApellido.', '.$pcNombre.'!</h1>';
		$cuerpo.= '<h1>Ha sido aceptado(a) como usuario de la plataforma de aprendizaje de la Universidad Politécnica Territorial del Estado Portuguesa Juan de Jesús Montilla.</h1>';
		$cuerpo.= '<p>A continuación se le presenta su nombre de usuario y contraseña con los que podrá acceder a los distintos servicios que presta la plataforma aul@FRONTINO.</p>';	
		$cuerpo.= '<h2><b><font color="red">Nombre de Usuario: </font></b><b><font size="6px">'.$pcUsername.'</font></b></h2>';
		$cuerpo.= '<h2><b><font color="red">Contraseña: </font></b><b><font size="6px">'.$pcPassword.'</font></b></h2>';
		$cuerpo.= '<h2><font color="blue">¡LEA IMPORTANTE!</font></h2>';
		$cuerpo.= '<p>A continuación se presentan las instrucciones para entrar a los servicios de aulaFrontino:</p>';
		$cuerpo.= '<p>		1.	Ingrese a la página de inicio de aulaFrontino y haga clic en el botón “Entrar” de la intranet.</p>';
		$cuerpo.= '<p>		2.	Ingrese su Usuario y Contraseña y presione aceptar.</p>';
		$cuerpo.= '<p>		3.	Seleccione el icono del servicio a cual desea acceder (Aula Virtual, Foro).</p>';
		$cuerpo.= '<p>Cualquier duda que se le presente envié un correo a la siguiente dirección:  </p>';
		$cuerpo.= '<p><font color="blue">webmaster@aulafrontino.org.ve</font></p></BR>
		<p style="margin: 10px 0px 0px; color: rgb(51, 51, 51); font-family: '."'lucida grande'".', tahoma, verdana, arial, sans-serif; font-size: 12.727272033691406px; line-height: 15.454545021057129px;">
							<span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Mantente informado a traves de nuestras redes sociales</span></span> &nbsp;&nbsp;<a href="https://www.facebook.com/aulafrontinosocial?fref=ts"><span style="color:#0000ff;"><span style="font-size:16px;">Facebook</span></span></a>&nbsp;<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:16px;">y  &nbsp;<a href="https://twitter.com/aulaFrontino"><span style="color:#008000;">Twitter</span></span></span></a></p>
						<p style="margin: 10px 0px 0px; color: rgb(51, 51, 51); font-family: '."'lucida grande'".', tahoma, verdana, arial, sans-serif; font-size: 12.727272033691406px; line-height: 15.454545021057129px;">
							&nbsp;</p>
						<p style="margin: 10px 0px 0px; color: rgb(51, 51, 51); font-family: '."'lucida grande'".', tahoma, verdana, arial, sans-serif; font-size: 12.727272033691406px; line-height: 15.454545021057129px;">
							<span style="font-family:arial,helvetica,sans-serif;"><span style="font-size:16px;">Administrador de aul@Frontino.</span></span></p>
						<p>
							&nbsp;</p>
';
		$cuerpo.= '</body>';
		$cuerpo.= '</html>';
		
		//para el envío en formato HTML
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";

		//dirección del remitente
		$headers .= "From: Administrador del sitio <webmaster@aulafrontino.org.ve>\r\n";

		//dirección de respuesta, si queremos que sea distinta que la del remitente
		$headers .= "Reply-To: webmaster@aulafrontino.org.ve\r\n";

		//ruta del mensaje desde origen a destino
		$headers .= "Return-path: ".$pcEmail."\r\n";

		//direcciones que recibián copia
		$headers .= "Cc: \r\n";

		//direcciones que recibirán copia oculta
		$headers .= "Bcc: webmaster@aulafrontino.org.ve\r\n";

		mail($destinatario,$asunto,$cuerpo,$headers);
	}
	
		function validaURL($url){
		if($url!=""){
			/*$valor=$this->soloLetras($url);
			if(!$valor){
				return true;
			}
			$valor=$this->soloNumeros($url);
			if(!$valor){
				return true;
			}*/
			$valor=$this->validaFecha($url);
			if(!$valor){
				return true;
			}
			else if($valor){
				return false;
			}
		}else {
			return true;
		}
		}
	
		function soloLetras($c){
			$bueno=true;
			$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚ%";
			if($c!=""){
				for ($i=0; $i<strlen($c); $i++){
				if (strpos($permitidos, substr($c,$i,1))===false){
					return false;
				}
				}
			}
		return $bueno; 
		}
		
		function validaUsuario($c){
			$bueno=true;
			$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚ%0123456789";
			if($c!=""){
				for ($i=0; $i<strlen($c); $i++){
				if (strpos($permitidos, substr($c,$i,1))===false){
					return false;
				}
				}
			}
			return $bueno; 
		}
		
		function validaOperacion($c){
			$bueno=true;
			$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_0123456789";
			if($c!=""){
				for ($i=0; $i<strlen($c); $i++){
				if (strpos($permitidos, substr($c,$i,1))===false){
					return false;
				}
				}
			}
			return $bueno; 
		}
		
		function validaPassword($c){
			$bueno=true;
			$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZáéíóúÁÉÍÓÚ%0123456789.;:/%#*";
			if($c!=""){
				for ($i=0; $i<strlen($c); $i++){
				if (strpos($permitidos, substr($c,$i,1))===false){
					return false;
				}
				}
			}
			return $bueno; 
		}
	
		function soloNumeros($v){
			$bueno=true;
			$permitidos = "1234567890";
			if($v!=""){
				for ($i=0; $i<strlen($v); $i++){
					if (strpos($permitidos, substr($v,$i,1))===false){
						return false;
				}
			}
		}
		return $bueno;
		}
		
		function validaFecha($v){
			$bueno=true;
			$permitidos = "1234567890/";
			if($v!=""){
				for ($i=0; $i<strlen($v); $i++){
					if (strpos($permitidos, substr($v,$i,1))===false){
						return false;
					}
				}
				return $bueno;
			}
		return $bueno;
		}
		
		function validarAno($p){
			$bueno=false;
			$v=substr($p,6,4);
			if($v < date("Y",strtotime("-10 year")))
			{
				if($v > date("Y",strtotime("-90 year"))){
					$bueno=true;
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
	
		function comprobar_email($email){
			$mail_correcto = 0;
			//compruebo unas cosas primeras
			if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
			if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
			//miro si tiene caracter .
			if (substr_count($email,".")>= 1){
				//obtengo la terminacion del dominio
				$term_dom = substr(strrchr ($email, '.'),1);
				//compruebo que la terminación del dominio sea correcta
				if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
					//compruebo que lo de antes del dominio sea correcto
					$antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
					$caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
					if ($caracter_ult != "@" && $caracter_ult != "."){
						$mail_correcto = 1;
					}
				}
			}
			}
		}
		if ($mail_correcto)
			return 1;
		else
			return 0;
		}
		
		function validarDominio($domain)
		{
			// Get the records
			getmxrr($domain, $mx_records, $mx_weight);
			return (count($mx_records) > 0);
		}

		function validarEmail($value)
		{
			$reg_exp= "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/";
			$result=preg_match($reg_exp, $value);
			if ($result) 
			{
				//validar el registro mx del dominio
				$mailparts=explode("@",$value);
				$retVal=$this->validarDominio($mailparts[1]);
			}
			else 
			{
				$retVal=false;
			}
			return $retVal;
		} 	
		
		function format_fecha($pcFecha){
			$now=date("d/m/Y",time()-1740);
			if(strlen($pcFecha)<10)
			{
				$dia=substr($pcFecha,8,2);
				$mes=substr($pcFecha,5,2);
				$ano=substr($pcFecha,0,4);
				$now=$dia."/".$mes."/".$ano;
			}
			return $now;
		}
		
		function inicia_sesion($pcid,$pcrol){
			$sesion_valida=false;
			if($pcid!==""){
				$array		=$this->deserializarURLidSia($pcid);
				$llValida	=$this->validaUrl($array);
					if(!$llValida){
						if(($pcrol==01) || ($pcrol==00))
							$sesion_valida=true;
					}
			}
			return $sesion_valida;
		}
		
		function format_hora($pcHora){
			if(strlen($pcHora)<6){
				$now=date("H:i:s",time()-1740);
				return $now;
			}
			return $pcHora;
		}
		
	function serializar($array) { 
		$tmp = serialize($array); 
		$tmp = urlencode($tmp); 
		return $tmp; 
	} 	
	
	function serializarIDeva($pcID, $pcIDeva){
		$inicial  =substr($pcID,0,2);
		$medio	  =substr($pcID,2,4);	
		$caracteres_mayuscula = 'abcdefghijklmnopqrstABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		for($i = 0; $i < 7; $i++)    
		{     
			$key = mt_rand(0,strlen($caracteres_mayuscula)-1);    
			$passmay = $passmay . $caracteres_mayuscula{$key};    
		}
		$arreglo[1]=$inicial;
		$arreglo[3]=$medio;
		$arreglo[0]=$passmay;
		$arreglo[2]=$passmay;
		$arreglo[4]=$pcIDeva;
		$tmp = serialize($arreglo); 
		$tmp = urlencode($tmp); 
		return $tmp;
	}
	
	function serializarID($pcarray){
		$array  =substr($pcarray,0,8);
		$longitud=strlen($array);
		if($longitud>7){
			$q=6;
			$p=2;
		}
		else if($longitud<=7){
			$q=5;
			$p=1;
		}
		$inicial  =substr($array,0,2);
		$medio	  =substr($array,2,4);
		$final	  =substr($array,$q,$p);
		$caracteres_mayuscula = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		for($i = 0; $i < 4; $i++)    
		{     
			$key = mt_rand(0,strlen($caracteres_mayuscula)-1);    
			$passmay = $passmay . $caracteres_mayuscula{$key};    
		}
		$arreglo[1]=$inicial;
		$arreglo[3]=$medio;
		$arreglo[0]=$final;
		$arreglo[2]=$passmay;
		$tmp = serialize($arreglo); 
		$tmp = urlencode($tmp); 
		return $tmp;
	}
	
	function serializarIDsia($pcID){
		$inicial  =substr($pcID,0,2);
		$medio	  =substr($pcID,2,4);	
		$caracteres_mayuscula = 'abcdefghijklmnopqrstABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		for($i = 0; $i < 7; $i++)    
		{     
			$key = mt_rand(0,strlen($caracteres_mayuscula)-1);    
			$passmay = $passmay . $caracteres_mayuscula{$key};    
		}
		$arreglo[1]=$inicial;
		$arreglo[3]=$medio;
		$arreglo[0]=$passmay;
		$arreglo[2]=$passmay;
		$tmp = serialize($arreglo); 
		$tmp = urlencode($tmp); 
		return $tmp;
	}
	
	function serializarResp($pcID){
		$inicial  =substr($pcID,0,2);
		$medio	  =substr($pcID,2,4);	
		$caracteres_mayuscula = 'abcdefghijklmnopqrstABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		for($i = 0; $i < 7; $i++)    
		{     
			$key = mt_rand(0,strlen($caracteres_mayuscula)-1);    
			$passmay = $passmay . $caracteres_mayuscula{$key};    
		}
		$arreglo[1]=$inicial;
		$arreglo[3]=$medio;
		$arreglo[0]=$passmay;
		$arreglo[2]=$passmay;
		$tmp = serialize($arreglo); 
		$tmp = urlencode($tmp); 
		return $tmp;
	}
	
	function deserializarURLresp($arreglo)
	{
		$tmp = stripslashes($arreglo); 
		$tmp = urldecode($tmp); 
		$tmp = unserialize($tmp); 
		$inicial=$tmp[1];
		$medio=$tmp[3];
		$final=$tmp[0];
		$final=$final.$temp[2];
		return $inicial . $medio ;
	}
	
	function deserializarURLidSia($arreglo)
	{
		$tmp = stripslashes($arreglo); 
		$tmp = urldecode($tmp); 
		$tmp = unserialize($tmp); 
		$inicial=$tmp[1];
		$medio=$tmp[3];
		$final=$tmp[0];
		$final=$final.$temp[2];
		return $inicial . $medio ;
	}
	
	function deserializarURLeva($arreglo)
	{
		$tmp = stripslashes($arreglo); 
		$tmp = urldecode($tmp); 
		$tmp = unserialize($tmp); 
		$inicial=$tmp[1];
		$medio=$tmp[3];
		$final=$tmp[0];
		$final=$final.$temp[2];
		$eva = $tmp[4];
		$datos[0] = $inicial.$medio;
		$datos[1] = $eva;
		return $datos ;
	}
	
	function deserializarURL($arreglo)
	{
		$tmp = stripslashes($arreglo); 
		$tmp = urldecode($tmp); 
		$tmp = unserialize($tmp); 
		$inicial=$tmp[1];
		$medio=$tmp[3];
		$final=$tmp[0];
		return $inicial . $medio . $final;
	}
	
	public function timeout($v1){   
	   $v2=date('i');
	   $vt=$v1-$v2;
	   if($vt>60){	//Valida que el tiempo que tiene inactivo no sea menor a 5min, en caso afirmativo se cierra su sesion
			header("location: ../logout/?q=timeout");
	   }else{
			$_SESSION["timeup"]=date('i');
	   }
	}
	
	function ActualizarDatosHtml($pcPagina, $pcDatos)
	{
         foreach ($pcDatos as $clave=>$valor) 
		 {
            $pcPagina = str_replace('{'.$clave.'}', $valor, $pcPagina);
         }
         return $pcPagina;
    }

    function convertir_romano($num)
    {
			if ($num <0 || $num >9999) {return -1;}
			$r_ones = array(1=>"I", 2=>"II", 3=>"III", 4=>"IV", 5=>"V", 6=>"VI", 7=>"VII", 8=>"VIII", 
			9=>"IX");
			$r_tens = array(1=>"X", 2=>"XX", 3=>"XXX", 4=>"XL", 5=>"L", 6=>"LX", 7=>"LXX", 
			8=>"LXXX", 9=>"XC");
			$r_hund = array(1=>"C", 2=>"CC", 3=>"CCC", 4=>"CD", 5=>"D", 6=>"DC", 7=>"DCC", 
			8=>"DCCC", 9=>"CM");
			$r_thou = array(1=>"M", 2=>"MM", 3=>"MMM", 4=>"MMMM", 5=>"MMMMM", 6=>"MMMMMM", 
			7=>"MMMMMMM", 8=>"MMMMMMMM", 9=>"MMMMMMMMM");
			$ones = $num % 10;
			$tens = ($num - $ones) % 100;
			$hundreds = ($num - $tens - $ones) % 1000;
			$thou = ($num - $hundreds - $tens - $ones) % 10000;
			$tens = $tens / 10;
			$hundreds = $hundreds / 100;
			$thou = $thou / 1000;
			if ($thou) {$rnum .= $r_thou[$thou];} 
			if ($hundreds) {$rnum .= $r_hund[$hundreds];} 
			if ($tens) {$rnum .= $r_tens[$tens];} 
			if ($ones) {$rnum .= $r_ones[$ones];} 
		return $rnum;
	}

	function dividir_cedula($cedula)
	{
		$resultado=number_format($cedula, 0, '', '.');
		return $resultado;
	}
	
}
?>
