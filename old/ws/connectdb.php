<?php
	define("HOSTNAME","localhost");
	define("USERNAME","root");
 	define("PASSWORD","senha");
	define("DATABASE","maurinsoftdb");
	define("GUID","32d863cf-d225-44bb-9979-778c4df6a79e");

	$dbhandle = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE) or die("Erro ao conectar no banco de dados");

?>
