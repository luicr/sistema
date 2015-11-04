function Ajax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function login( usuario, clave, msn ){
	usuario = document.getElementById( usuario ).value;
	clave = document.getElementById( clave ).value;
	msn = document.getElementById( msn );
	//alert("User = "+usuario+", clave = "+clave)
	msn.innerHTML = '<div align="center"><img src="img/ajax-loader.gif" height="20" width="70" /></div>';
	if( usuario == "" ){
		msn.innerHTML = "Complete el campo Usuario";
		return;
	}
	if( clave == "" ){
		msn.innerHTML = "Complete el campo Clave";
		return;
	}
	var ajax = Ajax();
	ajax.open("GET","login/validaLogin.php?usuario="+usuario+"&clave="+clave);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			msn.innerHTML = ajax.responseText;
			if( msn.innerHTML == 'redireccionando' ){
				top.window.location.href = 'principal/';
			}
		}
	}
	//ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(null);
}