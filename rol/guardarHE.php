<?php
	require_once'../config/coexion.php';
	
	$id_empleado = $_GET['id_empleado'];
	$fecha_HE = $_GET['fecha_HE'];
	$tipo = $_GET['tipo'];
	
	$sql = 
	"
		INSERT INTO tb_horas_extras
		(
			id_empleado,
			fecha_hora_extra,
			tipo
		)
		VALUES
		(
			$id_empleado,
			$fecha_hora_extra,
			$tipo,
		)
	";
	
	if ( mysql_query( $sql ) ){
		echo"La hora extra se ha guardado cone exito";
	}else{
		echo "Error: ".mysql_error();
	}
?>