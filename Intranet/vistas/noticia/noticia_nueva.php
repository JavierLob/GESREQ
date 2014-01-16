<?php
	session_start();
	
	$lnHay=(isset($_GET['lcHay']))?$_GET['lcHay']:"";
	$lcOperacion=(isset($_GET['lcOperacion']))?$_GET['lcOperacion']:"";
	$idUsuario=(isset($_SESSION["idusuario"]))?$_SESSION["idusuario"]:"";
	$institucion=(isset($_SESSION["institucion"]))?$_SESSION["institucion"]:"";
	$nombrecol=(isset($_SESSION["nombrecol"]))?$_SESSION["nombrecol"]:"";
	
	
	
?>
			<section class="cont_completo_formulario">
				<div id="cuadro_grande">
					<h1>REGISTRO DE NOTICIAS</h1>
					<form action="../controlador/control_noticia.php" name="form1" method="post" autocomplete="off">
						<input type="hidden" name="txtoperacion" value="<?=$lcOperacion;?>"/>
						<input type="hidden" name="txthay" value="<?=$lnHay;?>" />
						<input type="hidden" name="urlnot" value="<?=$urlnot;?>" />
						<table>
							<tr>
								<td style="padding-left:50px;" colspan="3">
									<label>Titulo Artículo:</label><span class="necesario">*</span>
								</td>	
							</tr>
							<tr>
								<td style="padding-left:40px;" colspan="3">
									<input type="text" id="nombre" maxlength="200" name="nombre" style="width: 850px;" class="text" value="<?=$titulonot;?>" />
								</td>
							</tr>
							<tr>
								<td style="padding-left:50px;"  colspan="1">
									<label>Fuente:</label><span class="necesario">*</span>
								</td>
								<td style="padding-left:150px;"  colspan="1">
									<label>URL Fuente:</label><span class="necesario">*</span>
								</td>
								<td style="padding-left:130px;"  colspan="1">
									<label>Fecha:</label><span class="necesario">*</span>
								</td>
							</tr>
							<tr>
								<td style="padding-left:40px;"  colspan="1">
									<input type="text" id="fuentenot" name="fuentenot" maxlength="100"  class="text" value="<?=$fuentenot;?>"/>
								</td>
								<td style="padding-left:140px;"  colspan="1">
									<input type="text" id="urlfuentenot" name="urlfuentenot" maxlength="200"  class="text" value="<?=$URLfuentenot;?>"/>
								</td>
								<td style="padding-left:120px;"  colspan="1">
									<input type="text" id="fechanot"  class="text" name="fechanot" value="<?=$fechanot;?>" Placeholder="DD/MM/AAAA" datepicker=true/>
								</td>
							</tr>
							<tr>				
								<td style="padding-left:50px;"  colspan="3">
									<label for="msj">Contenido de la Noticia:</label><span class="necesario">*</span>
								</td>
							</td>
							<tr>
								<td style="padding-left:50px;"  colspan="3">
									<textarea  cols="105" name="msj" rows="15"></textarea>
								</td>
							</tr>
						</table>
						<table style="margin-left:30%"  width="40%">
							<tr>
								<td>
									<input type="submit" name="btnguardar" class="btnaceptar" value="Guardar" />
								</td>
								<td>
									<input type="button" name="btncancelar" onclick="cancelar()" class="btnaceptar" value="Cancelar" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</section>	
			<script type="text/javascript" src="../media/js/noticia/noticia_nueva.js"></script>
