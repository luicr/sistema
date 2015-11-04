<?php
	$cedula = $_GET['cedula'];
	$nombre = $_GET['nombre'];
	$apellido = $_GET['apellido'];
	$fecha_ingreso_empresa = $_GET['fecha_ingreso_empresa'];
	$numero_hijos = $_GET['numero_hijos'];
	$sueldo = $_GET['sueldo'];
	
	require_once'../config/conexion.php';
	
	$sql = 
	"
		INSERT INTO tb_empleados
		(
			cedula,
			nombre,
			apellido,
			fecha_ingreso_empresa,
			numero_hijos,
			sueldo,
			estado
		)
		VALUES
		(
			'$cedula',
			'$nombre',
			'$apellido',
			'$fecha_ingreso_empresa',
			$numero_hijos,
			$sueldo,
			'A'
		)
	";
	
	if( mysql_query( $sql ) ){
		echo "Empleado guardado correctamente.";
		echo"<br> FI = ".$fecha_ingreso_empresa;
	}else{
		echo "Error: ".mysql_error();
	}
	
	
?>