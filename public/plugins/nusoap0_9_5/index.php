<?php
require_once('nusoap0_9_5/nusoap.php');

$server = new soap_server();
$server->configureWSDL('WebService', 'urn:WebService');

////////////////////////////////// METODO EnviaMail
$server->register('EnviaMail',                // method name
    array('CorreoEnvia' => 'xsd:string','Titulo'=>'xsd:string','Mensaje'=>'xsd:string','CorreoDestino'=>'xsd:string','Archivo1'=>'xsd:string','Archivo2'=>'xsd:string'),        // input parameters
    array('Enviado' => 'xsd:string'),      // output parameters
    'urn:WebService',                      // namespace
    'urn:WebService#EnviaMail',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Envia Correos Electronicos'            // documentation
);
function EnviaMail($CorreoEnvia,$Titulo,$Mensaje,$CorreoDestino,$filename,$filename2){                 
	
	
	$enzipado = new ZipArchive();
	$uuid=uniqid();

	if ($enzipado->open("Facturacion".$uuid.".zip", ZIPARCHIVE::CREATE )!==TRUE) {

		exit("No se pudo abrir el archivo\n");

	}

	$enzipado->addFile($filename);
    $enzipado->addFile($filename2);
	$enzipado->close();

	header("Content-type: application/zip");

	header("Content-Disposition: attachment; filename=descarga.zip");

	header("Cache-Control: no-cache, must-revalidate");

	header("Expires: 0");

	//readfile("codedrinks.zip");
	
	
	/*
	
	
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= 'From: '.$CorreoEnvia."\r\n";	
	
	/*$file = "Facturacion".$uuid.".zip";
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
	*/
	
	
	
	/*
    $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $headers .= "This is a multi-part message in MIME format.\r\n";
    $headers .= "--".$uid."\r\n";
    $headers .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $headers .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $headers .= $Mensaje."\r\n\r\n";
    $headers .= "--".$uid."\r\n";
	
	
	$strFilesName = "Facturacion".$uuid.".zip";  
    $strContent = chunk_split(base64_encode(file_get_contents($strFilesName)));  
   // $headers .= "--".$strSid."\n";  
    $headers .= "Content-Type: application/octet-stream; name=\"".$strFilesName."\"\n";  
    $headers .= "Content-Transfer-Encoding: base64\n";  
    $headers .= "Content-Disposition: attachment; filename=\"".$strFilesName."\"\n\n";  
    $headers .= $strContent."\n\n"; 
	
  /*  $headers .= "Content-type: application/zip name=\"".$file."\"\r\n"; // use different content types here
    $headers .= "Content-Transfer-Encoding: base64\r\n";
    $headers .= "Content-Disposition: attachment; filename=\"".$file."\"\r\n\r\n";
	$headers .= "Cache-Control: no-cache, must-revalidate";
    $headers .= $content."\r\n\r\n";
	
	
    $headers .= "--".$uid."--";
	*/
	
	
	//*** Uniqid Session ***//  
	$strSid = md5(uniqid(time()));  
	  
	$strHeader = "";  
	$strHeader .= 'From: '.$CorreoEnvia."\r\n";  
	  
	$strHeader .= "MIME-Version: 1.0\n";  
	$strHeader .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";  
	$strHeader .= "This is a multi-part message in MIME format.\n";  
	  
	$strHeader .= "--".$strSid."\n";  
	$strHeader .= "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //  
	$strHeader .= "Content-Transfer-Encoding: 7bit\n\n";  
	$strHeader .= $Mensaje."\n\n";  
	  
	 
	$strFilesName = "Facturacion".$uuid.".zip";  
	$strContent = chunk_split(base64_encode(file_get_contents("Facturacion".$uuid.".zip")));  
	$strHeader .= "--".$strSid."\n";  
	$strHeader .= "Content-Type: application/octet-stream; name=\"".$strFilesName."\"\n";  
	$strHeader .= "Content-Transfer-Encoding: base64\n";  
	$strHeader .= "Content-Disposition: attachment; filename=\"".$strFilesName."\"\n\n";  
	$strHeader .= $strContent."\n\n";  
	  
	
    if (mail($CorreoDestino,$Titulo,$Mensaje,$strHeader)){
		$Exito.='True';
		$Exito.=$filename;
		
	}else{
		$Exito='False';
	}    
    return new soapval('Enviado','xsd:string',$Exito);
}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>