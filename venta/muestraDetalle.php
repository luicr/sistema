<?php
	$query = mysql_query("
		SELECT dc.id_detalle_venta, dc.cantidad, dc.valor, p.descripcion, p.unidad
		FROM tb_detalle_ventas dc
		JOIN tb_productos p
			ON(
				dc.id_producto = p.id_producto
			)
		WHERE id_venta = $id_venta
			AND dc.estado = 'A'
		");
?>
<table width="100%" border="1">
	<?php while( $row = mysql_fetch_array( $query ) ){?>
	<tr>
		<th width="45%"><?php echo $row['descripcion']?></th>
		<th width="10%">&nbsp;</th>
		<th width="10%"><?php echo $row['valor']?></th>
		<th width="10%"><?php echo $row['unidad']?></th>
		<th width="10%"><?php echo $row['cantidad']?></th>
		<th width="10%"><?php echo ($row['valor'] * $row['cantidad'])?></th>
		<th width="5%" onclick="eliminarDetalle('detalle',<?php echo $row['id_detalle_venta']?>)">X</th>
	</tr>
	<?php }?>
</table>