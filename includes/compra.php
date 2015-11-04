<?php
	include '../config/conexion.php';
	$id_empresa = 1;
	$sql = "INSERT INTO tb_compras
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
		$sql = "SELECT MAX(id_compra) id_compra FROM tb_compras";
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);
		$id_compra = $row['id_compra'];
		$query = mysql_query("SELECT * FROM tb_productos WHERE id_empresa = $id_empresa");
?>
<form name="frmCompra"> 
<div id="compra">
<fieldset>
	<legend>REGISTRE UNA NUEVA COMPRA</legend>
	<label>Nro. COMPRA: </label>
	<input type="text" name="txtNroCompra" value="<?php echo $id_compra;?>" disabled="disabled" />
	<!-- <input type="text" name="txtNroCompra" value="0001" disabled="disabled" class="numero" /> -->
	<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
		<tr>
			<th width="50%">PRODUCTO</th>
			<th width="15%">CANTIDAD</th>
			<th width="15%">VALOR</th>
			<th width="15%">TOTAL</th>
			<th width="5%">ADD</th>
		</tr>
		<tr align="center">
			<td>
				<select class="combo" name="sltProducto">
					<option value="0">Seleccione</option>
					<?php
						while($row = mysql_fetch_array($query)){
							echo"<option value=".$row['id_producto'].">".$row['descripcion']."</option>";
						}
					?>
				</select>
			</td>
			<td><input type="text" class="num" placeholder="00.00" name="txtCantidad" id="txtCantidad" onblur="totalProducto();" /></td>
			<td><input type="text" class="num" placeholder="$ 00.00" name="txtValor" id="txtValor" onblur="totalProducto();" /></td>
			<td><input type="text" class="num" placeholder="$ 00.00" disabled="disabled" name="txtTotal" id="txtTotal" /></td>
			<td><input type="button" name="btnAdd" value="+" class="add" title="AGREGAR PRODUCTO" onclick="guardarDetalle('detalle','mensaje')" /></td>
		</tr>
		<tr align="center">
			<td colspan="5"><div id="detalle"></div></td>
		</tr>
		<tr align="center">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<th align="right">SUBTOTAL:&nbsp; </th>
			<td><input type="text" placeholder="$ 00.00" disabled="disabled" class="num" id="txtSubtotal" /></td>
			<td>&nbsp;</td>
		</tr>
		<tr align="center">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<th align="right">IVA:&nbsp;</th>
			<td><input type="text" placeholder="$ 00.00" disabled="disabled" class="num" id="txtIVA" /></td>
			<td>&nbsp;</td>
		</tr>
		<tr align="center">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<th align="right">TOTAL:&nbsp;</th>
			<td><input type="text" placeholder="$ 00.00" disabled="disabled" class="num" id="txtTotalVenta" /></td>
			<td>&nbsp;</td>
		</tr>
	</table>
	<input name="button" type="button" class="boton" value="GUARDAR COMPRA" title="GUARDAR COMPRA" onclick="validarCompra('mensaje')" />
	<div id="mensaje"></div>
</fieldset>
</div>
</form>