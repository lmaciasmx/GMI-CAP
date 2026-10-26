<?php
require_once('nusoap0_9_5/nusoap.php');
$client = new nusoap_client('http://primecentersolutions.com/wscorreos/index.php?wsdl','wsdl');
$err = $client->getError();
if ($err) {echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';}

$parametros = array('CorreoEnvia' =>'vazquezornelas@gmail.com','Titulo'=>'Envio de Correos','Mensaje'=>'<strong>Hola wey</strong>','CorreoDestino'=>'papipiss@hotmail.com','Archivo1'=>'view.png');
$result = $client->call('EnviaMail',$parametros, '', '', false, true);
// Check for a fault
if ($client->fault) {
	echo '<h2>Fault</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {
	// Check for errors
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {
		// Display the result
		echo '<h2>Result</h2><pre>';
		print_r($result);
		echo '</pre>';
	}
}
/*echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';*/
?>
