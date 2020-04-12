<?php
define('host','localhost');
define('user','root');
define('pass','toor');
define('base','db_sistema_contable');
$con= mysql_connect(host,user,pass);
if(!$con){
	echo "Error: No se pudo conectar con el servidor";
	echo"<br>MySql dice: ".mysql_error();
	exit(0);
}else{
	$base = mysql_select_db( base, $con );
	if(!$base){
		echo "Error: No se encontro la base de datos";
		echo"<br>MySql dice: ".mysql_error();
		exit(0);
	}
}
?>