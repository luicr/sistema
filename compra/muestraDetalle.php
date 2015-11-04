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
		<th width="5%" onclick="eliminarDetalle('detalle',<?php echo $row['id_detalle_compra']?>)">X</th>
	</tr>
	<?php }?>
</table>