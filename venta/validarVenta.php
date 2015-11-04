<?php
	include '../config/conexion.php';
	$id_venta = $_GET['id_venta'];
	$sql = "UPDATE tb_ventas SET estado = 'A' WHERE id_venta = $id_venta";
	if (mysql_query( $sql )){
		echo"La venta se ha registrado correctamente.";
	}else{
		echo "Error: ".mysql_error();
	}
?>