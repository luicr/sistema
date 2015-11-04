<?php 
	include '../config/conexion.php';
	$id_empresa = 1;
?>
<div id="kardex">
<form name="frmKardex">
	<fieldset>
		<legend>KARDEX | METODO PROMEDIO</legend>
		<label>PRODUCTO:</label>
		<select class="combo" name="sltProducto" onchange="verKardex( 'detalleKardex', 'msn' )">
			<option value="0">seleccione</option>
			<?php
			$query = mysql_query("SELECT * FROM tb_productos WHERE id_empresa = $id_empresa AND estado = 'A'");
			while($row = mysql_fetch_array($query)){
				echo "<option value='".$row['id_producto']."'>".$row['descripcion']."</option>";
			}
			?>
		</select>
		<div id="msn"></div>
		<hr />
		<div id="detalleKardex">
		</div>
		<?php //echo mysql_error();?>
	</fieldset>
</form>
</div>