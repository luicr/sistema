<?php
function compra($cantidad, $valor, $total, $existencia = array()){ 
		echo "
		<td>".redondear_dos_decimal($cantidad)."</td>
		<td>".redondear_dos_decimal($valor)."</td>
		<td>".redondear_dos_decimal($total)."</td>
		
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
		<td>".redondear_dos_decimal($existencia['cantidad'])."</td>
		<td>".redondear_dos_decimal($existencia['total'] / $existencia['cantidad'])."</td>
		<td>".redondear_dos_decimal($existencia['total'])."</td>
		";
	}
	
	function venta($cantidad, $valor, $total,  $existencia = array()){ 
		echo "
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
		<td>".redondear_dos_decimal($cantidad)."</td>
		<td>".redondear_dos_decimal($valor)."</td>
		<td>".redondear_dos_decimal($total)."</td>
		
		<td>".redondear_dos_decimal($existencia['cantidad'])."</td>
		<td>".redondear_dos_decimal($existencia['total'] / $existencia['cantidad'])."</td>
		<td>".redondear_dos_decimal($existencia['total'])."</td>
		";
	}

	function redondear_dos_decimal($valor) { 
		$float_redondeado=round($valor * 100) / 100; 
		return $float_redondeado; 
	} 
?>