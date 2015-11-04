<?php
	include '../config/conexion.php';
	$id = $_GET['id'];
	$id_compra = $_GET['idCompra'];
	mysql_query("UPDATE tb_detalle_compras SET estado = 'I' WHERE id_detalle_compra = $id");
	//include'muestraDetalle.php';
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