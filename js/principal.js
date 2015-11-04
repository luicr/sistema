
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

function valueRadio(ctrl){
    for( i=0; i<ctrl.length; i++ )
        if(ctrl[i].checked) return ctrl[i].value;
}

function addTotalCompra(){
	var _subtotal = 0;
	var subtotal = document.getElementById('txtSubtotal');
	if(!(subtotal.value == 0 || subtotal.value == '')){
		_subtotal = parseFloat(subtotal.value);
	}
	_subtotal = parseFloat(_subtotal) + parseFloat(document.getElementById('txtTotal').value);
	subtotal.value = redondeo2decimales(_subtotal);
	var iva = document.getElementById('txtIVA');
	iva.value = redondeo2decimales(parseFloat(_subtotal * 0.12));
	var totalVenta = document.getElementById('txtTotalVenta');
	totalVenta.value = redondeo2decimales(_subtotal + parseFloat(iva.value));
}

function delTotalCompra( totalDescontar ){
	var _txtSubtotal = document.getElementById('txtSubtotal');
	_txtSubtotal.value = redondeo2decimales(parseFloat(_txtSubtotal.value) - parseFloat(totalDescontar));
	
	var _txtIVA = document.getElementById('txtIVA');
	_txtIVA.value = redondeo2decimales((parseFloat(_txtSubtotal.value) * 0.12));
	
	var _txtTotalVenta = document.getElementById('txtTotalVenta');
	_txtTotalVenta.value = redondeo2decimales(parseFloat(_txtSubtotal.value) + parseFloat(_txtIVA.value));
}

function addTotalVenta(){
	var _subtotal = 0;
	var subtotal = document.getElementById('txtSubtotal');
	if(!(subtotal.value == 0 || subtotal.value == '')){
		_subtotal = parseFloat(subtotal.value);
	}
	_subtotal = parseFloat(_subtotal) + parseFloat(document.getElementById('txtTotal').value);
	subtotal.value = redondeo2decimales(_subtotal);
	var iva = document.getElementById('txtIVA');
	iva.value = redondeo2decimales(parseFloat(_subtotal * 0.12));
	var totalVenta = document.getElementById('txtTotalVenta');
	totalVenta.value = redondeo2decimales(_subtotal + parseFloat(iva.value));
}

function delTotalVenta( totalDescontar ){
	var _txtSubtotal = document.getElementById('txtSubtotal');
	_txtSubtotal.value = redondeo2decimales(parseFloat(_txtSubtotal.value) - parseFloat(totalDescontar));
	
	var _txtIVA = document.getElementById('txtIVA');
	_txtIVA.value = redondeo2decimales((parseFloat(_txtSubtotal.value) * 0.12));
	
	var _txtTotalVenta = document.getElementById('txtTotalVenta');
	_txtTotalVenta.value = redondeo2decimales(parseFloat(_txtSubtotal.value) + parseFloat(_txtIVA.value));
}

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

function cargarPagina( pagina, contenedor, titulo ){
	contenedor = document.getElementById( contenedor );
	var ajax = Ajax();
	ajax.open("GET","../includes/"+pagina+".php");
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			contenedor.innerHTML = ajax.responseText;
			document.getElementById('tituloSeleccionado').innerHTML = titulo;
		}
	}
	ajax.send(null);
}

function totalProducto(){
	var valor = document.getElementById('txtValor').value;
	var cantidad = document.getElementById('txtCantidad').value;

	if(valor == '' || valor == 0 || cantidad == '' || cantidad == 0){
		return;
	}
	/*alert('valor = '+valor+', cant = '+cantidad)*/
	document.getElementById('txtTotal').value = parseFloat(cantidad) * parseFloat(valor);
}

function redondeo2decimales(numero) {
	var original = parseFloat(numero);
	var result = Math.round(original * 100) / 100;
	return result;
}