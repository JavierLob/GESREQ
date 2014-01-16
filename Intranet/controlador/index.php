<?php
	if($_POST) {
			if(array_key_exists('tipo', $_POST)) {
				$lcEvento=$_POST['tipo'];
			}
		}
		
	if($lcEvento=='login_web'){
		include('con_validar_acceso.php');
	}
?>