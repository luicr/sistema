<!DOCTYPE html>
<head lang="es-ES">
<meta charset="UTF-8" />
<title>Sistema Contable | Principal</title>
<link href="../css/estilos.css" rel="stylesheet" type="text/css">
<script src="../js/menu.js"></script>
<script src="../js/principal.js"></script>
<script src="../js/compra.js"></script>
<script src="../js/producto.js"></script>
<script src="../js/venta.js"></script>
<script src="../js/kardex.js"></script>
<script src="../js/rol.js"></script>
</head>

<body>
	<div id="contenedor">
		<div id="cabecera">
			<table border="0">
				<tr align="center">
					<td width="40%"><div id="tituloSeleccionado">PRINCIPAL /</div></td>
					<td width="40%">BIENVENIDO LUIS CHOEZ (<a href="#" class="link">ADMINISTRADOR</a>)</td>
					<td width="20%" align="right"><a href="../" class="link">SALIR</a><span style="padding-right:20px"></span></td>
				</tr>
			</table>
		</div>
		<div id="menu">
			<?php include'../includes/menu.php'?>
		</div>
		<div id="cuerpo">
			<?php //include'../includes/compra.php'?>
		</div>
		<div id="footer"></div>
	</div>
</body>
</html>
