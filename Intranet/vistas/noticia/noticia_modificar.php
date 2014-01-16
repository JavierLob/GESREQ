<?php
	session_start();

	$idtnoticia=(isset($_GET['idtnoticia']))?$_GET['idtnoticia']:"";
	$titulonot=(isset($_GET['titulonot']))?$_GET['titulonot']:"";
	$fuentenot=(isset($_GET['fuentenot']))?$_GET['fuentenot']:"";
	$URLfuentenot=(isset($_GET['URLfuentenot']))?$_GET['URLfuentenot']:"";
	$fechanot=(isset($_GET['fechanot']))?$_GET['fechanot']:"";
	$urlnot=(isset($_GET['urlnot']))?$_GET['urlnot']:"";
	$lnHay=(isset($_GET['lnHay']))?$_GET['lnHay']:"";
	$lcOperacion=(isset($_GET['lcOperacion']))?$_GET['lcOperacion']:"";
	$idUsuario=(isset($_SESSION["idusuario"]))?$_SESSION["idusuario"]:"";
	$institucion=(isset($_SESSION["institucion"]))?$_SESSION["institucion"]:"";
	$nombrecol=(isset($_SESSION["nombrecol"]))?$_SESSION["nombrecol"]:"";

	
	
?>
			<section class="cont_completo_formulario">
				<div id="cuadro_grande">
					<h1>MODIFICAR NOTICIAS</h1>
					<form action="../controlador/control_noticia.php" name="form1" method="post" autocomplete="off">
						<input type="hidden" name="txtoperacion" value="<?=$lcOperacion;?>"/>
						<input type="hidden" name="txthay" value="<?=$lnHay;?>" />
						<input type="hidden" name="urlnot" value="<?=$urlnot;?>" />
						<input type="hidden" name="idtnoticia" value="<?=$idtnoticia;?>" />
						<table>
							<tr>
								<td style="padding-left:50px;" colspan="3">
									<label>Titulo Artículo:</label><span class="necesario">*</span>
								</td>	
							</tr>
							<tr>
								<td style="padding-left:40px;" colspan="3">
									<input type="text" name="nombre" style="width: 850px;" class="text" value="<?=$titulonot;?>" />
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
									<input type="text" name="fuentenot"  class="text" value="<?=$fuentenot;?>"/>
								</td>
								<td style="padding-left:140px;"  colspan="1">
									<input type="text" name="urlfuentenot"  class="text" value="<?=$URLfuentenot;?>"/>
								</td>
								<td style="padding-left:120px;"  colspan="1">
									<input type="text" id="fechanot"  class="text" name="fechanot" value="<?=$fechanot;?>" Placeholder="DD/MM/AAAA" datepicker=true/>
								</td>
							</tr>
						</table>
							<?php	
							if($lnHay==2)
							{
								echo '<div id="popu" style="display: block; width: 400px; border:3px solid #CCC;background:#CCC;position:absolute;margin: 0 auto 0 200px;text-align:center; z-index:999;" >
								<h3>NOTICIAS ENCONTRADAS</h3>
								<select size="10" style="width: 400px" name="idtnoticia2">';
										include_once("../class/noticia.class.php");
										$cont=0;
										$lobjNoticia 				= new clsNoticia();
										$lobjNoticia->listar();
										$arreglo=$lobjNoticia->get_arreglo();
										$tope=$lobjNoticia->numero_filas();
										while($cont<$tope)
										{
										
											echo "<option value='".$arreglo[$cont]["idtnoticia"]."'>".$arreglo[$cont]["idtnoticia"]."  ".$arreglo[$cont]["titulonot"]."  ".$arreglo[$cont]["fuentenot"]."  ".$arreglo[$cont]["fechanot"]."  </option>";
											$cont++;
										}
								echo '</select><hr /></div>
								
								';			
							}
							if($urlnot=="")
							{
							echo '
							<table>
								<tr>
									<td style="padding-left:50px;"  colspan="3">
										<textarea  cols="105" name="msj" rows="15"></textarea>
									</td>
								</tr>
							</table>
							';}
							else
							{
								$contenido=file_get_contents('/home/proyectw/public_html/noticias/noticias_data/'.$urlnot.'');
								echo '
										<table>
											<tr>
												<td style="padding-left:50px;"  colspan="3">
													<textarea  cols="105" name="msj" rows="15">'.$contenido.'</textarea>
												</td>
											</tr>
										</table>
									 ';
							}
							?>
						<table style="margin-left:30%"  width="40%">
							<tr>
								<td>
									<input type="button" name="btnbuscar" class="btnaceptar" onclick="buscar()" value="Buscar" />
								</td>
								<td>
									<input type="button" name="btneditar" class="btnaceptar" onclick="guardar()" value="Modificar" />
								</td>
								<td>
									<input type="button" name="btncancelar" class="btnaceptar" onclick="cancelar()" value="Cancelar" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</section>	
			<script type="text/javascript" src="../media/js/noticia/noticia_modificar.js"></script>