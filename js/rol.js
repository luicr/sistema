
function guardarEmpleado( mensaje ){
	mensaje = document.getElementById( mensaje );
	
	var nombre = document.frmEmpleado.txtNombre.value;
	var apellido = document.frmEmpleado.txtApellido.value;
	var cedula = document.frmEmpleado.txtCedula.value;
	var fechaIngreso = document.frmEmpleado.txtFechaIngreso.value;
	var numeroHijos = document.frmEmpleado.txtNumeroHijos.value;
	var sueldo = document.frmEmpleado.txtSueldo.value;
	
	alert('FI = '+fechaIngreso)
	
	
	var ajax = Ajax();
	ajax.open("GET","../rol/guardarEmpleado.php?cedula="+cedula+"&nombre="+nombre+"&apellido="+apellido+"&fecha_ingreso_empresa="+fechaIngreso+"&numero_hijos="+numeroHijos+"&sueldo="+sueldo);
	ajax.onreadystatechange = function(){
		if( ajax.readyState == 4 ){
			mensaje.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}