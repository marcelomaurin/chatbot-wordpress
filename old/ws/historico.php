
<?php
/*phpinfo();*/ 
/*Registra webservice para processamento de jobs*/
ini_set('display_errors', 'Off');
error_reporting(E_ALL);
	
include "connectdb.php";
	
$typereq = $_SERVER['REQUEST_METHOD'];
//echo $typereq;

if ($typereq==='POST') 
{
	//echo "POST";
    // The request is using the POST method
	$data = json_decode(file_get_contents("php://input"));
	if($data){
		$localguid = $dbhandle->real_escape_string($data->guid);
		$idhistorico = $dbhandle->real_escape_string($data->idhistorico);
		//echo var_dump(json_decode($foo, true));
	} else {
		$localguid = $dbhandle->real_escape_string($_POST['guid']);	
		$idhistorico = $dbhandle->real_escape_string($_POST['idhistorico']);	
		//echo "3";
	}
	//echo $localguid;
	//echo $idhistorico;
}

if ($typereq === 'GET') {
	//echo "GET";
    // The request is using the POST method
	$data = json_decode(file_get_contents("php://input"));
	if($data){
		$localguid = $dbhandle->real_escape_string($data->guid);
		$idhistorico = $dbhandle->real_escape_string($data->idhistorico);
	} else {
		$localguid = $dbhandle->real_escape_string($_GET['guid']);	
		$idhistorico = $dbhandle->real_escape_string($_GET['idhistorico']);	
	}	
}

if ($typereq === 'DELETE') 
{
	//echo $typereq;
	$data = json_decode(file_get_contents("php://input"));
	if($data){
		$localguid = $dbhandle->real_escape_string($data->guid);
		$idhistorico = $dbhandle->real_escape_string($data->idhistorico);
	} else {
		$localguid = $dbhandle->real_escape_string($_GET['guid']);	
		$idhistorico = $dbhandle->real_escape_string($_GET['idhistorico']);	
	}	
	//$localguid = $data->guid;
	//$idhistorico = $data->idhistorico;
	$query = "delete from historico where idhistorico = ".$idhistorico;
	$dbhandle->query($query);
	//echo ($query);
}

if($localguid!=GUID)
{
	//echo $localguid;
	//echo "  - - ";
	//echo GUID;
	$strJSON =  '{';
	$strJSON = $strJSON . '"mensagem":"Acesso negado"'; 
	$strJSON = $strJSON . '}'; 
	echo $strJSON;
	exit();
}


if (($typereq === 'GET')||($typereq === 'POST')){
	if(($idhistorico)&&($idhistorico!='0'))
	{
		$query = "select idhistorico, pergunta from historico where (idhistorico = ".$idhistorico.");";
	} else {
		$query = "select idhistorico, pergunta from historico ;";
	}
	$rs = $dbhandle->query($query);

	$cont = 0;
	//echo $query;
	$strJSON =  '{"rs":[';
	//while($row=$rs->fetch_assoc())
	while($row=$rs->fetch_assoc())
	{
		
		if($cont!=0)
		{
			$strJSON = $strJSON . ',';
		}
		$strJSON = $strJSON . '{';
		$strJSON = $strJSON . '"idhistorico":'.$row['idhistorico'].',';
		$strJSON = $strJSON . '"pergunta":"'.$row['pergunta'].'"';		
		$strJSON = $strJSON . '}';
		$cont ++;
	}
	$strJSON = $strJSON . ']}'; 
	if ($cont>0)
	{
		echo($strJSON);
	}	
}


?>



