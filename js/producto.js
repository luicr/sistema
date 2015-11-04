/*function Ajax(){
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
}*/

function guardarProducto( mensaje ){
	var descripcion = document.frmProducto.txtDescripcion.value;
	var id_tipo = document.frmProducto.sltTipo.value;
	var id_unidad = document.frmProducto.sltUnidad.value;
	var estado = valueRadio(document.frmProducto.optEstado);
	var empresa = document.frmProducto.txtEmpresa.value;
	
	mensaje = document.getElementById( mensaje );
	
	var ajax = Ajax();
	ajax.open("GET","../producto/guardar.php?descripcion="+descripcion+"&id_tipo="+id_tipo+"&estado="+estado+"&id_empresa="+empresa+"&id_unidad="+id_unidad);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			mensaje.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}