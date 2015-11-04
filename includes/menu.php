<ul>
	<li onclick="javascript:showMenu('sub-kardex')">KARDEX</li>
	<ul id="sub-kardex" style="display:block">
		<li onclick="cargarPagina('compra','cuerpo','KARDEX / NUEVA COMPRA')">NUEVA COMPRA</li>
		<li onclick="cargarPagina('venta','cuerpo','KARDEX / NUEVA VENTA')">NUEVA VENTA</li>
		<li onclick="cargarPagina('producto','cuerpo','KARDEX / NUEVO PRODUCTO')">NUEVO PRODUCTO</li>
		<li onclick="cargarPagina('kardex','cuerpo','KARDEX / VER KARDEX')">VER KARDEX</li>
	</ul>
	<li onclick="javascript:showMenu('sub-rol')">ROL DE PAGO</li>
	<ul id="sub-rol">
		<li onclick="cargarPagina('empleado','cuerpo','ROL DE PAGO / NUEVO EMPLEADO')">NUEVO EMPLEADO</li>
		<li onclick="cargarPagina('horas-extras','cuerpo','ROL DE PAGO / HORAS EXTRAS')">HORAS EXTRAS</li>
		<li onclick="cargarPagina('rol','cuerpo','ROL DE PAGO / ROL POR EMPLEADO')">ROL POR EMPLEADO</li>
		<li>UTILIDADES</li>
	</ul>
	<!--<li onclick="javascript:showMenu('sub-amortizacion')">DEPRECIACION</li>-->
    <li onclick="javascript:location='http://localhost/sistema_contable/principal/'">DEPRECIACION</li>
	<ul id="sub-amortizacion">
		<li>INGRESAR ACTIVOS</li>
		<li>VER DEPRECIACION</li>
	</ul>
	<li onclick ="javascript:location='../'">SALIR</li>
</ul>