function validarVenta( mensaje ){
	var idVenta = document.frmVenta.txtNroVenta.value;
	var ajax = Ajax();
	mensaje = document.getElementById( mensaje );
	ajax.open("GET","../venta/validarVenta.php?id_venta="+idVenta);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			mensaje.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}

function eliminarDetalleVenta( mensaje, id, valorDescontar ){
	var idVenta = document.frmVenta.txtNroVenta.value;
	var ajax = Ajax();
	mensaje = document.getElementById( mensaje );
	ajax.open("GET","../venta/eliminaVenta.php?id="+id+"&idVenta="+idVenta);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			mensaje.innerHTML = ajax.responseText;
			delTotalVenta(valorDescontar);
		}
	}
	ajax.send(null);
}

function cargarStock(){
	getPrecioProducto();
	getStockProducto();
	getUnidadProducto();
}

function getPrecioProducto(){
	var id = document.frmVenta.sltProducto.value;
	var precio = document.frmVenta.txtValor;
	if( id == 0 ){
		return;
	}
	var ajax = Ajax();
	ajax.open("GET","../venta/getPrecio.php?id="+id+"&busqueda=precio");
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			precio.value =  ajax.responseText;
		}
	}
	ajax.send(null);
}

function getStockProducto(){
	var id = document.frmVenta.sltProducto.value;
	var stock = document.frmVenta.txtStock;
	if( id == 0 ){
		return;
	}
	var ajax = Ajax();
	ajax.open("GET","../venta/getPrecio.php?id="+id+"&busqueda=stock");
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			stock.value =  ajax.responseText;
		}
	}
	ajax.send(null);
}

function getUnidadProducto(){
	var id = document.frmVenta.sltProducto.value;
	var unidad = document.frmVenta.txtUnidad;
	if( id == 0 ){
		return;
	}
	var ajax = Ajax();
	ajax.open("GET","../venta/getPrecio.php?id="+id+"&busqueda=unidad");
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			unidad.value =  ajax.responseText;
		}
	}
	ajax.send(null);
}

function guardarDetalleVenta( detalle, mensaje ){
	var idProducto = document.frmVenta.sltProducto.value;
	var cantidad = document.frmVenta.txtCantidad.value;
	var valor = document.frmVenta.txtValor.value;
	var idVenta = document.frmVenta.txtNroVenta.value;
	var stock = document.frmVenta.txtStock.value;
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
	//alert("cant: "+cantidad+", stock: "+stock)
	if( parseFloat(cantidad) > parseFloat(stock) ){
		mensaje.innerHTML = 'Cantidad seleccionada mayor que cantidad en existencia';
		return;
	}
	
	var ajax = Ajax();
	ajax.open("GET","../venta/registraVenta.php?idProducto="+idProducto+"&cantidad="+cantidad+"&valor="+valor+"&idVenta="+idVenta);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			detalle.innerHTML = ajax.responseText;
			addTotalVenta();
		}
	}
	ajax.send(null);
}