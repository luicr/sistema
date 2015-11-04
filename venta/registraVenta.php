<?php
	include '../config/conexion.php';
	$id_producto = $_GET['idProducto'];
	$cantidad = $_GET['cantidad'];
	$valor = $_GET['valor'];
	$id_venta = $_GET['idVenta'];
	
	$sql = "INSERT INTO tb_detalle_ventas
		(
			cantidad,
			valor,
			id_producto,
			estado, 
			id_venta
		)
		VALUES(
			$cantidad,
			$valor,
			$id_producto,
			'A',
			$id_venta
		)";
	mysql_query( $sql );
	//echo mysql_error();

	$sql = "
		SELECT stock = stock - cantidad
		FROM tb_productos
		WHERE id_producto = $id_producto
	"
	
	?>
	
	<?php
	$query = mysql_query("
		SELECT dc.id_detalle_venta, dc.cantidad, dc.valor, p.descripcion, u.descripcion unidad
		FROM tb_detalle_ventas dc
		JOIN tb_productos p
			ON(
				dc.id_producto = p.id_producto
			)
		JOIN tb_unidades u
			ON(
				p.id_unidad = u.id_unidad
			)
		WHERE id_venta = $id_venta
			AND dc.estado = 'A'
		");
?>
<table width="100%">
	<?php while( $row = mysql_fetch_array( $query ) ){?>
	<tr>
		<th width="45%"><?php echo $row['descripcion']?></th>
		<th width="10%">&nbsp;</th>
		<th width="10%"><?php echo $row['unidad']?></th>
		<th width="10%"><?php echo $row['valor']?></th>
		<th width="10%"><?php echo $row['cantidad']?></th>
		<th width="10%"><?php echo ($row['valor'] * $row['cantidad'])?></th>
		<th width="5%"><input type="button" name="btnDel" value="x" onclick="eliminarDetalleVenta('detalle',<?php echo $row['id_detalle_venta']?>, <?php echo ($row['valor'] * $row['cantidad'])?>)" class="del" title="ELIMINAR" /></th>
	</tr>
	<?php }?>
</table>