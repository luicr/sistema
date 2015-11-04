function verKardex( espacio, mensaje ){
	espacio = document.getElementById( espacio );
	mensaje = document.getElementById( mensaje );
	
	mensaje.innerHTML = "";
	espacio.innerHTML = "";
	
	var id = document.frmKardex.sltProducto.value;
	
	if( id == 0 ){
		mensaje.innerHTML = "Seleccione un producto";
		espacio.innerHTML = "";
		return;
	}
	var ajax = Ajax();
	ajax.open("GET","../kardex/verKardex.php?id="+id);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			espacio.innerHTML =  ajax.responseText;
		}
	}
	ajax.send(null);
}