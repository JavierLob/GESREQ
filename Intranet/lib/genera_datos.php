<?php

                    $laRequerimientos=$lobjRequerimiento->listar_requerimientos();
                    
                    for($i=0;$i<count($laRequerimientos);$i++)
                    {
                         $REQUERIMIENTOS.='new primitives.orgdiagram.ItemConfig({';
                    $REQUERIMIENTOS.='id: '.$laRequerimientos[$i][0].',';
                    if($laRequerimientos[$i][10])
                    {
                         $REQUERIMIENTOS.='parent: '.$laRequerimientos[$i][10].',';
                    }
                    else
                    {
                         $REQUERIMIENTOS.='parent: null,';
                    }

                    $ESTATUS='';
                    if($laRequerimientos[$i][8]=='ABIERTO')
                    {
                         $ESTATUS='#d84a38';
                    }
                    elseif ($laRequerimientos[$i][8]=='ATENDIDO')
                    {
                         $ESTATUS='#eca22e ';
                    }
                    elseif ($laRequerimientos[$i][8]=='CERRADO')
                    {
                         $ESTATUS='#1d943b';                              
                    }

                   
                    $REQUERIMIENTOS.='title: "'.$laRequerimientos[$i][2].'",';
                    $REQUERIMIENTOS.='itemTitleColor:"'.$ESTATUS.'",';
                    $REQUERIMIENTOS.='description: "'.$laRequerimientos[$i][6].'",';
                    $REQUERIMIENTOS.='label: "'.$laRequerimientos[$i][2].'",';
                    $REQUERIMIENTOS.='image: "../media/img/foto/'.$laRequerimientos[$i][9].'.jpg",';
                     $REQUERIMIENTOS.='templateName: "CursorTemplate"';
                    if($i==count($laRequerimientos)-1)
                    {
                              $REQUERIMIENTOS.='})';
                         }
                         else
                         {
                              $REQUERIMIENTOS.='}),';
                         }    
                    }


               
?>