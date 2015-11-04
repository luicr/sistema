<?php
	session_start();
	require_once '../config/conexion.php';
	
	function validarUsuario( $usuario, $clave ){
		$query = mysql_query("SELECT id_usuario, usuario, clave FROM tb_usuarios WHERE usuario = '$usuario'");
		if( mysql_num_rows( $query ) == 1 ){
			$row = mysql_fetch_array( $query );
			if( $row['clave'] == $clave ){
				$_SESSION['id_usuario'] = $row['id_usuario'];
				return 1;//Correcto
			}else{
				return 0;//Clave incorrecta
			}
		}else{
			return -1; //Cuenta no activada;
		}
	}
?>