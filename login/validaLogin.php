<?php
	require_once '../DAO/usuarioDAO.php';
	if(!isset($_GET)) echo "Error";
	$usuario = $_GET['usuario'];
	$clave = $_GET['clave'];
	
	$result = validarUsuario( $usuario, $clave );
	
	if( $result == 1 ){
		echo"redireccionando";
	}elseif( $result == 0 ){
		echo"La clave es incorrecta.";
	}else{
		echo"Su cuenta no ha sido activada.";
	}
?>