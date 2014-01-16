<?php
//CONSTANTES DE DIRECTORIOS DE REVERSA
define(MAIN, '../');
define(VISTA, '../vistas/');
define(CONTROLADOR, '../controlador/');
define(APLICACION, '../app/');
define(VISTA_ADMIN, 'vistas/');

//CONSTANTES DE OPERACIONES
define(LOGIN_WEB, 'login_web');
define(LOGIN_MOVIL, 'login_movil');
define(DEFECTO, 'nada');
define(RECUPERA_USU, 'c_usuario');
define(RECUPERA_PASS, 'c_password');
define(USUARIO_EXITO, 'usuario_exito_usu');
define(PASSWORD_EXITO, 'password_exito_usu');
define(USUARIO_ERROR, 'usuario_error_usu');
define(PASSWORD_ERROR, 'password_error_usu');

//CONSTANTES DE VISTAS LOGIN
define(LOGIN, 'login.php');
define(INVALID_LOGIN, 'invalid_login.php');
define(LOGIN_AULA, 'login_aula');
define(LOGIN_FORO, 'login_foro');

//CONSTANTES DE VISTAS DE ADMINISTRACION
define(SOLICITUD, 'solicitud');
define(SOLICITUDES, 'solicitudes');
define(ADMINISTRACION_USUARIOS, 'administrar-usuarios');
//FIN VISTAS DE ADMINISTRACION

define(LOGOUT, 'logout');
define(TIMEOUT, 'timeout');


//CONSTANTES DE VISTAS NOTICIA JAVIER 30/12/2012 1:00AM
define(TITLE_NUEVO, 'Registrar | aul@Frontino');
define(TITLE_BUSCAR, 'Buscar | aul@Frontino');
define(TITLE_MODIFICAR, 'Modificar | aul@Frontino');
define(TITLE_ELIMINAR, 'Eliminar | aul@Frontino');
define(TITLE_MENU, 'Noticia | aul@Frontino');

define(NOTICIA_NUEVA, 'noticia_nueva');
define(NOTICIA_BUSCAR, 'noticia_buscar');
define(NOTICIA_MODIFICAR, 'noticia_modificar');
define(NOTICIA_ELIMINAR, 'noticia_eliminar');
define(MENU, 'menu');

//CONTANTES DE VISTAS SESION
define(VISTA_PROFESOR, 'menu_profesor');
define(CREAR_CURSO, 'crear-curso');
define(PORTAFOLIO_CURSO, 'mis-cursos');
//JAVIER 24/01/2013
define(INSCRIBIR_CURSO, 'inscribir_curso');
define(APROBAR_CURSO, 'aprobar_curso');
//FIN JAVIER
define(SOLICITUDES_INSCRIPCION, 'solicitudes-inscripcion');
define(CONFIGURAR_EVA, 'configurar_evaluacion');
define(CONFIGURAR_SES, 'configurar_sesion');
define(CARGAR_NOTA, 'cargar_nota');
define(LISTADO_CLASES, 'listado_clases');
define(LISTADO_ASISTENCIA, 'listado_asistencia');
define(LISTADO_SESIONES, 'listado_sesiones');
define(LISTADO_NOTAS, 'listado_notas');
define(LISTADO_EVALUACIONES, 'listado_evaluaciones');
define(LISTADO_HTML, 'listado_html');
define(LISTADO_PDF, 'listado_pdf');
define(AVANCE_CALIF, 'avance_calificacion');
define(SELECCION_EVA, 'seleccion_evaluacion');
define(CONSULTA_REGISTRO, 'consulta_registro');
define(MODIFICAR_REGISTRO, 'modificar_registro');
define(CARGAR_FOTO, 'cargar_foto');
define(LISTADO_CLASES_HTML, 'listado_clases_html');
define(MI_CURSO, 'mi-curso');

//CONSTANTES DE VISTAS GESTOR

define(VISTA_PROFESOR, 'menu_profesor');
define(CONFIGURAR_EVA, 'configurar_evaluacion');
define(CARGAR_NOTA, 'cargar_nota');
define(LISTADO_HTML, 'listado_html');
define(LISTADO_PDF, 'listado_pdf');
define(AVANCE_CALIF, 'avance_calificacion');
define(SELECCION_EVA, 'seleccion_evaluacion');
define(CONSULTA_REGISTRO, 'consulta_registro');
define(MODIFICAR_REGISTRO, 'modificar_registro');
define(CARGAR_FOTO, 'cargar_foto');
define(LISTADO_CLASES_HTML, 'listado_clases_html');


define(CAMBIO_PASSWORD, 'cambio_contrasena');

//CONSTANTES MENSAJES
define(INVALIDO_UNO_LINEA_UNO, 'Clave incorrecta: Por favor verifique su cuenta de usuario y contraseña e intente nuevamente.');
define(INVALIDO_UNO_LINEA_DOS, 'Por su seguridad le recordamos que el número de intentos que ud. realiza es registrado por el sistema. Si su número de intentos es superior a 3 Su cuenta será bloqueada.');

define(INVALIDO_DOS_LINEA_UNO, 'Clave incorrecta: Por favor verifique su cuenta de usuario y contraseña e intente nuevamente.');
define(INVALIDO_DOS_LINEA_DOS, 'Por su seguridad le recordamos que el número de intentos que ud. realiza es registrado por el sistema. Si su número de intentos es superior a 3 Su cuenta será bloqueada.');

define(INVALIDO_TRES_LINEA_UNO, 'Usuario y contraseña incorrecto: Por favor verifique su cuenta de usuario y contraseña e intente nuevamente.');

