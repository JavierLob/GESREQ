function aceptar()
{
	var f=document.getElementById('login');
	f.username.disabled=false;
	f.password.disabled=false;
	document.getElementById('login').submit();
}
