<?php
	include '../config/conexion.php';
	$id_empresa = 1;
?>
<div id="producto">
<fieldset>
	<legend>REGISTRE UN NUEVO PRODUCTO</legend>
<form name="frmProducto">
<input type="hidden" name="txtEmpresa" value="<?php echo $id_empresa?>" />
<table border="0" width="50%" cellpadding="0" cellspacing="0" style="margin-left:20px">
	<tr>
		<td colspan="2">DESCRIPCION: </td>
	</tr>
	<tr>
		<td colspan="2"><input type="text" name="txtDescripcion" class="text" /></td>
	</tr>
	<tr>
		<td colspan="2">TIPO: </td>
	</tr>
	<tr>
		<td colspan="2">
			<select class="combo" name="sltTipo">
				<option value="0">Seleccione</option>
				<?php
				$query = mysql_query("SELECT * FROM tb_tipos WHERE estado = 'A'");
				while( $row = mysql_fetch_array($query)){
					echo"<option value='".$row['id_tipo']."'>".$row['descripcion']."</option>";
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2">UNIDAD: </td>
	</tr>
	<tr>
		<td colspan="2">
			<select class="combo" name="sltUnidad">
				<option value="0">Seleccione</option>
				<?php
				$query = mysql_query("SELECT * FROM tb_unidades WHERE estado = 'A'");
				while( $row = mysql_fetch_array($query)){
					echo"<option value='".$row['id_unidad']."'>".$row['descripcion']."</option>";
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2"><br>ESTADO: </td>
	</tr>
	<tr>
		<td colspan="2">
			<label>ACTIVO<input type="radio" name="optEstado" class="radio" value="A" checked="checked" /></label>
			<label>INACTIVO<input type="radio" name="optEstado" class="radio" value="I" /></label>
		</td>
	</tr>
	<tr>
		<td><br /><input type="button" value="GUARDAR PRODUCTO" class="boton" title='GUARDAR PRODUCTO' onclick="guardarProducto('msn')" /></td>
		<td> <br /><input type="reset" value="LIMPIAR FORMULARIO" class="boton-second" title="LIMPIAR FORMULARIO" /> </td>
	</tr>
	<tr>
	<td colspan="2"><div id="msn"></div></td>
	</tr>
</table>
</form>
</fieldset>
</div>