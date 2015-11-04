<?php
	require '../config/conexion.php';
	require 'funciones.php';
	
	$id_producto = $_GET['id'];
	$existencia = array();
	$existencia['cantidad'] = 0;
	$existencia['valor'] = 0;
	$existencia['total'] = 0;
	
	$sql = "
	SELECT dc.fecha_ingreso fecha,
		dc.cantidad,
		dc.valor,
		ROUND((dc.cantidad * dc.valor),2)total,
		'c' tipo
	FROM tb_detalle_compras dc
	JOIN tb_compras c
		ON(
			dc.id_compra = c.id_compra
		)
	WHERE dc.id_producto = $id_producto
	
	UNION
	
	SELECT dv.fecha_ingreso fecha,
		dv.cantidad,
		dv.valor,
		ROUND((dv.cantidad * dv.valor),2)total,
		'v' tipo
	FROM tb_detalle_ventas dv
	JOIN tb_ventas v
		ON(
			dv.id_venta = v.id_venta
		)
	WHERE dv.id_producto = $id_producto
	ORDER BY fecha
	";
	
	$query = mysql_query($sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th rowspan="2" scope="col" width="22%">FECHA</th>
    <th colspan="3" scope="col" width="26%">ENTRADAS</th>
    <th colspan="3" scope="col" width="26%">SALIDAS</th>
    <th colspan="3" scope="col" width="26%">EXISTENCIAS</th>
  </tr>
  <tr>
    <th>CANT</th>
    <th>P/U</th>
    <th>TOTAL</th>
	
    <th>CANT</th>
    <th>P/U</th>
    <th>TOTAL</th>
	
    <th>CANT</th>
    <th>P/U</th>
    <th>TOTAL</th>
  </tr>
 <?php while( $row = mysql_fetch_array($query) ){?>
  <tr align="right">
  	<td><?php echo substr($row['fecha'],0,10)?></td>
  	<?php
	if( $row['tipo'] == "c"){
		$existencia['cantidad'] += $row['cantidad'];
		//$existencia['valor'] += $row['valor'];
		$existencia['total'] += $row['total'];
		
		compra($row['cantidad'],$row['valor'],$row['total'],$existencia);
	}else if ( $row['tipo'] == "v"){
		$existencia['cantidad'] -= $row['cantidad'];
		$existencia['valor'] -= $row['valor'];
		$existencia['total'] -= $row['total'];
		
		venta($row['cantidad'],$row['valor'],$row['total'], $existencia);
	}
	?>
  </tr>
 <?php }?>

</table>

