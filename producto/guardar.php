<?php
	include '../config/conexion.php';
	
	$descripcion = $_GET['descripcion'];
	$id_tipo = $_GET['id_tipo'];
	$estado = $_GET['estado'];
	$id_empresa = $_GET['id_empresa'];
	$id_unidad = $_GET['id_unidad'];
	
	$sql = "
	INSERT INTO tb_productos
	(
		descripcion,
		id_tipo,
		estado,
		id_unidad,
		id_empresa
	)
	VALUES
	(
		'$descripcion',
		$id_tipo,
		'$estado',
		$id_unidad,
		$id_empresa
	)
	";
	if( mysql_query( $sql ) ){
		echo"El producto de ha guardado correctamente";
	}else{
		echo"Error: ".mysql_error();
	}
?>