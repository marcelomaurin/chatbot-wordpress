<?php
    /*phpinfo();*/
	/*Registra webservice para processamento de jobs*/
	ini_set('display_errors', 'ON');
	error_reporting(E_ALL);
	
	header('Content-Type: application/json');  // <-- header declaration
	
	include "/var/www/html/wp-content/plugins/maurinsoft/connectdb.php";
	
	//header('Cache-Control: no-cache, must-revalidate');
	
	
	

	
$data = json_decode(file_get_contents("php://input"));

if($data){
		$pergunta = $dbhandle->real_escape_string($data->pergunta);
} else {
		$pergunta = $dbhandle->real_escape_string($_GET['pergunta']);	
}

$ip = $_SERVER['REMOTE_ADDR']; /*Pega o ip do cliente*/
	
//echo "Inseriu";	
$query= "INSERT into historico (pergunta, ip) values ( '". $pergunta. "', '".$ip."')";
$dbhandle->query($query); /*Executa*/	
	
 
$json =  '{"rs":[';
if($pergunta){
  //$command = escapeshellcmd('/var/www/html/python/nlp.py "'.$pergunta.'" > /var/log/proclog.log');
  $command = escapeshellcmd('/var/www/html/wp-content/plugins/maurinsoft/nlp.py "'.$pergunta.'" > /var/log/proclog.log');
  $resposta = shell_exec($command);
  $resposta = str_replace (array("\r\n", "\n", "\r"), ' ', $resposta);
  
  if($resposta){
     $json = $json  . '{';
     $json = $json  .  '"pergunta":"'.$pergunta.'",';
     $json = $json  .  '"resposta":'.$resposta;
     $json = $json  .  '}';
  } else {
	 $json = $json  . '{';
	 $json = $json  .  '"pergunta":"'.$pergunta.'",';
     $json = $json  .  '"resposta":"'.'sem resposta'.'"';
	 $json = $json  .  '}';
  }  
} else {
	$json = $json  . '{';
	$json = $json  .  '"pergunta":"'.$pergunta.'",';
    $json = $json  .  '"resposta":"'.'sem resposta'.'"';
	$json = $json  .  '}';
}
$json = $json  .  ']}';

echo $json