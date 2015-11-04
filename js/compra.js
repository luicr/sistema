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

function validarCompra( mensaje ){
	var idCompra = document.frmCompra.txtNroCompra.value;
	var ajax = Ajax();
	mensaje = document.getElementById( mensaje );
	ajax.open("GET","../compra/validarCompra.php?id_compra="+idCompra);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			mensaje.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}

function eliminarDetalle( mensaje, id, valorDescontar ){
	alert(valorDescontar);
	var idCompra = document.frmCompra.txtNroCompra.value;
	var ajax = Ajax();
	mensaje = document.getElementById( mensaje );
	ajax.open("GET","../compra/eliminaCompra.php?id="+id+"&idCompra="+idCompra);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			mensaje.innerHTML = ajax.responseText;
			delTotalCompra(valorDescontar);
		}
	}
	ajax.send(null);
}

function guardarDetalle( detalle, mensaje ){
	var idProducto = document.frmCompra.sltProducto.value;
	var cantidad = document.frmCompra.txtCantidad.value;
	var valor = document.frmCompra.txtValor.value;
	var idCompra = document.frmCompra.txtNroCompra.value;
	detalle = document.getElementById( detalle );
	mensaje = document.getElementById( mensaje );
	
	if( idProducto == 0 ){
		mensaje.innerHTML = 'Elija un producto';
		return;
	}
	if( cantidad == '' || cantidad == 0 ){
		mensaje.innerHTML = 'Escriba una cantidad';
		return;
	}
	if( valor == '' || valor == 0 ){
		mensaje.innerHTML = 'Escriba un valor';
		return;
	}
	
	var ajax = Ajax();
	ajax.open("GET","../compra/registraCompra.php?idProducto="+idProducto+"&cantidad="+cantidad+"&valor="+valor+"&idCompra="+idCompra);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			detalle.innerHTML = ajax.responseText;
			addTotalCompra();
		}
	}
	ajax.send(null);
}