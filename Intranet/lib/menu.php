<?php	

	$MENU_LATERAL.= '<div class="page-sidebar nav-collapse collapse">';
	$MENU_LATERAL.= '		<ul>';
	$MENU_LATERAL.= '			<li>';
	$MENU_LATERAL.= '				<div class="sidebar-toggler hidden-phone"></div>';
	$MENU_LATERAL.= '			</li>';
	$MENU_LATERAL.= '			<li class="active start ">';
	$MENU_LATERAL.= '				<a href="../app/">';
	$MENU_LATERAL.= '				<i class="icon-home"></i> ';
	$MENU_LATERAL.= '				<span class="title">Escritorio</span>';
	$MENU_LATERAL.= '				<span class="selected"></span>';
	$MENU_LATERAL.= '				</a>';
	$MENU_LATERAL.= '			</li>';
	$MENU_LATERAL.= '			<li class="has-sub ">';
	$MENU_LATERAL.= '				<a href="javascript:;">';
	$MENU_LATERAL.= '				<i class="icon-flag"></i> ';
	$MENU_LATERAL.= '				<span class="title">Requerimientos</span>';
	$MENU_LATERAL.= '				<span class="selected"></span>';
	$MENU_LATERAL.= '				</a>';
	$MENU_LATERAL.= '				<ul class="sub">';
	$MENU_LATERAL.= '					<li><a href="../requerimiento/?q=registro_requerimiento"><i class="icon-plus"></i>  Registro de requerimientos</a></li>
										<li><a href="../requerimiento/?q=listado_requerimiento"><i class="icon-list"></i> Listado de requerimientos</a></li>
										<li><a href="../requerimiento/?q=grafico_requerimiento"><i class="icon-sitemap"></i> Grafico de requerimientos</a></li>';
	$MENU_LATERAL.= '				</ul>';
	$MENU_LATERAL.= '			</li>';
	$MENU_LATERAL.= '			<li class="has-sub ">';
	$MENU_LATERAL.= '				<a href="javascript:;">';
	$MENU_LATERAL.= '				<i class="icon-file"></i> ';
	$MENU_LATERAL.= '				<span class="title">Artefactos</span>';
	$MENU_LATERAL.= '				<span class="selected"></span>';
	$MENU_LATERAL.= '				</a>';
	$MENU_LATERAL.= '				<ul class="sub">';
	$MENU_LATERAL.= '					<li><a href="../artefacto/?q=listado_artefacto"><i class="icon-list"></i>  Listado de artefactos</a></li>';
	$MENU_LATERAL.= '				</ul>';
	$MENU_LATERAL.= '			</li>';
	$MENU_LATERAL.= '		</ul>';
	$MENU_LATERAL.= '	</div>';
	
?>
