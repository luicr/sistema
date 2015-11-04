<div id="empleado">
	<fieldset>
		<legend>INGRESO DE EMPLEADOS</legend>
			<form name="frmEmpleado"><br />
				<table width="60%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td colspan="2" scope="col">NOMBRE:</td>
				  </tr>
				  <tr>
					<td colspan="2"><input type="text" class="text" name="txtNombre" /></td>
				  </tr>
				  <tr>
					<td colspan="2">APELLIDO:</td>
				  </tr>
				  <tr>
					<td colspan="2"><input type="text"  class="text" name="txtApellido" /></td>
				  </tr>
				  <tr>
					<td colspan="2">CEDULA:</td>
				  </tr>
				  <tr>
					<td colspan="2"><input  type="text" class="text" name="txtCedula" /></td>
				  </tr>
				  <tr>
					<td colspan="2">FECHA INGRESO: </td>
				  </tr>
				  <tr>
					<td colspan="2"><input type="date" class="text" name="txtFechaIngreso" /></td>
				  </tr>
				  <tr>
					<td colspan="2">NUMERO DE HIJOS: </td>
				  </tr>
				  <tr>
					<td colspan="2"><input type="number" class="text num" min="0" max="99" value="0" name="txtNumeroHijos" /></td>
				  </tr>
				  <tr>
					<td colspan="2">SUELDO:</td>
				  </tr>
				  <tr>
					<td colspan="2"><input type="text" class="text num" name="txtSueldo" /></td>
				  </tr>
				  <tr>
					<td width="50%"><input name="button" type="button" class="boton" value="GUARDAR EMPLEADO" title="GUARDAR EMPLEADO" onclick="guardarEmpleado('msn')" /></td>
					<td><input name="reset" type="reset" class="boton-second" value="LIMPIAR FORMULARIO" title="LIMPIAR FORMULARIO" /></td>
				  </tr>
				  <tr>
				  	<td colspan="2"><div id="msn"></div></td>
				  </tr>
				</table>
			</form>
	</fieldset>
</div>