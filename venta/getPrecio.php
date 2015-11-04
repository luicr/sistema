<?php 
	require_once '../kardex/funciones.php';
	require_once '../config/conexion.php';
	$id = $_GET['id'];
	if ($_GET['busqueda'] == "precio"){
		$query = mysql_query("SELECT precio FROM tb_productos WHERE id_producto = $id");
		$row = mysql_fetch_array($query);
		echo redondear_dos_decimal($row['precio']);
	}elseif($_GET['busqueda'] == "stock"){
		$id = $_GET['id'];
		$query = mysql_query("SELECT stock FROM tb_productos WHERE id_producto = $id");
		$row = mysql_fetch_array($query);
		echo redondear_dos_decimal($row['stock']);
	}elseif( $_GET['busqueda'] == "unidad"){
		$id = $_GET['id'];
		$query = mysql_query("SELECT u.descripcion unidad FROM tb_productos p JOIN tb_unidades u ON p.id_unidad = u.id_unidad WHERE id_producto = $id");
		$row = mysql_fetch_array($query);
		echo redondear_dos_decimal($row['unidad']);
	}
?>