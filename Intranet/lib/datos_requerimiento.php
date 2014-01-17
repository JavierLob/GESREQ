<?php
					$lobjRequerimiento->set_IdRequerimiento($id);
					$laRequerimiento=$lobjRequerimiento->consultar_requerimiento();

					$ID=$laRequerimiento[0];
					$CODIGO= $laRequerimiento[1];
					$TITULO= $laRequerimiento[2];
					$DESCRIPCION = $laRequerimiento[6];
					$ESTATUS= $laRequerimiento[8];

					$PRIORIDAD.='<option value="Baja"';if($laRequerimiento[4]=="Baja"){$PRIORIDAD.='selected';}$PRIORIDAD.='>Baja</option>';
					$PRIORIDAD.='<option value="Media"';if($laRequerimiento[4]=="Media"){$PRIORIDAD.='selected';}$PRIORIDAD.='>Media</option>';
					$PRIORIDAD.='<option value="Alta"';if($laRequerimiento[4]=="Alta"){$PRIORIDAD.='selected';}$PRIORIDAD.='>Alta</option>';
                    

                    $TIPO.='<label class="radio">';
                    $TIPO.='<input type="radio" name="tipo" value="Funcional" ';if($laRequerimiento[3]=="Funcional"){ $TIPO.='checked';} $TIPO.=' />';
                    $TIPO.='Funcional';
                   $TIPO.=' </label>';
                    $TIPO.='<label class="radio">';
                    $TIPO.='<input type="radio" name="tipo" value="No Funcional" ';if($laRequerimiento[3]=="No Funcional"){ $TIPO.='checked'; } $TIPO.='/>';
                    $TIPO.='No Funcional';
                    $TIPO.='</label>';

					$DIFICULTAD.='<option value="Baja"';if($laRequerimiento[5]=="Baja"){$DIFICULTAD.='selected';}$DIFICULTAD.='>Baja</option>';
					$DIFICULTAD.='<option value="Media"';if($laRequerimiento[5]=="Media"){$DIFICULTAD.='selected';}$DIFICULTAD.='>Media</option>';
					$DIFICULTAD.='<option value="Alta"';if($laRequerimiento[5]=="Alta"){$DIFICULTAD.='selected';}$DIFICULTAD.='>Alta</option>';
                    
                    $lobjUsuario->Lista_Usuario();
					$laUsuario=$lobjUsuario->get_Arreglo();
					for($i=0;$i<count($laUsuario);$i++)
					{
						$USUARIOS.='<option value="'.$laUsuario[$i][0].'"'; if($laRequerimiento[9]==$laUsuario[$i][0]){;$USUARIOS.='selected';} $USUARIOS.='>'.$laUsuario[$i][2].' '.$laUsuario[$i][1].'</option>';
					}
					
					
?>