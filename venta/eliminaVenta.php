<?php
	include '../config/conexion.php';
	$id = $_GET['id'];
	$id_venta = $_GET['idVenta'];
	mysql_query("UPDATE tb_detalle_ventas SET estado = 'I' WHERE id_detalle_venta = $id");
	//include'muestraDetalle.php';
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
				u.id_unidad = p.id_unidad
			)
		WHERE id_venta = $id_venta
			AND dc.estado = 'A'
		");
	if(mysql_num_rows($query) != 0 ){ ?>
	<table width="100%">
	<?php while( $row = mysql_fetch_array( $query ) ){?>
	<tr>
		<th width="45%"><?php echo $row['descripcion']?></th>
		<th width="10%">&nbsp;</th>
		<th width="10%"><?php echo $row['unidad']?></th>
		<th width="10%"><?php echo $row['valor']?></th>
		<th width="10%"><?php echo $row['cantidad']?></th>
		<th width="10%"><?php echo ($row['valor'] * $row['cantidad'])?></th>
		<th width="5%"><input type="button" name="btnDel" value="x" onclick="eliminarDetalleVenta('detalle',<?php echo $row['id_detalle_venta']?>, <?php echo ($row['valor'] * $row['cantidad'])?>)" class="del" title="ELIMINAR" /></th></th>
	</tr>
	<?php }?>
</table>
<?php
	}
?>
