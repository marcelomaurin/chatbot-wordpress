<?php
    /*phpinfo();*/
	/*Registra webservice para processamento de jobs*/
	ini_set('display_errors', 'Off');
	error_reporting(E_ALL);
	
	include "connectdb.php";
	
	//header('Cache-Control: no-cache, must-revalidate');

	$data = json_decode(file_get_contents("php://input"));
	if($data){
		$telefone = $dbhandle->real_escape_string($data->telefone);
	} else {
		$telefone = $dbhandle->real_escape_string($_GET['telefone']);	
	}
	
	if($telefone){
		$query = "select idjob, telefone, mensagem, status from jobs where (status = 0) and (telefone like '%".$telefone."%');";
	} else {
		$query = "select idjob, telefone, mensagem, status from jobs where (status = 0);";
	}
	//echo $query;
	
	$rs = $dbhandle->query($query);

	$cont = 0;
	
	$strJSON = '{"rs":[';
	while($row=$rs->fetch_assoc())
	{
		
		if($cont!=0)
		{
			$strJSON = $strJSON . ',';
		}
		$strJSON = $strJSON .  '{';
		$strJSON = $strJSON . '"idjob":'.$row['idjob'].',';
		$strJSON = $strJSON . '"telefone":"'.$row['telefone'].'",';
		$strJSON = $strJSON . '"mensagem":"'.$row['mensagem'].'",';
		$strJSON = $strJSON . '"status":"'.$row['status'].'"';
	echo '}';
		$cont ++;
	}
	echo ']}'; 
	if ($cont>0)
	{
		echo($strJSON);
	}
?>