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
                    $REQUERIMIENTOS.='title: "'.$laRequerimientos[$i][2].'",';
                    $REQUERIMIENTOS.='titleBackground: "red",';
                    $REQUERIMIENTOS.='description: "'.$laRequerimientos[$i][6].'",';
                    $REQUERIMIENTOS.='image: "../media/img/foto/'.$laRequerimientos[$i][9].'.jpg"';
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