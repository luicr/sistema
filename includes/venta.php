<?php
	include '../config/conexion.php';
	$id_empresa = 1;
	$sql = "INSERT INTO tb_ventas
		(
			estado,
			id_empresa
		)
		VALUES
		(
			'I',
			$id_empresa
		)";
		mysql_query( $sql );
		$sql = "SELECT MAX(id_venta) id_venta FROM tb_ventas";
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);
		$id_venta = $row['id_venta'];
		
		$query = mysql_query("SELECT * FROM tb_productos WHERE id_empresa = $id_empresa");
		
?>
<form name="frmVenta">
	<div id="venta">
		<fieldset>
			<legend>REGISTRE UNA NUEVA VENTA</legend>
			<label>Nro. VENTA: </label>
			<input type="text" name="txtNroVenta" value="<?php echo $id_venta;?>" disabled="disabled" />
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<th scope="col" width="45%">PRODUCTO</th>
				<th scope="col" width="10%">STOCK</th>
				<th scope="col" width="10%">UNI.</th>
				<th scope="col" width="10%">VALOR</th>
				<th scope="col" width="10%">CANTIDAD</th>
				<th scope="col" width="10%">TOTAL</th>
				<th scope="col" width="5%">ADD</th>
			  </tr>
			  <tr align="center">
				<td>
					<select class="combo" name="sltProducto" onchange="cargarStock()">
						<option value="0">Seleccione</option>
						<?php
							while($row = mysql_fetch_array($query)){
								echo"<option value=".$row['id_producto'].">".$row['descripcion']."</option>";
							}
						?>
					</select>
					</td>
					<td><input type="text" class="num disabled" placeholder="00.00" name="txtStock" id="txtStock" disabled="disabled" /></td>
					<td><input type="text" class="num disabled" name="txtUnidad" id="txtUnidad" disabled="disabled" /></td>
					<td><input type="text" class="num disabled" placeholder="$ 00.00" name="txtValor" id="txtValor" onblur="totalProducto()" disabled="disabled" /></td>
					<td><input type="text" class="num" placeholder="00.00" name="txtCantidad" id="txtCantidad" onblur="totalProducto();" /></td>
					<td><input type="text" class="num" placeholder="$ 00.00" disabled="disabled" id="txtTotal" /></td>
					<td><input type="button" name="btnAdd" value="+" class="add" title="AGREGAR PRODUCTO" onclick="guardarDetalleVenta('detalle','mensaje')" /></td>
			  </tr>
			  <tr align="center">
			<td colspan="7"><div id="detalle"></div></td>
				</tr>
				<tr align="center">
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<th align="right">SUBTOTAL:&nbsp; </th>
					<td><input type="text" placeholder="$ 00.00" disabled="disabled" class="num" id="txtSubtotal" value="" /></td>
					<td>&nbsp;</td>
				</tr>
				<tr align="center">
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<th align="right">IVA:&nbsp;</th>
					<td><input type="text" placeholder="$ 00.00" disabled="disabled" class="num" id="txtIVA" /></td>
					<td>&nbsp;</td>
				</tr>
				<tr align="center">
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<th align="right">TOTAL:&nbsp;</th>
					<td><input type="text" placeholder="$ 00.00" disabled="disabled" class="num" id="txtTotalVenta" /></td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<input name="button" type="button" class="boton" value="GUARDAR VENTA" title="GUARDAR VENTA" onclick="validarVenta('mensaje')" />
			<div id="mensaje"></div>
		</fieldset>
	</div>
</form>