define(BLOQUEADO_LINEA_UNO, 'Por su seguridad su cuenta ha sido bloqueada.');
define(BLOQUEADO_LINEA_DOS, 'Ha superado el numero de intentos permitidos para iniciar sesión. Para recuperar su contraseña comuniquese con: webmaster@aulafrontino.org.ve');

define(NOVEDADES_INDEX, '<p class="bienvenida">Bienvenidos usuarios de aul@Frontino al nuevo periodo académico, aquí podrás realizar todas aquellas actividades que te apoyara en tu proceso de aprendizaje de aquellas asignaturas que cursas en la institución.</p>
					<p class="bienvenida">Para los estudiantes de Ing. de Software y de Programación I se les ha asignado una evaluación que comienza el sábado 27/10/2012 a las 8:00am. </p>
                    <p class="bienvenida">Los estudiantes de Modelado de Datos se les ha asignado una pregunta en el foro no olviden participar. </p>	');
					

//CONSTANTES DE RECUPERA PASSWORD O USUARIO
define(USUARIO, 'usuario');
define(PASSWORD, 'contrasena');

define(RECUPERA_LINEA_UNO, 'Su solicitud ha sido procesada con éxito.');
define(RECUPERA_LINEA_DOS, 'La información solicitada  fue enviada a su dirección de correo electrónico. Para cualquier duda o comentario recuerde comunicarse a traves de la seccion de ayuda de aul@Frontino.');

define(RECUPERA_ERROR_LINEA_UNO, 'Su solicitud no ha sido procesada con éxito. ');
define(RECUPERA_ERROR_LINEA_DOS, 'Los datos suministrados para procesar su solicitud no fueron correctos, le recomendamos que verifique e intente nuevamente. En caso de que el problema persista comuníquese a traves de la seccion de ayuda de aul@Frontino.');

//CONSTANTES PARA MODULO DE PROYECTOS 
//JAVIER 25/01/2013 
define(REGISTRAR_PROYECTO, 'registrar_proyecto');


//JAVIER 16/02/2013
define(ASIGNAR_MODULO, 'asignar_modulo');
define(ASIGNAR_SERVICIO, 'asignar_servicio');

//JAVIER 03/03/2013
define(ASISTENCIA, 'asistencia');
define(VER_NOTAS, 'ver_notas');

//AMILCAR 09/04/2013
define(CREAR_REQUERIMIENTO, 'crear_requerimiento');
define(LISTADO_REQUERIMIENTOS, 'listado_requerimiento');
define(REQUERIMIENTO, 'requerimiento');

//AMILCAR 15/04/2013
define(CREAR_OBSERVACION, 'crear_observacion');
define(LISTADO_OBSERVACION, 'listado_observacion');
define(OBSERVACION, 'observacion');
//JAVIER 21/04/2013
define(APROBAR_RECURSO, 'aprobar_recurso');
define(CONSULTAR_RECURSO, 'consultar_recurso');
define(CONSULTAR_MI_RECURSO, 'consultar_mi_recurso');
define(LISTADO_RECURSO, 'listado_recursos');
define(PORTAFOLIO_RECURSO, 'portafolio_recursos');
define(MIS_RECURSO, 'mis_recursos');
define(CREAR_RECURSO, 'crear_recurso');

define(CONSULTA_REGISTRO_ADMIN, 'registro_usuario');

define(MODIFICAR_SES, 'modificar_sesion');
define(BUSQUEDA, 'busqueda');
define(CONSULTAR_NOTIFICACION, 'consultar_notificacion');
define(CREAR_NOTIFICACION, 'crear_notificacion');

define(CONSULTA_PERFIL, 'consulta_perfil');
define(REPOSITORIO_RECURSO, 'repositorio_recurso');
define(BUSQUEDA_AVANZADA, 'busqueda_avanzada');

//Amilcar 21/05/13
define(REGISTRAR_INSTITUCION, 'registrar_institucion');
define(REGISTRAR_CAMPUS, 'registrar_campus');
define(REGISTRAR_PROGRAMA, 'registrar_programa');
//3-06-13 Amilcar
define(REGISTRAR_UNIDAD_CURRICULAR, 'registrar_unidad_curricular');
define(LISTADO_UNIDAD_CURRICULAR, 'listado_unidad_curricular');
define(ELIMINAR_UNIDAD_CURRICULAR, 'eliminar_unidad_curricular');
define(CONSULTAR_UNIDAD_CURRICULAR, 'consultar_unidad_curricular');
define(EDITAR_UNIDAD_CURRICULAR, 'editar_unidad_curricular');

define(REGISTRAR_RECURSO, 'registrar_recurso');
define(EDITAR_RECURSO, 'editar_recurso');
define(ELIMINAR_RECURSO, 'eliminar_recurso');
define(CONSULTAR_RECURSO, 'consultar_recurso');

define(REGISTRAR_ESTRATEGIA, 'registrar_estrategia');
define(LISTADO_ESTRATEGIA, 'listado_estrategia');
define(CONSULTAR_ESTRATEGIA, 'consultar_estrategia');
define(ELIMINAR_ESTRATEGIA, 'eliminar_estrategia');
define(EDITAR_ESTRATEGIA, 'editar_estrategia');

define(REGISTRAR_TIPO_EVALUACION, 'registrar_tipo_evaluacion');
define(LISTADO_TIPO_EVALUACION, 'listado_tipo_evaluacion');
define(ELIMINAR_TIPO_EVALUACION, 'eliminar_tipo_evaluacion');
define(CONSULTAR_TIPO_EVALUACION, 'consultar_tipo_evaluacion');
define(EDITAR_TIPO_EVALUACION, 'editar_tipo_evaluacion');
























?>
