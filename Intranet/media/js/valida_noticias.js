 inicio();
       function inicio()
       {
		  f=document.form1;
		 
		  if((f.txtoperacion.value!="buscar")&&(f.txtoperacion.value!="nuevo")&&(f.txtoperacion.value!="consultar"))
		  {
			 if (f.txthacer.value=="Listo")
		     {
				 if (f.txtoperacion.value=="guardar")
				 { 
					alert("Registro Incluido");
					cancelar();
				 }
				 else if (f.txtoperacion.value=="modificar")
				 {
					alert("Registro Modificado");
				 }
				 else if (f.txtoperacion.value=="eliminar")
				 {
					alert("Registro Eliminado");
				 }
	         }
			 cancelar();
	      }
	      else
	      {
			
			 if ((f.txthay.value==1)&&(f.txthacer.value!="guardar"))
			 {
				 existe();
		     }
		     else if ((f.txthay.value==0)&&(f.txthacer.value!="guardar"))
		     {
				cancelar();
				alert("Noticia no Existe");
		     }
			 else if ((f.txthay.value==2)&&(f.txthacer.value!="guardar"))
		     {
				f.idtnoticia.disabled=true;
				f.nombre.disabled=true;
				f.fuentenot.disabled=true;
				f.urlfuentenot.disabled=true;
				f.fechanot.disabled=true;
				f.btnguardar.disabled=true;
				f.btnguardar.setAttribute("style","display: none;");
				f.btncancelar.disabled=true;
				f.btncancelar.setAttribute("style","display: none;");
				f.btnbuscar.disabled=false;
				f.btnmodificar.disabled=true;
				f.btnmodificar.setAttribute("style","display: none;");
				f.btneliminar.disabled=true;
				f.btneliminar.setAttribute("style","display: none;");
		     }
		     else if ((f.txthay.value==1)&&(f.txthacer.value=="guardar"))
			 {
				 existe();
		     }
		     else if ((f.txthay.value==0)&&(f.txthacer.value=="guardar"))
		     {
				
				f.txtoperacion.value="guardar";
				f.idtnoticia.disabled=true;
				f.nombre.disabled=false;
				f.fuentenot.disabled=false;
				f.urlfuentenot.disabled=false;
				f.fechanot.disabled=false;
				f.btnguardar.disabled=false;
				f.btncancelar.disabled=false;
				f.btnbuscar.disabled=true;
				f.btnbuscar.setAttribute("style","display: none;");
				f.btnmodificar.disabled=true;
				f.btnmodificar.setAttribute("style","display: none;");
				f.btneliminar.disabled=true;
				f.btneliminar.setAttribute("style","display: none;");
				f.nombre.focus();
		     } 
		  }
	   }
       
       function existe()
       {
		  f=document.form1;
		  f.idtnoticia.disabled=true;
		  f.nombre.disabled=true;
		  f.fuentenot.disabled=true;
		  f.urlfuentenot.disabled=true;
		  f.fechanot.disabled=true;
		  f.btnguardar.disabled=true;
		  f.btnguardar.setAttribute("style","display: none;");
		  f.btncancelar.disabled=false;
		  f.btnbuscar.disabled=true;
		  f.btnbuscar.setAttribute("style","display: none;");
		  f.btnmodificar.disabled=false;
		  f.btneliminar.disabled=false;
		  
		 
	   }
       function nuevo()
       {
		   f=document.form1;
		   f.txtoperacion.value="nuevo";
		   f.txthacer.value="guardar";
		   f.idtnoticia.disabled=false;
		   f.nombre.disabled=false;
		   f.fuentenot.disabled=false;
		   f.urlfuentenot.disabled=false;
		   f.fechanot.disabled=false;
		   f.btnguardar.disabled=false;
		   f.btncancelar.disabled=false;
		   f.btnbuscar.disabled=true;
		   f.btnbuscar.setAttribute("style","display: none;");
		   f.btnmodificar.disabled=true;
		   f.btnmodificar.setAttribute("style","display: none;");
		   f.btneliminar.disabled=true;
		   f.btneliminar.setAttribute("style","display: none;");
		   f.submit();
       }
       
       function cancelar()
       {
		   f=document.form1;
		   f.idtnoticia.value="";
		   f.nombre.value="";
		   f.fuentenot.value="";
		   f.urlfuentenot.value="";
		   f.fechanot.value="";
		   f.txtoperacion.value="";
		   f.txthacer.value="";
		   f.txthay.value=0;
		   f.idtnoticia.disabled=false;
		   f.nombre.disabled=true;
		   f.fuentenot.disabled=true;
		   f.urlfuentenot.disabled=true;
		   f.fechanot.disabled=true;
		   f.btnguardar.disabled=true;
		   f.btnguardar.setAttribute("style","display: none;");
		   f.btncancelar.disabled=true;
		   f.btncancelar.setAttribute("style","display: none;");
		   f.btnbuscar.disabled=false;
		   f.btnbuscar.setAttribute("style","display: block;");
		   f.btnmodificar.disabled=true;
		   f.btnmodificar.setAttribute("style","display: none;");
		   f.btneliminar.disabled=true;
		   f.btneliminar.setAttribute("style","display: none;");
		   if(f.urlnot.value)
		   {
				window.location.href='index.php';
			}
		   
		   
       }
       
       function buscar()
       {
		   f=document.form1;
		   if(f.txthay.value==2)
		   {
			f.txtoperacion.value="consultar";
			}
			else
			{
		   f.txtoperacion.value="buscar";
		   }
		   f.idtnoticia.disabled=false;
		   f.nombre.disabled=true;
		   f.fuentenot.disabled=true;
		   f.urlfuentenot.disabled=true;
		   f.fechanot.disabled=true;
		   f.btnguardar.disabled=true;
		   f.btnguardar.setAttribute("style","display: none;");
		   f.btncancelar.disabled=false;
		   f.btncancelar.setAttribute("class","btnaceptar");
		   f.btnbuscar.disabled=true;
		   f.btnbuscar.setAttribute("style","display: none;");
		   f.btnmodificar.disabled=false;
		   f.btneliminar.disabled=true;
		   f.btneliminar.setAttribute("style","display: none;");
		   f.submit();
	   }
	   
	   
	   function modificar()
       {
		   f=document.form1;
		   f.txtoperacion.value="modificar";
		   f.idtnoticia.disabled=true;
		   f.nombre.disabled=false;
		   f.fuentenot.disabled=false;
		   f.urlfuentenot.disabled=false;
		   f.fechanot.disabled=false;
		   f.btnguardar.disabled=false;
		   f.btnguardar.setAttribute("style","display: block;");
		   f.btncancelar.disabled=false;
		   f.btnbuscar.disabled=true;
		    f.btnbuscar.setAttribute("style","display: none;");
			f.btnmodificar.disabled=true;
			f.btnmodificar.setAttribute("style","display: none;");
		   f.btneliminar.disabled=true;
		    f.btneliminar.setAttribute("style","display: none;");
		   f.nombre.focus();
       }
       
       function eliminar()
       {
		  f=document.form1;
		  if (confirm("Desea Eliminar"))
		  {
			 f.idtnoticia.disabled=false;
			 f.txtoperacion.value="eliminar";
			 f.submit();
		  }
		  else
		  {
			 cancelar();  
		  }
	   }

       
       function guardar()
       {
		  f=document.form1;
		  f.idtnoticia.disabled=false;
		  if (validar())
		  {
		     f.submit();
		  }
	   }
	   
	   function validar()
	   {
		   bueno=false;
		   f=document.form1;
		   if (f.idtnoticia.value=="")
		   {
			   alert("idtnoticia en Blanco");
			   f.idtnoticia.focus();   
		   }
		   else if (f.nombre.value=="")
		   {
			   alert("Titulo en Blanco");
			   f.nombre.focus();   
		   }
		   else if (f.fechanot.value=="")
		   {
			   alert("Fecha en Blanco");
			   f.fechanot.focus();   
		   }
		   else if (f.fuentenot.value=="")
		   {
			   alert("Fuente en Blanco");
			   f.fuentenot.focus();   
		   }
		   else
		   {
			  bueno=true;
		   }
		  
		   return bueno;
	   }