<?php
    /*phpinfo();*/
	/*Registra webservice para processamento de jobs*/
	ini_set('display_errors', 'ON');
	error_reporting(E_ALL);
	
	include "/var/www/html/ws/connectdb.php";
	
	//header('Cache-Control: no-cache, must-revalidate');

	
$data = json_decode(file_get_contents("php://input"));


$data = json_decode(file_get_contents("php://input"));
if($data){
		$pergunta = $dbhandle->real_escape_string($data->pergunta);
} else {
		$pergunta = $dbhandle->real_escape_string($_GET['pergunta']);	
}
	


if($pergunta){
  $command = escapeshellcmd('/var/www/html/python/nlp.py "'.$pergunta.'"');
  $resposta = shell_exec($command);
  
  if($resposta){
  echo '{"rs":[';
  echo '{';
  echo '"pergunta":'.$pergunta.',';
  echo '"resposta":'.$resposta;
  echo '}]}';
  } else {
    echo "sem resposta";
  }
} else {
	echo "sem pergunta";
}


?>

