<?php
	include '../config/conexion.php';
	$id_compra = $_GET['id_compra'];
	$sql = "UPDATE tb_compras SET estado = 'A' WHERE id_compra = $id_compra";
	if (mysql_query( $sql )){
		echo"La compra se ha registrado correctamente.";
	}else{
		echo "Error: ".mysql_error();
	}
?>