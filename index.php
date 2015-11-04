<!DOCTYPE html>
<head lang="ES-es">
<meta charset='UTF-8' />
<title>Sistema Contable | Inicio de Sesi&oacute;n</title>
<script src="js/login.js"></script>
<style>
html, body{
	margin:0 auto;
	padding:0px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
}
#contenedor{
	width:100%;
}
#login{
	width:30%;
	height:650px;
	float:left;
	/* -webkit-transition:all 0.3s linear;
	-moz-transition:all 0.3s linear;
	-o-transition:all 0.3s linear; */
}
#portada{
	width:69%;
	background-color:#00CC66;
	background-color: #FFF;
	height:670px;
	float:left;
	border-right: 1px solid #CCC; 
}
#portada img{
	/* padding-top: 20px; */
	width: 100%;
	height: inherit;
}
label{
	display:block;
}
.text{
	width:90%;
	padding:10px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	outline:none;
	border:1px solid #000;
	color:#000000;
}
#tableLogin{
	margin-top:130px;
	min-height:0px;
}
#tableLogin td{
	padding:8px;
}
.boton{
	border:0px;
	padding:10px;
	width:95%;
	background-color:#6633FF;
	background-color:#0066FF;
	color:#FFFFFF;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	font-weight:bold;
}
.boton:hover{
	background-color:#0000CC;
	cursor:pointer;
}
.titulo{
	font-family:Arial, Helvetica, sans-serif;
	font-size:26px;
	text-align:center;
}
#mensaje{
	width:100%;
	overflow:hidden;
	-webkit-transition:all 0.5s linear;
	padding:3px;
}
</style>
</head>

<body>
	<div id="contenedor">
		<div id="portada">
			<img src="img/portada3.jpg">
		</div>
		<div id="login">
		  <form name="frmLogin" id="frmLogin">
				<table width="65%" border="0" cellspacing="0" cellpadding="0" align="center" id="tableLogin">
				  <tr>
					<td class="titulo">INICIA SESI&Oacute;N</td>
				  </tr>
				  <tr>
					<td align="center"><input type="text" name="txtUsuario" id="txtUsuario" placeholder="USUARIO" class="text" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td align="center"><input type="password" name="txtClave" id="txtClave" placeholder="CONTRASE&Ntilde;A" class="text" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td align="center"><input type="button" name="btnLogin" id="btnLogin" value="ENTRAR" class="boton" onClick="login('txtUsuario','txtClave','mensaje')" /></td>
				  </tr>
				  <tr>
					<td><div id="mensaje"></div></td>
				  </tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>
