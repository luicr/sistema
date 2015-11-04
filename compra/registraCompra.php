<?php
	include '../config/conexion.php';
	$id_producto = $_GET['idProducto'];
	$cantidad = $_GET['cantidad'];
	$valor = $_GET['valor'];
	$id_compra = $_GET['idCompra'];
	
	$sql = "INSERT INTO tb_detalle_compras
		(
			cantidad,
			valor,
			id_producto,
			estado, 
			id_compra
		)
		VALUES(
			$cantidad,
			$valor,
			$id_producto,
			'A',
			$id_compra
		)";
	mysql_query( $sql );


	$sql = "
		SELECT IFNULL(precio,0) precio,IFNULL(stock,0) stock,
			(IFNULL(precio,0) * IFNULL(stock,0))TotalAnterior
		FROM tb_productos
		WHERE id_producto = $id_producto
	";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
	$precio = $row['precio'];
	$stock = $row['stock'];
	$TotalAnterior = $row['TotalAnterior'];


	$sql = "
		UPDATE tb_productos SET stock = (IFNULL(stock,0) + $cantidad),
			precio = (($TotalAnterior + ($cantidad * $valor))/IFNULL(stock,0))
		WHERE id_producto = $id_producto
	";

	mysql_query($sql);
	//echo mysql_error();
	
	?>
	
	<?php
	$query = mysql_query("
		SELECT dc.id_detalle_compra, dc.cantidad, dc.valor, p.descripcion
		FROM tb_detalle_compras dc
		JOIN tb_productos p
			ON(
				dc.id_producto = p.id_producto
			)
		WHERE id_compra = $id_compra
			AND dc.estado = 'A'
		");
?>
<table width="100%">
	<?php while( $row = mysql_fetch_array( $query ) ){?>
	<tr>
		<th width="50%"><?php echo $row['descripcion']?></th>
		<th width="15%"><?php echo $row['cantidad']?></th>
		<th width="15%"><?php echo $row['valor']?></th>
		<th width="15%"><?php echo ($row['valor'] * $row['cantidad'])?></th>
		<th width="5%"><input type="button" name="btnDel" value="x" onclick="eliminarDetalle('detalle', <?php echo $row['id_detalle_compra']?>, <?php echo ($row['valor'] * $row['cantidad'])?>)" class="del" title="ELIMINAR" /></th>
	</tr>
	<?php }?>
</table>