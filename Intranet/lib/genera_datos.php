<?php

	$laRequerimientos=$lobjRequerimiento->listar_requerimientos();
				for($i=0;$i<count($laRequerimientos);$i++)
				{
					echo '{id:'.$laRequerimientos[$i][0].',parent:'.$laRequerimientos[$i][10].' , codigo:'.$laRequerimientos[$i][1].', nombre:'.$laRequerimientos[$i][2].',tipo:'.$laRequerimientos[$i][3].',prioridad:'.$laRequerimientos[$i][4].'},';
				}
?>