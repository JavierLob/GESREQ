<?php
class clsMsj {
	
	function mensaje($p){
		switch ($p)
	    {
           case 0:
                   	$r= '<div id="cuadroexito"><h1 class="exito">Listo!</h1><div id="mensaje"><img src="images/iconform4.png"/>"Operacion llevada a cabo con exito."</div></div>'; 
                    return $r;
					break;
			case 1:
                    $r= '<div id="cuadroerror"><h2 class="error">Fallo!</h2><div id="mensaje"><img src="images/iconform4.png"/>"Fallo la operacion."</div></div>'; 
                    return $r;
					break;
		}
		
	}
	
	function respuesta($q){
		switch ($q)
		{
			case 10001:
					$r="Su operacion se ha llevado a cabo con exito.";
					return $r;
					break;
			case 10011:
					$r="ERROR : Su operacion no se ha podido llevar a cabo, por favor intente nuevamente.";
					return $r;
					break;	
	
		}
	}
		
		
}
?>
